<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;
    protected $table = "lf_articles";
    protected $primaryKey = "id";
    protected $fillable = array('descritpion','etat', 'quantite_stock', 'date_inventaire','prix_unitaire', 'nombre');
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
     * @return void
     */
    public function evenement()
    {
        return $this->belongsToMany(Evenement::class, 'lf_article_evenement');
    }
    /**
     * Un article appartient à plusieurs catégories
     *
     * @return void
     */
    public function categorie()
    {
        return $this->belongsToMany(Categorie::class, 'lf_article_categorie');
    }
}
