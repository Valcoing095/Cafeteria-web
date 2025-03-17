<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class pedido_producto extends Model
{
    //
    protected $table = 'pedido_productos';

    protected $fillable = [
        "cantidad",
        "subTotal",
        "pedido_id",
        "producto_id"
    ];


    public function producto(){
        return $this->belongsTo(Producto::class, 'producto_id');
    }

    public function pedido()
    {
        return $this->belongsTo(Pedido::class, 'pedido_id');
    }
}
