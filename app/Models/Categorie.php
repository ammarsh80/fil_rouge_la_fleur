<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categorie extends Model
{
    use HasFactory;
    protected $table = "lf_categories";
    protected $primaryKey = "id";
    protected $fillable = array('nom_categorie');
    public $timestamps = false;

    /**
     * une catégorie a plusieurs articles
     *
     * @return void
     */
    public function article()
    {
        return $this->belongsToMany(Article::class, 'lf_article_categorie');
    }
}
