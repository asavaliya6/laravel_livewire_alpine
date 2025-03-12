<?php

namespace App\Livewire\Components;

use App\Livewire\Actions\Logout;
use Livewire\Component;

class LogoutComponent extends Component
{
    public function logout(Logout $logout): void
    {
        $logout();

        // Redirect to login page after logout
        $this->redirect(route('login'), navigate: true);
    }
}
