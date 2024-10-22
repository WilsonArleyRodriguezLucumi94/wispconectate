<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Estado de Cuenta de los Clientes</title>
    <!-- Agregar Bootstrap para estilos rápidos (opcional) -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h1>Estado de Cuenta de los Clientes</h1>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Cliente</th>
                    <th>Último Pago</th>
                    <th>Días sin Pagar</th>
                    <th>Acción</th>
                </tr>
            </thead>
            <tbody>
                @foreach($estado_cuenta as $cuenta)
                <tr>
                    <td>{{ $cuenta['cliente']->nombre }} {{ $cuenta['cliente']->apellido }}</td>
                    <td>{{ $cuenta['ultimo_pago'] }}</td>
                    <td>{{ $cuenta['dias_sin_pagar'] }}</td>
                    <td>
                        <!-- Botón para asignar pago -->
                        <a href="{{ route('admin.createPago', $cuenta['cliente']->id) }}" class="btn btn-primary">
                            Asignar Pago
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
