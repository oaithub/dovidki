<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\PermissionRepository;

class PermissionController extends Controller
{

    /**
     * @var PermissionRepository
     */
    private $permissionRepository;

    /**
     * PermissionController constructor.
     */
    public function __construct()
    {
        $this->permissionRepository = app(PermissionRepository::class);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $paginator = $this->permissionRepository->getAllWithPaginate(10);

        return view('admin.permissions.index', compact('paginator'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($id)
    {
        $permission = $this->permissionRepository->getForShow($id);
        abort_if(empty($permission), 404);

        return view('admin.permissions.show', compact('permission'));
    }
}
