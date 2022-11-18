<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    use HasFactory;
    protected $guarded = [];

    //Relacion uno a muchos inversa
    public function category(){
        return $this->belongsTo(Category::class);
    }
    //Relacion uno a muchos
    public function article(){
        return $this->hasMany(Article::class);
    }
    
}
