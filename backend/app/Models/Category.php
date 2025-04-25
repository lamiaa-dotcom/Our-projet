<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    protected $fillable = [
        'name',
        'image_path', // Ajout de la nouvelle colonne
    ];

    public function products(): HasMany
    {
        return $this->hasMany(Product::class);
    }
}