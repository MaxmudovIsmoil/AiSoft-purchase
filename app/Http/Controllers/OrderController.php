<?php

namespace App\Http\Controllers;

use App\Dto\Instance\CreateDebtorDto;
use App\Http\Requests\CreateDebtorRequest;
use App\Http\Requests\UpdateDebtorRequest;
use App\Http\Resources\DebtorResource;
use App\Models\Debtor;
use App\Services\DebtorService;
use App\Services\OrderService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class OrderController extends Controller
{
    public function __construct(
        public OrderService $service
    ) {}


    public function index()
    {
        return view('order.index');
    }

    public function store(CreateDebtorRequest $request): JsonResponse
    {

        $result = $this->service->create(new CreateDebtorDto(
            name: $request->name,
            phone: $request->phone,
            status: $request->status,
        ));

        return response()->success($result);
    }

    public function update(UpdateDebtorRequest $request)
    {
        $result = $this->service->update(new CreateDebtorDto(
            name: $request->name,
            phone: $request->phone,
            status: $request->status,
        ), $request->id);

        return response()->success($result);
    }

    public function destroy(int $id)
    {

        $result = $this->service->delete($id);

        return response()->success($result);
    }

}
