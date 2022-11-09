<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ImageController extends Controller
{
    public function show($image)
    {
        header('Content-type: image/png');
        $ruta = public_path() . "\\images\\" . $image;
        return view('image', compact('ruta'));
    }
}
