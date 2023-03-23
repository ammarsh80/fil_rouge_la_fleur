<?php

namespace App\Http\Controllers;

use App\Models\Unite;
use Illuminate\Http\Request;

class UniteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $unite = Unite::orderBy('id', 'asc')->get();
        return view('unites.index', ['unites' => $unite]);    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $unite = new Unite();
        return view('unites.create', ['unite' => $unite, 'titre' => $unite]);     }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if ($request->validate([
            'nouvelle_unite' => "required|string|min:3|max:45|regex:/[a-zA-Z][a-zA-Z0-9À-ÿ]*('[a-zA-Z0-9À-ÿ]+)*/",
            'nouvelle_taille' => "required|string|min:3|max:45|regex:/[a-zA-Z][a-zA-Z0-9À-ÿ]*('[a-zA-Z0-9À-ÿ]+)*/"
        ])) {

            $nouvelle_unite = $request->input('nouvelle_unite');
            $nouvelle_taille = $request->input('nouvelle_taille');
            $unite = new Unite();
            $unite->nom_unite = $nouvelle_unite;
            $unite->taille = $nouvelle_taille;
            $unite->save();
            return redirect()->route('unites.show', ['unite' => $unite->id]);

        } else {
            return redirect()->back();
        }       }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $unite = Unite::find($id);
        
        $articles = $unite->articles;
       
            //    return view('couleurs.show', ['toto' => $id, 'couleur' => $couleur]);   
        return view('unites.show', compact('unite', 'articles'));    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $unite = Unite::find($id);
        // return view('unite.edit', ['toto' => $id, 'unite' => $unite]);    
        return view('unites.edit', compact('unite'));   
     }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        if ($request->validate([
            'nouvelle_unite' => "required|string|min:3|max:45|regex:/[a-zA-Z][a-zA-Z0-9À-ÿ]*('[a-zA-Z0-9À-ÿ]+)*/",
            'nouvelle_taille' => "required|string|min:3|max:45|regex:/[a-zA-Z][a-zA-Z0-9À-ÿ]*('[a-zA-Z0-9À-ÿ]+)*/"
        ])) {
          
            $nouvelle_unite = $request->input('nouvelle_unite');
            $nouvelle_taille = $request->input('nouvelle_taille');
            $unite = Unite::find($id);
            $unite->nom_unite = $nouvelle_unite;
            $unite->taille = $nouvelle_taille;
            $unite->save();
            return redirect()->route('unites.show', $unite->id);
        } else {
            return redirect()->back();
        }      }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Unite::destroy($id);
        return redirect()->route('unites.index');     }
}
