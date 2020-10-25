<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
protected $table="offer";
    protected $fillable=['name_ar','name_en','price','details_ar','details_en','photo'];
    protected $hidden=['created_at','updated_at'];
}
