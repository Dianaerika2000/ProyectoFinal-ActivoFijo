<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Informe extends Model
{
    use HasFactory;
    protected $table='informes';
    protected $fillable=([
        'url',
        'descripcion',
        'fechaRealizada',
        'idReevaluo',
    ]);
    public $timestamps=false;

    public function reevaluo()
    {
        return $this->belongsTo(Reevaluo::class,'idReevaluo','id');
    }
}
