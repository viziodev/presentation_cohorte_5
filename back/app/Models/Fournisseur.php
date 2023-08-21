<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Fournisseur
 *
 * @property int $id
 * @property string $nomComplet
 * @property string|null $adresse
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Fournisseur newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Fournisseur newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Fournisseur query()
 * @method static \Illuminate\Database\Eloquent\Builder|Fournisseur whereAdresse($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Fournisseur whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Fournisseur whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Fournisseur whereNomComplet($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Fournisseur whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Fournisseur extends Model
{
    
    use HasFactory;

       protected $guarded=[];
       protected $hidden=["created_at", "updated_at"];
}