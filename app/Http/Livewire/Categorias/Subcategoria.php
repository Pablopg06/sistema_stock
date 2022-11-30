<?php

namespace App\Http\Livewire\Categorias;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Article;

class Subcategoria extends Component
{
    use WithPagination;
    public $search;
    public $categoria;
    public $subcategoria; 
    public $articulos;

    protected $paginationTheme = "bootstrap";

    public function render()
    {
        $articles = $this->articulos->intersect(Article::where('nombre', 'LIKE', '%' . $this->search . '%')->orderBy('id', 'desc')->get());
        $alertas = $this->articulos->intersect(Article::where('stock', '<', 5)->get());
        $categoria = $this->categoria->get();
        $subcategoria = $this->subcategoria->get();
        return view('livewire.categorias.subcategoria', compact('articles', 'alertas','categoria','subcategoria'));
    }
}
