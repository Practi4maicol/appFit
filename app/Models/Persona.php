<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Persona
 *
 * @property $id
 * @property $nombre
 * @property $apellido
 * @property $edad
 * @property $peso
 * @property $altura
 * @property $inicioEntrenamiento
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Persona extends Model
{

    static $rules = [

        'nombre' => 'required',
        'apellido' => 'required',
        'edad' => 'required',
        'peso' => 'required',
        'altura' => 'required',
        'inicioEntrenamiento' => 'required',
    ];
    
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['nombre', 'apellido', 'edad', 'peso', 'altura', 'inicioEntrenamiento'];


    /**realacion entre user y personas */
    public function user()
    {
        return $this->belongsTo(User::class);
    }


}
