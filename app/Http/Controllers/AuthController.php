<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\User;
use Carbon\Carbon;

class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
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

        if($user->save()){

            return redirect()->route('auth.login')->with('success', 'Welcome to our platform, please login to continue');

        } else {

            return redirect()->back()->with('error', 'Something went wrong');

        }

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function recover(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
