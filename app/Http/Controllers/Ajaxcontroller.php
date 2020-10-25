<?php

namespace App\Http\Controllers;
use LaravelLocalization;
use App\Http\Requests\offerrequest;
use App\models\Offer;
use App\Traits\OfferTrait;
use Illuminate\Http\Request;

class Ajaxcontroller extends Controller
{
   use OfferTrait;
    public function create(){
        return view('pages.ajaxinsert');
    }
   public function insert(offerrequest $request){

       $file_name= $this->saveimages($request->photo,'images/offers');
   $offer=    Offer::create([
           'photo'=>$file_name,
           'name_ar'=>$request->name_ar,
           'name_en'=>$request->name_en,
           'price'=>$request->price,
           'details_ar'=>$request->details_ar,
           'details_en'=>$request->details_en
       ]);
if($offer) {
    return response()->json(['statues'=>true,
        'msg'=>'its success'
        ]);
}
else{
    return response()->json(['statues'=>false,
        'msg'=>'please again'
    ]);
}
   }
    public function all(){
        $offers=Offer::select('id','name_'.LaravelLocalization::getCurrentLocale().' as name',
            'price',
            'details_'.LaravelLocalization::getCurrentLocale().' as details')->get();
        return view("pages.all-ajax",compact("offers"));
    }
    public function deleteoffet(Request $request ){
        $offer=Offer::find($request->id);
        if(!$offer)
            return response()->json(['statues'=>false,
                'msg'=>'again'
            ]);
        $offer->delete();
        return response()->json(['statues'=>true,
            'msg'=>'its success',
            'id'=>$request->id
        ]);    }
    public function edit($offer_id){
        $offer=Offer::find($offer_id);
        if(!$offer){
            return response()->json(['statues'=>false,
                'msg'=>'again'
            ]);
        }

        return view('pages.AjaxEdit',compact('offer'));
    }
    public function update(offerrequest $request){
        $offer=Offer::find($request->ofer_id);
        if(!$offer){
            return response()->json(['statues'=>false,
                'msg'=>'again'
            ]);
        }

        $offer->Update($request->all());

        return response()->json(['statues'=>true,
            'msg'=>'its success'
            ]);

    }
}
