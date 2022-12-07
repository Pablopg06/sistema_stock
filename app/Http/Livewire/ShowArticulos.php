<?php

namespace App\Http\Livewire;

use App\Models\Article;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;


class ShowArticulos extends Component
{
    use WithPagination;
    
    public $search;
    protected $paginationTheme = "bootstrap";
    public $open = false;
    public function render()
    {
        
        $articulos = Article::search($this->search)->orderBy('id', 'desc')->paginate(6);
        $subcategorias = SubCategory::all();
        $categorias = Category::all();
        $alertas = Article::all()->filter(fn ($articulo, $key)=>$articulo->stock < $articulo->stock_minimo);
        
        return view('livewire.show-articulos', compact('articulos', 'subcategorias', 'categorias', 'alertas'));
    }

    public function activar(){
        $this->open = true;
    }
    public function desactivar(){
        $this->open = false;
    }

}
