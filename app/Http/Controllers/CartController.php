<?php

namespace App\Http\Controllers;

use App\Models\Store;
use Illuminate\Http\Request;
use Cart;

class CartController extends Controller
{
    public function add(Request $request){
        $producto = Store::find($request->id);
        if(empty($producto))
            return redirect('/seller');
        Cart::add(
            $producto->id,
            $producto->nombre,
            1,
            $producto->precioVenta
            
        );

        return redirect()->back()->with("confirmacion","Producto agregado: ". $producto->nombre);
    }
    public function removeItem(Request $request){
        Cart::remove($request->rowId);
        return redirect()->back()->with("confirmacion","Producto eliminado");

    }
}
