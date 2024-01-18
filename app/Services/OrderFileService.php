<?php

namespace App\Services;

use App\Http\Resources\OrderFileResource;
use App\Models\OrderFile;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;

class OrderFileService {

    public function getFiles(int $orderId): JsonResponse
    {
        try {
            $orderFiles = OrderFile::where(['order_id' => $orderId])->with('user')->get();
            return response()->success(OrderFileResource::collection($orderFiles));
        }
        catch (\Exception $e) {
            return response()->fail($e->getMessage());
        }
    }

    public function store(array $data): JsonResponse
    {
        try {

            $filename = time().'.'.$data['file']->getClientOriginalExtension();
            $data['file']->move(public_path().'/assets/files/', $filename);

            OrderFile::create([
                'order_id' => $data['order_id'],
                'user_id' => Auth::id(),
                'file' => $filename,
            ]);
            return response()->success($data);
        }
        catch (\Exception $e) {
            return response()->fail($e->getMessage());
        }
    }

    public function destroy(int $fileId): JsonResponse
    {
        try {
//            OrderFile::destroy($fileId);
            return response()->success($fileId);
        }
        catch (\Exception $e) {
            return response()->fail($e->getMessage());
        }
    }
}
