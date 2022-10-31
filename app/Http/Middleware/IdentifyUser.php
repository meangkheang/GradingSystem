<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\User;
use Illuminate\Http\Request;

class IdentifyUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if(!session()->has('user')){
            return redirect()->route('register');
        }

        
        //identify user type
        $user = User::find(session('user.id'));

        $usertype =$user->usertype->type->name;

        

        session()->put('usertype',$usertype);

        return $next($request);
    }
}
