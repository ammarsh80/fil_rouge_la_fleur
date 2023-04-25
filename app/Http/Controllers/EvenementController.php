<?php

namespace App\Http\Controllers;

use App\Models\Evenement;
use Illuminate\Http\Request;

class EvenementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $evenement = Evenement::with(['article'])->get();
        return view('evenements.index', ['evenements' => $evenement]);    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $evenement = new Evenement();
        return view('evenements.create', ['evenement' => $evenement, 'titre' => $evenement]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if ($request->validate([
            'nom_evenement' => "required|string|min:3|max:45|regex:/[a-zA-Z][a-zA-Z0-9À-ÿ]*('[a-zA-Z0-9À-ÿ]+)*/",

        ])) {
            $nom_evenement = $request->input('nom_evenement');
            $evenement = new Evenement();
            $evenement->nom_evenement = $nom_evenement;
            $evenement->save();
            return redirect()->route('evenements.show', ['evenement' => $evenement->id]);

        } else {
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $evenement = Evenement::find($id);
        $article = $evenement->article;
        return view('evenements.show', compact('evenement', 'article'));    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $evenement = Evenement::find($id);
        return view('evenements.edit', compact('evenement'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        if ($request->validate([
            'nom_evenement' => "required|string|min:3|max:45|regex:/[a-zA-Z][a-zA-Z0-9À-ÿ]*('[a-zA-Z0-9À-ÿ]+)*/"
        ])) {

            $nom_evenement = $request->input('nom_evenement');
            $evenement = Evenement::find($id);
            $evenement->nom_evenement = $nom_evenement;
            $evenement->save();
            return redirect()->route('evenements.show', $evenement->id);
        } else {
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Evenement::destroy($id);
        return redirect()->route('evenements.index'); 
    }
}
