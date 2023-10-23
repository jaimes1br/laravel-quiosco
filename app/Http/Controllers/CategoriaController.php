<?php

namespace App\Http\Controllers;

use App\Http\Resources\CategoriaCollection;
use App\Models\Categoria;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    //peticion GET
    public function index()
    {
        //respuesta de tipo JSON
        // return response()->json(['categorias' => Categoria::all()]);

        //API Resources nos permite formatear las respuestas que da 
        //o se retorna en un JSON, retornamos que y como se le mostrara
        //usamos un collection y un reesource (en http/resource)
        //en el archivo de resource modificamos que columnas vamos a retornar
        return new CategoriaCollection(Categoria::all());
    }
}
