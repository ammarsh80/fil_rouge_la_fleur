<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArticleCetegorie extends Model
{
    use HasFactory;

    protected $table = "lf_article_categorie";
    protected $fillable = array('article_id', 'categorie_id');
    public $timestamps = false;
}
