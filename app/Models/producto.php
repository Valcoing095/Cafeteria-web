<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class producto extends Model
{
    use HasFactory;

    use HasFactory;
    protected $table = 'productos';
    protected $primaryKey = 'id';
    protected $keyType = 'int';

    public $timestamps = false;
}
