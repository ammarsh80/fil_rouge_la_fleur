<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;
    protected $table = "lf_clients";
    protected $primaryKey = "id";
    protected $fillable = array('titre','nom_client', 'prenom', 'email', 'mot_de_passe', 'etat');
    public $timestamps = false;
}
