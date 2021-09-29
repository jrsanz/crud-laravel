<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario</title>

    <link rel="stylesheet" type="text/css" href="{{ asset('css/form.css') }}">
</head>
<body>
    <div class="contenedor">
        <h1>Formulario para Crear Personas</h1>
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

        <form action="{{ route('persona.store') }}" method="POST">
            @csrf

            <label for="nombre">Nombre</label><br>
            <input type="text" name="nombre" required>
            <br><br>
            <label for="ap_pa">Apellido Paterno</label><br>
            <input type="text" name="ap_pa" required>
            <br><br>
            <label for="ap_ma">Apellido Materno</label><br>
            <input type="text" name="ap_ma" required>
            <br><br>
            <label for="codigo">Código</label><br>
            <input type="text" name="codigo" required>
            <br><br>
            <label for="tel">Teléfono</label><br>
            <input type="text" name="tel" maxlength="10" required>
            <br><br>
            <label for="correo">Correo</label><br>
            <input type="email" name="correo" required>
            <br><br>
            <input type="submit" value="Enviar Datos">
        </form>
    </div>
</body>
</html>