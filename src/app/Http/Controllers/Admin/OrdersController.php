<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\OrderRepository;
use Illuminate\Http\Request;
use App\Order;

class OrdersController extends Controller
{
    private $orderRepository;

    public function __construct()
    {
        $this->orderRepository = app(OrderRepository::class);
    }

    public function index()
    {
        $paginator = $this->orderRepository->getAllWithPaginate(15);

        return view('admin.orders.index', compact('paginator'));
    }

    public function issued()
    {
        $paginator = $this->orderRepository->getIssuedWithPaginate(15);

        return view('admin.orders.issued', compact('paginator'));
    }

    public function ready()
    {
        $paginator = $this->orderRepository->getReadyWithPaginate(15);

        return view('admin.orders.ready', compact('paginator'));
    }

    public function show($id)
    {
        $order = $this->orderRepository->getForShow($id);
        abort_if(empty($order), 404);

        return view('admin.orders.show', compact('order'));
    }
}
