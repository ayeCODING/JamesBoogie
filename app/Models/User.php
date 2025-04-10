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
        'name', 'email', 'password', 'phone', 
        'province', 'city', 'address', 'postal_code',
        'avatar', 'bio', 'last_login_at'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function keranjangs()
{
    return $this->hasMany(Keranjang::class);
}

}
