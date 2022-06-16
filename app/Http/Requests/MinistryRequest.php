<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MinistryRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $ministry = $this->route()->parameter('ministry');
        $rules = [
                'name' =>'required',
                'slug' =>'required|unique:ministries',
                'status'=>'required|in:1,2',
        ];
        if($ministry){
            $rules['slug']='required|unique:ministries,slug,'.$ministry->id;
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
