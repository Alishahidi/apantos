<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Services\Mail;
use System\Auth\Auth;
use System\Security\Security;

class LoginController extends Controller
{
    public function login()
    {
        $request = new LoginRequest();
        Auth::loginUsingEmail($request->email, $request->password, "user not fount.", "Password incorrect");
        $user = Auth::userUsingEmail($request->email);
        if ($user->permission == "root")
            return redirect(route("admin.index"));
        return redirect(route("home.index"));
    }
}
