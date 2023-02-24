<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommandeFournisseur extends Model
{
    use HasFactory;
    protected $table = "lf_commande_fournisseurs";
    protected $primaryKey = "id";
    protected $fillable = array('commande_le', 'modifie_le', 'etat');
    public $timestamps = false;

       /**
     * un commande-fournisseur a plusieurs article
     *
     * @return void
     */
    public function article()
    {
        return $this->belongsToMany(Article::class, 'lf_ligne_commande_fournisseur');
    }
}
