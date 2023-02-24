<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Couleur extends Model
{
    use HasFactory;
    protected $table = "lf_couleurs";
    protected $primaryKey = "id";
    protected $fillable = array('couleur');
    public $timestamps = false;
}
