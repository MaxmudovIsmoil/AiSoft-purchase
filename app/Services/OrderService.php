<?php

namespace App\Services;

use App\Models\Order;

class OrderService
{
    public function list()
    {
        return Order::where(['status' => 1])->get();
    }

    public function create(array $data)
    {
        return Order::create(['name' => $data['name']]);
    }

    public function update(array $data, int $id)
    {
        return Order::where(['id'=> $id])->update(['name' => $data['name']]);
    }

    public function delete(int $id)
    {
        return Order::destroy($id);
    }
}
