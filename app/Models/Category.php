<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;

    // Definir la tabla que este modelo representará
    protected $table = 'CATEGORY';

    // Definir los campos que son asignables
    protected $fillable = [
        'id',
        'name',
        'image',
        'description'
    ];

    // Si usas una clave primaria no incrementable, puedes definirla aquí
    protected $primaryKey = 'id';

    // Desactivar el auto-incremento de la clave primaria (ya que usas un string)
    public $incrementing = false;
}
