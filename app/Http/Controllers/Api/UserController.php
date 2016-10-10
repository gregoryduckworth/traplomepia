<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Repositories\Eloquent\UserRepository as User;
use Illuminate\Http\Request;
use Yajra\Datatables\Facades\Datatables;


class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * Show all the users in the system
     * 
     * @return Users
     */
    public function index()
    {
        return Datatables::of($this->user->all())
            ->addColumn('actions', function ($user) {
                return view('datatables.users', ['view' => 'users', 'type' => 'user', 'data' => $user])->render();
            })
            ->make(true);
    }

    /**
     * Show the specific users details
     * 
     * @param  $id ID of User
     * @return User
     */
    public function show($id)
    {
        return response()->json(['data' => $this->user->find($id)]);
    }

    /**
     * Delete a specific user from the user list
     * 
     * NOTE: we only soft delete so the user 
     * can come back into the system
     * 
     * @param  $id ID of User
     * @return JSON
     */
    public function destroy($id)
    {
        if($this->user->delete($id)){
            return response()->json(['msg' => 'User successfully deleted', 'status' => 'success']);
        }else{
            return response()->json(['msg' => 'Failed to delete the user', 'status' => 'warning']);
        }
    }

    /**
     * Show all the users in the system who
     * have been deleted
     * 
     * @return Users
     */
    public function deleted()
    {
        return Datatables::of($this->user->deleted())
            ->addColumn('actions', function ($user) {
                return view('datatables.actions.restore', ['view' => 'users', 'type' => 'user', 'data' => $user])->render();
            })
            ->make(true);
    }

    /**
     * Restore a specific user from the user list
     * 
     * @param  $id ID of User
     * @return JSON
     */
    public function restore($id)
    {
        // Check the ID is not set to NULL
        if($id == NULL){
            return response()->json(['msg' => 'Please provide a valid ID', 'status' => 'warning']);
        }

        // Restore the user based on the ID provided
        if($this->user->restore($id)){
            return response()->json(['msg' => 'User successfully restored', 'status' => 'success']);
        }else{
            return response()->json(['msg' => 'Failed to restore the user', 'status' => 'warning']);
        }
    }
}
