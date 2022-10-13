<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comprometidos extends Model
{
    use HasFactory;
    protected $fillable=['clave','NombreEsposo','ApellidoP','ApellidoM','NombreEsposa','ApellidoPa','ApellidoMa','estatus'];
}
