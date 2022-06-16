<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TestimonyRequest extends FormRequest
{
   
    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        $testimony = $this->route()->parameter('testimony');
        $rules = [
                'autor' =>'required',
                'name' =>'required',
                'slug' =>'required|unique:testimonies',
                'status'=>'required|in:1,2',
        ];
        if($testimony){
            $rules['slug']='required|unique:testimonies,slug,'.$testimony->id;
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
