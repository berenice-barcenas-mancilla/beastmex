<?php
namespace App\Http\Controllers;
use App\Models\Store;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;
class StoreController extends Controller
{
    /**
    * Create a new controller instance.
    *
    * @return void
    */
    public function __construct()
    {
        $this->middleware(function ($request, $next){
             
            if (!Gate::allows('system.store.list')) {
                abort(403, "No estas autorizado de acceder a esta zona");
            }
 
            return $next($request);
        });
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $PAGE_NAVIGATION = "STORE";
        $allProducts = Store::all();
        return view('admin.store.storeproducts_list', compact('PAGE_NAVIGATION', 'allProducts'));
    }

    public function index_products()
    {
        $PAGE_NAVIGATION = "STORE";
        $allProducts = Store::all();
        return view('admin.store.storeproducts_list', compact('PAGE_NAVIGATION', 'allProducts'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        if (!Gate::allows('system.store.create')) {
            abort(403, "No estas autorizado para registrar información");
        }
            $validatedData = $request->validate([
                'txtName' => 'required|string',
                'txtSerialNumber' => 'required|integer',
                'txtStock' => 'required|integer',
                'brand' => 'required',
                'txtPurchaseCost' => 'required|numeric',
                
            ]);
            // $imageName = time() . '.' . $request->txtPhoto->extension();
            // $request->txtPhoto->move(public_path('images'), $imageName);



        $addProducto = new Store();
        $addProducto->nombre = $request->input('txtName');
        $addProducto->noDeSerie = $request->input('txtSerialNumber');
        $addProducto->marca = $request->input('brand');
        $addProducto->stock = $request->input('txtStock');
        $addProducto->costoCompra = $request->input('txtPurchaseCost');
        $addProducto->precioVenta = $request->input('txtPurchaseCost') + ($request->input('txtPurchaseCost') * 0.55);
        $addProducto->fechaIngreso = $request->input('txtEntryDate');       
        $addProducto->foto = 'foto';
        $addProducto->estatus = $request->input('status');
        $addProducto->save();
        return redirect('/store')->with('Exito',  'El producto ' . $addProducto->nombre . ' se ha registrado con éxito');
    }
    /**
     * Display the specified resource.
     */
    public function show(Store $store)
    {
        //
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Store $store)
    {
        //
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        if (!Gate::allows('system.store.edit')) {
            abort(403, "No estas autorizado para registrar información");
        }
        $updateProducto = Store::findOrFail($id);
        $updateProducto->nombre = $request->input('txtName');
        $updateProducto->noDeSerie = $request->input('txtSerialNumber');
        $updateProducto->marca = $request->input('brand');
        $updateProducto->stock = $request->input('txtStock');
        $updateProducto->costoCompra = $request->input('txtPurchaseCost');
        $updateProducto->precioVenta = $request->input('txtPurchaseCost') + ($request->input('txtPurchaseCost') * 0.55);
        $updateProducto->fechaIngreso = $request->input('txtEntryDate');
        $updateProducto->estatus = $request->input('status');
        $updateProducto->update();
        return redirect('/store')->with('Exito',  'El producto ' . $updateProducto->nombre . ' se ha actualizado con éxito');
        

            }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Store $store)
    {
        //
    }
}
