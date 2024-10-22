<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Editar Cliente</h1>
    <form action="{{ route('clientes.update', $cliente->id) }}" method="POST">
        @csrf
        @method('PUT')
        
        <label>Nombre:</label>
        <input type="text" name="nombre" value="{{ $cliente->nombre }}" required>
        
        <label>Apellido:</label>
        <input type="text" name="apellido" value="{{ $cliente->apellido }}" required>
        
        <label>Teléfono:</label>
        <input type="text" name="telefono" value="{{ $cliente->telefono }}" required>
        
        <label>Vereda:</label>
        <input type="text" name="vereda" value="{{ $cliente->vereda }}" required>
        
        <label>Dirección IP:</label>
        <input type="text" name="direccion_ip" value="{{ $cliente->direccion_ip }}" required>
        
        <button type="submit">Actualizar</button>
    </form>
</body>
</html>