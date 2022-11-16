<?php

namespace App\Http\Livewire\Ingreso;

use App\Models\Article;
use Livewire\Component;
use Livewire\WithPagination;

class Manual extends Component
{
    use WithPagination;
    
    public $search;

    protected $paginationTheme = "bootstrap";

    public function render()
    {
        $articulos = Article::where('codigo' ,'LIKE', '%' . $this->search . '%')->orderBy('id','desc')->paginate();
        return view('livewire.ingreso.manual', compact('articulos'));
    }
}
