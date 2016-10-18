<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Repositories\Eloquent\RoleRepository as Role;
use Illuminate\Http\Request;
use App\Http\Requests\RoleFormRequest;
use Yajra\Datatables\Facades\Datatables;

class RoleController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Role $role)
    {
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
                return view('datatables.roles', ['view' => 'roles', 'type' => 'role', 'data' => $role])->render();
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
        if($this->role->delete($id)){
            return response()->json(['msg' => trans('json.deletion_success', ['type' => 'Role']), 'status' => 'success']);
        }else{
            return response()->json(['msg' => trans('json.deletion_failed', ['type' => 'Role']), 'status' => 'warning']);
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

        if($role = $this->role->create($request->all())){            
            return response()->json(['msg' => trans('json.data_stored', ['type' => 'Role']), 'status' => 'success']);
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

        if($role->update($request->all())){
            return response()->json(['msg' => trans('json.data_updated', ['type' => 'Role']), 'status' => 'success']);
        }
        return response()->json(['msg' => trans('json.something_went_wrong'), 'status' => 'error']);
    }
}
