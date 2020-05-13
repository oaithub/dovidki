<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Http;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    private static $groups = [    //TODO: Maybe it's better to use collections
            //Гума
        '033-philosophy' => "Філософія",
        '035.01-lit' => "Українська мова та література",
        '035.01-lang' => "Літературна творчість",
        '034' => "Культурологія",
        '061' => "Журналістика",
        '033-consult' => "Практична філософія. Консалтинг та коучинг",
            //РГМ
        '035.041' => "Германські мови та літератури",
            //ПІМ
        '029' => "Інформаційна, бібліотечната архівна справа",
        '053' => "Психологія",
        '052' => "Політологія",
        '229' => "Громадське здоров'я",
        '256' => "Національна безпека",
        '013' => "Почакткова освіта з поглибленим вивченням англійської мови",
        '053-innovation' => "Психологія креативності та інновацій",
            //МВ
        '291-inter' => "Міжнародні відносини",
        '291-countries' => "Країнознавство",
        '032' => "Історія і археологія",
            //Право
        '081' => "Право",
            //Економіка
        '072-corporation' => "Державні та корпоративні фінанси",
        '072-international' => "Міжнародні фінанси",
        '051-cyber' => "Економічна кібернетика",
        '051-marketing' => "Цифровий маркетинг",
        '071' => "Облік і оподаткування",
        '072' => "Фінанси, банківська справа та страхування",
        '122' => "Комп’ютерні науки"
    ];

    /**
     * Return array of all university groups
     *
     * @return array
     */
    public static function getGroupList()
    {
        return self::$groups;
    }

    /**
     * Return user name initials in format:
     * Serhii Petrovych Kovalchuk
     * Kovalchuk S.P.
     *
     * @return array
     */
    public function getNameInitials()    //TODO: Refactor(?)
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

    public function groups()
    {
        $json = '[{"speciality":"Облік і оподаткування","year":1},{"speciality":"Національна безпека","year":3}]';

        return collect(json_decode($json));

        /*
        $token = 'skajnflnln';    //TODO: Add request for getting token
        $url = 'https://api.website.com';
        $response = Http::withToken($token)->get($url, [
            'email' => $this->email
        ])->json();

        return $response;
        */
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
