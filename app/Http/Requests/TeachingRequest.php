<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TeachingRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $teaching = $this->route()->parameter('teaching');
        $rules = [
                'name' =>'required',
                'slug' =>'required|unique:teachings',
                'status'=>'required|in:1,2',
                'image' => 'image|max:2400|dimensions:max_width=4000,max_height=3000'
        ];
        if($teaching){
            $rules['slug']='required|unique:teachings,slug,'.$teaching->id;
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
