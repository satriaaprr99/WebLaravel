<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'avatar', 'name', 'username', 'email', 'password',
    ];


    public function AvatarDefault(){

        if(!$this->avatar){
            return asset('uploads/default.png');
        }

        return asset('uploads/'.$this->avatar);

    }

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function tagihan()
    {
         return $this->hasOne(Tagihan::class);
    }
   
    public function kelas()
    {
         return $this->hasOne(Kelas::class);
    }

     public function angkatan()
    {
         return $this->hasOne(Angkatan::class);
    }

}
