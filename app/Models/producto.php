<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    protected $table = 'productos';
    protected $fillable = [
        "nombre",
        "descripcion",
        "valor_bruto",
        "iva",
        "descuento",
        "stok",
    ];


    #Categoria del producto
    public function categoriaProducto(){
        return $this->belongsTo(categoriaProducto::class,'id_categoria');
    }


}
