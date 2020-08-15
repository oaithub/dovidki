<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderState extends Model
{
    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    public const DEFAULT = 1;

    public const STATE_IN_QUEUE = 1;
    public const STATE_WAIT_FOR_ISSUE = 2;
    public const STATE_ISSUED = 3;
    public const STATE_CANCELED_BY_MANAGER = 4;
}
