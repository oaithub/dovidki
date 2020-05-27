<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

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
        'type',
        'state',
        'response_message',
        'period_from',
        'period_to',
    ];

    /**
     * All order types
     *
     * @var array
     */
    private static $types = [
        'income' => 'Доходи',
        'study' => 'Навчання',
        'debt' => 'Заборгованість',
    ];

    /**
     * All order states
     *
     * @var array
     */
    private static $states = [
        'in-queue' => 'В черзі',
        'wait-for-issue' => 'Очікує отримання',
        'issued' => 'Видана',
        'canceled-by-manager' => 'Відмінена бухгалтером'
    ];

    /**
     * Return collection of all order states
     *
     * @return Collection
     */
    public static function stateList()
    {
        return collect(self::$states);
    }

    public function stateNameOrError()
    {
        if(array_key_exists($this->state, self::$states)) {
            return self::$states[$this->state];
        }

        return 'Неправильний ключ стану';
    }

    /**
     * Return collection of all order types
     *
     * @return Collection
     */
    public static function typeList()
    {
        return collect(self::$types);
    }

    /**
     * Return default order state after creating.
     *
     * @return string
     */
    public static function getDefaultState()
    {
        return 'in-queue';
    }

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
     * Get the order type.
     *
     * @param  string  $value
     * @return string
     */
    public function getTypeAttribute($value)
    {
        if(array_key_exists($value, self::$types)) {
            return self::$types[$value];
        }

        return 'Неправильний ключ типу';
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
