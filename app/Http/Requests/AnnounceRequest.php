<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AnnounceRequest extends FormRequest
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
        $anuncio = $this->route()->parameter('anuncio');
        $rules = [
                'name' =>'required',
                'slug' =>'required|unique:announces',
                'status'=>'required|in:1,2',
                'file'=>'image|max:2048'
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
