<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserPlan extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'user_instance_id',
        'instance_id',
        'stage',
        'status',
    ];

    public function instance()
    {
        return $this->hasOne(Instance::class, 'id', 'instance_id');
    }

    public $timestamps = false;
}
