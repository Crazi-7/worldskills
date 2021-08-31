<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Staff;

class StaffController extends Controller
{
    
    public function store(Request $request) {

        $full_name = $request['fullname'];
        $photo = $request['photo'];

        $staff = Staff::create([
            "full_name" => $full_name,
            "photo" => $photo
        ]);

        $id = $staff->id;
        
        return response()->json(
            [
                "data" => [
                    "id" => $id,
                    "full_name" => $full_name,
                    "code" => Str::random(32)
                ]
            ]      
        , 201);
    }
                                                     
    public function index() {
        return Staff::all();
    }
}
