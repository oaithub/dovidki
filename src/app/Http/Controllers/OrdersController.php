<?php

namespace App\Http\Controllers;

use App\Order;
use App\User;
use Request;
use Auth;

class OrdersController extends Controller
{
    public function index()
    {
        $orders = Order::all();

        return view('orders.index', compact('orders'));
    }

    public function show($id)
    {
        $order = Order::findOrFail($id);

        return view('orders.show', compact('order'));
    }

    public function create()
    {
        $groups = User::getGroupList();    //TODO: Try to use api for getting student group by email

        return view('orders.create', compact('groups'));
    }

    public function store()
    {
        $input = Request::all();
        $input['user_id'] = Auth::id();

        Order::create($input);    //TODO: Send email

        return redirect()->action('OrdersController@index');
    }
}
