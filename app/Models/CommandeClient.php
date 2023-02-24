<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommandeClient extends Model
{
    use HasFactory;

    protected $table = "lf_commande_clients";
    protected $primaryKey = "id";
    protected $fillable = array('commande_le', 'modifier_le', 'date_livraison_progamme', 'livre_a_temps', 'etat');
    public $timestamps = false;

    /**
     * Une commande client appartient à un gain loterie
     *
     * @return void
     */
    public function gainLoterie()
    {
        return $this->belongsTo(GainLoterie::class);
    }
    /**
     * Une commande client appartient à un gain loterie
     *
     * @return void
     */
    public function fraisLivraison()
    {
        return $this->belongsTo(FraisLivraison::class);
    }
    /**
     * Une commande client appartient à un client
     *
     * @return void
     */
    public function client()
    {
        return $this->belongsTo(Client::class);
    }
    /**
     * Une commande client appartient à une adresse
     *
     * @return void
     */
    public function adresse()
    {
        return $this->belongsTo(Adresse::class);
    }

    /**
     * une commande-client a plusieurs article
     *
     * @return void
     */
    public function article()
    {
        return $this->belongsToMany(Article::class, 'lf_ligne_commande_client');
    }
}
