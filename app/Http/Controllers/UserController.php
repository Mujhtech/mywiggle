<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Storage;
use Carbon\Carbon;
use App\Models\Category;
use App\Models\Tread;
use App\Models\TreadVideoPath;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data['title'] = "Dashbaord";

        return view('user.logged.index', $data);
    }

    public function video(Request $request)
    {
        //
        $data['title'] = "My Video";
        $data['category'] = Category::get();
        $data['treads'] = Tread::where('user_id', $request->user()->id)->get();

        return view('user.logged.video', $data);
    }

    public function profile()
    {
        //
        $data['title'] = "Profile";
        
        return view('user.logged.profile', $data);
    }


    public function updateProfile(Request $request)
    {
        //
        $request->validate([
            'fullname' => 'required|string',
            'username' => 'required|string|min:8|unique:users',
            'email' => 'required|email|unique:users',
            'phone_number' => 'required|digits:11|unique:users',
        ]);


        $user = $request->user();
        $user->phone_number = $request->phone_number;
        $user->fullname = $request->fullname;
        $user->username = $request->username;
        $user->email = $request->email;

        if($user->save()){

            return redirect()->back()->with('success','Profile updated successfully');

        }
    }

    public function updateProfilePicture(Request $request)
    {
        //
        //$request->validate([
          //  'profile_photo_path' => 'required|string',
        //]);


        $user = $request->user();

        if(!$request->hasFile('profile_photo_path')){

            return redirect()->back()->with('error','Please select a picture');

        }

        if(Storage::exists($user->profile_photo_path)){

            Storage::delete($user->profile_photo_path);

        }

        $pp = time().'_'.$user->username.'_profile_picture';
        $user->profile_photo_path = $request->file('profile_photo_path')->storeAs(
            'uploads/profile', $pp
        );

        if($user->save()){

            return redirect()->back()->with('success','Profile updated successfully');

        }
    }

    public function updatePassword(Request $request)
    {
        //
        $request->validate([
            'old_password' => 'required|string',
            'new_password' => 'required|string|max:120|min:8',
            'confirm_new_password' => 'required|string|max:120|min:8|same:new_password',
        ]);


        $user = $request->user();
        
        if(!Hash::check($request->old_password, $user->password)){

            return redirect()->back()->with('error','Incorrect old password');

        }

        $user->password = $new_password;

        if($user->save()){

            return redirect()->back()->with('success','Profile updated successfully');

        }
    }


    public function createVideo(Request $request){

        $request->validate([
            'title' => 'required|string|min:20|max:50',
            'category' => 'required',
            'content' => 'required|string|min:20|max:200',
            'attachment' => 'required',
        ]);

        if(!$request->hasFile('attachment')){

            return redirect()->back()->with('error','Please select a video attachment');

        }

        $slug = generate_slug($require->title);

        $tread = new Tread;
        $tread->title = $request->title;
        $tread->category_id = $request->category;
        $tread->content = $request->content;
        $tread->user_id = $request->user()->id;
        $tread->slug = $slug;
        $tread->save();

        $video_path = new TreadVideoPath;
        $video_path->tread_id = $tread->id;
        $video_path->video_path = $request->file('attachment')->storeAs(
            'uploads/videos', $slug
        );

        if($video_path->save()){

            return redirect()->back()->with('success','Video uploaded successfully');

        }

    }

    public function deleteVideo($id){

        $video_path = TreadVideoPath::where('tread_id')->first()->video_path;

        if(Storage::exists($video_path)){

            Storage::delete($video_path);

        }

        $tread = Tread::find($id);

        if($tread->delete()){

            return redirect()->back()->with('success','Video deleted successfully');

        }
        
    }


}
