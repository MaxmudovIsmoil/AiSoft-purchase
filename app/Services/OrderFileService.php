<?php

namespace App\Services;

use App\Http\Resources\OrderFileResource;
use App\Models\OrderFile;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

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
            $file = $data['file'];
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->storeAs('upload/files', $filename, 'public');

            OrderFile::create([
                'order_id' => $data['order_id'],
                'user_id' => Auth::id(),
                'file' => $filename,
            ]);

            return response()->success([
                'order_id' => $data['order_id'],
                'file' => $filename,
                'name' => Auth::user()->name
            ]);
        }
        catch (\Exception $e) {
            return response()->fail($e->getMessage());
        }
    }

    public function destroy(int $id): JsonResponse
    {
        try {
            $fileId = $id;
            $orderFile = OrderFile::findOrfail($id);

            $filePath = storage_path('upload/files/'.$orderFile->file);

            if (File::exists($filePath))
                File::delete($filePath);

            $orderFile->delete();

            return response()->success($fileId);
        }
        catch (\Exception $e) {
            return response()->fail($e->getMessage());
        }
    }
}
