<?php

namespace App\Services;

use App\Enums\OrderStatus;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\OrderFile;
use App\Models\UserInstance;
use App\Models\UserPlan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use function Psy\debug;


class OrderService
{
    public function getUserPlan(): object
    {
        return UserInstance::where(['user_id' => Auth::id()])
            ->with('instance')
            ->get();
    }

    public function userInstanceIds()
    {
        $userInstances = UserInstance::where(['user_id' => Auth::id()])->get('instance_id');
        $instance_ids = [];
        foreach ($userInstances as $userInstance) {
            $instance_ids[] = $userInstance->instance_id;
        }
        return $instance_ids;
    }

    public function getOrder()
    {
        $userInstanceIds = $this->userInstanceIds();

        $orders = Order::select('o.id as order_id', 'o.user_id', 'o.instance_id', 'o.theme', 'o.stage_count',
            'o.status', 'o.current_stage', 'up.instance_id as up_instance_id', 'up.stage as up_stage')
            ->from('orders as o')
            ->leftJoin('user_plans as up', function ($join) {
                $join->on('up.user_instance_id', '=', 'o.instance_id')
                    ->on('up.user_id', '=', 'o.user_id');
            })
            ->with(['user', 'instance'])
            ->whereIn('up.instance_id', $userInstanceIds)
            ->where('up.stage', '<=', DB::raw('o.current_stage'))
            ->orderBy('o.id', 'DESC')
            ->orderBy('o.current_stage', 'ASC')
            ->paginate(20)->toArray();


//        $orders = Order::select('o.id as order_id', 'o.user_id', 'o.instance_id', 'o.theme', 'o.stage_count',
//            'o.status', 'o.current_stage', 'up.instance_id as up_instance_id', 'up.stage as up_stage')
//            ->from('orders as o')
//            ->leftJoin('user_plans as up', function ($join) {
//                $join->on('up.user_instance_id', '=', 'o.instance_id')
//                    ->on('up.user_id', '=', 'o.user_id');
//            })
//            ->with(['user', 'instance'])
//            ->whereIn('o.instance_id', $userInstanceIds) // Check instance_id directly
//            ->where(function ($query) {
//                $query->where('up.stage', '<=', DB::raw('o.current_stage'));
////                    ->orWhereNull('up.user_id'); // Check for NULL values in user_plans (left join)
//            })
//            ->orderBy('o.id', 'DESC')
//            ->orderBy('o.current_stage', 'ASC')
//            ->paginate(20)
//            ->toArray();


        return $orders;
    }


    public function create(object $data): int
    {
        if ($data->theme == '')
            throw new \Exception(message:'requiredTheme', code: 400);

        $stageCount = UserPlan::where([
            'user_id' => Auth::id(),
            'user_instance_id' => $data->instance_id
        ])->count();

        if ($stageCount == 0) {
            throw new \Exception('userPlanEmpty');
        }

        $current_instance_id = UserPlan::where([
            'user_id' => Auth::id(),
            'user_instance_id' => $data->instance_id,
            'stage' => 1
        ])->first()->instance_id;

        DB::beginTransaction();

            $orderId = Order::insertGetId([
                'user_id' => Auth::id(),
                'instance_id' => $data->instance_id,
                'theme' => $data->theme,
                'current_instance_id' => $current_instance_id,
                'stage_count' => $stageCount,
                'status' => OrderStatus::PROCESSING,
                'current_stage' => 1,
            ]);

            $this->filesUpload($data, $orderId);

            $this->orderDetailStore($data, $orderId);

        DB::commit();
        return $orderId;
    }



    public function orderDetailStore(object $data, int $orderId): void
    {
        for($i = 0; $i < count($data->name); $i++) {
            if ($data->name[$i] != '') {
                OrderDetail::create([
                    'order_id' => $orderId,
                    'name' => $data->name[$i] ?? "",
                    'count' => $data->count[$i] ?? NULL,
                    'pcs' => $data->pcs[$i] ?? "",
                    'purpose' => $data->purpose[$i] ?? "",
                    'address' => $data->address[$i] ?? "",
                    'approximate_price' => $data->approximate_price[$i] ?? "",
                ]);
            }
        }
    }


    public function filesUpload(object $data, int $orderId): void
    {
        if ($data->hasfile('files')) {
            foreach ($data->file('files') as $file) {
                $file_name = $orderId . "_" . time() . "." . $file->getClientOriginalExtension();
                $file->move(public_path() . '/files/', $file_name);

                OrderFile::create([
                    'order_id' => $orderId,
                    'user_id' => Auth::id(),
                    'file' => $file_name,
                ]);
            }
        }
    }

}
