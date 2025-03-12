<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Product;

class ProductWizard extends Component
{
    public function render()
    {
        return view('livewire.product-wizard')->layout('layouts.app');
    }
}
