<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Benchmark
 *
 * @property $id
 * @property $nombre
 * @property $descripción
 * @property $tiempoCompletado
 * @property $fechaRealizado
 * @property $rondasCompletadas
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Benchmark extends Model
{
    
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['nombre', 'descripción', 'tiempoCompletado', 'fechaRealizado', 'rondasCompletadas'];


    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
