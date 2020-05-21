<?php

namespace App\Http\Controllers;

use App\Order;
use App\Repositories\OrderRepository;
use App\User;
use Auth;
use Request;
use Session;

class OrdersController extends Controller
{
    private $orderRepository;

    public function __construct()
    {
        $this->orderRepository = app(OrderRepository::class);
    }

    public function show($id)    //TODO: One user order
    {
        $order = $this->orderRepository->getForShow($id);
        abort_if(empty($order), 404);

        return view('orders.show', compact('order'));
    }

    public function create()
    {
        $user = Auth::user();
        $groups = $user->groups();
        $types = Order::typeList();

        return view('orders.create', compact('groups', 'user', 'types'));
    }

    public function store()    //TODO: Refactor, add helper function for redirect back with error
    {
        $input = Request::all();
        $input['user_id'] = Auth::id();

        $userGroupList = Auth::user()->groups();
        if( $userGroupList->has($input['user_group']) )
            $input['group'] = json_encode($userGroupList->get($input['user_group']));
        else
            return redirect()->back()->withError('Помилка при створенні нової заяви. Повторіть будь ласка ще раз.');

        if( ! Order::correctType($input['type']))
                return redirect()->back()->withErrors(['Помилка при створенні нової заяви. Повторіть будь ласка ще раз.']);

        Order::create($input);    //TODO: Send email

        return redirect()->route('home');
    }
}
