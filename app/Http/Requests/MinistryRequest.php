<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MinistryRequest extends FormRequest
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
        $ministry = $this->route()->parameter('ministry');
        $rules = [
                'name' =>'required',
                'slug' =>'required|unique:ministries',
                'status'=>'required|in:1,2',
                'file'=>'image|max:2048'
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
