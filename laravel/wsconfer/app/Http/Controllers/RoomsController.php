<?php

namespace App\Http\Controllers;

use App\Models\Events;
use App\Models\Rooms;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class RoomsController extends Controller
{
    public function show($id) {
        $event = Events::find($id);         
        $event->date = Carbon::parse($event->date)->format('F d, Y');
        return view('rooms.create')->with(compact('event'));
    }

    public function create(Request $request, $id) {
        
        $input = [
            'name' => $request->name,
            'channel' => $request->channel,
            'capacity' => $request->capacity
        ];
        
        $rules = [
            'name' => 'required',
            'channel' => 'required|exists:channels,id',
            'capacity' => 'required|gt:0'
        ];

        $validator = Validator::make($input, $rules);
        
        if($validator->fails()) {
            return Redirect::back()->withErrors($validator);
        }
        
        $room = Rooms::create([
            'event_id' => $id,
            'name' => $request->name,
            'channel_id' => $request->channel,
            'capacity' => $request->capacity
        ]);

        // return redirect('/event/$id')->with('success', 'Ticket successfully created');
        return redirect()->route('showEvent', ['id' => $id])->with('success', 'Room successfully created');
    }
   
}
