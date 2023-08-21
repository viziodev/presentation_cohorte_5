<?php

namespace App\Models;

use DB;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

/**
 * App\Models\ArticleConf
 *
 * @property int $id
 * @property string $libelle
 * @property int $categorie_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|ArticleConf newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ArticleConf newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ArticleConf query()
 * @method static \Illuminate\Database\Eloquent\Builder|ArticleConf whereCategorieId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ArticleConf whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ArticleConf whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ArticleConf whereLibelle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ArticleConf whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class ArticleConf extends Model
{
    use HasFactory;
  protected $guarded=[];
     protected static function booted(): void
    {
        static::created(function ( ArticleConf $article)  {
             DB::table("article_conf_fournisseur")->insert(
                array_map(fn($value): array => [
                "article_conf_id"=>$article->id,
                "fournisseur_id"=>$value], request()->fournisseurs)); 
            });
    }
}