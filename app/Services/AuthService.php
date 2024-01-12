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
            throw new UnauthorizedException(message:'Ошибка логина или пароля', code:401);
        }

        return true;
    }


    public function logout()
    {
        Auth::guard('web')->logout();
    }

}
