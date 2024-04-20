<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    // Defina os atributos da tabela products aqui
    protected $fillable = [
        'title',
        'description',
        'image',
        'category',
        'rating',
        'rating_count',
    ];
}
