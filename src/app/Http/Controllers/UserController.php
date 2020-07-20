<?php

namespace App\Http\Controllers;

use App\Repositories\OrderRepository;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;
use Auth;

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

    public function current()
    {
        $id = Auth::id();
        $user = $this->userRepository->getForShow($id);
        abort_if(empty($user), 404);
        $paginator = $this->orderRepository->getAllByUserIdWithPaginate($id);

        return view('users.profile', compact('user', 'paginator'));
    }
}
