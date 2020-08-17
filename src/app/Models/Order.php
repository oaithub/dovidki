<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'period_from',
        'period_to',
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'group',
        'type_id',
        'state_id',
        'response_message',
        'period_from',
        'period_to',
    ];

    /**
     * Get the user's speciality.
     *
     * @param  string  $value
     * @return string
     */
    public function getGroupAttribute($value)
    {
        return json_decode($value);
    }

    /**
     * Return state of order
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function state()
    {
        return $this->belongsTo(OrderState::class);
    }

    /**
     * Return type of order
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function type()
    {
        return $this->belongsTo(OrderType::class);
    }

    /**
     * Return user which created this order
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
