<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evenement extends Model
{
    use HasFactory;
    protected $table = "lf_evenements";
    protected $primaryKey = "id";
    protected $fillable = array('nom_evenement');
    public $timestamps = false;
}
