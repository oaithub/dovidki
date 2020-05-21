<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class HomeController extends Controller
{
    /**
     * Redirect user to his profile and manager to the control panel
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if(Auth::user()->isManager()) {
            return redirect()->route('manager:orders_all');
        }
        else {
            return redirect()->route('user:profile');
        }
    }
}
