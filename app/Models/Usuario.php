<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Usuario extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    //Tabla en base de datos
    protected $table = 'usuarios';
    // Campos de la tabla en base de datos
    protected $fillable=[
        'nombre',
        'apellido',
        'email',
        'password',
        'id_rol'
    ];


    // Roles de un usuario
    public function rolingroles(){
        return $this->belongsTo(Rol::class, 'id_rol');
    }



}
