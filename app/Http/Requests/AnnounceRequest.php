<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AnnounceRequest extends FormRequest
{

    public function authorize()
    {
        
        return true;
    }

   
    public function rules()
    {
        $anuncio = $this->route()->parameter('anuncio');
        $rules = [
                'name' =>'required',
                'slug' =>'required|unique:announces',
                'status'=>'required|in:1,2',
                'image' => 'image|max:2400|dimensions:max_width=4000,max_height=3000'
            ];
        if($anuncio){
            $rules['slug']='required|unique:announces,slug,'.$anuncio->id;
        }
        if($this->status ==2){
            $rules = array_merge($rules,[
                            'extract'=>'required',
                            'body'=>'required'
             ] );
        }
        return $rules;
    }
}
