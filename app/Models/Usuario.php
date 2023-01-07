<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class Usuario extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    protected $table='usuarios';
    protected $fillable = [
        'nombre',
        'apellido',
        'genero',
        'nacionalidad',
        'ci',
        'celular',
        'direccion',
        'email',
        'foto',
        'password',
        'tipo_usuario',
        'letra',
        'color',
    ];


    public $timestamps = false;

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /*
    public function getPassword($password)
    {
        return decrypt($password);
    }
    */
}
