<?php

namespace App\Http\Controllers;

use App\Models\Report;
use App\Models\Store;
use App\Models\Shop;
use App\Models\Seller;
use App\Models\Mannagement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\App;


class ReportController extends Controller
{
    /**
    * Create a new controller instance.
    *
    * @return void
    */
    
    public function __construct()
    {
        $this->middleware(function ($request, $next){
            if (!Gate::allows('system.reports.list')) {
                abort(403);
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

       $PAGE_NAVIGATION = "REPORTS";
        return view('admin.reports.reports_list', compact('PAGE_NAVIGATION'));
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Report $report)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Report $report)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Report $report)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Report $report)
    {
        //
    }

    public function generarReporteC(Request $request)
    {
        $pdf = App::make('dompdf.wrapper');

        $fechaini = $request->input('dateInit');

        $fechafin = $request->input('dateEnd');

        $allShops = Shop::whereBetween('fecha_compra', [$fechaini, $fechafin])->get();

        $pdf->loadView('admin.reports.pdf.reportecompras', compact('allShops','fechaini','fechafin'));

        return $pdf->stream();
    }

    public function generarReporteV(Request $request)
    {
        
    }

    public function generarReporteG(Request $request)
    {
        
    }

    public function generarReporteA(Request $request)
    {
        $pdf = App::make('dompdf.wrapper');

        $fechaini = $request->input('dateInit');

        $fechafin = $request->input('dateEnd');

        $allProducts = Store::whereBetween('fechaIngreso', [$fechaini, $fechafin])->get();

        $pdf->loadView('admin.reports.pdf.reportealmacen', compact('allProducts','fechaini','fechafin'));

        return $pdf->stream();
    }

    //Graphs

    public function generarGraficaC (Request $request){
        $PAGE_NAVIGATION = "REPORTS";

        $fechaini = $request->input('dateInit');

        $fechafin = $request->input('dateEnd');

        // Obtener datos desde Eloquent con condición whereBetween
        $compras = Shop::whereBetween('fecha_compra', [$fechaini, $fechafin])
            ->get(['product_id', 'amount']);

        // Transformar los datos según sea necesario
        $labels = $compras->pluck('product_id');
        $data = $compras->pluck('amount');

        return view('admin.forms.graphs.shop', compact('PAGE_NAVIGATION', 'labels', 'data'));
    }

    public function generarGraficaA (Request $request){
        $PAGE_NAVIGATION = "REPORTS";

        return view('admin.forms.graphs.store', compact('PAGE_NAVIGATION'));
    }

    public function generarGraficaV (Request $request){
        $PAGE_NAVIGATION = "REPORTS";

        return view('admin.forms.graphs.seller', compact('PAGE_NAVIGATION'));
    }

    public function generarGraficaG (Request $request){
        $PAGE_NAVIGATION = "REPORTS";

        return view('admin.forms.graphs.mannagement', compact('PAGE_NAVIGATION'));
    }
}

