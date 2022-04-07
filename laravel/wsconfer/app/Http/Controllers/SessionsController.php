<?php

namespace App\Http\Controllers;

use App\Models\Events;
use App\Models\Sessions;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class SessionsController extends Controller
{
    public function show($id) {
        $event = Events::find($id);         
        $event->date = Carbon::parse($event->date)->format('F d, Y');
        return view('sessions.create')->with(compact('event'));
    }

    public function edit($id, $eid) {
        $event = Events::find($id);         
        $event->date = Carbon::parse($event->date)->format('F d, Y');
        $session = Sessions::find($eid);
       
        return view('sessions.edit')->with(compact(['event', 'session']));
    }

    public function report($id) {
        $event = Events::find($id);         
        

        $sessions = $event->rooms->map->sessions->flatten();
        $registrations = $event->registrations()->count();

        $capacity = $sessionName = $sessions->map(function ($item, $key) {
            return $item->room->capacity;
        });
        $sessionName = $sessions->map(function ($item, $key) {
            return $item->title;
        });
        $sesreg = $sessions->map->session_registrations->map(function ($item, $key) use($registrations) {
            if ($item->count() == 0)
            return $registrations;
            else
            return $item->count();
        });
        $colors = [];
        for ($i=0; $i<$capacity->count();$i++)
        {
            $colors[] = $sesreg[$i] > $capacity[$i];
        }
        
        return view('reports.index')->with(compact('event', 'sessionName', 'capacity', 'sesreg', 'colors'));
    }
    
    public function change(Request $request, $id) {
        
        $input = [
            'type' => $request->type,
            'event_id' => $id,
            'title' => $request->title,
            'speaker' => $request->speaker,
            'room_id' => $request->room,
            'cost' => $request->cost,
            'start' => $request->start,
            'end' => $request->end,
            'description' => $request->description
        ];
        
        $rules = [
            'type' => 'required',
            'event' => 'required',
            'title' => 'required', 
            'speaker' => 'required',
            'room' => 'required|exists:rooms,id',
            'cost' => 'gte:0',
            'start' => 'required|date',
            'end' => 'required|date',
            'description' => 'required'

        ];

        $validator = Validator::make($input, $rules);
        
        if($validator->fails()) {
            return Redirect::back()->withErrors($validator);
        }
        
        

        $first = Sessions::where('room_id',$request->room)->whereBetween('start', [$request->start, $request->end])->first();
        $last = Sessions::where('room_id',$request->room)->whereBetween('end', [$request->start, $request->end])->first();
        $between = Sessions::where('room_id',$request->room)->where('start', '<', $request->start)->where('end', '>', $request->start)->first();
 
        if ($first || $last || $between) {
            return back()->withInput()->withErrors(['room' => ['Room already booked during this time']]);
        }


        $cost = 0;        
        
        if ($request->type == "workshop")
            $cost = $request->cost;



        $session = Sessions::create([
            'event_id' => $id,
            'title' => $request->title,
            'speaker' => $request->speaker,
            'room_id' => $request->room,
            'cost' => $cost,
            'start' => $request->start,
            'end' => $request->end,
            'description' => $request->description 
        ]);

        // return redirect('/event/$id')->with('success', 'Ticket successfully created');
        return redirect()->route('showEvent', ['id' => $id])->with('success', 'Ticket successfully created');
   
    }


    public function create(Request $request, $id, $eid) {
        
        $input = [
            'type' => $request->type,
            'event_id' => $id,
            'title' => $request->title,
            'speaker' => $request->speaker,
            'room' => $request->room,
            'cost' => $request->cost,
            'start' => $request->start,
            'end' => $request->end,
            'description' => $request->description
        ];
        
        $rules = [
            'type' => 'required',
            'event_id' => 'required',
            'title' => 'required', 
            'speaker' => 'required',
            'room' => 'required|exists:rooms,id',
            'cost' => 'gte:0|nullable',
            'start' => 'required|date',
            'end' => 'required|date',
            'description' => 'required'

        ];

        $validator = Validator::make($input, $rules);
        
        if($validator->fails()) {
            
            return Redirect::back()->withErrors($validator);
        }
        
        

        $first = Sessions::where('room_id',$request->room)->whereBetween('start', [$request->start, $request->end])->where('id', '!=', $eid)->first();
        $last = Sessions::where('room_id',$request->room)->whereBetween('end', [$request->start, $request->end])->where('id', '!=', $eid)->first();
        $between = Sessions::where('room_id',$request->room)->where('start', '<', $request->start)->where('end', '>', $request->start)->where('id', '!=', $eid)->first();
 
        if ($first || $last || $between) {
            
            return back()->withInput()->withErrors(['room' => ['Room already booked during this time']]);
        }


        $cost = 0;        
        
        if ($request->type == "workshop")
            $cost = $request->cost;



        $event = Sessions::where('id', $eid)->update([
            'type' => $request->type,
            'title' => $request->title,
            'speaker' => $request->speaker,
            'room_id' => $request->room,
            'cost' => $request->cost,
            'start' => $request->start,
            'end' => $request->end,
            'description' => $request->description
        ]);
        
        // return redirect('/event/$id')->with('success', 'Ticket successfully created');
        return redirect()->route('showEvent', ['id' => $id])->with('success', 'Session successfully updated');
   
    }


    
}
