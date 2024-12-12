<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Cuerpo
 *
 * @property $id
 * @property $user_id
 * @property $bicepDer
 * @property $bicepIzq
 * @property $pecho
 * @property $abdomen
 * @property $piernaDer
 * @property $piernaIzq
 * @property $nalgas
 * @property $pantorrillas
 * @property $fecha
 * @property $created_at
 * @property $updated_at
 *
 * @property User $user
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Cuerpo extends Model
{
    
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['user_id', 'bicepDer', 'bicepIzq', 'pecho', 'abdomen', 'piernaDer', 'piernaIzq', 'nalgas', 'pantorrillas', 'fecha'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(\App\Models\User::class, 'user_id', 'id');
    }
    
}
