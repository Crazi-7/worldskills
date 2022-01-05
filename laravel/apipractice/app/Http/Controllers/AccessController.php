<?php

namespace App\Http\Controllers;

use App\Http\Requests\AccessRequest;
use App\Http\Requests\LogsRequest;
use App\Http\Resources\LogsResource;
use App\Models\Access;
use App\Models\Logs;
use App\Models\Points;
use App\Models\Staff;
use Illuminate\Http\Request;

class AccessController extends Controller
{
    public function hasPerms(AccessRequest $request) 
    {
        $access = false;

        $staff = Staff::with('groups')->where('code', $request->staff)->first();
        $points = $staff->groups->map->points->flatten();


        $collection = collect($points->map->id);
        $collection = $collection->unique();

        foreach ($collection as $item) {
            
            $parent = Points::where('id', $item)->first()->parent;
           
            if (!$collection->contains($parent) && !is_null($parent))
            {
                $collection->push($parent);  
            }
        }
        

       if ($collection->contains($request->point)) 
       {
        $access = true;
       }

       $staffaccess = Access::where('staff_id', '=', $staff->id)->where('point_id', '=', $request->point)->first();
       
       if ($staffaccess)
       {
        $access = true;
       }
      

       return response()->json([
        'data' => 
        [
            'photo' => 'photooo',
            'accesss' => $access
        ]
    ], 200);





    }

    Public function logs(LogsRequest $request) 
    {
        if (!$request->has('type'))
        {
            return response()->json([
                'data' => 
                [
                    'items' => LogsResource::collection(Logs::all())
                ]
            ], 200);

        } else if ($request->type == "staff")
        {
            $type="staff_id";
        } else
        {
            $type="point_id";
        }
      
        return response()->json([
            'data' => 
            [
                'items' => LogsResource::collection(Logs::where($type, $request->id)->get())
            ]
        ], 200);


    }
}
