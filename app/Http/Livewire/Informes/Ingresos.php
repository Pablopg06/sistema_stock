<?php

namespace App\Http\Livewire\Informes;

use App\Models\Article;
use App\Models\Ingreso;
use Livewire\Component;
use Livewire\WithPagination;

class Ingresos extends Component
{
    use WithPagination;

    public $search;
    protected $paginationTheme = "bootstrap";


    public function render()
    {
        $articulos = Article::all();
        $ingresos = Ingreso::all();
        return view('livewire.informes.ingresos', compact('articulos', 'ingresos'));
    }
}
