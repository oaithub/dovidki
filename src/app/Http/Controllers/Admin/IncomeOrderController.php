<?php


namespace App\Http\Controllers\Admin;


use App\Models\OrderType;

class IncomeOrderController extends OrderController
{
    protected $type = OrderType::TYPE_INCOME;

    public function __construct()
    {
        parent::__construct();
    }
}
