<?php

namespace App\Http\Controllers;

use App\Models\Flag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use App\Models\User;
use Illuminate\Support\Facades\Log;

class AuthController extends Controller {
    public function showRegisterForm() {
        return view('auth.register');
    }

    public function register(Request $request) {
        $request->validate([
            'username' => 'required|unique:users,username',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
        ]);

        $user = User::create([
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('login')->with('success', 'Registration successful! Please login.');
    }

    public function showLoginForm() {
        return view('auth.login');
    }

    public function login(Request $request) {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        $user = User::where('username', $request->username)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            return back()->withErrors(['login_error' => 'Invalid credentials']);
        }

        session(['user_id' => $user->id]);
        session(['is_admin' => $user->is_admin]);
        return redirect()->route('users');
    }

    public function showLoginUrlForm() {
        return view('auth.request-login-url');
    }

    public function requestLoginUrl(Request $request) {
        $request->validate([
            'email' => 'required|email',
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return back()->withErrors(['email' => 'Email not found']);
        }

        $time = time();
        $data = $user->email . '|' . $time;
        $token = bcrypt($data);

        $loginUrl = url('/login-link?token=' . urlencode($token) . '&time=' . $time . '&email=' . urlencode($user->email));

        return back()->with('success', 'Login link generated, but email sending is disabled.');
    }



    public function loginUsingLink(Request $request) {
        $token = $request->query('token');
        $time = $request->query('time');
        $email = $request->query('email');

        if (!$token || !$time || !$email) {
            return response('Invalid token or missing parameters', 400);
        }

        if (time() - $time > 3600) {
            return response('Token expired', 401);
        }

        $data = $email . '|' . $time;
        if (!Hash::check($data, $token)) {
            return response('Token validation failed', 401);
        }

        $user = User::where('email', $email)->first();

        if (!$user) {
            return response('User not found', 404);
        }

        session(['user_id' => $user->id]);
        session(['is_admin' => $user->is_admin]);

        return redirect()->route('users');
    }



    public function listUsers() {
        $userId = session('user_id');
        $flag = Flag::first();
        if (!$userId) {
            return redirect()->route('login')->withErrors(['unauthorized' => 'Please login to view this page']);
        }

        $users = \App\Models\User::all(['id', 'username', 'email', 'is_admin']);
        return view('users.index', ['users' => $users, 'flag' => $flag]);
    }



    public function logout(Request $request) {
        $request->session()->flush();
        return redirect()->route('dashboard')->with('success', 'Logged out successfully.');
    }
}
