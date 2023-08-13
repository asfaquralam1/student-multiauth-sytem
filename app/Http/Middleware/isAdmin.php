<?php

namespace App\Http\Middleware;

use Closure;

class isAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // if ($student != null) {
        //     $student->is_verified = 1;
        //     $student->save();
        //     return view('student.admin')->with(session()->flash('alert-success', 'Your account is verified. Please login!'));
        // }
        return $next($request);
    }
}
