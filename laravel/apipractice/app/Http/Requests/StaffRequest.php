<?php

namespace App\Http\Requests;

class StaffRequest extends ApiRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'full_name' => 'required',
            'photo' => 'required|file|image|mimes:jpg'
        ];
    }
}
