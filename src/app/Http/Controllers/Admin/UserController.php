<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\OrderRepository;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;

class UserController extends Controller
{

    /**
     * @var OrderRepository
     */
    private $orderRepository;
    /**
     * @var UserRepository
     */
    private $userRepository;

    public function __construct()
    {
        $this->orderRepository = app(OrderRepository::class);
        $this->userRepository = app(UserRepository::class);
    }

    public function index() {
        $paginator = $this->userRepository->getAllWithPaginate(35);

        return view('admin.users.index', compact('paginator'));
    }

    public function show($id)
    {
        $user = $this->userRepository->getForShow($id);
        abort_if(empty($user), 404);
        $paginator = $this->orderRepository->getAllByUserIdWithPaginate($id);

        return view('admin.users.show', compact('user', 'paginator'));
    }
}
