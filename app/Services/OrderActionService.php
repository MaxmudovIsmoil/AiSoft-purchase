<?php

namespace App\Services;

use App\Enums\OrderStatus;
use App\Helpers\Helper;
use App\Models\Order;
use App\Models\OrderAction;
use App\Models\UserPlan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;



class OrderActionService
{
    const ACCEPTED_STATUS = OrderStatus::ACCEPTED->value;
    const GO_BACK_STATUS = OrderStatus::GO_BACK->value;
    const COMPLETED_STATUS = OrderStatus::COMPLETED->value;

    public function action(array $data): int
    {
        try {
            DB::beginTransaction();
                $orderId = $data['order_id'];
                $status = $data['status'];

                $order = Order::with('user')->findOrFail($orderId);
                $orderCurrentInstanceId = $order->current_instance_id;
                $orderCurrentStage = $order->current_stage;

                //  business hours
//                $orderCreatedAt = $order->created_at;
//                $start = ($orderCurrentStage > 1)
//                    ? OrderAction::where('order_id', $orderId)->latest()->first()->created_at
//                    : $orderCreatedAt;
//                $end = now();
//                $time_signed = Helper::businessHours($start, $end);

                $actionStatus = self::ACCEPTED_STATUS;
                $actionStage = 1;
                $orderData = [
                    'status' => $actionStatus,
                    'current_instance_id' => $orderCurrentInstanceId,
                    'current_stage' => $actionStage
                ];

                if ($status == self::ACCEPTED_STATUS) {
                    if ($orderCurrentStage >= 1 && $orderCurrentStage < $order->stage_count) {
                        $actionStage = $orderCurrentStage;
                        $orderCurrentStage++;
                        $newCurrentInstanceId = $this->newInstanceId($order, $orderCurrentStage);

                        $orderData['status'] = self::ACCEPTED_STATUS;
                        $orderData['current_instance_id'] = $newCurrentInstanceId;
                        $orderData['current_stage'] = $orderCurrentStage;
                    }
                    elseif ($orderCurrentStage == $order->stage_count) {
                        $actionStage = $orderCurrentStage;
                        $orderData['status'] = self::COMPLETED_STATUS;
                    }
                }
                elseif ($status == self::GO_BACK_STATUS) {
                    $actionStatus = self::GO_BACK_STATUS;
                    $actionStage = $orderCurrentStage;
                    $orderData['status'] = self::GO_BACK_STATUS;
                    $orderData['current_stage'] = 1;
                }

                $order->fill($orderData);
                $order->save();

                OrderAction::create([
                    'order_id' => $orderId,
                    'user_id' => Auth::id(),
                    'instance_id' => $orderCurrentInstanceId,
                    'status' => $actionStatus,
                    'stage' => $actionStage,
                    'time_signed' => "",
                    'comment' => ($data['comment']) ?? "",
                ]);

            DB::commit();

            return $orderId;
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }


    public function newInstanceId(object $order, int $stage): int
    {
        return UserPlan::where([
            'user_id' => $order->user_id,
            'user_instance_id'=> $order->instance_id,
            'stage' => $stage
        ])->first()->instance_id;
    }
}
