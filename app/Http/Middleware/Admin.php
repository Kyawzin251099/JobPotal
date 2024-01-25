<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // dd(Auth::user()->id);
        $userData = User::with('roles')->where('id',Auth::user()->id)->first();
        // dd($userData->roles->pluck('name'));
        $adminRole = $userData->roles->pluck('name');
        // dd($adminRole);
        // dd($adminRole->contains('admin'));
        if($adminRole->contains('admin')){
            return $next($request);
        }
    }
}
