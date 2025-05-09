<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DietaryRestriction extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'slug', 'description'];
    
    public function recipes()
    {
        return $this->belongsToMany(Recipe::class);
    }
}