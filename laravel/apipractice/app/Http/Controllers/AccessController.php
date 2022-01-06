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
use Illuminate\Support\Facades\Http;

class AccessController extends Controller
{
    public function hasPerms(AccessRequest $request) 
    {
        $access = false;

        $staff = Staff::with('groups')->where('code', $request->staff)->first();
        $points = $staff->groups->map->points->flatten();

        $collection = collect($points->map->id)->unique();
        // $collection = $collection->unique();
        
        foreach ($collection as $item) {
            
            $parent = Points::where('id', $item)->first()->parent;
           
            if (!$collection->contains($parent) && !is_null($parent))
            {
                
                $collection->push($parent);  
            }
        }               

        // $staffAccess = $staff->access()->where('point_id', $request->point)->first();
       
        // if ($staffAccess) {
        //     $time = $staffAccess->time;
        //     $createdAt = $staffAccess->created_at;
 
        //     dump(now());
        //     dump($createdAt->addSeconds($time));        
        //     $access = $createdAt > now()->subSeconds($time);         
        // }        

        $staffAccess = $staff->access()->where('point_id', $request->point)->get();

        $filteredAccess = $staffAccess->filter(function($access) {
            return $access->created_at > now()->subSeconds($access->time);
        });
        
        $collection->push($filteredAccess->flatten()[0]->point_id);        
    
        if ($collection->contains($request->point)) {
            $access = true;        
        }     
       

        // External API access
        //    Http::post();
        
        /*
        * add access log        
        */

        Logs::create([
            'staff_id' => $staff->id,
            'point_id' => $request->point,
            'camera' => 'photoo',
            'access' => $access,
        ]);
        
        return response()->json([
            'data' => [
                'photo' => 'photooo',
                'accesss' => $access
            ]
        ], 200);
    }

    public function logs(LogsRequest $request) 
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
