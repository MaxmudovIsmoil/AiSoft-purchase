<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'instance_id',
        'current_instance_id',
        'status',
        'comment',
        'stage_count',
        'current_stage',
        'deleted_at',
    ];
}
