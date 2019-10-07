<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Organization;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $id= Auth::id();
        $orgs= Organization::find($id);
        $user = User::find($id);
        return view('dashboard', ['orgs' => Organization::where('user_id', $id)->get(),'users' => User::all()]);
    }

}
