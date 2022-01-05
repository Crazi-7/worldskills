<?php

namespace App\Http\Controllers;
use App\Http\Requests\PointRequest;
use Illuminate\Http\Request;
use App\Models\Points;
class PointController extends Controller
{
    public function create(PointRequest $request) 
    {        
        $point = Points::create([
            'name' => $request->name,
            'parent' => $request->parent,
            
        ]);

        return response()->json([
            'data' => [
                $point->only(['id', 'name', 'parent'])
            ]
        ], 201);
    }

    public function show() 
    {                                
        return response()->json([
            'data' => [
                'items' => Points::list()
            ]
        ], 200);
    }

}
