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
        return $this->belongsTo(GainLoterie::class, 'gain_loteries_id');
    }
    /**
     * Une commande client appartient à un gain loterie
     *
     * @return void
     */
    public function fraisLivraison()
    {
        return $this->belongsTo(FraisLivraison::class, 'frais_livraisons_id');
    }
    /**
     * Une commande client appartient à un client
     *
     * @return void
     */
    public function client()
    {
        return $this->belongsTo(Client::class, 'clients_id');
    }
    /**
     * Une commande client appartient à une adresse
     *
     * @return void
     */
    public function adresseLivraison()
    {
        return $this->belongsTo(Adresse::class, 'adresses_livraison_id');
    }
    /**
     * Une commande client appartient à une adresse
     *
     * @return void
     */
    public function adresseFacturation()
    {
        return $this->belongsTo(Adresse::class, 'adresses_facturation_id');
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
