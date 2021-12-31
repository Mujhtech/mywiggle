<?php

namespace App\Http\Controllers;

use App\Models\PointHistory;
use Illuminate\Http\Request;
use App\Models\User;

class PointController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $data['users'] = User::all();
        return view('admin.users.history', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'user_id' => 'required'
        ]);

        $ph = new PointHistory;
        $ph->user_id = $request->user_id;
        $ph->point = $request->point;
        $ph->amount = $request->amount;
        $ph->video_content = $request->video_content;
        $ph->video_number = $request->video_number;
        $ph->video_name = $request->video_name;
        $ph->duration = $request->duration;
        $ph->purchase = $request->purchase;
        $ph->total_likes = $request->total_likes;
        $ph->total_comments = $request->total_comments;

        if ($ph->save()) {
            return redirect()->back()->with('success', 'Added successfully');
        }
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
