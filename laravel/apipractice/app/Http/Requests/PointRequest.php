<?php

namespace App\Http\Requests;

class PointRequest extends ApiRequest
{
    
   
    public function rules()
    {
        return [            
            'name' => 'required',
            'parent' => 'sometimes|exists:points,id'          
        ];
    }
}
