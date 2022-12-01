<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\LoginAuthRequest;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function loginView()
    {
        return view('backend.auth.login');
    }

    public function loginAuth(LoginAuthRequest $request)
    {
        if (auth()->guard('backend')->attempt([
            'email' => $request->input('email'),
            'password' => $request->input('password')
        ])) {
            return redirect('backend/dashboard')->with('success', 'Welcome Back!');
        }
        return back()
            ->withInput()
            ->withErrors([
                'password' => 'Your provided credentials could not be verified.'
            ]);
    }

    public function destroy()
    {
        auth()->logout();
        return redirect('backend/login')->with('success', 'Goodbye!');
    }
}