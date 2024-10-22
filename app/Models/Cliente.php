<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;

    protected $fillable = ['nombre', 'apellido', 'telefono', 'vereda', 'direccion_ip'];

    public function pagos()
    {
        return $this->hasMany(Pago::class);
    }
}
