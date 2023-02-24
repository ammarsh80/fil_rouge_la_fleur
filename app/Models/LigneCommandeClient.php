<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LigneCommandeClient extends Model
{
    use HasFactory;
    protected $table = "lf_ligne_commande_client";
    protected $fillable = array('quantite');
    public $timestamps = false;
}
