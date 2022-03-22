<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TestimonyRequest extends FormRequest
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
        $testimony = $this->route()->parameter('testimony');
        $rules = [
                'autor' =>'required',
                'name' =>'required',
                'slug' =>'required|unique:testimonies',
                'status'=>'required|in:1,2',
                'file'=>'image|max:2048'
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
