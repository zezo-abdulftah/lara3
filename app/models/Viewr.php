<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Viewr extends Model
{
    protected $table="Viewr";
    protected $fillable=['name','viewer'];
  public $timestamps=false;
}
