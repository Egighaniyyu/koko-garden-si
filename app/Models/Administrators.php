<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class Administrators extends Authenticatable
{
    protected $table = 'tb_administrator';
    protected $primaryKey = 'id_administrator';
    // protected $guard = 'administrator';

    use HasFactory, Notifiable;


    protected $fillable = [
        'nama',
        'username',
        'email',
        'password',
        'no_hp',
    ];


    protected $hidden = [
        'password',
        // 'remember_token',
    ];

    public function setPasswordAttribute($val)
    {
        return $this->attributes['password'] = bcrypt($val);
    }
    // protected $casts = [
    //     'email_verified_at' => 'datetime',
    // ];
}
