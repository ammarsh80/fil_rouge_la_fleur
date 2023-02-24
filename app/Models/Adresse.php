<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Adresse extends Model
{
    use HasFactory;
    protected $table = "lf_adresses";
    protected $primaryKey = "id";
    protected $fillable = array('rue', 'complement_rue');
    public $timestamps = false;

    /**
     * Une adresse appartient à une ville
     *
     * @return void
     */
    public function ville()
    {
        return $this->belongsTo(Ville::class);
    }

    /**
     * Une adresse appartient à une code postal
     *
     * @return void
     */
    public function codePostal()
    {
        return $this->belongsTo(CodePostaux::class);
    }

    /**
     * une ville a plusieurs adresses
     *
     * @return void
     */
    public function fournisseur()
    {
        return $this->hasMany(Adresse::class);
    }

    /**
     * une adresse a plusieurs commande-client
     *
     * @return void
     */
    public function commandeClient()
    {
        return $this->hasMany(CommandeClient::class);
    }


    /**
     * une adresse a plusieurs clients
     *
     * @return void
     */
    public function client()
    {
        return $this->belongsToMany(Client::class, 'lf_adresse_client');
    }
}
