<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CodePostaux extends Model
{
    use HasFactory;
    protected $table = "lf_code_postaux";
    protected $primaryKey = "id";
    protected $fillable = array('code_postal');
    public $timestamps = false;

    /**
     * un code postal a plusieurs adresses
     *
     * @return void
     */
    public function adresse()
    {
        return $this->hasMany(Adresse::class);
    }
}
