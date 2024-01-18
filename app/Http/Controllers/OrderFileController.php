<?php

namespace App\Http\Controllers;


use App\Http\Requests\OrderFileRequest;
use App\Services\OrderFileService;
use Illuminate\Http\Request;


class OrderFileController extends Controller
{
    public function __construct(
        public OrderFileService $service
    )
    {}

    public function getFiles(int $orderId)
    {
        return $this->service->getFiles($orderId);
    }

    public function store(OrderFileRequest $request)
    {
//        return response()->success($request->all());
        return $this->service->store($request->validated());
    }


    public function destroy(int $fileId)
    {
        return $this->service->destroy($fileId);
    }

}
