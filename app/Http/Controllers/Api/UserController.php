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

    public function destroy($id)
    {
        if($this->user->delete($id)){
            return response()->json(['msg' => 'User successfully deleted', 'status' => 'success']);
        }else{
            return response()->json(['msg' => 'Failed to delete the user', 'status' => 'warning']);
        }
    }
}
