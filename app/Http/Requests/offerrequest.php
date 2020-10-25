<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class offerrequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            "name_ar"=>'required|max:100|unique:offer,name_ar',
            "name_en"=>'required|max:100|unique:offer,name_en',
                "price"=>'required|numeric',
                "details_ar"=>'required|max:200',
            "details_en"=>'required|max:400'

        ];
    }
    public function messages()
    {
        return [
            "name_ar.required" =>__('messages.name of show'),
            "name_en.required" =>__('messages.name of show'),
            "price.required" =>__('messages.you should show the the demand'),
            "details_ar.required"=>__('messages.you should write the details'),
            "details_en.required"=>__('messages.you should write the details'),
            "name_ar.unique"=>__('messages.the demans found before'),
            "name_en.unique"=>__('messages.the demans found before'),
            "price.numric"=>'you should enter the number',


        ];
    }
}
