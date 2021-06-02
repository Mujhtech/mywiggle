<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\User;
use Carbon\Carbon;

class AuthController extends Controller
{

    public function login(Request $request)
    {
        //
        $request->validate([
            'id' => 'required|string',
            'password' => 'required|string',
        ]);

        $field = filter_var($request->id, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';

        $credentials = [
            $field => $request->id,
            'password' => $request->password
        ];

        if(Auth::validate($credentials) == true) {

            $userLogin = User::where('username', $request->id)->orWhere('email', $request->id)->first();
            $userLogin->last_login = Carbon::now();
            $userLogin->save();

            $user = Auth::getLastAttempted();

            Auth::login($user, true);

            return redirect()->intended();

        } else {
            
            return redirect()->back()->with('error', 'Invalid username or Password');
        }
    }


    public function register(Request $request)
    {
        //
        $request->validate([
            'email' => 'required|email|unique:users',
            'username' => 'required|string|max:120|min:8|unique:users',
            'fullname' => 'required|string',
            'phone_number' => 'required|digits:11|unique:users',
            'pass1' => 'required|string|max:120|min:8',
            'pass2' => 'required|string|max:120|min:8|same:pass1',
        ]);

        $user = new User;
        $user->username = $request->username;
        $user->fullname = $request->fullname;
        $user->email = $request->email;
        $user->phone_number = $request->phone_number;
        $user->password = $request->pass1;
        $user->role_id = 1;
        $user->is_verified = 1;
        $user->last_login = Carbon::now();
        $user->email_verified_at = Carbon::now();
        $user->referral_code = substr(time(), 0, 2).substr(time(), 4, 6).substr(time(), 7, 9);

        if($user->save()){

            return redirect()->route('auth.login')->with('success', 'Welcome to our platform, please login to continue');

        } else {

            return redirect()->back()->with('error', 'Something went wrong');

        }

    }


    public function recover(Request $request)
    {
        //
    }


    public function referral($code)
    {
        //
        if(!User::where('referral_code', $code)->exists()){

            return redirect()->route('auth.register')->with('error', 'Referral code does not exist');

        } else {

            return view('user.auth.register', $referral_code = $code);

        }

    }


    public function logout(Request $request)
    {
        //
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }

}
