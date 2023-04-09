<?php

namespace App\Models;

use App\Mail\AlerteStock;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Mail;


class Article extends Model
{
   
    use HasFactory;
    protected $table = "lf_articles";
    protected $primaryKey = "id";
    protected $fillable = array('descritpion', 'etat', 'quantite_stock', 'date_inventaire', 'prix_unitaire', 'nombre', 'image');
    public $timestamps = false;

    /**
     * Un article appartient à une unité
     *
     * @return void
     */
    public function unite()
    {
        return $this->belongsTo(Unite::class, 'unites_id');
    }

    /**
     * Un article appartient à une couleur
     *
     * @return void
     */
    public function couleur()
    {
        return $this->belongsTo(Couleur::class, 'couleurs_id');
    }
    /**
     * Un article appartient à une couleur
     *
     * @return void
     */
    public function fleur()
    {
        return $this->belongsTo(Fleur::class, 'fleurs_id');
    }

    /**
     * un article a plusieurs commande-fournisseur
     *
     * @return void
     */
    public function commandeFournisseur()
    {
        return $this->belongsToMany(CommandeFournisseur::class, 'lf_ligne_commande_fournisseur');
    }
    /**
     * un article a plusieurs commande-client
     *
     * @return void
     */
    public function commandeClient()
    {
        return $this->belongsToMany(CommandeClient::class, 'lf_ligne_commande_client');
    }


    /**
     * un articles a plusieurs evenement
     *
     * @return 
     */
    public function evenement()
    {
        return $this->belongsToMany(Evenement::class, 'lf_article_evenement');
    }
    /**
     * Un article appartient à plusieurs catégories
     *
     * @return
     */
    public function categorie()
    {
        return $this->belongsToMany(Categorie::class, 'lf_article_categorie');
    }

        /**
     * une unité a plusieurs articles
     *
     * @return void
     */
    public function lignCommandeClient()
    {
        return $this->hasMany(LigneCommandeClient::class);
    }


    // /**
    //  * envoie une alerte quand la quantité de stock est inférieur à 10 articles
    //  */
    // public function alerteStock($id)
    // {
    //     $article = article::find($id);
    //     $alerteStock = $article->quantite_stock;
    //     if ($alerteStock < 10) {
    //        echo "ATTENTION ! l'article numéro ("."$id". ") sera bientôt en repture de stock";
    //     }
    // }




    // /**
    //  * envoie une alerte quand la quantité de stock est inférieur à 10 articles
    //  */
    // public function alerteStock($id)
    // {
    //     $article = Article::find($id);
    //     $alerteStock = $article->quantite_stock;
    
    //     if ($alerteStock < 10) {
    //         $details = [
    //             'title' => 'Alerte stock',
    //             'body' => "ATTENTION ! l'article numéro ($id) sera bientôt en rupture de stock"
    //         ];
    
    //         // Mail::to('ammarsh80@gmail.com')->send(new AlerteStock($details));
    
    //         return "ATTENTION ! l'article numéro ($id) sera bientôt en rupture de stock";
    //     }
    // }


    /**
 * envoie une alerte quand la quantité de stock est inférieur à 10 articles
 */
public function alerteStock($id)
{
    $article = Article::find($id);
    $alerteStock = $article->quantite_stock;

    if ($alerteStock < 10) {
        $details = [
            'title' => 'Alerte stock',
            'body' => "ATTENTION ! l'article numéro ($id) sera bientôt en rupture de stock"
        ];

        // Mail::to('ammarsh80@gmail.com')->send(new AlerteStock($article));

        return "ATTENTION ! l'article numéro ($id) sera bientôt en rupture de stock";
    }
}

}
