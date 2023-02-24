<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fleur extends Model
{
    use HasFactory;
    protected $table = "lf_fleurs";
    protected $primaryKey = "id";
    protected $fillable = array('nom_fleur');
    public $timestamps = false;

    /**
     * une fleur a plusieurs articles
     *
     * @return void
     */
    public function article()
    {
        return $this->hasMany(Article::class);
    }
}
