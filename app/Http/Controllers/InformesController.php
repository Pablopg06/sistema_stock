<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InformesController extends Controller
{
    public function ingresos(){
        return view('informes.ingresos');
    }

    public function egresos(){
        return view('informes.egresos');
    }
}
