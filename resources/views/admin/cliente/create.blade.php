<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Agregar Cliente</h1>
    <form action="{{ route('clientes.store') }}" method="POST">
        @csrf
        <label>Nombre:</label>
        <input type="text" name="nombre" required>
        
        <label>Apellido:</label>
        <input type="text" name="apellido" required>
        
        <label>Teléfono:</label>
        <input type="text" name="telefono" required>
        
        <label>Vereda:</label>
        <input type="text" name="vereda" required>
        
        <label>Dirección IP:</label>
        <input type="text" name="direccion_ip" required>
        
        <button type="submit">Guardar</button>
    </form>
</body>
</html>