<?php

namespace App\Services;

use App\Dto\Auth\AuthDto;
use App\Exceptions\UnauthorizedException;
use Illuminate\Support\Facades\Auth;

class AuthService
{

    public function login(AuthDto $dto): bool
    {
        $credentials = [
            'username' => strtolower($dto->username),
            'password' => $dto->password
        ];

        if (! Auth::attempt($credentials)) {
            throw new UnauthorizedException(message: trans('admin.Login or password error'), code: 401);
        }

//        if(Auth::attempt($credentials) && Auth::user()->rule === 1) {
//            return redirect('admin.orders');
//        }

        return true;
    }


    public function logout()
    {
        Auth::logout();
    }

}
