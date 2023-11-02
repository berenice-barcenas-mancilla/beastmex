<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\Casts\Attribute;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable,HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'last_name',
        'email',
        'status',
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
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    /**
     * Mutator: Convierte el nombre en formato "Title Case" (inicial de cada palabra en mayúscula).
     *
     * @var array<string, string>
     */
    protected function name(): Attribute
    {
        return new Attribute(
            set: function ($value) {
                return ucwords(strtolower($value));
            }
        );
    }

    /**
     * Mutator: Convierte el apellido en formato "Title Case" (inicial de cada palabra en mayúscula).
     *
     * @var array<string, string>
     */
    protected function lastName(): Attribute
    {
        return new Attribute(
            set: function ($value) {
                return ucwords(strtolower($value));
            }
        );
    }

    /**
     * Mutator: Convierte el correo electrónico a minúsculas.
     *
     * @var array<string, string>
     */
    protected function email(): Attribute
    {
        return new Attribute(
            set: function ($value) {
                return strtolower($value);
            }
        );
    }

}
