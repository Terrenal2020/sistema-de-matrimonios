<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class historialmatrimonios extends Model
{
    use HasFactory;
    protected $fillable=['id','clave','Nombre','ApellidoP','ApellidoM','NombreP1','ApellidoP2','ApellidoM2','estatus'];
}
