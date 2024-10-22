<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});



Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
Route::get('/admin/estado-cuenta', [AdminController::class, 'estadoDeCuenta'])->name('admin.estado_cuenta');
Route::post('/admin/cliente', [AdminController::class, 'createCliente'])->name('admin.create_cliente');

Route::get('/clientes', [AdminController::class, 'index'])->name('clientes.index');         // Mostrar todos los clientes
Route::get('/admin/create', [AdminController::class, 'create'])->name('clientes.create'); // Formulario para crear un nuevo cliente
Route::post('/admin', [AdminController::class, 'store'])->name('clientes.store');         // Guardar nuevo cliente
Route::get('/admin/{cliente}', [AdminController::class, 'show'])->name('clientes.show');   // Mostrar detalles de un cliente específico
Route::get('/admin/{cliente}/edit', [AdminController::class, 'edit'])->name('clientes.edit'); // Formulario para editar cliente
Route::put('/admin/{cliente}', [AdminController::class, 'update'])->name('clientes.update');  // Actualizar cliente
Route::delete('/admin/{cliente}', [AdminController::class, 'destroy'])->name('clientes.destroy'); // Eliminar cliente


// Mostrar el formulario para asignar un pago a un cliente
Route::get('/admin/{cliente}/pago/create', [AdminController::class, 'createPago'])->name('admin.createPago');

// Procesar el formulario para asignar un pago
Route::post('/admin/{cliente}/pago', [AdminController::class, 'storePago'])->name('admin.storePago');