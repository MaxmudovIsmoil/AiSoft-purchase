<?php

namespace App\Services;


use App\Models\OrderDetail;

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
            'status' => OrderDetail::STATUS_UPDATE,
            'approximate_price' => $data['approximate_price'],
        ]);
        $data['id'] = $id;
        return $data;
    }

    public function update(int $id, array $data): array
    {
        $orderDetail = OrderDetail::findOrFail($id);
        $orderDetail->fill([
            'name' => $data['name'],
            'count' => $data['count'],
            'pcs' => $data['pcs'],
            'purpose' => $data['purpose'],
            'address' => $data['address'],
            'status' => OrderDetail::STATUS_UPDATE,
            'approximate_price' => $data['approximate_price'],
        ]);
        $orderDetail->save();
        $data['id'] = $id;
        return $data;
    }

    public function destroy(int $id)
    {
        OrderDetail::destroy($id);
        return $id;
    }
}
