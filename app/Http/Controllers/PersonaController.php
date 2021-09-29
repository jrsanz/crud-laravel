<?php

namespace App\Http\Controllers;

use App\Models\Persona;
use Illuminate\Http\Request;

class PersonaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('personas/personasIndex');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('personas/personasForm');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Validar Datos
        //Crear instancia del modelo
        //Asignar propiedades del modelo
        //Guardar
        //Redireccionar a index

        //Validar Datos
        $request->validate([
            'nombre' => 'required',
            'ap_pa' => 'required',
            'ap_ma' => 'required',
            'codigo' => 'required',
            'tel' => 'required|digits:10',
            'correo' => 'required|email',
        ]);

        //Crear instancia del modelo
        $persona = new Persona();

        //Asignar propiedades del modelo
        $persona->nombre = $request->nombre;
        $persona->apellido_paterno = $request->ap_pa;
        $persona->apellido_materno = $request->ap_ma;
        $persona->codigo = $request->codigo;
        $persona->telefono = $request->tel;
        $persona->correo = $request->correo;

        //Guardar
        $persona->save();

        //Redireccionar a index
        return redirect()->route('persona.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Persona  $persona
     * @return \Illuminate\Http\Response
     */
    public function show(Persona $persona)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Persona  $persona
     * @return \Illuminate\Http\Response
     */
    public function edit(Persona $persona)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Persona  $persona
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Persona $persona)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Persona  $persona
     * @return \Illuminate\Http\Response
     */
    public function destroy(Persona $persona)
    {
        //
    }
}
