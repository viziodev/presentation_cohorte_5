<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * App\Models\Categorie
 *
 * @property int $id
 * @property string $libelle
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static Builder|Categorie newModelQuery()
 * @method static Builder|Categorie newQuery()
 * @method static Builder|Categorie onlyTrashed()
 * @method static Builder|Categorie query()
 * @method static Builder|Categorie whereCreatedAt($value)
 * @method static Builder|Categorie whereDeletedAt($value)
 * @method static Builder|Categorie whereId($value)
 * @method static Builder|Categorie whereLibelle($value)
 * @method static Builder|Categorie whereUpdatedAt($value)
 * @method static Builder|Categorie withTrashed()
 * @method static Builder|Categorie withoutTrashed()
 * @mixin \Eloquent
 */
class Categorie extends Model
{
    use HasFactory,SoftDeletes;
    protected $hidden=["created_at", "updated_at","deleted_at"];
    protected $guarded=[];
   public function scopeWhereLibelle(Builder $builder,string $value){
     return $builder->where("libelle", "like", $value)->first();
   }
   
}