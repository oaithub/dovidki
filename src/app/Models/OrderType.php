<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderType extends Model
{
    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    public const TYPE_STUDY = 1;
    public const TYPE_INCOME = 2;
    public const TYPE_DEBT = 3;
}
