<?php

namespace App\Http\Livewire\Categorias;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Article;
use App\Models\Provider;
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
        if($this->search){
            $proveedor = Provider::where('nombre', 'LIKE', $this->search)->first();    
        }else{
            $proveedor = null;
        }
        if($proveedor){
            $articles = $this->articulos->intersect(Article::where('provider_id', $proveedor->id)->get());
        }else{
            $articles = $this->articulos->intersect(Article::search($this->search)->get());
        }

        /*$advertencia = collect([]);
        $urgente = collect([]);
        $alerta_sub = collect([]);

        if($this->subcategoria->punto_subcategoria){
            $suma = 0;
            $promedio = 0;
            $cantidad = 0;
            foreach ($this->articulos as $articulo) {
                $suma += $articulo->stock;
                ++$cantidad;
            }
            $promedio = $suma/$cantidad;
            if($promedio < $this->subcategoria->stock_min){
                $alerta_sub->concat([1]);
            }
        }else{
            $alertas = $this->articulos->intersect(Article::all()->filter(fn ($artic, $key)=>$artic->stock < $artic->stock_minimo));

            $aux = collect([]);
            $aux2 = collect([]);

            foreach ($alertas as $alerta) {
                
                $aux1 = Article::where('nombre', $alerta->nombre)
                                ->where('provider_id', $alerta->provider_id)
                                ->where('marca', $alerta->marca)
                                ->where('deposito', '!=', $alerta->deposito)->get();
                if($aux1->count()){
                    $advertencia = $aux2->concat($aux1);
                    $advertencia->all();
                }else{
                    $urgente = $aux->concat($alerta);
                    $urgente->all();
                }

            }
        }*/
        
        $alertas = $this->articulos->intersect(Article::all()->filter(fn ($artic, $key)=>$artic->stock < $artic->stock_minimo));

        $advertencia = collect([]);
        $urgente = collect([]);
        $aux = collect([]);
        $aux2 = collect([]);

        foreach ($alertas as $alerta) {
            
            $aux1 = Article::where('nombre', $alerta->nombre)
                            ->where('provider_id', $alerta->provider_id)
                            ->where('marca', $alerta->marca)
                            ->where('deposito', '!=', $alerta->deposito)->get();
            if($aux1->count()){
                $advertencia = $aux2->concat($aux1);
                $advertencia->all();
            }else{
                $urgente = $aux->concat($alerta);
                $urgente->all();
            }

        }

        $categoria = $this->categoria->get();
        $subcategoria = $this->subcategoria->get();
        $proveedores = Provider::all();
        return view('livewire.categorias.subcategoria', compact('articles', 'alertas','categoria',
        'subcategoria', 'proveedores', 'urgente', 'advertencia'));
    }
}
