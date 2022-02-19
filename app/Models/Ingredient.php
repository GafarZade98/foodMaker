<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Ingredients
 *
 * @property int $id
 * @property string $name
 * @property string|null $description
 * @property string $photo
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Ingredients newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Ingredients newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Ingredients query()
 * @method static \Illuminate\Database\Eloquent\Builder|Ingredients whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ingredients whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ingredients whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ingredients whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ingredients wherePhoto($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ingredients whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Ingredient extends Model
{
    use HasFactory;

    public $fillable = [
        'name',
        'photo',
        'description',
    ];

    public function meals()
    {
        return $this->belongsTo(Meal::class);
    }
}
