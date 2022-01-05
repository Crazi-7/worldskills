<?php

namespace App\Http\Controllers;

use App\Http\Requests\AccessRequest;
use App\Http\Requests\AddRequest;
use App\Http\Requests\StaffRequest;
use App\Http\Resources\StaffResource;
use App\Models\Access;
use Illuminate\Http\Request;
use App\Models\Staff;
use Illuminate\Database\Console\Migrations\StatusCommand;
use Illuminate\Support\Str;

class StaffController extends Controller
{
    public function create(StaffRequest $request) 
    {        
        
        $photoPath = $request->file('photo')->store('photo', 'public');
        
        // $staff = new Staff();
        
        // $staff->full_name = $request->full_name;
        // $staff->photo = $photoPath;
        // $staff->code = Str::random(32);
        // $staff->save();

        // return response()->json([
        //     'data' => [
        //         'id' => $staff->id,
        //         'full_name' => $staff->full_name,
        //         'code' => $staff->code
        //     ]
        // ], 201);


        $staff = Staff::create([
            'full_name' => $request->full_name,
            'photo' => $photoPath,
            'code' => Str::random(32)
        ]);

        return response()->json([
            'data' => [
                $staff->only(['id', 'full_name', 'code'])
            ]
        ], 201);
    }

    public function retrieve() {      
        

        return response()->json([
            'data' => [
                'items' => StaffResource::collection(Staff::all())
            ]
        ], 201);
    }

    public function giveAccess($id, AddRequest $request)
    {
        $access = Access::create([
            'staff_id' => $id,
            'point_id' => $request->point_id,
            'time' => $request->time
        ]);
        return response()->noContent(201);
    }
}
