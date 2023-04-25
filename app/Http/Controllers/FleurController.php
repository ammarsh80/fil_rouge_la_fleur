<?php

namespace App\Http\Controllers;

use App\Models\Fleur;
use Illuminate\Http\Request;

class FleurController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $fleurs = Fleur::orderBy('id', 'asc')->get();
        return view('fleurs.index', ['fleurs' => $fleurs]);   
        }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $fleur = new Fleur();
        return view('fleurs.create', ['fleur' => $fleur, 'titre' => $fleur]);  
      }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if ($request->validate([
            'nouvelle_fleur' => "required|string|min:3|max:45|regex:/[a-zA-Z][a-zA-Z0-9À-ÿ]*('[a-zA-Z0-9À-ÿ]+)*/",
        ])) {

            $nouvelle_fleur = $request->input('nouvelle_fleur');
            $fleur = new Fleur();
            $fleur->nom_fleur = $nouvelle_fleur;
            $fleur->save();
            return redirect()->route('fleurs.show', ['fleur' => $fleur->id]);

        } else {
            return redirect()->back();
        }  
        }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $fleur = Fleur::find($id);
        $articles = $fleur->articles;
        return view('fleurs.show', compact('fleur', 'articles')); 
    
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $fleur = Fleur::find($id);
        return view('fleurs.edit', compact('fleur'));  
       }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        if ($request->validate([
            'nouvelle_fleur' => "required|string|min:3|max:45|regex:/[a-zA-Z][a-zA-Z0-9À-ÿ]*('[a-zA-Z0-9À-ÿ]+)*/"
        ])) {
            $nouvelle_fleur = $request->input('nouvelle_fleur');
            $fleur = Fleur::find($id);
            $fleur->nom_fleur = $nouvelle_fleur;
            $fleur->save();
            return redirect()->route('fleurs.show', $fleur->id);
        } else {
            return redirect()->back();
        }    
     }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Fleur::destroy($id);
        return redirect()->route('fleurs.index'); 
    }
}
