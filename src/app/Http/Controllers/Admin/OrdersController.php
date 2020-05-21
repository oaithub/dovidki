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
        $orders = $this->orderRepository->getAllWithPaginate(15);

        return view('orders.index', compact('orders'));
    }

    public function show($id)
    {
        $order = $this->orderRepository->getForAdminShow($id);

        return view('orders.show', compact('order'));
    }
}
