<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Repositories\Eloquent\UserRepository as User;
use Illuminate\Http\Request;
use App\Http\Requests\UserFormRequest;
use Yajra\Datatables\Facades\Datatables;
use Illuminate\Support\Facades\Password;
use App\Notifications\NewUserPasswordEmail;

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
     * @return Response
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
            return response()->json(['msg' => 'Failed to restore the user', 'status' => 'error']);
        }
    }

    /**
     * Create a new user in the system and send them 
     * an email with their new password 
     * 
     * @param  UserFormRequest $request 
     * @return Response
     */
    public function store(UserFormRequest $request)
    {
        // We need to create a password for the new user 
        $request['password'] = str_random(10);
        if($user = $this->user->create($request->all())){
            // Create token to send an email to the new user to set 
            // their password for the application
            $token = Password::getRepository()->create($user);
            $user->notify(new NewUserPasswordEmail($token));
            
            return response()->json(['msg' => 'Data has been stored', 'status' => 'success']);
        }
        return response()->json(['msg' => 'Something went wrong', 'status' => 'error']);
    }

    /**
     * Create a new user in the system and send them 
     * an email with their new password 
     * 
     * @param  UserFormRequest $request 
     * @return Response
     */
    public function update(UserFormRequest $request)
    {
        // We need to create a password for the new user 
        $user = $this->user->find($request->id);

        if($user->update($request->all())){
            return response()->json(['msg' => 'Data has been updated', 'status' => 'success']);
        }
        return response()->json(['msg' => 'Something went wrong', 'status' => 'error']);
    }
}
