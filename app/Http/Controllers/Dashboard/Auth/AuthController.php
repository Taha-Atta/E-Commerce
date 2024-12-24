<?php

namespace App\Http\Controllers\Dashboard\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\AdminLoginRequest;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Routing\Controllers\HasMiddleware;

class AuthController extends Controller implements HasMiddleware
{
    public static function middleware(): array
    {
        return [
            new Middleware(middleware: 'guest:admin', except: ['logout']),
        ];
    }

    public function loginForm()
    {
        return view('dashboard.Auth.login');
    }


    public function login(AdminLoginRequest $request)
    {

        $email = $request->email;
        $password = $request->password;

        if (Auth::guard('admin')->attempt(['email' => $email, 'password' => $password], $request->remmber)) {

            // return to_route('dashboard.home');
            return redirect()->intended(route('dashboard.home'));
        } else {

            return redirect()->back()->withErrors(['email' => __('auth.not_match')]);
        }
    }

    public function logout()
    {
        Auth::guard('admin')->logout();

        return redirect()->route('dashboard.login.form');
    }
}
