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
        $paginator = $this->orderRepository->getAllWithPaginate(15);

        return view('admin.orders.index', compact('paginator'));
    }

    /**
     * Show list of all orders in manager panel which are in queue
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function inQueue()
    {
        $paginator = $this->orderRepository->getInQueuedWithPaginate(15);

        return view('admin.orders.in-queue', compact('paginator'));
    }

    /**
     * Show list of all issued orders in manager panel
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function issued()
    {
        $paginator = $this->orderRepository->getIssuedWithPaginate(15);

        return view('admin.orders.issued', compact('paginator'));
    }

    /**
     * Show list of all ready(and not issued) orders in manager panel
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function ready()
    {
        $paginator = $this->orderRepository->getReadyWithPaginate(15);

        return view('admin.orders.ready', compact('paginator'));
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
        if (empty($item)) {
            return back()
                ->withErrors(['msg' => "Замовлення #{$id} не знайдено"])
                ->withInput();
        }

        $data = $request->input();

        $result = $item->update($data);

        if ($item) {
            return redirect()
                ->route('manager:order', $item->id)
                ->with(['success' => 'Успішно збережено']);
        } else {
            return back()
                ->withErrors(['msg' => 'Сталася помилка. Повторіть будь ласка ще раз.'])
                ->withInput();
        }
    }
}
