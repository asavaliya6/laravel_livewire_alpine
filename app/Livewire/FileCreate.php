<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\File;
use Livewire\WithFileUploads;

class FileCreate extends Component
{
    use WithFileUploads;

    public $name;
    public $price;
    public $photo;

    public function render()
    {
        return view('livewire.file-create')->layout('layouts.app');
    }

    public function submit()
    {
        $this->validate([
            "name" => "required",
            "price" => "required|numeric",
            "photo" => "required|image|mimes:jpeg,png,jpg,gif|max:2048"
        ]);

        $path = $this->photo->store("filesStore", "public");

        File::create([
            "name" => $this->name,
            "price" => $this->price,
            "photo" => $path
        ]);

        $this->reset(['name', 'price', 'photo']);

        session()->flash("success", "File Created Successfully");
    }
}
