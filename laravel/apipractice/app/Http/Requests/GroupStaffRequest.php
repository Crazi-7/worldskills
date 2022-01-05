<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GroupStaffRequest extends ApiRequest
{
 
    public function rules()
    {
        return [
            'staff' => 'required|exists:staff,id|array', 
        ];
    }
}
