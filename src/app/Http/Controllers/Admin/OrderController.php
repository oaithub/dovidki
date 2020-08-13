<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\OrderUpdateRequest;
use App\Repositories\OrderRepository;
use Illuminate\Http\Request;

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
     * Show list of all orders in manager panel which are in queue
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function inQueue()
    {
        $orders = $this->orderRepository->getInQueuedWithPaginate(15);

        return view('admin.orders.in-queue', compact('orders'));
    }

    /**
     * Show list of all issued orders in manager panel
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function issued()
    {
        $orders = $this->orderRepository->getIssuedWithPaginate(15);

        return view('admin.orders.issued', compact('orders'));
    }

    /**
     * Show list of all ready(and not issued) orders in manager panel
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function ready()
    {
        $orders = $this->orderRepository->getReadyWithPaginate(15);

        return view('admin.orders.ready', compact('orders'));
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

        if ($item) {
            return redirect()
                ->route('admin.order.show', $item->id)
                ->with('success', __('message.order.updated'));
        } else {
            return back()
                ->withErrors(__('message.unknown_error'))
                ->withInput();
        }
    }
}
