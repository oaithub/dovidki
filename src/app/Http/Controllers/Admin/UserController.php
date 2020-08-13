<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserUpdateRequest;
use App\Repositories\OrderRepository;
use App\Repositories\RoleRepository;
use App\Repositories\UserRepository;

class UserController extends Controller
{

    /**
     * @var OrderRepository
     */
    private $orderRepository;

    /**
     * @var RoleRepository
     */
    private $roleRepository;

    /**
     * @var UserRepository
     */
    private $userRepository;

    public function __construct()
    {
        $this->orderRepository = app(OrderRepository::class);
        $this->roleRepository = app(RoleRepository::class);
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

        $orders = $this->orderRepository->getAllByUserIdWithPaginate($id);
        $roles = $user->roles;

        return view('admin.users.show', compact('user', 'orders', 'roles'));
    }

    public function edit($userId)
    {
        $user = $this->userRepository->getForEdit($userId);
        abort_if(empty($user), 404);

        $allRoles = $this->roleRepository->getAllForList();
        $userRoles = $user->roles->pluck('id');    //Return array of roles id that belongs to user

        return view('admin.users.edit', compact('user', 'allRoles', 'userRoles'));
    }

    public function update(UserUpdateRequest $request, $id)
    {
        $user = $this->userRepository->getForEdit($id);
        abort_if(empty($user), 404);

        $user->syncRoles($request->input('role'));

        return redirect()
            ->route('admin.user.show', $user->id)
            ->with('success', __('message.user.updated'));
    }
}
