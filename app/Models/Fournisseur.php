<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fournisseur extends Model
{
    use HasFactory;
    protected $table = "lf_fournisseurs";
    protected $primaryKey = "id";
    protected $fillable = array('nom_fournisseur', 'siret', 'email', 'telephone', 'mot_de_passe', 'etat');
    public $timestamps = false;

    /**
     * Une fournisseur appartient à une adresse
     *
     * @return void
     */
    public function adresse()
    {
        return $this->belongsTo(Adresse::class);
    }

    /**
     * un fournisseur a plusieurs commandes
     *
     * @return void
     */
    public function commandeFournisseur()
    {
        return $this->hasMany(CommandeFournisseur::class);
    }
}
