<?php

namespace App\Http\Livewire\Categorias;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Article;
use Illuminate\Support\Facades\DB;

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
        $articles = $this->articulos->intersect(Article::search($this->search)->get());
        $alertas = $this->articulos->intersect(Article::all()->filter(fn ($artic, $key)=>$artic->stock < $artic->stock_minimo));

        $categoria = $this->categoria->get();
        $subcategoria = $this->subcategoria->get();
        return view('livewire.categorias.subcategoria', compact('articles', 'alertas','categoria','subcategoria'));
    }
}
