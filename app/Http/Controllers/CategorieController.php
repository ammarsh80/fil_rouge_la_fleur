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
         // $article = Article::orderBy('id', 'asc')->get();
         $categorie = Categorie::with(['article'])->get();
         
         // return view('articles.index', ['articles' => $article]);  
         return view('categories.index', ['categories'=>$categorie]); 
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
    public function show($id)
    {
        $categorie = Categorie::find($id);
        $article = $categorie->article;
        //    return view('categories.show', ['toto' => $id, 'categories' => $categorie]);   
        return view('categories.show', compact('categorie', 'article'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
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
