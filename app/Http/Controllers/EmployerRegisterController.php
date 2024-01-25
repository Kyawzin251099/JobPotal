<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Company;
use Illuminate\Auth\Events\Registered;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class EmployerRegisterController extends Controller
{


    public function employerRegister(){


        $user= User::create([
            'email' => request('email'),
            'password' => Hash::make(request('password')),
            'user_type'=>request('user_type')
        ]);

        Company::create([
            'user_id'=>$user->id,
            'cname'=>request('cname'),
            'slug'=>str_slug(request('slug'))
        ]);
        $user->sendEmailVerificationNotification();

        return redirect('/')->with('message','Please verify your email by click the link sent to your email address');
    }
}
