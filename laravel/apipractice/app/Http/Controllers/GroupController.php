<?php

namespace App\Http\Controllers;

use App\Models\Groups;
use Illuminate\Http\Request;
use App\Http\Requests\GroupRequest;
use App\Http\Requests\GroupPointRequest;
use App\Http\Requests\GroupStaffRequest;

class GroupController extends Controller
{
    public function create(GroupRequest $request) 
    {
        $point = Groups::create([
            'name' => $request->name, 
        ]);

        return response()->json([
            'data' => [
                $point->only(['id', 'name'])
            ]
        ], 201);

    }

    public function show() 
    { 
        return response()->json([
            'data' => 
            [
                'items' => Groups::all()
            ]
        ], 200);
    }

    public function addPoint(Groups $group, GroupPointRequest $request) //another method of doing addStaff but on point
    {
        
        $group->points()->attach($request->points);
                
        return response()->noContent(201);
    }

    public function addStaff($id, GroupStaffRequest $request) 
    {
        $group = Groups::find($id);
        foreach ($request->staff as $staff) 
        {
            $group->staff()->attach($staff);
        }
        return response("", 201);
    }
}
