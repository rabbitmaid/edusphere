<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\Verified;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

class VerifyEmailController extends Controller
{
    /**
     * Mark the authenticated user's email address as verified.
     */
    public function __invoke(EmailVerificationRequest $request): RedirectResponse
    {
        if ($request->user()->hasVerifiedEmail()) {
            // return redirect()->intended(route('dashboard', absolute: false).'?verified=1');

            if(Auth::user()->hasRole(\App\Helpers\Roles::ADMINISTRATOR) || Auth::user()->hasRole(\App\Helpers\Roles::STAFF)){
                return redirect()->intended(default: route('admin.dashboard', absolute: false).'?verified=1');
            }
            else {
                return redirect()->intended(default: route('student.dashboard', absolute: false).'?verified=1');
            }
        }

        if ($request->user()->markEmailAsVerified()) {
            /** @var \Illuminate\Contracts\Auth\MustVerifyEmail $user */
            $user = $request->user();

            event(new Verified($user));
        }

        if(Auth::user()->hasRole(\App\Helpers\Roles::ADMINISTRATOR) || Auth::user()->hasRole(\App\Helpers\Roles::STAFF)){
            return redirect()->intended(default: route('admin.dashboard', absolute: false).'?verified=1');
        }
        else {
            return redirect()->intended(default: route('student.dashboard', absolute: false).'?verified=1');
        }

        // return redirect()->intended(route('dashboard', absolute: false).'?verified=1');
    }
}
