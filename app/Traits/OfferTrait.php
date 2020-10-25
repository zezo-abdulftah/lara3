<?php

namespace app\Traits;



use PhpParser\Builder\Trait_;

Trait OfferTrait
{
    function saveimages($photo,$folder){
       $file=$photo->getClientOriginalExtension();
       $file_name=time().'.'.$file;
       $path=$folder;
       $photo->move($path,$file_name);
       return $file_name;
   }
}
