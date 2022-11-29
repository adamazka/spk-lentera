<?php

namespace App\Http\Middleware;

use App\Models\Role;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class cekAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $id = Auth::user()->id_role;
        $role = Role::find($id);
        if ($role->role_name == "Admin") {
            return $next($request);
        } else {
            return redirect('/login');
        }
    }
}