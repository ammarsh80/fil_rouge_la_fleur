<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GainLoterie extends Model
{
    use HasFactory;
    protected $table = "lf_gain_loteries";
    protected $primaryKey = "id";
    protected $fillable = array('lot','quantite_disponible');
    public $timestamps = false;

       /**
    * une gain loterie a plusieurs commande-client
    *
    * @return void
    */
    public function commandeClient()
    {
        return $this->hasMany(CommandeClient::class);
    }
}
