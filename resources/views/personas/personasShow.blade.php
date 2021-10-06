<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Información</title>
</head>
<body>
    <h1>Información de {{ $persona->nombre }}</h1>

    <a href="{{ route('persona.index') }}">Listado de Personas</a>
    <ul>
        <li>{{ $persona->apellido_paterno }}  {{ $persona->apellido_materno }}</li>
        <li>{{ $persona->codigo }}</li>
        <li>{{ $persona->telefono }}</li>
        <li>{{ $persona->correo }}</li>
    </ul>
    <hr>
    <a href="{{ route('persona.edit', $persona) }}">Editar</a>
    <br>
    <hr>
    <br>
    <form action="{{ route('persona.destroy', $persona) }}" method="POST">
        @method('DELETE')
        @csrf
        <input type="submit" value="Eliminar">
    </form>
</body>
</html>