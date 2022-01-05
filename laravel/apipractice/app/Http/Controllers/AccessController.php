<?php

namespace App\Http\Controllers;

use App\Http\Requests\AccessRequest;
use App\Http\Requests\LogsRequest;
use App\Http\Resources\LogsResource;
use App\Models\Logs;
use App\Models\Points;
use App\Models\Staff;
use Illuminate\Http\Request;

class AccessController extends Controller
{
    public function hasPerms(AccessRequest $request) 
    {
        $staff = Staff::where('code', $request->staff);
        $point = Points::find($request->id);

        dd($staff->groups->points);
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
