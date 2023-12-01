<?php

namespace App\Http\Controllers;

use App\Models\Management;
use Illuminate\Http\Request;

class ManagementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $PAGE_NAVIGATION = "MANAGEMENT";

        return view('admin.gerencia.indexgerencia',compact('PAGE_NAVIGATION'));
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
        // Validaciones personalizadas
        $validatedData = $request->validate([
            'name' => 'required|string',
            'last_name' => 'required|string',
            'email' => 'required|email',
            'group' => 'required|string',
            'password' => 'required|string',
            'password_confirmation' => 'required|string',

        ]);

        $nombre = $request->input('txtName');
        return redirect('/gerencia')->with('Exito',  'El usuario ' . $nombre . ' guardado con éxito');
    }

    /**
     * Display the specified resource.
     */
    public function show(Management $management)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Management $management)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Management $management)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Management $management)
    {
        //
    }
}
