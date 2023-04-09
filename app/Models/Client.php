<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;
    protected $table = "lf_clients";
    protected $primaryKey = "id";
    protected $fillable = array('titre', 'nom_client', 'prenom', 'email', 'mot_de_passe', 'etat', 'pseudo');
    public $timestamps = false;

    /**
     * un client a plusieurs commande-client
     *
     * @return void
     */
    public function commandeClient()
    {
        return $this->hasMany(CommandeClient::class);
    }

    /**
     * un client a plusieurs adresses
     *
     * @return void
     */
    public function adresse()
    {
        return $this->belongsToMany(Adresse::class, 'lf_adresse_client');
    }
}
