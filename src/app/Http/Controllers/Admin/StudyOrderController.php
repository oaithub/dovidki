<?php


namespace App\Http\Controllers\Admin;


use App\Models\OrderType;

class StudyOrderController extends OrderController
{
    protected $type = OrderType::TYPE_STUDY;

    public function __construct()
    {
        parent::__construct();
    }
}
