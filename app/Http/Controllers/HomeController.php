<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
class HomeController extends Controller
{
    /**
     * Dirige a la vista del dashboard además de adjuntar la gráfica de los empleados activos en los ultimos 30 días
     */
    public function index()
    {
        $PAGE_NAVIGATION = "DASHBOARD";
        return view('dashboard', compact('PAGE_NAVIGATION'));
    }
}
