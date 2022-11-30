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
        $articles = $this->articulos->intersect(Article::where('nombre', 'LIKE', '%' . $this->search . '%')->get());
        $alertas = Article::where('stock', '<', 5)->get();
        return view('livewire.categorias.subcategoria', compact('articles', 'alertas'));
    }
}
