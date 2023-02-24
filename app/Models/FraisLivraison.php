<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FraisLivraison extends Model
{
    use HasFactory;
    protected $table = "lf_frais_livraisons";
    protected $primaryKey = "id";
    protected $fillable = array('nom_frais', 'somme');
    public $timestamps = false;

    /**
     * une frais livraison a plusieurs commande-client
     *
     * @return void
     */
    public function commandeClient()
    {
        return $this->hasMany(CommandeClient::class);
    }
}
