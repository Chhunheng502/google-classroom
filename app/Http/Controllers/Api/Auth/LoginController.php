<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;

class LoginController extends Controller
{
    protected $socialite;

    public function __construct(Socialite $socialite)
    {
        $this->socialite = $socialite;
    }

    public function redirectToGoogle()
    {
        return $this->socialite::driver('google')->stateless()->redirect();
    }

    public function handleGoogleCallback()
    {        
        $googleUser = $this->socialite::driver('google')->stateless()->user();

        $user = User::where('google_id', $googleUser->id)->first();

        if($user) {
            
            $user->update([
                'google_token' => $googleUser->token,
                'google_refreshToken' => $googleUser->refreshToken
            ]);
        } else {

            $user = User::create([
                'name' => $googleUser->name,
                'email' => $googleUser->email,
                'google_id'=> $googleUser->id,
                'google_token' => $googleUser->token,
                'google_refreshToken' => $googleUser->refreshToken
            ]);
        };
        
        return response()->json([
            'success' => true,
            'token' => $googleUser->token
        ]);
    }
}
