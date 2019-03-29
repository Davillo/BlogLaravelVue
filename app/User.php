<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'name', 'email', 'password','autor'
    ];

   
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function artigos(){
        return $this->hasMany('App\Artigo');
    }
}
