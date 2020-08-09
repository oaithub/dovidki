<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Http;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use Notifiable;
    use HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [    //TODO: FIll

    ];

    /**
     * Return user name initials in format:
     * Serhii Petrovych Kovalchuk
     * Kovalchuk S.P.
     *
     * @return string
     */
    public function getNameInitials()
    {
        $pieces = mb_split(' ', $this->name);
        $initials = $pieces[2].' '.mb_substr($pieces[0], 0, 1).'. '.mb_substr($pieces[1], 0, 1).'.';

        return $initials;
    }

    /**
     * Check if current user is a manager
     *
     * @return bool
     */
    public function isManager()
    {
        return $this->manager;
    }

    /**
     * Returns collection of student groups
     *
     * @return \Illuminate\Support\Collection
     */
    public function groups()    //TODO: Create class for api requests
    {
        /*
        $response = '[{"speciality":"Облік і оподаткування","year":1},{"speciality":"Національна безпека","year":3}]';

        */

        //$token = '__token__';    //TODO: Add request for getting token
        $url = 'https://dekanat.oa.edu.ua/api/v1/student/spacialties';
        $response = Http::get($url, [
            'email' => $this->email
        ])->body();

        return collect(json_decode($response));
    }


    /**
     * Return all orders that belongs to user
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function orders()
    {
        return $this->hasMany(Order::class);
    }

}
