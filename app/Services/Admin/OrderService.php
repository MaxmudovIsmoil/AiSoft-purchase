<?php

namespace App\Services\Admin;

use App\Models\Order;

class OrderService
{

    public function getOrder(int $status = null)
    {
        $orderQuery = Order::select('o.id as order_id', 'o.user_id', 'o.instance_id', 'o.theme',
            'o.stage_count', 'o.status', 'o.current_stage', 'o.current_instance_id',
            'up.instance_id as up_instance_id', 'up.stage as up_stage',
            'up.user_instance_id as up_user_instance_id')
            ->from('orders as o')
            ->leftJoin('user_plans as up', function ($join) {
                $join->on('up.user_instance_id', '=', 'o.instance_id')
                    ->on('up.user_id', '=', 'o.user_id');
            })
            ->with(['user', 'instance', 'currentInstance']);
//            ->where(function ($query) use ($userInstanceIds) {
//                $query->where(function ($query) use ($userInstanceIds) {
//                    $query->whereIn('up.instance_id', $userInstanceIds)
//                        ->where('up.stage', '<=', DB::raw('o.current_stage'));
//                })
//                    ->whereIn('up.user_instance_id', $userInstanceIds, 'or');
//            });

        if(!is_null($status)){
            $orderQuery = $orderQuery->where(['o.status' => $status]);
        }

        return $orderQuery->groupBy('o.id')
            ->orderBy('o.id', 'DESC')
            ->orderBy('o.current_stage', 'ASC')
            ->paginate(20);
    }
}
