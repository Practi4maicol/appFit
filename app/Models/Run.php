<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Run
 *
 * @property $id
 * @property $descripción
 * @property $distancia
 * @property $fecha
 * @property $tiempoCompletado
 * @property $pesoExtra
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Run extends Model
{
    
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['descripción', 'distancia', 'fecha', 'tiempoCompletado', 'pesoExtra'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
