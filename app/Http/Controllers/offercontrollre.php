<?php

namespace App\Http\Controllers;

use App\Events\vidioviewer;
use App\Http\Requests\offerrequest;
use App\models\Offer;
use App\models\Viewr;
use Carbon\Traits\ObjectInitialisation;
use Illuminate\Http\Request;
use LaravelLocalization;
use App\Traits\OfferTrait;
use function GuzzleHttp\Psr7\_parse_message;


class offercontrollre extends Controller
{
    use OfferTrait;

    public function offer(){
       return Offer::get();
    }
    public function show(){
        return view("pages.restore");
    }
    public function done(offerrequest $request ){
       /* $ggg=$this->check();
        $massege=$this->get_massge();
        $validator=validator($request->all(),$ggg,$massege);
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInputs($request->all());
        }
       */



       $file_name= $this->saveimages($request->photo,'images/offers');

       Offer::create([
           'photo'=>$file_name,
            'name_ar'=>$request->name_ar,
           'name_en'=>$request->name_en,
            'price'=>$request->price,
            'details_ar'=>$request->details_ar,
           'details_en'=>$request->details_en
        ]);

            return redirect()->back()->with(['sucsess'=>'it is add to shop']);

    }
    public function getoffers(){
        $offers=Offer::select('id','name_'.LaravelLocalization::getCurrentLocale().' as name',
            'price',
            'details_'.LaravelLocalization::getCurrentLocale().' as details')->get();
return view("pages.all",compact("offers"));
    }
    public function editoffet($offer_id){
       $offer=Offer::find($offer_id);
       if(!$offer)
           return redirect()->back();
       return view('pages.edit',compact('offer'));
    }
    public function updateoffet(offerrequest $request,$offer_id){
        $offer=Offer::find($offer_id);
        if(!$offer)
            return redirect()->back();
       $offer->Update($request->all());
       return redirect()->back()->with(["sucsess"=>"تم التحديث بنجاح"]);


    }
    public function giveViewers(){
$vidio=Viewr::first();
event(new vidioviewer($vidio));
return view('pages.youtube',compact('vidio'));
    }
    public function deleteoffet($offer_id){
        $offer=Offer::find($offer_id);
        if(!$offer)
            return redirect()->route('allOffers')->with(['error' => __('messages.the offer not found')]);

        $offer->delete();
       return redirect()->route('allOffers')->with(['success'=>__('messages.delete succses')]);
    }
    public function sum(){
        $off=Offer::select('price')->get();
        return view('pages.restore',compact('off'));
    }






    /*  protected function check(){
          return $rules=["name"=>'required|max:100|unique:offer,name',
              "price"=>'required|numeric',
              "details"=>'required|max:200'
          ];
      }
    */
    /*protected function get_massge(){
        return  ["name.required" =>__('messages.name of show'),
            "price.required" =>__('messages.you should show the the demand'),
            "details.required"=>'you should write the details',
            "name.unique"=>'the demans found before',
            "price.numric"=>'you should enter the number',

        ];
    }*/
}
