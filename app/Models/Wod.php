<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Wod
 *
 * @property $id
 * @property $descripción
 * @property $tiempoCompletado
 * @property $fechaRealizado
 * @property $pesoUtilizado
 * @property $rondasCompletadas
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Wod extends Model
{
    
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['descripción', 'tiempoCompletado', 'fechaRealizado', 'pesoUtilizado', 'rondasCompletadas'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
}
