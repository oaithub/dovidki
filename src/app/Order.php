<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'user_name',
        'user_group',
        'period_from',
        'period_to'
    ];
}
