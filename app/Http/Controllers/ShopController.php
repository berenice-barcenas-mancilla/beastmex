<?php

namespace App\Http\Controllers;

use App\Models\Shop;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Facades\Gate;
class ShopController extends Controller
{
    /**
    * Create a new controller instance.
    *
    * @return void
    */
    
    public function __construct()
    {
        $this->middleware(function ($request, $next){
             
            if (!Gate::allows('system.shop.list')) {
                abort(403, "No estas autorizado de acceder a esta zona");
            }
 
            return $next($request);
        });
    }
          
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index()
    {
        $PAGE_NAVIGATION = "SHOP";
 
        return view('admin.shopping.shopping_list', compact('PAGE_NAVIGATION'));
    }
 
 

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // if (!Gate::allows('system.shop.create')) {
        //     abort(403, "No estas autorizado para registrar información");
        // }

            // Validaciones personalizadas
            $validatedData = $request->validate([
                'product' => 'required|string',
                'name' => 'required|string',
                'supplier' => 'required|string',
                'email' => 'required|email',
            ]);

        $nombre = $request->input('txtName');
        return redirect('/shop')->with('Exito',  'La orden de compra ' . $nombre . ' guardado con éxito');
    }

    /**
     * Display the specified resource.
     */
    public function show(Shop $shop)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Shop $shop)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Shop $shop)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Shop $shop)
    {
        //
    }
}
