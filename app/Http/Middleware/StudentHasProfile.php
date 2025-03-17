<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class StudentHasProfile
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {if(Auth::user()->hasRole('student')) {
        $check = Student::where('user_id', Auth::user()->id)->first();

        if($check !== null) {
            return redirect()->route('student.dashboard');
        }
    }
        return $next($request);
    }
}
