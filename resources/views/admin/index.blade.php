<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Listado de Clientes</h1>
    <a href="{{ route('clientes.create') }}">Agregar Cliente</a>

    @if ($message = Session::get('success'))
        <p>{{ $message }}</p>
    @endif

    <table>
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Teléfono</th>
                <th>Vereda</th>
                <th>Dirección IP</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($clientes as $cliente)
                <tr>
                    <td>{{ $cliente->nombre }}</td>
                    <td>{{ $cliente->apellido }}</td>
                    <td>{{ $cliente->telefono }}</td>
                    <td>{{ $cliente->vereda }}</td>
                    <td>{{ $cliente->direccion_ip }}</td>
                    <td>
                        <a href="{{ route('clientes.edit', $cliente->id) }}">Editar</a>
                        <form action="{{ route('clientes.destroy', $cliente->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>