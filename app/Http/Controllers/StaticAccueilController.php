<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StaticAccueilController extends Controller
{
    public function accueil(){
        return view('static-accueil');
    }
}
