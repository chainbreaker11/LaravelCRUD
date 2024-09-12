<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Anime extends Model
{
    use HasFactory;
    protected $fillable = [
        'Nombre',
        'Alias',
        'Edad',
        'Genero',
        'Meta',
        'Foto', // Asegúrate de incluir este campo si es que también lo estás usando
    ];
}
