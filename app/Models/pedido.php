<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class pedido extends Model
{
    //
    protected $table = 'pedidos';

    protected $fillable = [
        "user_id",
        "total",
        "estado",
       
    ];
}
