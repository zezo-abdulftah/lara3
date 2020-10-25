<?php

namespace App;



use Illuminate\Foundation\Auth\user as Authenticatable;
use Config\auth;
use Illuminate\Notifications\Notifiable;
use PhpParser\Node\Expr\AssignOp\Mod;


class Admin extends Authenticatable
{
    use Notifiable;
    protected $table="admins";
    protected $guard = 'admin';
    protected $fillable=['email','password'];
    protected $hidden = [
        'password', 'remember_token','created_at','updated_at'
    ];


}
