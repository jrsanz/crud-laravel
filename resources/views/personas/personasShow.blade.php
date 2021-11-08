<x-mi-layout>
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
    <hr>
    <a href="{{ route('enviar-correo') }}">Enviar correo</a>
</x-mi-layout>