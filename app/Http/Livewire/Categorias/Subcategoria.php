<?php

namespace App\Http\Livewire\Categorias;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Article;

class Subcategoria extends Component
{
    use WithPagination;
    public $search;
    public $articulos;

    protected $paginationTheme = "bootstrap";

    public function render()
    {
        //$articles = $this->articulos->where('nombre', 'LIKE', '%' . $this->search . '%');
        return view('livewire.categorias.subcategoria');
    }
}
