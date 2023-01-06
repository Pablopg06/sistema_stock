<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Article extends Model
{
    use HasFactory, Searchable;
    protected $guarded = [];

    public function toSearchableArray()
    {
        return [
            'nombre' => $this->nombre,
            'codigo' => $this->codigo,
            //'proveedor' => $this->proveedor
        ];
    }


    //Relacion uno a muchos inversa
    public function subcategory(){
        return $this->belongsTo(SubCategory::class);
    }

    //Relación muchos a muchos
    public function store(){
        return $this->belongsToMany('App\Models\Store');
    }

    //Relacion uno a muchos inversa
    public function provider(){
        return $this->belongsTo(Provider::class);
    }
}
