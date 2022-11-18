<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;
    protected $guarded = [];

    //Relacion uno a muchos inversa
    public function subcategory(){
        return $this->belongsTo(SubCategory::class);
    }
}
