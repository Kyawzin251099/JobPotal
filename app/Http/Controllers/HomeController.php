<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
        $this->middleware(['auth','verified']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if(auth::user()->user_type == 'employer'){
            return redirect()->to('/company/create');
        }

        $userData = User::with('roles')->where('id',Auth::user()->id)->first();
        $adminRole = $userData->roles->pluck('name');
        if($adminRole->contains('admin')){
            return redirect()->to('/dashboard');
        }


        $jobs =Auth::user()->favourite;
        return view('home',compact('jobs'));
    }
}
