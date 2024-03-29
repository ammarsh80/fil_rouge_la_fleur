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

/**
 * Article Controller
 */
class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $article = Article::with(['fleur', 'couleur'])->get();
        return view('articles.index', ['articles' => $article]);
    }

    /**
     * Affiche le formulaire pour créer une nouvelle ressource.
     * Crée une nouvelle instance de l'article.
     * Obtient toutes les instances de fleurs, couleurs, unités, catégories et événements.
     * Passe les instances d'article, fleurs, couleurs, unités, catégories et événements 
     * à la vue de création d'article.
     * @return \Illuminate\View\View La vue de création d'article.
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
            'unites' => $unites, 'fleurs' => $fleurs, 'categories' => $categories,
            'evenements' => $evenements,
        ]);
    }



    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validation des données entrées dans le formulaire
        if ($request->validate([
            'nom_fleur' => "string",
            'etat' => "string|min:3|max:45|regex:/[a-zA-Z][a-zA-Z0-9À-ÿ]*('[a-zA-Z0-9À-ÿ]+)*/",
            'date' => "datetime",
            'quantite_stock' => "int|min:0",
            'prix_unitaire' => "numeric|min:0.01|max:99.99",
            'nombre' => "int|min:0",
            'nom_unite' => "",
            'couleur' => "string",
            'categories' => "required",
            'description' => "string|min:3|max:255|regex:/[a-zA-Z][a-zA-Z0-9À-ÿ]*('[a-zA-Z0-9À-ÿ]+)*/",
            'image' => "string|min:3|max:255",
        ])) {

            // Récupération des données du formulaire
            $nom_fleur = $request->input('nom_fleur');
            $etat = $request->input('etat');
            $date_inventaire = $request->input('date_inventaire');
            $quantite_stock = $request->input('quantite_stock');
            $prix_unitaire = $request->input('prix_unitaire');
            $nombre = $request->input('nombre');
            $categorie_id = $request->input('categories');
            $evenement_id = $request->input('evenements');
            $couleur = $request->input('couleur');
            $nom_unite = $request->input('nom_unite');
            $description = $request->input('description');
            $image = $request->input('image');

            // Création d'une nouvelle instance d'article
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
            $article->image = $image;

            // Enregistrement de l'article en base de données
            $article->save();

            // Récupération de l'ID de l'article enregistré
            $article_id = $article->id;

            // Attachement des catégories et événements sélectionnés à l'article enregistré
            $article->categorie()->attach($categorie_id);
            $article->evenement()->attach($evenement_id);

            // Redirection vers la page d'affichage de l'article enregistré
            return redirect()->route('articles.show', $article->id);
        } else {
            // En cas de validation échouée, redirection vers la page précédente
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $article = Article::find($id);
        return view('articles.show', ['toto' => $id, 'article' => $article]);
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
            'quantite_stock' => "int|min:0",
            'prix_unitaire' => "numeric|min:0.01|max:99.99",
            'nombre' => "int|min:0",
            'nom_unite' => "string",
            'taille' => "string",
            'description' => "string|min:3|max:255|regex:/[a-zA-Z][a-zA-Z0-9À-ÿ]*('[a-zA-Z0-9À-ÿ]+)*/",
            'image' => "string|min:3|max:255|",
            // 'nouvelle_image' => 'file|mimes:jpeg,png,gif|max:2048' // Taille maximale de 2 Mo (2048 Ko)
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
            $image = $request->input('image');
            $nouvelle_image = $request->input('nouvelle_image');

            $article = Article::find($id);

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

            if (isset($nouvelle_image)) {
                $article->image = $nouvelle_image;
            } else {
                $article->image = $image;
            }
            $article->couleur()->associate($couleur);

            $article_id = $article->id;
            if ($evenement_id != null) {

                $this->attachEvenement($article_id, $evenement_id);
            }
            if ($categorie_id != null) {

                $this->attachCategorie($article_id, $categorie_id);
            }
            $article->save();
            // $couleurs->save();
            return redirect()->route('articles.show', $article->id);
        } else {
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Article::destroy($id);
        return redirect()->route('articles.index');
    }

    /**
     * détache un tag d'un jeu
     *
     * @param [type] $id_jeu
     * @param [type] $id_tag
     * @return void
     */
    public function detachCat($id_article, $id_categorie)
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


    /**
     * attahce une cétegorie (trouvée ou crée) à une article
     *
     * @param [int] $article_id
     * @param [int] $categorie_id
     * @return void
     */
    public function attachCategorie($article_id, $categorie_id)
    {
        $categorie_id = Categorie::firstOrCreate([        //firstOfCreate() crée une nouveau categorie sauf s'il existe déjà
            'id' => $categorie_id
        ]);

        $article = Article::find($article_id);

        $categories = $article->categorie;
        $bool = $categories->contains($categorie_id);  // Vérifie si la categorie existe déjà
        if (!$bool) {
            $article->categorie()->attach($categorie_id);     // la méthode attach sert à lier la categorie trouvé (ou créé) à l'article enregistré en utilisant la relation Categorie définie dans la classe Article.
        }
        return redirect()->route('articles.edit', $article->id);
        die;
    }

    /**
     * attahce un évenement (trouvée ou crée) à une article
     *
     * @param [int] $article_id
     * @param [int] $evenement_id
     * @return void
     */
    public function attachEvenement($article_id, $evenement_id)
    {
        $evenement_id = Evenement::firstOrCreate([
            'id' => $evenement_id
        ]);


        $article = Article::find($article_id);
        $evenement = $article->evenement;
        $bool = $evenement->contains($evenement_id);
        if (!$bool) {
            $article->evenement()->attach($evenement_id);
        }
        return redirect()->route('articles.edit', $article->id);
        die;
    }
}
