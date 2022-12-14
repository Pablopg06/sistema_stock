<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Provider extends Model
{
    use HasFactory;

    protected $guarded = [];

    //Relacion uno a muchos
    public function article(){
        return $this->hasMany(Article::class);
    }
}
