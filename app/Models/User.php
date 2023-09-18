<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

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
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
    public function SubCounty()    {
        return $this->belongsto(SubCounty::class, 'sub_county', 'id');
    }
    public function PhoneNumber()
    {
        return $this->belongsTo(PhoneNumber::class, 'PhoneNumber', 'id');
    }
public function Town()
{
    return $this->belongsTo(Town::class, 'Town', 'id');
}
public function Roles()
   {
    return $this->belongsTo(Roles::class, 'Town', 'id');
   }
}
