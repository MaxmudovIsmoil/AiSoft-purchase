<?php

namespace App\Http\Controllers;

use App\Http\Requests\InstanceRequest;
use App\Services\InstanceService;
use Illuminate\Http\JsonResponse;

class InstanceController extends Controller
{
    public function __construct(
        public InstanceService $service
    ) {}


    public function index()
    {
         return view('instance.index');
    }

    public function getInstances()
    {
        return $this->service->list();
    }

    public function getOne(int $id)
    {
        try {
            return response()->success($this->service->one($id));
        }
        catch (\Exception $e) {
            return response()->fail($e->getMessage());
        }
    }


    public function store(InstanceRequest $request): JsonResponse
    {
        try {
            $result = $this->service->create($request->validated());
            return response()->success($result);
        }
        catch (\Exception $e) {
            return response()->fail($e->getMessage());
        }
    }

    public function update(InstanceRequest $request, int $id)
    {
        try {
            $result = $this->service->update($request->validated(), $id);
            return response()->success($result);
        }
        catch (\Exception $e) {
            return response()->fail($e->getMessage());
        }
    }

    public function destroy(int $id)
    {
        try {
            $result = $this->service->delete($id);
            return response()->success($result);
        }
        catch(\Exception $e) {
            return response()->fail($e->getMessage());
        }
    }

}
