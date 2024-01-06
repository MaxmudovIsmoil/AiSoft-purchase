<?php

namespace App\Enums;

enum OrderStatus: int
{
    case PROCESSING = 1;
    case ACCEPTED = 2;
    case GO_BACK = 3;
    case DECLINED = 4;
    case COMPLETED = 5;
}
