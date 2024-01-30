<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\Admin\OrderService;


class OrderController extends Controller
{
    public function __construct(
        public OrderService $service
    ){}

    public function getOrders()
    {

        $orderAll = $this->service->getOrder();
        $orderAccepted = $this->service->getOrder(2);
        $orderGoBack = $this->service->getOrder(3);
        $orderCompleted = $this->service->getOrder(5);

        return view('admin_order.index',
            compact(
                'orderAll',
                'orderAccepted',
                'orderGoBack',
                'orderCompleted',
            )
        );
    }
}
