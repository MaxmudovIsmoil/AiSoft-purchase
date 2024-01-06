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
        'status', // 1-processing, 2-accepted, 3-go back, 4-declined, 5-completed
        'theme',
        'stage_count',
        'current_stage',
        'deleted_at',
    ];

    public function user()
    {
        return $this->hasOne(User::class, 'id','user_id');
    }

    public function instance()
    {
        return $this->hasOne(Instance::class, 'id', 'instance_id');
    }

    public function order_action()
    {
        return $this->hasMany(OrderAction::class, 'id', 'order_id');
    }

    public function userPlan()
    {
        return $this->hasMany(UserPlan::class, 'user_id', 'user_id');
    }

//    public function scopeFilter($builder, $filters = [])
//    {
//        if(!$filters) {
//            return $builder;
//        }
//        $tableName = $this->getTable();
//        $defaultFillableFields = $this->fillable;
//        foreach ($filters as $field => $value) {
//            if(in_array($field, $this->boolFilterFields) && $value != null) {
//                $builder->where($field, (bool)$value);
//                continue;
//            }
//
//            if(!in_array($field, $defaultFillableFields) || !$value) {
//                continue;
//            }
//
//            if(in_array($field, $this->likeFilterFields)) {
//                $builder->where($tableName.'.'.$field, 'LIKE', "%$value%");
//            } else if(is_array($value)) {
//
//                $builder->whereIn($field, $value);
//            } else {
//                $builder->where($field, $value);
//            }
//        }
//
//        return $builder;
//    }
}
