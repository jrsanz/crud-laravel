<?php

namespace App\Http\Controllers;

use App\Models\Persona;
use App\Models\Area;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;


class PersonaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('index');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$personas = Persona::all();  //Recupera toda la información de la tabla personas

        $personas = Persona::with('areas')->get();  //Elimina el problema de n+1 consultas (reduce las consultas SQL que se hacen en el sistema)

        //$personas = Auth::user()->personas()->get();  //Recupera la información de las personas que creó un usuario

        return view('personas/personasIndex', compact('personas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $areas = Area::all();
        return view('personas/personasForm', compact('areas'));
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
            'apellido_paterno' => 'required',
            'apellido_materno' => 'required',
            'codigo' => 'required',
            'telefono' => 'required|digits:10',
            'correo' => 'required|email',
        ]);

        $request->merge([
            'user_id' => Auth::id(),
        ]);

        //Crear registro utilizando el modelo
        $persona = Persona::create($request->all());
        $persona->areas()->attach($request->area_id);  //Al guardar una persona también lo guardará en la relación area_persona

        //Crear instancia del modelo
        /*$persona = new Persona();

        //Asignar propiedades del modelo
        $persona->nombre = $request->nombre;
        $persona->apellido_paterno = $request->ap_pa;
        $persona->apellido_materno = $request->ap_ma;
        $persona->codigo = $request->codigo;
        $persona->telefono = $request->tel;
        $persona->correo = $request->correo;

        //Guardar
        $persona->save();*/

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
        $areas = Area::all();
        return view('personas.personasForm', compact('persona', 'areas'));
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
            'apellido_paterno' => 'required',
            'apellido_materno' => 'required',
            'codigo' => ['required', Rule::unique('personas')->ignore($persona->id)],
            'telefono' => 'required|digits:10',
            'correo' => 'required|email',
        ]);

        /*
        //No se crea la instancia debido a que se recibe como parámetro

        //Asignar propiedades del modelo
        $persona->nombre = $request->nombre;
        $persona->apellido_paterno = $request->apellido_paterno;
        $persona->apellido_materno = $request->apellido_materno;
        $persona->codigo = $request->codigo;
        $persona->telefono = $request->telefono;
        $persona->correo = $request->correo;

        //Guardar
        $persona->save();
        */

        //Actualiza todos los campos excepto el token y el method
        Persona::where('id', $persona->id)->update($request->except('_token', '_method', 'area_id'));

        $persona->areas()->sync($request->area_id);  //Se deja la relación que ya se tenía

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
        $persona->delete();
        return redirect()->route('persona.index');
    }
}
