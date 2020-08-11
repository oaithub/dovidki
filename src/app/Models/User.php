<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;
use App\Services\Api\Student as StudentApi;

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
    public function groups()
    {
        $groups = (new StudentApi)->getGroupsByEmail($this->email);
        return $groups;
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
