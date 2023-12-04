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
        $this->middleware(function ($request, $next) {

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
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if (!$request->hasFile('photo') || !$request->file('photo')->isValid()) {
            return redirect('/store')->with('Error', 'Por favor, seleccione un archivo de imagen válido.');
        }

        $imageName = $request->txtSerialNumber . '_' . time() . '.' . $request->file('photo')->extension();
        $request->file('photo')->move(public_path('images'), $imageName);

        $addProducto = new Store();
        $addProducto->nombre = $request->input('txtName');
        $addProducto->noDeSerie = $request->input('txtSerialNumber');
        $addProducto->marca = $request->input('brand');
        $addProducto->stock = $request->input('txtStock');
        $addProducto->costoCompra = $request->input('txtPurchaseCost');
        $addProducto->precioVenta = $request->input('txtPurchaseCost') + ($request->input('txtPurchaseCost') * 0.55);
        $addProducto->fechaIngreso = $request->input('txtEntryDate');
        $addProducto->foto = $imageName;
        $addProducto->estatus = $request->input('status');
        $addProducto->save();
        return redirect('/store')->with('Exito', 'El producto ' . $addProducto->nombre . ' se ha registrado con éxito');
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
        return redirect('/store')->with('Exito', 'El producto ' . $updateProducto->nombre . ' se ha actualizado con éxito');

    }
    /**
     * change the status from storage.
     */
    public function updateStatus(Request $request, $id)
    {
        if (!Gate::allows('system.store.status')) {
            abort(403, "No estás autorizado para registrar información");
        }

        $statusProducto = Store::findOrFail($id);
        $statusProducto->estatus = $statusProducto->estatus == 0 ? 1 : 0;

        $statusProducto->update();
        return redirect('/store')->with('Exito', 'El producto ' . $statusProducto->nombre . ' se ha actualizado con éxito');
    }


    public function search(Request $request)
    {
        $query = $request->input('query');
        $results = Store::where('nombre', 'like', '%' . $query . '%')
            ->orWhere('noDeSerie', 'like', '%' . $query . '%')
            ->get();
        return response()->json($results);
    }


    /***********************************
     *SHOPS METHODS
     ************************************/
    public function getStores(Request $request)
    {
        // Obtiene la lista de compras
        $stores = Store::getStores();
        // Retorna la lista de compras en formato JSON
        return response()->json(['data' => $stores]);
    }

    /**
     * Permite consultar un compras extrayendo toda su información.
     * @param  \App\Models\Store $store 
     * @return \Illuminate\Http\Response
     */
    public function getInfo(Store $store)
    {
        // Verifica si el compras existe
        if (!isset($store->id)) {
            return response()->json(['exito' => false]);
        } else {
            // Retorna la información del compras en formato JSON
            return response()->json(['exito' => true, 'shop' => $store]);

        }
    }

    public function search(Request $request)
    {
        $query = $request->input('query');
        $results = Store::where('nombre', 'like', '%' . $query . '%')
            ->orWhere('noDeSerie', 'like', '%' . $query . '%')
            ->get();
        return response()->json($results);
    }




}


