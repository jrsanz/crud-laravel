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
        $personas = Persona::all();  //Recupera toda la información de la tabla personas

        return view('personas/personasIndex', compact('personas'));
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
        return view('personas.personasShow', compact('persona'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Persona  $persona
     * @return \Illuminate\Http\Response
     */
    public function edit(Persona $persona)
    {
        return view('personas.personasForm', compact('persona'));
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
        //Validar Datos
        $request->validate([
            'nombre' => 'required',
            'ap_pa' => 'required',
            'ap_ma' => 'required',
            'codigo' => 'required',
            'tel' => 'required|digits:10',
            'correo' => 'required|email',
        ]);

        //No se crea la instancia debido a que se recibe como parámetro

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
        return redirect()->route('persona.show', $persona);
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
