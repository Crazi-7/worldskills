<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GroupPointRequest extends ApiRequest
{
 
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [            
            'points' => 'required|exists:points,id|array',         
        ];
    }
}
