<?php

namespace App\Http\Controllers;

use Auth;

class HomeController extends Controller
{
    /**
     * Redirect user to his profile and manager to the control panel
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function index()
    {
        if(Auth::user()->isManager()) {
            return redirect()->route('admin.order.index');
        }
        else {
            return redirect()->route('user.profile');
        }
    }
}
