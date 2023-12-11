<?php

namespace App\Dto\Auth;

readonly class AuthDto
{
    public function __construct(
        public string $username,
        public string $password
    ) {}
}
