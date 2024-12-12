<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
     /**relacion con cada tabla de mi crud */
    public function personas()
    {
        return $this->hasOne(Persona::class);
    }
    public function benchmarks()
    {
        return $this->hasMany(Benchmark::class);
    }
    public function wods()
    {
        return $this->hasMany(Wod::class);
    }
    public function runs()
    {
        return $this->hasMany(Run::class);
    }
    public function otros()
    {
        return $this->hasMany(Otro::class);
    }
    public function weighliftings()
    {
        return $this->hasMany(Weighlifting::class);
    }

}
