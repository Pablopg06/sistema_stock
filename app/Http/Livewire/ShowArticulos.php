<?php

namespace App\Http\Livewire;

use App\Models\Article;
use App\Models\Category;
use App\Models\SubCategory;
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
        $articulos = Article::where('nombre', 'LIKE' , '%' . $this->search . '%')
                                    ->orWhere('codigo', 'LIKE', '%' . $this->search . '%')
                                    ->orderBy('id', 'desc')->paginate();
        $subcategorias = SubCategory::all();
        $categorias = Category::all();
        return view('livewire.show-articulos', compact('articulos', 'subcategorias', 'categorias'));
    }

    public function activar(){
        $this->open = true;
    }
    public function desactivar(){
        $this->open = false;
    }

}
