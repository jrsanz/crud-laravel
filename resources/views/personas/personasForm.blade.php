<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario</title>

    <link rel="stylesheet" type="text/css" href="{{ asset('css/form.css') }}">
</head>
<body>
    <div class="contenedor">
        <h1>Formulario para {{ isset($persona) ? 'Editar' : 'Crear' }} Personas</h1>
        <br><br>

        @if ($errors->any())
            <div class="alerta">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if(isset($persona))
            <form action="{{ route('persona.update', $persona) }}" method="POST">
            @method('PATCH')
        @else
            <form action="{{ route('persona.store') }}" method="POST">
        @endif
            
            @csrf

            <label for="nombre">Nombre</label><br>
            <input type="text" name="nombre" value="{{ $persona->nombre ?? '' }}" required>
            <br><br>
            <label for="ap_pa">Apellido Paterno</label><br>
            <input type="text" name="apellido_paterno" value="{{ $persona->apellido_paterno ?? '' }}" required>
            <br><br>
            <label for="ap_ma">Apellido Materno</label><br>
            <input type="text" name="apellido_materno" value="{{ $persona->apellido_materno ?? '' }}" required>
            <br><br>
            <label for="codigo">Código</label><br>
            <input type="text" name="codigo" value="{{ $persona->codigo ?? '' }}" required>
            <br><br>
            <label for="tel">Teléfono</label><br>
            <input type="text" name="telefono" maxlength="10" value="{{ $persona->telefono ?? '' }}" required>
            <br><br>
            <label for="correo">Correo</label><br>
            <input type="email" name="correo" value="{{ $persona->correo ?? '' }}" required>
            <br><br>
            <label for="area_id">Área</label><br>
            <select name="area_id[]" multiple>
                @foreach($areas as $area)
                    <option value="{{ $area->id }}" {{ array_search($area->id, $persona->areas->pluck('id')->toArray()) === false ? '' : 'selected' }} >{{ $area->nombre_area }}</option>
                @endforeach
            </select>
            <br><br>
            <input type="submit" value="Enviar Datos">
        </form>
        <br>
    </div>
</body>
</html>