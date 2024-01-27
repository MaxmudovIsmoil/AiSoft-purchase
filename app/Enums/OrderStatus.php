<?php

namespace App\Enums;

enum OrderStatus: int
{
    case PROCESSING = 1;
    case ACCEPTED = 2;
    case GO_BACK = 3;
    case DECLINED = 4;
    case COMPLETED = 5;

    public function isAccepted(): bool
    {
        return  $this === self::ACCEPTED;
    }

    public function isGoBack(): bool
    {
        return  $this === self::GO_BACK;
    }

    public function isDeclined(): bool
    {
        return  $this === self::DECLINED;
    }

    public function isCompleted(): bool
    {
        return  $this === self::COMPLETED;
    }

    public static function toArray(): array
    {
        return [
            self::PROCESSING->value,
            self::ACCEPTED->value,
            self::GO_BACK->value,
            self::DECLINED->value,
            self::COMPLETED->value,
        ];
    }

    public function getLabelText(): string
    {
        return match ($this) {
            self::PROCESSING => 'In Processing',
            self::ACCEPTED => 'Accepted',
            self::GO_BACK => 'Go back',
            self::DECLINED => 'Declined',
            self::COMPLETED => 'Competed',
        };
    }
}
