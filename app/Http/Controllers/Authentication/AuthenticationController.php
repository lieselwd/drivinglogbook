<?php

namespace App\Http\Controllers\Authentication;

use App\Http\Controllers\Controller;
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
}
