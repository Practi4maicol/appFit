<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Weighlifting
 *
 * @property $id
 * @property $nombre
 * @property $descripción
 * @property $peso
 * @property $repeticionMaxima
 * @property $fecha
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Weighlifting extends Model
{
    
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['nombre', 'descripción', 'peso', 'repeticionMaxima', 'fecha'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
}
