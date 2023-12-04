<?php

namespace App\Http\Controllers;

use App\Models\Store;
use App\Models\Seller;
use Illuminate\Http\Request;
use Cart;
use DB;
use Carbon\Carbon;

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

    public function clear(){
        Cart::destroy();
        return redirect()->back()->with("confirmacion","Carrito vaciado");
    }

    public function comprar(Request $request)
    {
        DB::table('seller')->insert([
            'cliente' => $request->input('cliente'),
            'fecha' => $request->input('fecha'),
            'Content' => Cart::content(),
            'total' => $request->input('total'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        Cart::destroy();

        return redirect()->back()->with('confirmacion','Venta realizada');
    }

}
