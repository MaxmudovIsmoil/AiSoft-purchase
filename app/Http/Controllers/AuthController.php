<?php

namespace App\Http\Controllers;

use App\Dto\Auth\AuthDto;
use App\Exceptions\UnauthorizedException;
use App\Http\Requests\LoginRequest;
use App\Services\AuthService;
use Illuminate\Support\Facades\Redirect;

class AuthController extends Controller
{
    public function __construct(
        public AuthService $service
    ) {}


    /**
     * @param LoginRequest $request
     * @throws UnauthorizedException
     */
    public function login(LoginRequest $request)
    {
        try {
            $this->service->login(new AuthDto(
                username: $request->username,
                password: $request->password
            ));

            return redirect()->route('order.index');
        }
        catch (UnauthorizedException $e) {
            return Redirect::back()->withErrors(['message' => $e->getMessage(), 'code' => $e->getCode()]);
        }
    }

    public function logout()
    {
        $this->service->logout();

        return redirect()->route('login');
    }
}
