<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class LogsRequest extends FormRequest
{
   
  
    public function rules()
    {
        return [
            'type' => 'sometimes|required|in:staff,point',
            'id' => [
                Rule::requiredIf($this->type == "staff"),
                'exists:staff,id'
            ],

            'id' => [
                Rule::requiredIf($this->type == "point"),
                'exists:points,id'
            ], 
        ];
    }
}
