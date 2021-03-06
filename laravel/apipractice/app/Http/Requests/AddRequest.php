<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddRequest extends ApiRequest
{
   
    public function rules()
    {
        return [
            'point_id' => 'required|exists:points,id',
            'time' => 'required|gt:0' 
        ];
    }
}
