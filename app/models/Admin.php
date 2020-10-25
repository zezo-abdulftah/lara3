<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;


use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Config;
use Illuminate\Notifications\Notifiable;


class Admin extends Authenticatable
{
    protected $table="admins";
    protected $guard = 'admin';
    protected $fillable=['email','password'];
    protected $hidden=['created_at','updated_at'];

}
