<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Profile;
use Illuminate\Support\Facades\Auth;

class UserProfile extends Component
{
    use WithFileUploads;

    public $name, $email, $image, $profileImage;

    public function mount()
    {
        $user = Auth::user(); 
        $profile = Profile::where('email', $user->email)->first();

        $this->name = $user->name;
        $this->email = $user->email;
        $this->profileImage = $profile ? $profile->image : null;
    }

    public function save()
    {
        $this->validate([
            'name' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $profile = Profile::updateOrCreate(
            ['email' => $this->email],
            [
                'name' => $this->name,
                'image' => $this->image
                    ? $this->image->store('profile_images', 'public')
                    : $this->profileImage,
            ]
        );

        Auth::user()->update(['name' => $this->name]);

        session()->flash('message', 'Profile updated successfully!');
    }

    public function render()
    {
        return view('livewire.user-profile')->layout('layouts.app');
    }
}
