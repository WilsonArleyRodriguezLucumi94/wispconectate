<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pago extends Model
{
    use HasFactory;

    // Relación inversa con cliente
    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }

    // Definir los campos que se pueden llenar en la asignación del pago
    protected $fillable = [
        'cliente_id',
        'fecha_pago',
        'cantidad',
        'medio_pago',
    ];
}
