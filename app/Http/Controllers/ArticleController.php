<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\ArticleCetegorie;
use App\Models\Categorie;
use App\Models\Couleur;
use App\Models\Evenement;
use App\Models\Fleur;
use App\Models\Unite;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $article = Article::orderBy('id', 'asc')->get();
        $article = Article::with(['fleur', 'couleur'])->get();
        // $fleur= $article->fleurs;
        // return view('articles.index', ['articles' => $article]);  
        return view('articles.index', ['articles' => $article]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $article = new Article();
        $articles = Article::with(['fleur', 'couleur', 'unite'])->get();
        $fleurs = Fleur::orderBy('id', 'asc')->get();
        $couleurs = Couleur::orderBy('id', 'asc')->get();
        $unites = Unite::orderBy('id', 'asc')->get();
        $categories = Categorie::orderBy('id', 'asc')->get();
        $evenements = Evenement::orderBy('id', 'asc')->get();

        return view('articles.create', [
            'article' => $article, 'articles' => $articles, 'couleurs' => $couleurs,
            'unites' => $unites, 'fleurs' => $fleurs, 'categories' => $categories, 'evenements' => $evenements,
        ]);
    }

    // public function attachCategorie($categorie_id, $article_id)
    // {
    //     $article = Article::find($article_id);
    //     $article->categorie()->attach($categorie_id);     // la méthode attach sert à lier le tag trouvé (ou créé) au jeu enregistré en utilisant la relation tags définie dans la classe Jeu.

    // }

    public function attachCategorie($categorie_id, $article_id)
    {
        $categorie_id = Categorie::firstOrCreate([        //firstOfCreate() crée une nouveau tag sauf s'il existe déjà
            'id' => $categorie_id
        ]);
        $article = Article::find($article_id);
        $categories = $article->categorie;
        $bool = $categories->contains($categorie_id);  // Vérifie si le tag existe déjà
        if (!$bool) {
            $article->categorie()->attach($categorie_id);     // la méthode attach sert à lier le tag trouvé (ou créé) au jeu enregistré en utilisant la relation tags définie dans la classe Jeu.
        }
        return redirect()->route('articles.show', $article->id);
        die;
    }

    public function attachEvenement($evenement_id, $article_id)
    {
        $evenement_id = Evenement::firstOrCreate([        //firstOfCreate() crée une nouveau tag sauf s'il existe déjà
            'id' => $evenement_id
        ]);
        $article = Article::find($article_id);
        $evenement = $article->evenement;
        $bool = $evenement->contains($evenement_id);  // Vérifie si le tag existe déjà
        if (!$bool) {
            $article->evenement()->attach($evenement_id);     // la méthode attach sert à lier le tag trouvé (ou créé) au jeu enregistré en utilisant la relation tags définie dans la classe Jeu.
        }
        return redirect()->route('articles.show', $article->id);
        die;
    }


    // public function attachEvenement($evenement_id, $article_id)
    // {
    //     $article = Article::find($article_id);
    //     $article->evenement()->attach($evenement_id);     // la méthode attach sert à lier le tag trouvé (ou créé) au jeu enregistré en utilisant la relation tags définie dans la classe Jeu.
    // }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // if ($request->validate([
        //     'nom_fleur' => "required|string|min:3|max:45|regex:/[a-zA-Z][a-zA-Z0-9À-ÿ]*('[a-zA-Z0-9À-ÿ]+)*/",
        //     'description' => "string|min:3|max:255",
        //     'couleur' => "string"

        // ])) {

        //     $nom_fleur = $request->input('nom_fleur');
        //     $description = $request->input('description');

        //     $article = new Article();
        //     // $jeu->categorie_id = $request->input('categorie_id');

        //     $article->nom_fleur = $nom_fleur;
        //     $article->description = $description;

        //     $article->save();
        //     return redirect()->route('articles.show', ['articles' => $article->id]);
        // } else {
        //     return redirect()->back();
        // }

        if ($request->validate([
            'nom_fleur' => "string",
            'etat' => "string",
            'date' => "datetime",
            'quantite_stock' => "int",
            'prix_unitaire' => "numeric",  // à corriger et mettre decimal après test..
            'nombre' => "int",
            'nom_unite' => "string",
            // 'couleur' => "string",
            'categorie' => "string",
            'evenement' => "string",
            'description' => "string|min:3|max:255|regex:/[a-zA-Z][a-zA-Z0-9À-ÿ]*('[a-zA-Z0-9À-ÿ]+)*/",

        ])) {

            $nom_fleur = $request->input('nom_fleur');

            $etat = $request->input('etat');
            $date_inventaire = $request->input('date_inventaire');
            $quantite_stock = $request->input('quantite_stock');
            $prix_unitaire = $request->input('prix_unitaire');
            $nombre = $request->input('nombre');

            $categorie_id = $request->input('categorie');


            $evenement_id = $request->input('evenement');


            $couleur = $request->input('couleur');
            $nom_unite = $request->input('nom_unite');

            $description = $request->input('description');
            $article = new Article();

            $article->couleurs_id = $couleur;
            $article->unites_id = $nom_unite;
            $article->fleurs_id = $nom_fleur;

            $article->etat = $etat;
            $article->date_inventaire = $date_inventaire;
            $article->quantite_stock = $quantite_stock;
            $article->description = $description;
            $article->prix_unitaire = $prix_unitaire;
            $article->nombre = $nombre;
            // $article->couleur()->associate($couleur);
            $article->save();

            $article_id = $article->id;

            // $this->attachCategorie($categorie_id, $article_id);
            $this->attachCategorie($categorie_id, $article_id);
            $this->attachEvenement($evenement_id, $article_id);


            return redirect()->route('articles.show', $article->id);
        } else {
            return redirect()->back();
        }
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
        $couleur = $article->couleurs;
        $couleurs = Couleur::all();

        $articles = Article::with(['fleur', 'couleur', 'unite'])->get();
        $fleurs = Fleur::orderBy('id', 'asc')->get();
        $couleurs = Couleur::orderBy('id', 'asc')->get();
        $unites = Unite::orderBy('id', 'asc')->get();
        $categories = Categorie::orderBy('id', 'asc')->get();
        $evenements = Evenement::orderBy('id', 'asc')->get();

        // return view('jeux.edit', ['toto' => $id, 'jeu' => $jeux]);
        // return view('articles.edit', compact('article', 'couleur', 'couleurs'));

        return view('articles.edit', [
            'article' => $article, 'articles' => $articles, 'couleurs' => $couleurs,
            'unites' => $unites, 'fleurs' => $fleurs, 'categories' => $categories, 'evenements' => $evenements,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {


        if ($request->validate([
            'nom_fleur' => "string",
            'etat' => "string",
            'date' => "datetime",
            'quantite_stock' => "int",
            'prix_unitaire' => "numeric",  // à corriger et mettre decimal après test..
            'nombre' => "int",
            'nom_unite' => "string",
            'taille' => "string",
            'categorie' => "string",
            'evenement' => "string",
            // 'couleur' => "string",
            'description' => "string|min:3|max:255|regex:/[a-zA-Z][a-zA-Z0-9À-ÿ]*('[a-zA-Z0-9À-ÿ]+)*/",

        ])) {

            $nom_fleur = $request->input('nom_fleur');
            $categorie_id = $request->input('categorie');
            $evenement_id = $request->input('evenement');
            $etat = $request->input('etat');
            $date_inventaire = $request->input('date_inventaire');
            $quantite_stock = $request->input('quantite_stock');
            $prix_unitaire = $request->input('prix_unitaire');
            $nombre = $request->input('nombre');
            $couleur = $request->input('couleur');
            $nom_unite = $request->input('nom_unite');
            $article = Article::find($id);
            // $fleur = Fleur::find($id);
            // $unites = Unite::find($id);
            // $couleurs = Couleur::find($id);
            $description = $request->input('description');
            $article->fleurs_id = $nom_fleur;
            $article->unites_id = $nom_unite;
            $article->fleurs_id = $nom_fleur;
            $article->etat = $etat;
            $article->date_inventaire = $date_inventaire;
            $article->quantite_stock = $quantite_stock;
            $article->description = $description;
            $article->prix_unitaire = $prix_unitaire;
            $article->nombre = $nombre;
            // $couleurs->couleur = $couleur;
            $article->couleur()->associate($couleur);

            $article_id = $article->id;
            // $this->attachCategorie($categorie_id, $article_id);
            $this->attachCategorie($categorie_id, $article_id);
            $this->attachEvenement($evenement_id, $article_id);

            $article->save();
            // $couleurs->save();
            return redirect()->route('articles.show', $article->id);
        } else {
            return redirect()->back();
        }
    }


    //     public function update(Request $request, string $id)
    // {
    //     $validatedData = $request->validate([
    //         'nom_fleur' => 'required|string|min:3|max:45|regex:/^[a-zA-Z][a-zA-Z0-9À-ÿ]*(\'[a-zA-Z0-9À-ÿ]+)*/',
    //         'description' => 'nullable|string|min:3|max:255',
    //         'couleur' => 'nullable|exists:couleurs,id',
    //         'prix' => 'nullable|numeric',
    //         'nombre' => 'nullable|integer',
    //         'date_inventaire' => 'nullable|date'
    //     ]);

    //     $article = Article::findOrFail($id);

    //     $article->nom_fleur = $validatedData['nom_fleur'];
    //     $article->description = $validatedData['description'];
    //     $article->prix_unitaire = $validatedData['prix'];
    //     $article->nombre = $validatedData['nombre'];
    //     $article->couleur_id = $validatedData['couleur'];
    //     $article->date_inventaire = $validatedData['date_inventaire'];

    //     $article->save();

    //     return redirect()->route('articles.show', $article->id);
    // }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Article::destroy($id);
        return redirect()->route('articles.index');
    }



    // /**
    //  * créer ou récupère un tag et l'attach à un jeu
    //  *
    //  * @param Request $request
    //  * @param [type] $id_jeu
    //  * @return void
    //  */
    // public function attach(Request $request, $id_article)
    // {
    //     if ($request->validate([
    //         'categorie' => 'required|string|max:45|min:3'
    //     ])) {
    //         $categorie = $request->input('categorie');
    //         var_dump($$categorie);
    //         die;
    //         $categorie = Categorie::firstOrCreate([        //firstOfCreate() crée une nouveau tag sauf s'il existe déjà
    //             'categorie' => $categorie
    //         ]);

    //         $article = Article::find($id_article);
    //         $categories = $article->categories;
    //         $bool = $categories->contains($categorie->id);  // Vérifie si le tag existe déjà

    //         if (!$bool) {
    //             $article->categories()->attach($categorie->id);     // la méthode attach sert à lier le tag trouvé (ou créé) au jeu enregistré en utilisant la relation tags définie dans la classe Jeu.
    //         }
    //         return redirect()->route('articles.show', $article->id);
    //     } else {
    //         return redirect()->back();
    //     }
    //     die;
    // }
    /**
     * détache un tag d'un jeu
     *
     * @param [type] $id_jeu
     * @param [type] $id_tag
     * @return void
     */
    public function detach($id_article, $id_categorie)
    {
        $article = Article::find($id_article);
        $article->categorie()->detach($id_categorie);
        return redirect()->back();
    }
    /**
     * détache un tag d'un jeu
     *
     * @param [type] $id_jeu
     * @param [type] $id_tag
     * @return void
     */
    public function detachEven($id_article, $id_evenement)
    {
        $article = Article::find($id_article);
        $article->evenement()->detach($id_evenement);
        return redirect()->back();
    }


}
