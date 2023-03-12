<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Couleur;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $article = Article::orderBy('id', 'asc')->get();
        $article = Article::with(['fleur','couleur'])->get();
        // $fleur= $article->fleurs;
        // return view('articles.index', ['articles' => $article]);  
        return view('articles.index', ['articles'=>$article]);
  
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
        $article = Article::find($id);
        // $categorie= $article->categorie;
        return view('articles.show', ['toto' => $id, 'article' => $article]);
        // return view('articles.show', compact('article','categorie'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $article = Article::find($id);
        $couleur= $article->couleurs;
        $couleurs= Couleur::all();
        // return view('jeux.edit', ['toto' => $id, 'jeu' => $jeux]);
        return view('articles.edit', compact('article','couleur','couleurs'));
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
        Article::destroy($id);
        return redirect()->route('articles.index');
    }



//      /**
//   * créer ou récupère un tag et l'attach à un jeu
//   *
//   * @param Request $request
//   * @param [type] $id_jeu
//   * @return void
//   */
//   public function attach(Request $request, $id_jeu)
//   {
//       if ($request->validate([
//           'tag' => 'required|string|max:45|min:3'
//       ])) {
//           $titre_tag = $request->input('tag');
//           $tag = Tag::firstOrCreate([        //firstOfCreate() crée une nouveau tag sauf s'il existe déjà
//               'titre' => $titre_tag
//           ]);
          
//           $jeu = Jeu::find($id_jeu);
//           $tags = $jeu->tags;
//           $bool = $tags->contains($tag->id);  // Vérifie si le tag existe déjà

//           if(!$bool) {
//               $jeu->tags()->attach($tag->id);     // la méthode attach sert à lier le tag trouvé (ou créé) au jeu enregistré en utilisant la relation tags définie dans la classe Jeu.
//           }

//           return redirect()->route('jeux.show', $jeu->id);
//       } else {
//           return redirect()->back();
//       }
//       die;
//   }
// /**
// * détache un tag d'un jeu
// *
// * @param [type] $id_jeu
// * @param [type] $id_tag
// * @return void
// */
//   public function detach($id_jeu, $id_tag) {
//       $jeu = Jeu::find($id_jeu);
//       $jeu->tags()->detach($id_tag);
//       return redirect()->back();
//   }
}
