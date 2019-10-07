<?php

namespace App\Http\Controllers;

use App\User;
use App\Role;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Response;
use App\Organization;

class UserController extends Controller
{
    /**
     * Display a listing of the users
     *
     * @param  \App\User  $model
     * @return \Illuminate\View\View
     */
    public function index(User $model)
    {
        if (Auth::check())
            {
                if (Gate::denies('admin')) 
                {
                    if (Gate::denies('meetingorganizer')) 
                    {
                        abort(403,"Permission Denied");
                    }
                }
            }
        $id=Auth::id();
        $boss = DB::table('users')->where('id',$id)->first();
        $org = $boss->organization_id;
        $orgs= Organization::find($id);
        $user = User::all();
        return view('users.index', ['users'=>$user,'org'=>$org,'orgs' => Organization::where('user_id', $id)->get()]);
        return view('users.userPage');
    }

    /**
     * Show the form for creating a new user
     *
     * @return \Illuminate\View\View
     */
    public function create()
    { 
        if (Auth::check())
            {
                if (Gate::denies('admin')) 
                {
                    if (Gate::denies('meetingorganizer')) 
                    {
                        abort(403,"Permission Denied");
                    }
                }
            }
        $id= Auth::id();
        $orgs= Organization::find($id);
        return view('users.create',['orgs' => Organization::where('user_id', $id)->get()]);
    }

    /**
     * Store a newly created user in storage
     *
     * @param  \App\Http\Requests\UserRequest  $request
     * @param  \App\User  $model
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(UserRequest $request, User $model)
    {   
        if (Auth::check())
            {
                if (Gate::denies('admin')) 
                {
                    if (Gate::denies('meetingorganizer')) 
                    {
                        abort(403,"Permission Denied");
                    }
                }
            }
        $model->create($request->merge(['password' => Hash::make($request->get('password'))])->all());
        return redirect()->route('user.index')->withStatus(__('User successfully created.'));
    }

    /**
     * Show the form for editing the specified user
     *
     * @param  \App\User  $user
     * @return \Illuminate\View\View
     */
    public function edit(User $user)
    {
        if (Auth::check())
            {
                if (Gate::denies('admin')) 
                {
                    if (Gate::denies('meetingorganizer')) 
                    {
                        abort(403,"Permission Denied");
                    }
                }
            }
        $roles = Role::all();
        return view('users.edit',compact('user','roles'));
    }

    /**
     * Update the specified user in storage
     *
     * @param  \App\Http\Requests\UserRequest  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UserRequest $request, User  $user)
    {
        if (Auth::check())
            {
                if (Gate::denies('admin')) 
                {
                    if (Gate::denies('meetingorganizer')) 
                    {
                        abort(403,"Permission Denied");
                    }
                }
            }
        $user->update(
            $request->merge(['password' => Hash::make($request->get('password'))])
                ->except([$request->get('password') ? '' : 'password']
        ));

        return redirect()->route('user.index')->withStatus(__('User successfully updated.'));
    }

    /**
     * Remove the specified user from storage
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(User  $user)
    {
        if (Auth::check())
            {
                if (Gate::denies('admin')) 
                {
                    if (Gate::denies('meetingorganizer')) 
                    {
                        abort(403,"Permission Denied");
                    }
                }
            }
        $user->delete();

        return redirect()->route('user.index')->withStatus(__('User successfully deleted.'));
    }
}
