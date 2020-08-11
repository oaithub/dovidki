<?php

namespace App\Services\Api;

use Http;

class Student
{
    private const GROUPS_ENDPOINT = 'https://dekanat.oa.edu.ua/api/v1/student/spacialties';

    /**
     * @param string $email
     * @return \Illuminate\Support\Collection
     */
    public function getGroupsByEmail($email) {
        /*
        $response = '[{"specialty":"Облік і оподаткування","year":1},{"special  ty":"Національна безпека","year":3}]';
        */

        //$token = '__token__';    //TODO: Add request for getting token
        $url = self::GROUPS_ENDPOINT;
        $response = Http::get($url, [
            'email' => $email
        ])->body();

        return collect(json_decode($response));
    }
}
