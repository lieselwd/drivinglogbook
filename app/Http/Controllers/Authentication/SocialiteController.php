<?php

namespace App\Http\Controllers\Authentication;

use App\Enums\SocialiteProviders;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Socialite;
use function App\createSessionFlashInfo;

class SocialiteController extends Controller
{
    public function index()
    {

    }

    public function redirectGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        $googleUser = Socialite::driver('google')->user();
        $user = User::updateOrCreate([
            'email' => $googleUser->email,
        ], [
            'name' => $googleUser->name,
            'socialite_token' => $googleUser->token,
            'socialite_last_queried_at' => now(),
            'socialite_provider' => SocialiteProviders::Google,
            'socialite_refresh_token' => $googleUser->refreshToken,
        ]);

        Auth::login($user);

        return redirect()->route('dashboard')->with(createSessionFlashInfo("Welcome, {$googleUser->name}!"));
    }
}
