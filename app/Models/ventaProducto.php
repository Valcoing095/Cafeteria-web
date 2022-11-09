<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ventaProducto extends Model
{
    use HasFactory;

    protected $table = 'venta_producto';
    protected $primaryKey = 'id';
    protected $keyType = 'int';

    public $timestamps = false;
}
