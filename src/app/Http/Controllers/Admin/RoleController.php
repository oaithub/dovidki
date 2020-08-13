<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\RoleCreateRequest;
use App\Http\Requests\RoleUpdateRequest;
use App\Repositories\PermissionRepository;
use App\Repositories\RoleRepository;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{

    /**
     * @var PermissionRepository
     */
    private $permissionRepository;

    /**
     * @var RoleRepository
     */
    private $roleRepository;

    /**
     * RoleController constructor.
     */
    public function __construct()
    {
        $this->permissionRepository = app(PermissionRepository::class);
        $this->roleRepository = app(RoleRepository::class);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $paginator = $this->roleRepository->getAllWithPaginate(10);

        return view('admin.roles.index', compact('paginator'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param RoleCreateRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(RoleCreateRequest $request)
    {
        $name = $request->name;
        $role = Role::create(['name' => $name]);

        return redirect()
            ->route('admin.role.show', $role->id)
            ->with('success', __('message.role.created', ['name' => $name]));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($id)
    {
        $role = $this->roleRepository->getForShow($id);
        abort_if(empty($role), 404);

        return view('admin.roles.show', compact('role'));
    }

    /**
     * Display a form for editing role
     *
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $role = $this->roleRepository->getForEdit($id);
        abort_if(empty($role), 404);

        $allPermissions = $this->permissionRepository->getAllForList();
        $rolePermissions = $role->permissions->pluck('id');

        return view('admin.roles.edit', compact('role', 'allPermissions', 'rolePermissions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param RoleUpdateRequest $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(RoleUpdateRequest $request, $id)
    {
        $role = $this->roleRepository->getForEdit($id);
        abort_if(empty($role), 404);

        $role->name = $request->input('name');
        $role->description = $request->input('description');
        $role->save();

        $role->syncPermissions($request->input('permission'));

        return back()
            ->with('success', __('message.role.updated'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)    //TODO
    {
        dd(__method__);

        return redirect()->route('admin.role.index');
    }
}
