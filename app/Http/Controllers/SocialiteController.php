<?php

namespace App\Http\Controllers;

use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;

class SocialiteController extends Controller
{
    public function redirectTo($provide)
    {
        return Socialite::driver($provide)->redirect();
    }


    public function handle($provide)
    {
        try {
            $user = Socialite::driver($provide)->user();
            $finduser = User::where('email', $user->email)->first();
            if ($finduser) {
                Auth::login($finduser);
                return redirect()->route("home");
            } else {
                $newUser = User::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'social_id' => $user->id,
                    'social' => "google",
                    'password' => Hash::make('my-google')

                ]);
                Auth::login($newUser);
                return redirect()->route("home");
            }
        } catch (Exception $th) {
            dd($th->getMessage());
        }
    }
}
