<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\OrderUpdateRequest;
use App\Repositories\OrderRepository;

class OrderController extends Controller
{
    /**
     * @var string
     */
    protected $type;

    /**
     * @var OrderRepository
     */
    private $orderRepository;

    public function __construct()
    {
        $this->orderRepository = app(OrderRepository::class);
        $this->orderRepository->setType($this->type);
    }

    /**
     * Show list of all orders in manager panel
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $orders = $this->orderRepository->getAllWithPaginate(15);

        return view('admin.orders.index', compact('orders'));
    }

    /**
     * Show one order in manager panel
     *
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($id)
    {
        $order = $this->orderRepository->getForShow($id);
        abort_if(empty($order), 404);

        return view('admin.orders.show', compact('order'));
    }

    public function update(OrderUpdateRequest $request, $id)
    {
        $item = $this->orderRepository->getForEdit($id);
        abort_if(empty($item), 404);

        $data = $request->input();

        $result = $item->update($data);

        if ($result) {
            return redirect()
                ->route('admin.order.'.$item->type->code.'.show', $item->id)
                ->with('success', __('message.order.updated'));
        } else {
            return back()
                ->withErrors(__('message.unknown_error'))
                ->withInput();
        }
    }
}
