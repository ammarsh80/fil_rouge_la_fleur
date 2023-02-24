<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fournisseur extends Model
{
    use HasFactory;
    protected $table = "lf_fournisseurs";
    protected $primaryKey = "id";
    protected $fillable = array('nom_fournisseur','siret', 'email', 'telephone', 'mot_de_passe', 'etat');
    public $timestamps = false;
}
