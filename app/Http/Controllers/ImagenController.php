<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class ImagenController extends Controller
{
    public function store(Request $request)
    {

        $imagen = $request->file('file');

        $nombreImgen = Str::uuid() . "." . $imagen->extension();

        $imgServidor = Image::make($imagen);
        $imgServidor->fit(1000, 1000);

        $imgPath = public_path('uploads') . '/' . $nombreImgen;

        $imgServidor->save($imgPath);
        return response()->json(['imagen' => $nombreImgen]);
    }
}
