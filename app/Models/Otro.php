<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Otro
 *
 * @property $id
 * @property $descripción
 * @property $fecha
 * @property $datosFinales
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Otro extends Model
{
    
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['descripción', 'fecha', 'datosFinales'];


    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
