@extends('layout.admin') {{-- Asegúrate de que la ruta sea correcta --}}

@section('title', 'Lista de Clientes')

@section('content')
    <h1>Listado de Clientes</h1>
    <a href="{{ route('clientes.create') }}">Agregar Cliente</a>

    @if ($message = Session::get('success'))
        <p>{{ $message }}</p>
    @endif
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                    LISTADO DE CLIENTES
            </div>
            <div class="card-body">
                <table id="datatablesSimple">
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
                                <td class="d-flex">
                                    <!-- Botón de Editar -->
                                    <a href="{{ route('clientes.edit', $cliente->id) }}" class="btn btn-primary btn-sm mr-2">Editar</a>

                                    <!-- Botón de Eliminar con un formulario -->
                                    <form action="{{ route('clientes.destroy', $cliente->id) }}" method="POST" onsubmit="return confirm('¿Estás seguro de que deseas eliminar este cliente?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
        </div>
@endsection