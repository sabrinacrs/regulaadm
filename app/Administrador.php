<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Administrador extends Model
{
    //
    protected $table = 'users';
    protected $fillable = [
        'name', 'email', 'password', 'status'
    ];
    protected $hidden = [
        'password', 'remember_token',
    ];
}
