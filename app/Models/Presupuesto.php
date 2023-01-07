<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Presupuesto extends Model
{
    use HasFactory;
    protected $table='reevaluo';
    protected $fillable=[
        'id_usuario',
        'id_costo',
        'fecha',
        'nombre',
        'cantidadlote',
        'montototal',
        'estado',
    ];
    public function usuario(){
        return $this->BelongsTo(Usuario::class, 'id_usuario','id');
    }

    public function costo(){
        return $this->BelongsTo(Costo::class, 'id_costo','id');
    }
}
