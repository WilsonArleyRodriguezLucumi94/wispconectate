<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Asignar Pago al Cliente</title>
    <!-- Agregar Bootstrap para estilos rápidos (opcional) -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h2>Asignar Pago al Cliente: {{ $cliente->nombre }} {{ $cliente->apellido }}</h2>

        <!-- Mostrar cualquier mensaje de éxito -->
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <!-- Formulario para asignar un pago al cliente -->
        <form action="{{ route('admin.storePago', $cliente->id) }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="fecha_pago">Fecha de Pago</label>
                <input type="date" name="fecha_pago" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="cantidad">Cantidad</label>
                <input type="number" name="cantidad" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="medio_pago">Medio de Pago</label>
                <input type="text" name="medio_pago" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-primary">Asignar Pago</button>
        </form>
    </div>
</body>
</html>
