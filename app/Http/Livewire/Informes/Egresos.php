<?php

namespace App\Http\Livewire\Informes;

use App\Models\Article;
use App\Models\Egreso;
use Livewire\Component;
use Livewire\WithPagination;

class Egresos extends Component
{
    use WithPagination;

    public $search;
    protected $paginationTheme = "bootstrap";

    public function render()
    {
        $egresos = Egreso::all();
        $articulos = Article::all();
        return view('livewire.informes.egresos', compact('egresos', 'articulos'));
    }
}
