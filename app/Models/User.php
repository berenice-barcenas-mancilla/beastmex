<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use Haruncpi\LaravelUserActivity\Traits\Loggable;
class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

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
        'type'
    ];

    // ***************************************************
    // METHOD
    // ***************************************************

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
    ];




    /**
     * Mutators
     *
     * @var array<string, string>
     */
    protected function name():Attribute 
    {
        return new Attribute(
            set: function($value){
                return ucwords( strtolower($value) );
            }
        );
    }




    /**
     * Mutators
     *
     * @var array<string, string>
     */
    protected function lastName():Attribute 
    {
        return new Attribute(
            set: function($value){
                return ucwords( strtolower($value) );
            }
        );
    }




    /**
     * Mutators
     *
     * @var array<string, string>
     */
    protected function email():Attribute 
    {
        return new Attribute(
            set: function($value){
                return strtolower($value);
            }
        );
    }




    // ***************************************************
    // Relationship
    // ***************************************************



    /**
     * Usuario asociado a tiempo extra
     **/
    public function extratimes()
{
    return $this->hasMany(Extratime::class, 'user_id');
}



}