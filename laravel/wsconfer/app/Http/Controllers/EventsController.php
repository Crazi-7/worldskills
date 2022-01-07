<?php

namespace App\Http\Controllers;

use App\Models\Events;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class EventsController extends Controller
{
    public function index() {
        //$attendees = Events::find(1)->registrations->count();
        $events = Events::all();
        return view('events.index')->with(compact('events'));
    }

    public function show($id) {
        $event = Events::find($id);         
        
        return view('events.detail')->with(compact('event'));
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
}
