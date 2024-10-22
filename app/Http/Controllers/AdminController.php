<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Pago;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    // Ver clientes con sus pagos
    public function index()
    {   
        $clientes = Cliente::all();
        //$clientes = Cliente::with('pagos')->get();
        return view('admin.index', compact('clientes'));
    }
    // Ver clientes con sus pagos
    public function index_pagos()
    {   
        //$clientes = Cliente::all();
        $clientes = Cliente::with('pagos')->get();
        return view('admin.index_pagos', compact('clientes'));
    }

    // Estado de cuenta de los clientes
    public function estadoCuenta()
    {
        $clientes = Cliente::with(['pagos' => function ($query) {
            $query->orderBy('fecha_pago', 'desc');
        }])->get();

        $estado_cuenta = $clientes->map(function($cliente) {
            $ultimo_pago = $cliente->pagos->first();
            if ($ultimo_pago) {
                $dias_sin_pagar = now()->diffInDays($ultimo_pago->fecha_pago);
                return [
                    'cliente' => $cliente,
                    'ultimo_pago' => $ultimo_pago->fecha_pago,
                    'dias_sin_pagar' => $dias_sin_pagar
                ];
            } else {
                return [
                    'cliente' => $cliente,
                    'ultimo_pago' => 'Nunca ha realizado un pago',
                    'dias_sin_pagar' => 'No aplica'
                ];
            }
        });

        return view('admin.estado_cuenta', compact('estado_cuenta'));
    }

    // Crear un cliente
    public function createCliente(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'apellido' => 'required',
            'telefono' => 'required',
            'vereda' => 'required',
            'direccion_ip' => 'required|ip',
        ]);

        Cliente::create($request->all());
        return redirect()->back()->with('success', 'Cliente creado con éxito');
    }

     // Mostrar formulario de creación
     public function create()
     {
         return view('admin.cliente.create');
     }
    
     public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'apellido' => 'required',
            'telefono' => 'required',
            'vereda' => 'required',
            'direccion_ip' => 'required',
        ]);

        Cliente::create($request->all());
        return redirect()->route('admin.index')
                         ->with('success', 'Cliente agregado exitosamente');
    }

    public function edit($id)
    {
        $cliente = Cliente::find($id);
        return view('admin.cliente.edit', compact('cliente'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required',
            'apellido' => 'required',
            'telefono' => 'required',
            'vereda' => 'required',
            'direccion_ip' => 'required',
        ]);

        $cliente = Cliente::find($id);
        $cliente->update($request->all());

        return redirect()->route('admin.index')
                         ->with('success', 'Cliente actualizado exitosamente');
    }

    public function destroy($id)
    {
        $cliente = Cliente::find($id);
        $cliente->delete();

        return redirect()->route('admin.index')
                         ->with('success', 'Cliente eliminado exitosamente');
    }

    // Función para mostrar el formulario de asignación de pago
    public function createPago($cliente_id)
    {
        $cliente = Cliente::findOrFail($cliente_id); // Buscar el cliente por ID
        return view('admin.asignarPago', compact('cliente')); // Pasar el cliente a la vista
    }

    // Función para almacenar el pago asignado a un cliente
    public function storePago(Request $request, $cliente_id)
    {
        $cliente = Cliente::findOrFail($cliente_id); // Encontrar el cliente
    // Crear un nuevo pago y asociarlo con el cliente
    Pago::create([
        'cliente_id' => $cliente->id,
        'fecha_pago' => $request->fecha_pago,
        'cantidad' => $request->cantidad,
        'medio_pago' => $request->medio_pago,
    ]);

    return redirect()->route('admin.estadoCuenta')->with('success', 'Pago asignado correctamente');
    }

}
