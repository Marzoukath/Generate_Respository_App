<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Citizen;

class StaticAccueilController extends Controller
{
    public function accueil(){
        $citizen = Citizen::all();
        return view('static-accueil', ["citizens"=>$citizen]);
    }
}
