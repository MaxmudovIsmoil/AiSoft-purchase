<?php

namespace App\Http\Controllers;


use App\Enums\OrderStatus;
use App\Enums\OrderStatusEnum;
use App\Services\OrderService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function __construct(
        public OrderService $service
    ) {}


    public function index()
    {
        $user_plans = $this->service->getUserPlan();

        $userInstanceIds = $this->service->userInstanceIds();

        $orders = $this->service->getOrder();

        return view('order.index',
            compact('user_plans', 'orders', 'userInstanceIds')
        );
    }


    public function store(Request $request): JsonResponse
    {
        try {
            $result = $this->service->create($request);
            return response()->success($result);
        }
        catch (\Exception $e) {
            return response()->fail($e->getMessage());
        }
    }


    public function getOrderActionComments(int $orderId): JsonResponse
    {
        try {
            return response()->success($this->service->getOrderActionComments($orderId));
        }
        catch (\Exception $e) {
            return response()->fail($e->getMessage());
        }
    }
}
