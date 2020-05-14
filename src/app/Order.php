<?php

namespace App;

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
        'type',
        'period_from',
        'period_to'
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
     * Return collection of all order types
     *
     * @return array
     */
    public static function typeList()
    {
        return self::$types;
    }

    
    public static function correctType($type)
    {
        return array_key_exists($type, self::$types);
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


    public function state()    //TODO: Add similar function for getting state code
    {
        if($this->ready) {
            if( !is_null($this->issued_at)) {
                return 'Видана';
            }

            return 'Очікує видачі';
        }

        return 'В черзі';
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
