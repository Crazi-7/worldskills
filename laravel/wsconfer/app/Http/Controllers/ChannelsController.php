<?php

namespace App\Http\Controllers;

use App\Models\Channels;
use App\Models\Events;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class ChannelsController extends Controller
{
    public function show($id) {
        $event = Events::find($id);         
        $event->date = Carbon::parse($event->date)->format('F d, Y');
        return view('channels.create')->with(compact('event'));
    }

    public function create(Request $request, $id) {
        
        $input = [
            'name' => $request->name
        ];
        
        $rules = [
            'name' => 'required',
        ];

        $validator = Validator::make($input, $rules);
        
        if($validator->fails()) {
            return Redirect::back()->withErrors($validator);
        }
        
        $session = Channels::create([
            'event_id' => $id,
            'name' => $request->name,
        ]);

        // return redirect('/event/$id')->with('success', 'Ticket successfully created');
        return redirect()->route('showEvent', ['id' => $id])->with('success', 'Channel successfully created');
   
    }
}
