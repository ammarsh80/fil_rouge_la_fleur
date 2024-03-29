<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use Illuminate\Http\Request;

class CategorieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categorie = Categorie::with(['article'])->get();
        return view('categories.index', ['categories' => $categorie]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categorie = new Categorie();
        return view('categories.create', ['categorie' => $categorie, 'titre' => $categorie]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if ($request->validate([
            'nom_categorie' => "required|string|min:3|max:45|regex:/[a-zA-Z][a-zA-Z0-9À-ÿ]*('[a-zA-Z0-9À-ÿ]+)*/",

        ])) {

            $nom_categorie = $request->input('nom_categorie');

            $categorie = new Categorie();
            $categorie->nom_categorie = $nom_categorie;
            $categorie->save();
            return redirect()->route('categories.show', ['category' => $categorie->id]);

        } else {
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $categorie = Categorie::find($id);
        $article = $categorie->article;
        return view('categories.show', compact('categorie', 'article'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $categorie = Categorie::find($id);
        return view('categories.edit', compact('categorie'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        if ($request->validate([
            'nom_categorie' => "required|string|min:3|max:45|regex:/[a-zA-Z][a-zA-Z0-9À-ÿ]*('[a-zA-Z0-9À-ÿ]+)*/"
        ])) {

            $nom_categorie = $request->input('nom_categorie');
            $categorie = Categorie::find($id);
            $categorie->nom_categorie = $nom_categorie;
            $categorie->save();
            return redirect()->route('categories.show', $categorie->id);
        } else {
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Categorie::destroy($id);
        return redirect()->route('categories.index');
    }
}
