<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Ingredient;

class Recipe extends Model
{
    use HasFactory;
    protected $fillable = ["name", "description"];

    public function ingredients()
    {
        return $this->hasMany(Ingredient::class);
    }
}
