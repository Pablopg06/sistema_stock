<?php

namespace App\Http\Livewire;

use App\Models\Article;
use App\Models\Category;
use App\Models\Provider;
use App\Models\SubCategory;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;


class ShowArticulos extends Component
{
    use WithPagination;
    
    public $search;
    protected $paginationTheme = "bootstrap";

    public function updatingSearch(){
        $this->resetPage();
    }
    public function render()
    {
        if($this->search){
            $proveedor = Provider::where('nombre', 'LIKE', $this->search)->first();    
        }else{
            $proveedor = null;
        }
        if($proveedor){
            $articulos = Article::where('provider_id', $proveedor->id)->orderBy('id','desc')->paginate(6);
        }else{
            $articulos = Article::search($this->search)->orderBy('id', 'desc')->paginate(6);
        }
        
        $subcategorias = SubCategory::all();
        $categorias = Category::all();


        $alertas = Article::all()->filter(fn ($articulo, $key)=>$articulo->stock < $articulo->stock_minimo);
        $advertencia = collect([]);
        $urgente = collect([]);
        $aux = collect([]);
        $aux2 = collect([]);

        foreach ($alertas as $alerta) {
            $aux1 = Article::where('nombre', $alerta->nombre)
                            ->where('provider_id', $alerta->provider_id)
                            ->where('marca', $alerta->marca)
                            ->where('deposito','!=', $alerta->deposito)->get();
            if($aux1->count()){
                $advertencia = $aux2->concat($aux1);
                $advertencia->all();
            }else{
                $urgente = $aux->concat($alerta);
                $urgente->all();
            }

        }


        $proveedores = Provider::all();
        
        return view('livewire.show-articulos', compact('articulos', 'subcategorias', 
        'categorias', 'alertas', 'proveedores', 'alertas', 'urgente','advertencia'));
        
    }

}
