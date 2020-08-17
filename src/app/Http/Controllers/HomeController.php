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
    public function redirectToHome()
    {
        if(Auth::user()->isManager()) {
            return redirect()->route('admin.home');
        }
        else {
            return redirect()->route('user.profile');
        }
    }
}
