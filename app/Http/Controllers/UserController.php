<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Storage;
use Carbon\Carbon;
use App\Models\Category;
use App\Models\Tread;
use App\Models\TreadVideoPath;
use App\Models\WatchList;
use App\Models\WatchLater;
use App\Models\TreadLike;
use App\Models\TreadHistory;
use App\Models\PayoutRequest;
use App\Models\Ad;
use App\Models\User;
use App\Models\EarningHistory;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $data['title'] = "Dashbaord";
        $data['point'] = $request->user()->point_earn;
        $data['video'] = Tread::where('user_id', $request->user()->id)->get()->count();
        $data['wl'] = WatchList::where('user_id', $request->user()->id)->get()->count();
        $data['ads'] = Ad::where('status', 1)->inRandomOrder()->get();
        $data['referrals'] = User::where('referred_by', $request->user()->id)->get()->count();

        return view('user.logged.index', $data);
    }

    public function earning(Request $request)
    {
        //
        $data['title'] = "My Earning";
        $data['earnings'] = EarningHistory::where('user_id', $request->user()->id)->get();

        return view('user.logged.earning', $data);
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
            'username' => 'required|string|min:8',
            'email' => 'required|email',
            'phone_number' => 'required|digits:11',
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

        if(Storage::exists($user->avatar)){

            Storage::delete($user->avatar);

        }

        $pp = time().'_'.$user->username.'_profile_picture';
        $user->avatar = $request->file('profile_photo_path')->storeAs(
            'public/uploads/profiles', $pp.'.jpg'
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
            'title' => 'required|string|min:12|max:50',
            'category' => 'required|integer',
            'content' => 'required|string|min:20|max:200',
            'attachment' => 'required',
            'featured_image' => 'required'
        ]);

        if(!$request->hasFile('attachment') || !$request->hasFile('featured_image')){

            return redirect()->back()->with('error','Please select a video and featured image attachment');

        }

        $slug = generate_slug($request->title);

        $tread = new Tread;
        $tread->title = $request->title;
        $tread->category_id = $request->category;
        $tread->content = $request->content;
        $tread->user_id = $request->user()->id;
        $tread->slug = $slug;
        //$tread->status = 1;
        $tread->featured_image = $request->file('featured_image')->storeAs(
            'public/uploads/images', $slug.'.jpg'
        );
        $tread->save();

        $video_path = new TreadVideoPath;
        $video_path->tread_id = $tread->id;
        $video_path->video_path = $request->file('attachment')->storeAs(
            'public/uploads/videos', $slug.'.mp4'
        );

        if($video_path->save()){

            return redirect()->back()->with('success','Video uploaded successfully');

        }

    }

    public function editVideo( Request $request, $id ){

        $request->validate([
            'title' => 'required|string|min:12|max:50',
            'category' => 'required',
            'content' => 'required|string|min:20|max:200',
            'attachment' => 'required',
            'featured_image' => 'required'
        ]);


        if(!$request->hasFile('attachment') || !$request->hasFile('featured_image')){

            return redirect()->back()->with('error','Please select a video and featured image attachment');

        }

        $tread = Tread::find($id);
        //$tread->title = $request->title;
        $tread->category_id = $request->category;
        $tread->content = $request->content;
        $tread->user_id = $request->user()->id;
        //$tread->slug = $slug;

        if($tread->featured_image != null && $tread->featured_image != "" && Storage::exists($tread->featured_image)){

            Storage::delete($tread->featured_image);

        }

        $tread->featured_image = $request->file('featured_image')->storeAs(
            'public/uploads/images', $tread->slug.'.jpg'
        );
        $tread->save();

        $video_path = TreadVideoPath::where('tread_id', $id)->first();

        if($video_path->video_path != null && $video_path->video_path != "" && Storage::exists($video_path->video_path)){

            Storage::delete($video_path->video_path);

        }

        $video_path->video_path = $request->file('attachment')->storeAs(
            'public/uploads/videos', $tread->slug.'.mp4'
        );

        if($video_path->save()){

            return redirect()->back()->with('success','Video editted successfully');

        }

    }

    public function deleteVideo($id){

        $video_path = TreadVideoPath::where('tread_id', $id)->first();

        if($video_path->video_path != null && $video_path->video_path != "" && Storage::exists($video_path->video_path)){

            Storage::delete($video_path->video_path);

        }

        $video_path->delete();


        if(TreadHistory::where('tread_id', $id)->exists()){

            $his = TreadHistory::where('tread_id', $id)->get();

            $his->each(function ($hi, $key) {
                $hi->delete();
            });

        }

        if(TreadLike::where('tread_id', $id)->exists()){

            $lk = TreadLike::where('tread_id', $id)->get();

            $lk->each(function ($l, $key) {
                $l->delete();
            });

        }

        if(WatchList::where('tread_id', $id)->exists()){

            $wl = WatchList::where('tread_id', $id)->get();

            $wl->each(function ($w, $key) {
                $w->delete();
            });

        }

        $tread = Tread::find($id);

        if($tread->featured_image != null && $tread->featured_image != "" && Storage::exists($tread->featured_image)){

            Storage::delete($tread->featured_image);

        }

        if($tread->delete()){

            return redirect()->back()->with('success','Video deleted successfully');

        }
        
    }


    public function myWatchList(Request $request){

        $data['title'] = "My Watch List";
        $data['watchlist'] = WatchList::where('user_id', $request->user()->id)->get();

        return view('user.logged.watchlist', $data);

    }


    public function removeFromWatchList( $id ){

        $wl = WatchList::find($id);

        if($wl->delete()){

            return redirect()->back()->with('success','Video removed successfully from watch list');

        }

    }


    public function withdraw(Request $request){

        $data['title'] = "My Withdrawal";
        $data['withdraw'] = PayoutRequest::where('user_id', $request->user()->id)->get();

        return view('user.logged.withdraw', $data);

    }

    public function createWithdraw(Request $request){

        $request->validate([
            'amount' => 'required',
            'account_number' => 'required',
            'account_name' => 'required',
            'bank_name' => 'required',
        ]);

        $u_amount = $request->user()->point_earn * get_setting('point-equal-balance');

        if(get_setting('minimum-withdrawal') < $u_amount){

            return redirect()->back()->with('error','You dont have enough balance to withdraw, Minimum withdrawal is N'.get_setting('minimum-withdrawal'));

        }


        if(PayoutRequest::where('user_id', $request->user()->id)->where('status', 0)->exists()){

            return redirect()->back()->with('error','Sorry, you have a pending withdrawal wait for admin approval');

        }


        $wd = new PayoutRequest;
        $wd->user_id = $request->user()->id;
        $wd->amount = $request->amount;
        $wd->account_number = $request->account_number;
        $wd->account_name = $request->account_name;
        $wd->bank_name = $request->bank_name;

        if($wd->save()){

            return redirect()->back()->with('success','Request created successfully, wait for admin approval');

        }

    }


}
