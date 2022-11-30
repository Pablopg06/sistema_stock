<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    use HasFactory;
    protected $guarded = [];

    //Relación muchos a muchos
    public function article(){
        return $this->belongsToMany('App\Models\Article');
    }
    
}
