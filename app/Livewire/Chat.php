<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Message;
use App\Models\User;

class Chat extends Component
{
    public User $user;
    public $message = '';

    public function render()
    {
        return view('livewire.chat',[
            'messages' => Message::where('from_user_id',auth()->id())
            ->orwhere('from_user_id',$this->user->id)
            ->orwhere('to_user_id',auth()->id())
            ->orwhere('to_user_id',$this->user->id)
            ->get(),
        ])->layout('layouts.app');
    }

    public function sendMessage()
    {

        Message::create([
            'from_user_id' => auth()->id(),
            'to_user_id' => $this->user->id,
            'message' => $this->message,
        ]);
          
        $this->reset('message');
    }
}
