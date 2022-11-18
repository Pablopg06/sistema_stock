<?php

namespace App\Http\Livewire\Categorias;

use App\Models\Category;
use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        $categorias = Category::all();
        return view('livewire.categorias.index', compact('categorias'));
    }
}
