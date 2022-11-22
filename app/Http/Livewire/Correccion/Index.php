<?php

namespace App\Http\Livewire\Correccion;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Article;

class Index extends Component
{
    use WithPagination;
    protected $paginationTheme = "bootstrap";

    public $search;

    public function render()
    {
        $articulos = Article::where('nombre', 'LIKE' , '%' . $this->search . '%')->orderBy('id','desc')->paginate();
        return view('livewire.correccion.index', compact('articulos'));
    }
}
