<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrderCreateRequest;
use App\Order;
use App\Repositories\OrderRepository;
use Auth;

class OrdersController extends Controller
{
    /**
     * @var OrderRepository
     */
    private $orderRepository;

    public function __construct()
    {
        $this->orderRepository = app(OrderRepository::class);
    }

    public function show($id)    //TODO: One user order
    {
        $order = $this->orderRepository->getForShow($id);
        abort_if(empty($order), 404);

        $this->authorize('view', $order);

        return view('orders.show', compact('order'));
    }

    public function create()
    {
        $user = Auth::user();
        $groups = $user->groups();
        $types = Order::typeList();

        return view('orders.create', compact('groups', 'user', 'types'));
    }

    /**
     * @param OrderCreateRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(OrderCreateRequest $request)
    {
        $input = $request->input();

        $item = (new Order)->create($input);

        if ($item) {
            return redirect()
                ->route('home')
                ->with(['success' => 'Успішно збережено']);
        } else {
            return back()
                ->withErrors(['msg' => 'Помилка при створенні нової заяви. Повторіть будь ласка ще раз.'])
                ->withInput();
        }
    }
}
