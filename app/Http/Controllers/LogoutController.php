<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;

class LogoutController extends Controller
{
    /**
     * Handle logout action
     */
    public function logout(): RedirectResponse
    {
        Auth::logout();

        // Invalidate session and regenerate CSRF token
        request()->session()->invalidate();
        request()->session()->regenerateToken();

        return redirect('/');
    }
}
