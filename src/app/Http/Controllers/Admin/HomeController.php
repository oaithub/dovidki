<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\OrderRepository;
use App\Repositories\OrderTypeRepository;

class HomeController extends Controller
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
     * Show admin panel home page
     */
    public function admin()
    {
        $typeList = (new OrderTypeRepository())->getAllForList();
        $ordersCount = $this->orderRepository->getCount($typeList->pluck('id'));

        return view('admin.home', compact('ordersCount', 'typeList'));
    }
}
