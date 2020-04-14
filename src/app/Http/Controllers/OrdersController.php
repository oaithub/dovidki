<?php

namespace App\Http\Controllers;

use App\Order;
use Request;

class OrdersController extends Controller
{
    public function index()
    {
        $orders = Order::all();

        return view('orders.index', compact('orders'));
    }

    public function show($id)
    {
        $order = Order::findOrFail($id);

        return view('orders.show', compact('order'));
    }

    public function create()
    {
        $groups = [
            //Гума
            '033-philosophy' => "Філософія",
            '035.01-lit' => "Українська мова та література",
            '035.01-lang' => "Літературна творчість",
            '034' => "Культурологія",
            '061' => "Журналістика",
            '033-consult' => "Практична філософія. Консалтинг та коучинг",
            //РГМ
            '035.041' => "Германські мови та літератури",
            //ПІМ
            '029' => "Інформаційна, бібліотечната архівна справа",
            '053' => "Психологія",
            '052' => "Політологія",
            '229' => "Громадське здоров'я",
            '256' => "Національна безпека",
            '013' => "Почакткова освіта з поглибленим вивченням англійської мови",
            '053-innovation' => "Психологія креативності та інновацій",
            //МВ
            '291-inter' => "Міжнародні відносини",
            '291-countries' => "Країнознавство",
            '032' => "Історія і археологія",
            //Право
            '081' => "Право",
            //Економіка
            '072-corporation' => "Державні та корпоративні фінанси",
            '072-international' => "Міжнародні фінанси",
            '051-cyber' => "Економічна кібернетика",
            '051-marketing' => "Цифровий маркетинг",
            '071' => "Облік і оподаткування",
            '072' => "Фінанси, банківська справа та страхування",
            '122' => "Комп’ютерні науки"
        ];

        return view('orders.create', compact('groups'));
    }

    public function store()
    {
        Order::create(Request::all());

        return redirect('orders');
    }
}
