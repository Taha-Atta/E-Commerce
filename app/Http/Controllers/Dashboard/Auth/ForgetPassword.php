<?php

namespace App\Http\Controllers\Dashboard\Auth;

use App\Models\Admin;
use Ichtrojan\Otp\Otp;
use Illuminate\Http\Request;
use App\Notifications\SentTOAdmin;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class ForgetPassword extends Controller
{
    public function enterEmail()
    {
        return view('dashboard.Auth.password.get-email');
    }

    public function sendCode(Request $request)
    {
        $request->validate([
            'email' => "required|email|max:100",
        ]);

        $admin = Admin::where('email', $request->email)->first();
        if (!$admin) {
            return redirect()->back()->with('error' , __('auth.not_match'));
        }

        $admin->notify(new SentTOAdmin());


        return to_route('dashboard.get.comfirm.code', ['email' => $request->email]);
    }

    public function getconfirmCode($email)
    {
        return view('dashboard.Auth.password.confirm-email', ['email' => $email]);
    }

    public function confirmCode(Request $request)
    {
        $request->validate([
            'email' => "required|email|max:100",
            'code' => "required",
        ]);

        $code =  (new Otp)->validate($request->email, $request->code);
        if ($code->status == false) {
            return redirect()->back()->withErrors(['code' => __('auth.not_match')]);
        }

        return to_route('dashboard.get.new.password', ['email' => $request->email]);
    }


    public function getNewPassword($email)
    {
        return view('dashboard.Auth.password.rest-password', ['email' => $email]);
    }

    public function newPassword(Request $request)
    {
        $request->validate([
            'email' => "required|email|max:100",
            'password' => "required|confirmed|min:8",
            'password_confirmation' => "required",
        ]);
        $admin = Admin::where('email', $request->email)->first();
        if (!$admin) {
            return redirect()->back()->withErrors(['password' => __('auth.not_match')]);
        }

        $admin->update([
            'password' => Hash::make($request->password),
        ]);

        return to_route('dashboard.login.form');
    }
}
