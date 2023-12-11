<?php

namespace App\Services;

use App\Dto\Auth\AuthDto;
use App\Exceptions\NotFoundException;
use App\Exceptions\UnauthorizedException;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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
