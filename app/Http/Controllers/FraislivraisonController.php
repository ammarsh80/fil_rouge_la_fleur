<?php

namespace App\Http\Controllers;

use App\Models\Fraislivraison;
use Illuminate\Http\Request;

class FraislivraisonController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $fraisLivraisons = Fraislivraison::orderBy('id', 'asc')->get();
        return view('fraislivraisons.index', ['fraisLivraisons' => $fraisLivraisons]);  
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $fraisLivraison = Fraislivraison::find($id);
        return view('fraislivraisons.edit', compact('fraisLivraison'));      }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        if ($request->validate([
            'nouveau_frais' => "required|string|min:3|max:45|regex:/[a-zA-Z][a-zA-Z0-9À-ÿ]*('[a-zA-Z0-9À-ÿ]+)*/",
            'nouvelle_somme' => "required|numeric|min:0|max:100"
        ])) {
          
            $frais = Fraislivraison::find($id);
            $nouveau_frais = $request->input('nouveau_frais');
            $nouvelle_somme = $request->input('nouvelle_somme');
            $frais->nom_frais = $nouveau_frais;
            $frais->somme = $nouvelle_somme;
            $frais->save();
            return redirect()->route('fraislivraisons.index');
        } else {
            return redirect()->back();
        }      }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
