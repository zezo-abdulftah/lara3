<?php

namespace App\Http\Controllers\front;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
class zezo extends Controller
{
public function home(){
    return view('pages/home');
}
    public function logg(){
    $datas=date("y-m-d");
    $dtes=["name"=>"ziad","age"=>15];
        return view('pages/login',compact("dtes"))->with("daata",$datas);
    }
}
