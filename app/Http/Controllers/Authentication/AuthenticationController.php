<?php

namespace App\Http\Controllers\Authentication;

use App\Enums\NavAlertType;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use function App\createSessionFlashInfo;

class AuthenticationController extends Controller
{
    public function index()
    {

    }

    public function logIn()
    {
        return view('user.auth.login');
    }

    public function logOut(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/')->with(createSessionFlashInfo('You have been logged out.'));
    }

    public function handleEmailVerification(EmailVerificationRequest $request)
    {
        $request->fulfill();
        return redirect()->route('dashboard')->with(createSessionFlashInfo('Email verified!', type: NavAlertType::Success));
    }

    public function resendEmailVerification(Request $request)
    {
        $request->user()->sendEmailVerificationNotification();
        return back()->with(createSessionFlashInfo('Email verification link sent.'));
    }
}
