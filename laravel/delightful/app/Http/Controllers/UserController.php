<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function registration() {

        return view('register-client');
    }



    public function addUser(Request $request) {

        $request -> validate([

             'name' => 'required|max:100',
             'email' => 'required|email|unique:users,email|max:100',
             'password' => 'required|max:16',            
         ]);   

        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);

        if (Auth::check() && Auth::user()->isEmployee())
        {
            $user->type = "Employee";
            $user->save();
            return redirect('/orders');
        } else
        {
            $user->type = "Customer";
            $request -> validate(['tel' => 'required|max:10',]);
            $user->phone = $request->tel;
            $user->save();
            return redirect('/');
        }
        
        
            
        
    }
}
