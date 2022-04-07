<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;
    
    public function login(Request $request) {
        $credentials = $request->only('email', 'password');

        if(Auth::attempt($credentials))
        {
            $request->session()->regenerate();
            return redirect('/events');
        }
        return back()->with('error', 'email or password incorrect');
    }
    
    
    public function logout(Request $request) {
            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
            return redirect('/');
    }
    // --------------------------------------
    // api
    // --------------------------------------


    // public function login(Request $request)
    // {
    //     $attendee = Attendee::where('lastname', $request->get('lastname'))
    //         ->where('registration_code', $request->get('registration_code'))->first();

    //     if (!$attendee) {
    //         return response()->json(['message' => 'Invalid login'], 401);
    //     }

    //     $attendee->login_token = md5($attendee->username);
    //     $attendee->save();

    //     return array_merge($attendee->toArray(), ['token' => $attendee->login_token]);
  
    public function alogin(Request $request) {

        if(Auth::guard('apisession')->attempt(['lastname' => $request->lastname, 'password' => $request->registration_code])) 
        {
            $user = Auth::guard('apisession')->user();
            return response()->json([
                'data' => [
                    'firstname' => $user->firstname,
                    'lastname' => $user->lastname,
                    'username' => $user->username,
                    'email' => $user->email,
                    'token' => $user->generateToken(),
                    
                ]
            ], 200);
        }
        
        return response()->json([
            'error' => [
                'code' => 401,
                'message' => 'Invalid login',
            ]
        ], 401);
    }
    
    
    public function alogout(Request $request) {
                 
        auth()->user()->removeToken();        

        Auth::guard('apisession')->logout();

        //$request->session()->invalidate();        
            
        return response()->json([
            'message' => 'Logout success'
        ], 200);
    }

    // public function whyisthishappening() {
    //     return response()->json([
    //         'message' => 'Invalid token'
    //     ], 401);

    //     return response()->json([
    //         'message' => 'User is not logged in'
    //     ], 401);
    // }

    // public function logout(Request $request)
    // {
    //     $attendee = Attendee::where('login_token', $request->get('token'))->first();
    //     if (!$attendee) {
    //         return response()->json(['message' => 'Invalid token'], 401);
    //     }

    //     $attendee->login_token = null;
    //     $attendee->save();

    //     return ['message' => 'Logout success'];
    // }


    
}

