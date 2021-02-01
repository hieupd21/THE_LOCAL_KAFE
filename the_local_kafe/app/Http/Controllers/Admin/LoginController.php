<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class LoginController extends Controller
{
    public function getLogin()
    {
        return view('admin.login');
    }

    public function postLogin(Request $request)
    {
        $arr = ['email' => $request->email, 'password' => $request->password];

        if (Auth::attempt($arr)) {
            return redirect()->route('home');
        } else {
            return back()->withInput()->with('error', 'Email or password is incorrect');
        }
    }

    public function redirect($provider)
    {
        switch ($provider) {
            case 'facebook':
                return Socialite::driver($provider)->redirect();
                break;

            case 'google':
                return Socialite::driver($provider)->redirect();
                break;

            default:
                return view('pages.404');
                break;
        }
    }

    public function callback($provider)
    {
        switch ($provider) {
            case 'facebook':
                $user = Socialite::driver($provider)->user();
                $account = User::where('provider', 'facebook')->where('provider_id', $user->id)->first();
                if ($account) {
                    Auth::login($account);
                    return redirect()->route('home');
                } else {
                    $newUser = User::firstOrCreate([
                        'name' => $user->name,
                        'email' => $user->email,
                        'provider' => "facebook",
                        'provider_id' => $user->id,
                        'role' => 3
                    ]);
                    Auth::login($newUser);
                    return redirect()->route('home');
                }
                break;

            case 'google':
                $user = Socialite::driver($provider)->user();
                $account = User::where('provider', 'google')->where('provider_id', $user->id)->first();
                if ($account) {
                    Auth::login($account);
                    return redirect()->route('home');
                } else {
                    $newUser = User::firstOrCreate([
                        'name' => $user->name,
                        'email' => $user->email,
                        'provider' => "google",
                        'provider_id' => $user->id,
                        'role' => 3
                    ]);
                    Auth::login($newUser);
                    return redirect()->route('home');
                }
                break;

            default:
                return view('pages.404');
                break;
        }
    }
}
