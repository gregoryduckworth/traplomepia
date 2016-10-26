<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\RoleFormRequest;
use App\Repositories\Contracts\PermissionInterface as Permission;
use App\Repositories\Contracts\RoleInterface as Role;
use Illuminate\Http\Request;
use Yajra\Datatables\Facades\Datatables;

class RoleController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Permission $permission, Role $role)
    {
        $this->permission = $permission;
        $this->role = $role;
    }

    /**
     * Show all the roles in the system
     *
     * @return Roles
     */
    public function index()
    {
        return Datatables::of($this->role->all())
            ->addColumn('actions', function ($role) {
                return view('datatables.roles', ['view' => 'roles', 'data' => $role])->render();
            })
            ->make(true);
    }

    /**
     * Show the specific roles details
     *
     * @param  $id ID of Role
     * @return Role
     */
    public function show($id)
    {
        return response()->json(['data' => $this->role->find($id)]);
    }

    /**
     * Delete a specific role from the role list
     *
     * NOTE: we only soft delete so the role
     * can come back into the system
     *
     * @param  $id ID of Role
     * @return JSON
     */
    public function destroy($id)
    {
        if ($this->role->delete($id)) {
            return response()->json(['msg' => trans('json.deletion_success', ['type' => trans('roles.role')]), 'status' => 'success']);
        } else {
            return response()->json(['msg' => trans('json.deletion_failed', ['type' => trans('roles.role')]), 'status' => 'warning']);
        }
    }

    /**
     * Create a new role in the system
     *
     * @param  RoleFormRequest $request
     * @return Response
     */
    public function store(RoleFormRequest $request)
    {
        // Add a name so we can check if a user->hasRole(name)
        $request['name'] = str_replace(' ', '/', $request->display_name);

        if ($role = $this->role->create($request->all())) {

            // Attach the permissions if any are set
            if (!empty($request['permissions'])) {
                $role->attachPermissions($request['permissions']);
            }
            return response()->json(['msg' => trans('json.data_stored', ['type' => trans('roles.role')]), 'status' => 'success']);
        }
        return response()->json(['msg' => trans('json.something_went_wrong'), 'status' => 'error']);
    }

    /**
     * Create a new role in the system
     *
     * @param  RoleFormRequest $request
     * @return Response
     */
    public function update(RoleFormRequest $request)
    {
        // Find the role in order to apply the update
        $role = $this->role->find($request->id);

        // Detach all existing permissions to ensure that we attach the
        // new ones correctly
        $role->detachPermissions($this->permission->all());
        if (!empty($request['permissions'])) {
            $role->attachPermissions($request['permissions']);
        }

        if ($role->update($request->all())) {
            return response()->json(['msg' => trans('json.data_updated', ['type' => trans('roles.role')]), 'status' => 'success']);
        }
        return response()->json(['msg' => trans('json.something_went_wrong'), 'status' => 'error']);
    }
}
