<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Category;
use App\Models\Tread;
use App\Models\Setting;
use App\Models\PayoutRequest;
use App\Models\Transaction;
use App\Models\Page;
use App\Models\EarnHistory;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('admin.index');
    }

    public function setting()
    {
        //
        return view('admin.setting.index');
    }

    
    public function users()
    {
        //
        $data['users'] = User::where('is_block', 0)->where('is_verified', 1)->paginate(20);
        return view('admin.users.index', $data);
    }


    public function usersUnverified()
    {
        //
        $data['users'] = User::where('is_verified', 0)->paginate(20);
        return view('admin.users.unverified', $data);
    }

    public function usersBlocked(){

        $data['users'] = User::where('is_block', 1)->paginate(20);
        return view('admin.users.blocked', $data);

    }

    public function usersCreate(){

        return view('admin.users.create');

    }


    public function blockUser($id){

        $u = User::find($id);
        $u->is_block = 1;

        if($u->save()){

            return redirect()->back()->with('success', 'User blocked successfully');

        }
    }


    public function unblockUser($id){

        $u = User::find($id);
        $u->is_block = 0;

        if($u->save()){

            return redirect()->back()->with('success', 'User unblocked successfully');

        }
    }


    public function verifyUser($id){

        $u = User::find($id);
        $u->is_verified = 1;

        if($u->save()){

            return redirect()->back()->with('success', 'User verified successfully');

        }
    }


    public function unverifyUser($id){

        $u = User::find($id);
        $u->is_verified = 0;

        if($u->save()){

            return redirect()->back()->with('success', 'User unverified successfully');

        }
    }


    public function deleteUser($id){

        $u = User::find($id);

        if($u->delete()){

            return redirect()->back()->with('success', 'User deleted successfully');

        }
    }

    public function singleUser($id){

        $data['user'] = User::find($id);
        $data['treads'] = Tread::where('user_id', $id)->get();
        
        return view('admin.users.single', $data);
    }


    public function categories()
    {
        //
        $data['categories'] = Category::paginate(10);
        return view('admin.category.index', $data);
    }

    public function categoyDelete($id){

        if(Tread::where('category_id', $id)->exists()){

            return redirect()->back()->with('danger', 'Failed to delete category, make sure that you have deleted all video related to this category');

        } else {

            $cat = Category::find($id);

            if($cat->delete()){

                return redirect()->back()->with('success', 'Category deleted successfully');

            }


        }
    }


    public function treads()
    {
        //
        $data['treads'] = Tread::paginate(10);
        return view('admin.tread.index', $data);
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
