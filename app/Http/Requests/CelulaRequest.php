<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CelulaRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'nombre' => 'required',
            'direccion' => 'required',
            'fecha_hora' => 'required',
            'user_id' => 'required',
        ];
    }
}
