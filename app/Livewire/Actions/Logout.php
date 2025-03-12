<?php

namespace App\Livewire\Actions;

use Illuminate\Support\Facades\Auth;

class Logout
{
    public function __invoke()
    {
        Auth::logout(); // Logout the user

        // Invalidate session and regenerate CSRF token
        request()->session()->invalidate();
        request()->session()->regenerateToken();

        return redirect()->route('login');
    }
}
