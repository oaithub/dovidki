<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrderCreateRequest;
use App\Models\Order;
use App\Repositories\OrderRepository;
use Auth;

class OrderController extends Controller
{
    /**
     * @var OrderRepository
     */
    private $orderRepository;

    public function __construct()
    {
        $this->orderRepository = app(OrderRepository::class);
    }

    public function show($id)
    {
        $order = $this->orderRepository->getForShow($id);
        abort_if(empty($order), 404);

        $this->authorize('view', $order);

        return view('orders.show', compact('order'));
    }

    public function create()
    {
        $user = Auth::user();
        $types = Order::typeList();

        $requestStartTime = microtime(true);
        $groups = $user->groups();
        $requestEndTime = microtime(true);

        \Debugbar::info('Time for user groups request - '.($requestEndTime-$requestStartTime).' seconds');

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
                ->route('user.profile')
                ->with(['success' => 'Успішно збережено']);
        } else {
            return back()
                ->withErrors(['msg' => 'Помилка при створенні нової заяви. Повторіть будь ласка ще раз.'])
                ->withInput();
        }
    }
}
