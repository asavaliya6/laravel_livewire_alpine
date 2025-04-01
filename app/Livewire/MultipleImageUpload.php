<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Image; 

class MultipleImageUpload extends Component
{
    use WithFileUploads;

    public $images = [];

    public function uploadImages()
    {
        $this->validate([
            'images.*' => 'image|max:2048', 
        ]);

        foreach ($this->images as $image) {
            $path = $image->store('images', 'public');
            Image::create(['image' => $path]);
        }

        $this->reset('images'); 
        session()->flash('message', 'Images uploaded successfully!');
        $this->dispatch('refreshImages');
    }

    public function render()
    {
        return view('livewire.multiple-image-upload', [
            'uploadedImages' => Image::latest()->get() 
        ])->layout('layouts.app');
    }

}
