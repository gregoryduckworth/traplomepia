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
            return response()->json(['msg' => 'Role successfully deleted', 'status' => 'success']);
        }else{
            return response()->json(['msg' => 'Failed to delete the role', 'status' => 'warning']);
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
        if($role = $this->role->create($request->all())){            
            return response()->json(['msg' => 'Data has been stored', 'status' => 'success']);
        }
        return response()->json(['msg' => 'Something went wrong', 'status' => 'error']);
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
            return response()->json(['msg' => 'Data has been updated', 'status' => 'success']);
        }
        return response()->json(['msg' => 'Something went wrong', 'status' => 'error']);
    }
}
