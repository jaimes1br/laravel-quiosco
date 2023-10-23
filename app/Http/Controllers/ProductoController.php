<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProductoCollection;
use App\Models\Producto;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    //
    public function index()
    {
        //en este caso usamos un dispobible para saber o dar solo los diponibles en cada una de las llamadas

        return new ProductoCollection(Producto::where('disponible',1)->orderBy('id','DESC')->get());
        //para paginar
        // return new ProductoCollection(Producto::orderBy('id','DESC')->paginate(10));
        //en caso de los que no estan disponibles (me da los que si)
        // return new ProductoCollection(Producto::where('disponible',1)->orderBy('id','DESC')->paginate(10));
    }

    public function update(Request $request, Producto $producto)
    {
        $producto->disponible = 0;
        $producto->save();

        return [
            'producto' => $producto
        ];
    }
}
