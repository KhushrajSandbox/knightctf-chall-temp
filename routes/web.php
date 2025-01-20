<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    if (session()->has('user_id')) {
        return redirect()->route('users');
    }
    return view('welcome');
})->name('dashboard');

Route::middleware('guest')->group(function () {
    Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);

    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);

    Route::get('/request-login-url', [AuthController::class, 'showLoginUrlForm'])->name('request-login-url');
    Route::post('/request-login-url', [AuthController::class, 'requestLoginUrl']);

    Route::get('/login-link', [AuthController::class, 'loginUsingLink']);
});

Route::get('/users', function () {
    if (!session()->has('user_id')) {
        return redirect()->route('login')->withErrors(['auth' => 'You must be logged in to access this page.']);
    }
    $authController = new AuthController();
    return $authController->listUsers();
})->name('users');

Route::post('/logout', function () {
    if (!session()->has('user_id')) {
        return redirect()->route('login')->withErrors(['auth' => 'You are not logged in.']);
    }

    // Directly call the controller method
    $authController = new AuthController();
    return $authController->logout(request());
})->name('logout');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');
