<?php

namespace App\Http\Controllers;
use Illuminate\Validation\Rule;
use App\Models\Events;
use App\Models\Tickets;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class TicketsController extends Controller
{
    public function create(Request $request, $id) {
        
        $input = [
            'name' => $request->name,
            'event_id' => $id,
            'cost' => $request->cost,
            'valid' => $request->special_validity,
            'amount' => $request->amount,
            'validuntil' => $request->valid_until
        ];
        
        $rules = [
            'name' => 'required',
            'cost' => 'required||gt:0',
            'valid' => 'required', //enum?
            'amount' => 'exclude_unless:valid,amount|required|gt:0',
            'validuntil' => 'exclude_unless:valid,date|required|date'
        ];

        $validator = Validator::make($input, $rules);
        
        if($validator->fails()) {
            return Redirect::back()->withErrors($validator);
        }
        
        $validjson = null;        
        
        if ($request->special_validity != "none") {
            if ($request->special_validity == 'amount')
            {
                $validjson = collect([
                    'type' => $request->special_validity,
                    'amount' => $request->amount
                ]);
                $validjson = $validjson->toJson();
            }
            else {
                $validjson = collect([
                    'type' => $request->special_validity,
                    'date' => $request->validuntil
                ]);
                $validjson = $validjson->toJson();
            }
        }



        $ticket = Tickets::create([
                'event_id' => $id,
                'name' => $request->name,
                'cost' => $request->cost,
                'special_validity' => $validjson
        ]);

        // return redirect('/event/$id')->with('success', 'Ticket successfully created');
        return redirect()->route('showEvent', ['id' => $id])->with('success', 'Ticket successfully created');
   
    }

    public function show($id) {
        
        $event = Events::find($id);         
        $event->date = Carbon::parse($event->date)->format('F d, Y');
        return view('tickets.create')->with(compact('event'));
    }
}
