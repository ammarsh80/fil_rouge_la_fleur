<?php

namespace App\Http\Controllers;

use App\Models\Couleur;
use Illuminate\Http\Request;

class CouleurController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $couleur = Couleur::orderBy('id', 'asc')->get();
        return view('couleurs.index', ['couleurs' => $couleur]);    
      }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $couleur = new Couleur();
        return view('couleurs.create', ['couleur' => $couleur, 'titre' => $couleur]);   
     }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if ($request->validate([
            'nouvelle_couleur' => "required|string|min:3|max:45|regex:/[a-zA-Z][a-zA-Z0-9À-ÿ]*('[a-zA-Z0-9À-ÿ]+)*/",
            // 'nouvelle_couleur' => "min:0",
        ])) {

            $nouvelle_couleur = $request->input('nouvelle_couleur');
            $couleur = new Couleur();
            $couleur->couleur = $nouvelle_couleur;
            $couleur->save();
            return redirect()->route('couleurs.show', ['couleur' => $couleur->id]);

        } else {
            return redirect()->back();
        }   
     }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $couleur = Couleur::find($id);
        
        $articles = $couleur->articles;
       
            //    return view('couleurs.show', ['toto' => $id, 'couleur' => $couleur]);   
        return view('couleurs.show', compact('couleur', 'articles'));  
      }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $couleur = Couleur::find($id);
        // return view('couleurs.edit', ['toto' => $id, 'couleur' => $couleurs]);    
        return view('couleurs.edit', compact('couleur'));  
      }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        if ($request->validate([
            'nouvelle_couleur' => "required|string|min:3|max:45|regex:/[a-zA-Z][a-zA-Z0-9À-ÿ]*('[a-zA-Z0-9À-ÿ]+)*/"
        ])) {
          
            $nouvelle_couleur = $request->input('nouvelle_couleur');
            $couleur = Couleur::find($id);
            $couleur->couleur = $nouvelle_couleur;
            $couleur->save();
            return redirect()->route('couleurs.show', $couleur->id);
        } else {
            return redirect()->back();
        }   
     }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Couleur::destroy($id);
        return redirect()->route('couleurs.index'); 
        }
}
