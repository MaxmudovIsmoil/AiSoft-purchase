<?php

namespace App\Services;

use App\Enums\OrderStatus;
use App\Models\Order;
use App\Models\OrderAction;
use App\Models\OrderDetail;
use App\Models\OrderFile;
use App\Models\UserInstance;
use App\Models\UserPlan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use function Psy\debug;


class OrderDetailService
{
    public function getOne(int $orderId)
    {
        return OrderDetail::where(['order_id' => $orderId])
            ->get();
    }

    public function store(array $data): array
    {
         $id = OrderDetail::insertGetId([
            'order_id' => $data['order_id'],
            'name' => $data['name'],
            'count' => $data['count'],
            'pcs' => $data['pcs'],
            'purpose' => $data['purpose'],
            'address' => $data['address'],
            'approximate_price' => $data['approximate_price'],
        ]);
        $data['id'] = $id;
        return $data;
    }

    public function update(int $orderDetailId, array $data): array
    {
        $orderDetail = OrderDetail::findOrFail($orderDetailId);
        $orderDetail->fill([
            'name' => $data['name'],
            'count' => $data['count'],
            'pcs' => $data['pcs'],
            'purpose' => $data['purpose'],
            'address' => $data['address'],
            'approximate_price' => $data['approximate_price'],
        ]);
        $orderDetail->save();
        $data['id'] = $orderDetailId;
        return $data;
    }

    public function destroy(int $orderDetailId)
    {
        OrderDetail::destroy($orderDetailId);
        return $orderDetailId;
    }
}
