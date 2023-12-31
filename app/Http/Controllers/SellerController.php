<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Seller;
use App\Models\Store;
use Administration\Users\Create\Add;
use Administration\Users\Update\Adjust;
use PDF;


use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Cart;

use Spatie\Permission\Models\Role;

class SellerController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    
    public function __construct()
    {
        $this->middleware(function ($request, $next){
            
            if (!Gate::allows('system.seller.list')) {
                abort(403, "No estas autorizado de acceder a esta zona");
            }

            return $next($request);
        });
    }

    
    /**
     * Display a listing of sells.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexVentas()
    {
        $PAGE_NAVIGATION = "SELLER";
        $sells = Seller::all();

        return view('admin.ventas.ventas_dashboard', compact('PAGE_NAVIGATION', 'sells'));
    }


    /**
     * Display a listing of products.
     *
     * @return \Illuminate\Http\Response
     */
    public function productos_list(Request $request)
    {
        $PAGE_NAVIGATION = "SELLER";
        /* $roles = Role::where('id', '!=', 1)->orderBy('name')->get(['id', 'name']); */

        $searchby = $request->get('searchby');
        $allProducts = Store::where('nombre', 'like', '%' . $searchby . '%')
            ->orWhere('marca', 'like', '%' . $searchby . '%')
            ->orderBy('id', 'asc')
            ->paginate(10);

        return view('admin.ventas.ventas_list', compact('PAGE_NAVIGATION', 'allProducts', 'searchby'));
    }

       /**
     * Display a listing of products.
     *
     * @return \Illuminate\Http\Response
     */
    public function productos_add()
    {

        return redirect('/seller/products')->with('confirmacion','Producto agregado con éxito');
    }

       /**
     * Display a listing of products.
     *
     * @return \Illuminate\Http\Response
     */
    public function venta_add()
    {

        return redirect('/seller/products')->with('confirmacionVenta','Venta realizada con éxito');
    }

    

    
    public function generatePDF(string $id)
{
    $sellers = DB::table('seller')->where('id', $id)->get(); // Assuming you want multiple records
    
    $pdf = PDF::loadView('admin.ventas.pdf', [
        'sellers' => $sellers,
    ]);

    return $pdf->stream('prueba.pdf');
}



}
