<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GroupRequest extends ApiRequest
{
  
    public function rules()
    {
        return [            
            'name' => 'required',         
        ];
    }
}
