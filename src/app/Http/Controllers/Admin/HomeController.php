<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    /**
     * Show admin panel home page
     */
    public function admin()    //TODO
    {
        dump(__method__);

        return '<a href="'.route('admin.role.index').'">Go to admin panel</a>';
    }
}
