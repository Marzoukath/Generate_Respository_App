<?php

namespace App\Http\Controllers;

use App\Models\Citizen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class CitizenController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {  
        $citizens = Citizen::all();
        // $citizens = Citizen::where('status','unappoved')->get();

        return view('laravel-examples/citizens-management', ['citizens' => $citizens]);
       
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validation des données
        $validatedData = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|unique:citizens,email',
            'neighborhood' => 'required|string|max:255',
            'chief_neighborhood' => 'required|string|max:255',
            'phone' => 'required|digits:10',
            'id_number' => 'required|string|unique:citizens,id_number',
           
        ]);

        // Insertion dans la base de données
        Citizen::create([
            'first_name' => $validatedData['first_name'],
            'last_name' => $validatedData['last_name'],
            'email' => $validatedData['email'],
            'neighborhood' => $validatedData['neighborhood'],
            'chief_neighborhood' => $validatedData['chief_neighborhood'],
            'phone' => $validatedData['phone'],
            'id_number' => $validatedData['id_number'],
            
        ]);

        // Redirection avec un message de succès
        return redirect()->back()->with('success', 'Les informations ont été enregistrées avec succès.');
    }

    // public function approuver() {
    //     $citizens = Citizen::all();
    //     return view('tables', ['citizens' => $citizens]);
    // }
    public function approve(Request $request)
    {
        $ids = $request->input('ids'); // Récupérer les IDs envoyés
        if ($ids) {
            // Mettre à jour les citoyens pour les approuver
            Citizen::whereIn('id', $ids)->update(['status' => 'approved']);
            return response()->json(['message' => 'Citoyens approuvés avec succès.']);
        }
        return response()->json(['message' => 'Aucun citoyen sélectionné.'], 400);
    }
    
    public function verifyId(Request $request)
    {
        $validated = $request->validate([
            'citizen_id' => 'required|exists:citizens,id',
            'id_number' => 'required'
        ]);
    
        $citizen = Citizen::find($validated['citizen_id']);
    
        if ($citizen && $citizen->id_number === $validated['id_number']) {
            return response()->json(['valid' => true]);
        }
    
        return response()->json(['valid' => false]);
    }
    

    /**
     * Display the specified resource.
     */
    public function show(Citizen $citizen)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Citizen $citizen)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Citizen $citizen)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Citizen $citizen)
    {
        //
    }
}
