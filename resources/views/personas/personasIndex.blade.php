@extends('layouts.mi-layout')

@section('contenido')
    <h1>Listado Personas</h1>
    <a href="{{ route('persona.create') }}">Agregar Persona</a>
    <br><br>

    <table border="1">
        <thead>
            <tr>
                <th>Área(s)</th>
                <th>ID</th>
                <th>Nombre</th>
                <th>Apellido Paterno</th>
                <th>Apellido Materno</th>
                <th>Código</th>
                <th>Teléfono</th>
                <th>Correo</th>
                <th>Nombre Completo</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($personas as $persona)
                <tr>
                    <td>
                        <ol>
                            @foreach($persona->areas as $area)
                                <li> {{ $area->nombre_area }} </li>
                            @endforeach
                        </ol>
                    </td>
                    <td>
                        <a href="{{ route('persona.show', $persona->id) }}">
                            {{ $persona->id }}
                        </a>
                    </td>
                    <td>{{ $persona->nombre }}</td>
                    <td>{{ $persona->apellido_paterno }}</td>
                    <td>{{ $persona->apellido_materno }}</td>
                    <td>{{ $persona->codigo }}</td>
                    <td>{{ $persona->telefono }}</td>
                    <td>{{ $persona->correo }}</td>
                    <td>{{ $persona->nombre_completo }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection