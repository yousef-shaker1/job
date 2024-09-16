<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;

class GithubController extends Controller
{
    public function githubpage(){
        return Socialite::driver('github')->redirect();
    }

    public function githubcallback(){
        $socialiteUser = Socialite::driver('github')->user();
        // $user = User::where('email', $socialiteUser->getEmail())->first();
        $finduser = User::where('github_id', $socialiteUser->id)->first();
        if ($finduser) {
            Auth::login($finduser);
                return redirect()->route('home');
        } else {
            // إذا لم يوجد، نقوم بإنشاء مستخدم جديد
            $user = User::create([
                'github_id' => $socialiteUser->id,
                'name' => $socialiteUser->name,
                'email' => $socialiteUser->email,
                'password' => Hash::make('123456dummy'), // كلمة مرور وهمية
            ]);
            Auth::login($user);
                return redirect()->route('home');
        }
        
    }
}
