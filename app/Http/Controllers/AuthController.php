<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Services\GenerateToken;
use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Mail\ResetPasswordMail;
use Illuminate\Support\Facades\Mail;
// use Illuminate\Validation\Rule;

class AuthController extends Controller
{
    public function register()
    {
        return view('auth.register');
    }

    public function login()
    {
        return view('auth.login');
    }

    public function signUp(Request $request)
    {
        $attribute = $request->validate([
            'name' => ['required', 'min:6', 'max:50'],
            'email' => ['required', 'email', 'max:255','unique:users'],
            'password' => ['required','confirmed', 'min:8', 'max:25'],
            'password_confirmation' => ['min:8','max:25']
        ]);

        $attribute['password'] = bcrypt($attribute['password']);

        User::create($attribute);
        return redirect('/login')->with('success', 'Your account has been created successfully');
    }

    public function SignIn(Request $request)
    {
        $attribute = $request->validate([
            'email' => 'required|email|max:255',
            'password' => 'required'
        ]);

        $user = User::where('email', $attribute['email'])->first();
        if ($user && Hash::check($attribute['password'], $user->password)) {
            $request->session()->put('user_id', $user->id);
            $request->session()->put('user_name', $user->name);
            $request->session()->put('user_role', $user->role->id);
            return redirect('/');
        } else {
            return back()->with('error', 'invalid credentials');
        }
    }

    public function logout(Request $request)
    {
        $request->session()->forget('user_id');
        $request->session()->forget('role_id');

        return redirect('/login');
    }

    public function resetPassword(Request $request)
    {
        if ($request->Route()->methods[0] === 'POST') {
            $attribute = $request->validate([
                'email' => ['required', 'email', 'max:255']
            ]);
            $user = User::where('email', $attribute)->first();
            if ($user) {
                $token = GenerateToken::new($user->email);
                $link = 'localhost:8000/password_reset/' . $token;

                Mail::to($user->email)->send(new ResetPasswordMail($link));
                return back()->with('status', 'Link sent. check your inbox');
            } else {
                return back()->with('status', 'Email not found');
            }
        }
        return view('auth.reset_password');
    }

    public function changePasswordPage(string $token)
    {
        $tokenStored = session('password_reset_token');
        $expiredTime = session('password_token_expires_at');
        if ($token === $tokenStored && $expiredTime >= now()) {
            return view('auth.change_password');
        }else {
            abort(401);
        }
    }
}
