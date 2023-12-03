<?php

namespace App\Http\Controllers;

use App\Models\Report;
use App\Models\Store;
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
}
