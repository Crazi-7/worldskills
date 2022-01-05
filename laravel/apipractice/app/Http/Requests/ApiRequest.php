<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class ApiRequest extends FormRequest
{
    /**
     * Change the validation message.
     */
    protected function failedValidation(Validator $validator)
    {                
        throw new HttpResponseException(response()->json([
            'error' => [
                "code" => 422,
                "message" => "Validation error",
                "errors" => $validator->errors() 
            ]
        ]), 422);
    }
}
