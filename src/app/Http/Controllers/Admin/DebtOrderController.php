<?php


namespace App\Http\Controllers\Admin;


use App\Models\OrderType;

class DebtOrderController extends OrderController
{
    protected $type = OrderType::TYPE_DEBT;

    public function __construct()
    {
        parent::__construct();
    }
}
