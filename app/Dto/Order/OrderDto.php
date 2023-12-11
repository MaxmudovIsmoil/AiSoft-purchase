<?php

namespace App\Dto\Order;

readonly class OrderDto
{
    public function __construct(
        public string $name,
        public string $status,
    ) {}
}
