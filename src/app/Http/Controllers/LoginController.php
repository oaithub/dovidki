<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\AuthenticatesUsers;
Use App\Models\User;
use Auth;
use Socialite;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    public function login()
    {
        return view('auth.login');
    }

    /**
     * Log users out of application.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logout()
    {
        Auth::logout();

        return redirect()->route('login');
    }

    /**
     * Redirect the user to the Google authentication page.
     *
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function redirectToProvider()
    {
        return Socialite::driver('google')->redirect();
    }

    /**
     * Obtain the user information from Google.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function handleProviderCallback()
    {
        try {
            $user = Socialite::driver('google')->user();
        } catch (\Exception $e) {
            return redirect()->route('login')
                ->withErrors(__('auth.unknown_error'));
        }
        // only allow people with @oa.edu.ua to login
        if(explode("@", $user->email)[1] !== 'oa.edu.ua'){
            return redirect()->route('login')
                ->withErrors(__('auth.wrong_email_domain'));

        }
        // check if they're an existing user
        $existingUser = User::where('email', $user->email)->first();
        if($existingUser){
            // log them in
            auth()->login($existingUser, true);
        } else {
            // create a new user
            $newUser                  = new User;
            $newUser->name            = $user->name;
            $newUser->email           = $user->email;
            $newUser->google_id       = $user->id;
            $newUser->avatar          = $user->avatar;
            $newUser->avatar_original = $user->avatar_original;
            $newUser->save();
            auth()->login($newUser, true);
        }
        return redirect()->route('home');
    }
}
