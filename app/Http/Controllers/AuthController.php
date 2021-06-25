<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\User;
use Carbon\Carbon;
use App\Models\LoginHistory;

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

            $lhistory = new LoginHistory;
            $lhistory->user_id = $userLogin->id;
            $lhistory->os = get_os();
            $lhistory->device = get_device();
            $lhistory->ip = user_ip();
            $lhistory->browser = get_browsers();
            $lhistory->save();

            $user = Auth::getLastAttempted();

            Auth::login($user, true);

            navtoastr()->success('Login successful!!!');

            return redirect()->intended();

        } else {
            
            navtoastr()->error('Invalid username or Password');

            return navtoastr()->back();
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

        if($request->filled('referral_code')){

            $user->referred_by = User::where('referral_code', $request->referral_code)->first()->id;

        } else {

            $user->referred_by = 1;

        }

        if($user->save()){

            navtoastr()->success('Welcome to our platform, please login to continue');

            return navtoastr()->named('auth.login');

        } else {

            navtoastr()->error('Something went wrong');

            return navtoastr()->back();

        }

    }


    public function recover(Request $request)
    {
        //
        $request->validate([
            'id' => 'required|string',
        ]);

        navtoastr()->success('Coming soon!!!');

        return navtoastr()->back();
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
