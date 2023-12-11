<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserCreateRequest;
use App\Http\Requests\UserProfileRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Models\Instance;
use App\Services\UserService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class UserController extends Controller
{
    public function __construct(
        public UserService $service
    ){}

    public function index()
    {
        $instances = Instance::where(['status' => 1])
            ->wherenull('deleted_at')
            ->get();

        return view('user.index', compact('instances'));
    }

    public function getUsers()
    {
        return $this->service->list();
    }

    public function getOne(int $id): JsonResponse
    {
        try {
            return response()->success($this->service->one($id));
        }
        catch (\Exception $e) {
            return response()->fail($e->getMessage());
        }
    }

    public function store(UserCreateRequest $request): JsonResponse
    {
        try {
            $result = $this->service->create($request->validated());
            return response()->success($result);
        }
        catch(\Exception $e) {
            DB::rollBack();
            return response()->fail($e->getMessage());
        }
    }

    public function update(UserUpdateRequest $request, int $id)
    {
        try {
            $result = $this->service->update($request->validated(), $id);
            return response()->success($result);
        }
        catch(\Exception $e) {
            DB::rollBack();
            return response()->fail($e->getMessage());
        }
    }

    public function profile(UserProfileRequest $request)
    {
        try {
            $result = $this->service->profile($request->validated());
            return response()->success($result);
        }
        catch(\Exception $e) {
            return response()->fail($e->getMessage());
        }
    }

    public function destroy(int $id)
    {
        try {
            Log::info($id);
            $result = $this->service->delete($id);
            return response()->success($result);
        }
        catch(\Exception $e) {
            return response()->fail($e->getMessage());
        }
    }

}
