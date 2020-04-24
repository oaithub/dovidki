<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use App\User;
use Auth;

class UsersController extends Controller
{

    public function current()
    {
        $user = Auth::user();
        $orders = $user->orders;

        return view('users.profile', compact('user', 'orders'));
    }

    public function show($id)
    {
        $user = User::findOrFail($id);
        $orders = $user->orders;

        return view('users.profile', compact('user', 'orders'));
    }
}
