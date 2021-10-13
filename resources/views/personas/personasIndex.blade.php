<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado Personas</title>
</head>
<body>
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
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>