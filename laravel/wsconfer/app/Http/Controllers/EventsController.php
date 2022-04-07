<?php

namespace App\Http\Controllers;

use App\Http\Resources\EchannelsResource;
use App\Http\Resources\ETicketsResource;
use App\Http\Resources\EventsResource;
use App\Models\Events;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class EventsController extends Controller
{
    public function index() {
        //$attendees = Events::find(1)->registrations->count();
        $events = Events::all();
        return view('events.index')->with(compact('events'));
    }

    public function show($id) {
        $event = Events::find($id);         
        $event->date = Carbon::parse($event->date)->format('F d, Y');
        return view('events.detail')->with(compact('event'));
    }

    public function edit($id) {
        $event = Events::find($id);         
        
        return view('events.edit')->with(compact('event'));
    }



    public function newEvent() {
        return view('events.create');
    }


    public function create(Request $request) {
        
        $input = [
            'name' => $request->name,
            'organizer_id' => Auth::id(),
            'slug' => $request->slug,
            'date' => $request->date,
        ];
        
        $rules = [
            'name' => 'required',
            'slug' => 'required|max:45|unique:events,slug|regex:/[a-zA-z]+-[0-9]+/',
            'date' => 'required|date',
        ];

        $messages = [
            'slug.required' => 'Slug must not be empty and only contain a-z, 0-9 and \'-\' is shown',
            'slug.regex' => 'Slug must not be empty and only contain a-z, 0-9 and \'-\' is shown',
            'required' => ' :attribute is required',
            'max' => ':attribute exceeds character limit',
        ];
        $validator = Validator::make($input, $rules, $messages);
        
        if($validator->fails()) {
            return Redirect::back()->withErrors($validator);
        }

        $event = Events::create([
            'name' => $request->name,
            'organizer_id' => Auth::id(),
            'slug' => $request->slug,
            'date' => $request->date,
        ]);
        return redirect('/events')->with('success', 'Event successfully created');
    }


    public function change(Request $request, $id) {
        
        $input = [
            'name' => $request->name,
            'slug' => $request->slug,
            'date' => $request->date,
        ];
        
        $rules = [
            'name' => 'required',
            'slug' => ['required','max:45','regex:/[a-zA-z]+-[0-9]+/',Rule::unique('events', 'slug')->ignore($id)],
            'date' => 'required|date',
        ];

        $messages = [
            'slug.required' => 'Slug must not be empty and only contain a-z, 0-9 and \'-\' is shown',
            'slug.regex' => 'Slug must not be empty and only contain a-z, 0-9 and \'-\' is shown',
            'required' => ' :attribute is required',
            'max' => ':attribute exceeds character limit',
        ];
        $validator = Validator::make($input, $rules, $messages);
        
        if($validator->fails()) {
            
            // if($request->slug != Events::find($id)->slug)
            return Redirect::back()->withErrors($validator);
        }

        $event = Events::where('id', $id)->update([
             'name' => $request->name,
             'slug' => $request->slug,
             'date' => $request->date,
        ]);
        return redirect()->route('showEvent', ['id' => $id])->with('success', 'Event successfully updated');
    }

    //------------------------------------------------------
    //api
    //-----------------------------------------------------

    public function showAllEvents() {

        $events = EventsResource::collection(Events::all());
        return response()->json([
            'events' => $events
        ], 200);
    }

    public function eventDetail($oslug, $eslug) {
        $event = Events::where('slug', $eslug)->first();
        
        if (!$event)
        {
            return response()->json([
                'message' => "Event not found"
            ], 404);
        }
        if ($event->organizers->slug != $oslug)
        {
            return response()->json([
                'message' => "Organizer not found"
            ], 404);
        }
        
        return response()->json([
            'id' => $event->id,
            'name' => $event->name,
            'slug' => $event->slug,
            'date' => $event->date,
            'channels' => EchannelsResource::collection($event->channels),
            'tickets' => ETicketsResource::collection($event->tickets)
        ], 200);
        
    }
}
