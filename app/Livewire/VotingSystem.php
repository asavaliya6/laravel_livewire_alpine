<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Voting;

class VotingSystem extends Component
{
    public $votings;

    public function mount()
    {
        $this->votings = Voting::all(); 
    }

    public function vote($id)
    {
        $voting = Voting::find($id);

        if ($voting) {
            $voting->increment('votes');
            $this->votings = Voting::all(); 
            $this->dispatch('vote-success', $voting->candidate_name); 
        }
    }

    public function render()
    {
        return view('livewire.voting-system')->layout('layouts.app');
    }
}
