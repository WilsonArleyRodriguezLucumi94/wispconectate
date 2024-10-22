<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Estado de Cuenta de los Clientes</h1>
        <table>
            <thead>
                <tr>
                    <th>Cliente</th>
                    <th>Último Pago</th>
                    <th>Días sin Pagar</th>
                </tr>
            </thead>
            <tbody>
                @foreach($estado_cuenta as $cuenta)
                <tr>
                    <td>{{ $cuenta['cliente']->nombre }} {{ $cuenta['cliente']->apellido }}</td>
                    <td>{{ $cuenta['ultimo_pago'] }}</td>
                    <td>{{ $cuenta['dias_sin_pagar'] }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
</body>
</html>