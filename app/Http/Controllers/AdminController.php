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
use App\Models\EarningHistory;
use App\Models\TreadHistory;
use App\Models\LoginHistory;
use Storage;
use App\Models\TreadVideoPath;
use App\Models\WatchList;
use App\Models\TreadLike;
use App\Models\WatchLater;
use Carbon\Carbon;
use App\Models\Ad;
use App\Models\Role;

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
        $data['users'] = User::get()->count();
        $data['treads'] = Tread::get()->count();
        $data['categories'] = Category::get()->count();
        return view('admin.index', $data);
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
        $data['roles'] = Role::get();
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

    public function createCategory()
    {
        //
        return view('admin.category.create');
    }

    public function createCategoryPost(Request $request)
    {
        //
        $request->validate([
            'cat_name' => 'required|string',
        ]);

        $slug = str_replace(' ', '-', strtolower($request->cat_name));

        if(Category::where('slug', $slug)->exists()){

            return redirect()->back()->with('danger', 'Category cannot be added, choose another name');

        }

        $cat = new Category;
        $cat->name = $request->cat_name;
        $cat->slug = $slug;

        if($cat->save()){

            return redirect()->back()->with('success', 'Category added successfully');

        }
    }


    public function createUserPost(Request $request){

        $request->validate([
            'email' => 'required|email|unique:users',
            'username' => 'required|string|max:120|min:8|unique:users',
            'fullname' => 'required|string',
            'phone_number' => 'required|digits:11|unique:users',
            'password' => 'required|string|max:120|min:8',
        ]);

        $user = new User;
        $user->username = $request->username;
        $user->fullname = $request->fullname;
        $user->email = $request->email;
        $user->phone_number = $request->phone_number;
        $user->password = $request->password;
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

            return redirect()->back->with('success', 'User created successfully');

        } else {

            return redirect()->back()->with('danger', 'Something went wrong');

        }

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


    public function createTread()
    {
        //
        $data['category'] = Category::get();
        return view('admin.treads.create', $data);
    }


    public function treads()
    {
        //
        $data['treads'] = Tread::paginate(10);
        return view('admin.treads.index', $data);
    }


    public function publishTreads()
    {
        //
        $data['treads'] = Tread::where('status', 1)->paginate(10);
        return view('admin.treads.publish', $data);
    }


    public function unPublishtreads()
    {
        //
        $data['treads'] = Tread::where('status', 2)->paginate(10);
        return view('admin.treads.unpublish', $data);
    }


    public function publishTread($id){

        $t = Tread::find($id);
        $t->status = 1;

        if($t->save()){

            return redirect()->back()->with('success', 'Tread published successfully');

        }
    }


    public function unpublishTread($id){

        $t = Tread::find($id);
        $t->status = 2;

        if($t->save()){

            return redirect()->back()->with('success', 'Tread unpublished successfully');

        }
    }


    public function deleteTread($id){

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


        if(WatchLater::where('tread_id', $id)->exists()){

            $wl = WatchLater::where('tread_id', $id)->get();

            $wl->each(function ($w, $key) {
                $w->delete();
            });

        }

        $tread = Tread::find($id);

        if($tread->featured_image != null && $tread->featured_image != "" && Storage::exists($tread->featured_image)){

            Storage::delete($tread->featured_image);

        }

        if($tread->delete()){

            return redirect()->back()->with('success','Tread deleted successfully');

        }

    }


    public function editTread($id){

        $data['tread'] = Tread::find($id);
        $data['category'] = Category::get();

        return view('admin.treads.edit', $data);
    }


    public function editSetting(Request $request)
    {
        //
        $setting = Setting::get();

        foreach ($setting as $set) {

            if($set->name == "app-logo" && $request->hasFile('app-logo')){
                
                if($set->value != null && $set->value != "" && Storage::exists($set->value)){

                    Storage::delete($set->value);

                }

                $set->value = $request->file('app-icon')->storeAs(
                    'public/uploads/favicon', 'favicon.png'
                );

                $set->save();

            }

            $set->value = $request->input($set->name);

            $set->save();

        }

        return redirect()->back()->with('success', 'Setting save successfully');

    }

    public function pages(){

        $data['pages'] = Page::paginate(10);

        return view('admin.page.index', $data);

    }


    public function createPage(){

        return view('admin.page.create');
           
    }


    public function editPage($id){

        $data['page'] = Page::find($id);

        return view('admin.page.edit', $data);
           
    }


    public function deletePage($id){

        $pp = Page::find($id);

        if($pp->delete()){

            return redirect()->back()->with('success', 'Page deleted successfully');

        }

    }


    public function publishPage($id){

        $p = Page::find($id);
        $p->status = 1;

        if($p->save()){

            return redirect()->back()->with('success', 'Page published successfully');

        }
    }


    public function unpublishPage($id){

        $p = Page::find($id);
        $p->status = 0;

        if($p->save()){

            return redirect()->back()->with('success', 'Page unpublished successfully');

        }
    }


    public function createPagePost(Request $request){


        $request->validate([
            'title' => 'required|string|min:12|max:50',
            'content' => 'required|string',
        ]);

        $page = new Page;
        $page->title = $request->title;
        $page->slug = str_replace(' ', '-', strtolower($request->title));
        $page->content = $request->content;

        if($page->save()){

            return redirect()->back()->with('success', 'Page created successfully');

        }

    }


    public function editPagePost(Request $request, $id){


        $request->validate([
            'title' => 'required|string|min:12|max:50',
            'content' => 'required|string',
        ]);


        $page = Page::find($id);
        $page->title = $request->title;
        $page->slug = str_replace(' ', '-', strtolower($request->title));
        $page->content = $request->content;

        if($page->save()){

            return redirect()->back()->with('success', 'Page editted successfully');

        }
        
    }

    public function payments(){

        $data['payments'] = PayoutRequest::paginate(10);

        return view('admin.history.payment', $data);

    }


    public function earnings(){

        $data['earnings'] = EarningHistory::paginate(10);

        return view('admin.history.earning', $data);
        
    }


    public function lHistory(){

        $data['history'] = LoginHistory::paginate(10);

        return view('admin.history.login', $data);

    }


    public function tHistory(){

        $data['history'] = TreadHistory::paginate(10);

        return view('admin.history.tread', $data);
        
    }


    public function approvePayment($id){

        $p = PayoutRequest::find($id);
        $p->status = 1;

        $user = User::find($p->user_id);
        $user->point_earn -= $p->amount / get_setting('point-equal-balance'); 
        $user->save();


        if($p->save()){

            return redirect()->back()->with('success', 'Payment approved successfully');

        }
    }


    public function deletePayment($id){

        $p = PayoutRequest::find($id);

        if($p->delete()){

            return redirect()->back()->with('success', 'Payment deleted successfully');

        }
    }


    public function editTreadPost(Request $request, Tread $tread){


        $request->validate([
            'title' => 'required|string|min:12|max:50',
            'category' => 'required',
            'content' => 'required|string|min:20|max:200',
        ]);

        //$tread->title = $request->title;
        $tread->category_id = $request->category;
        $tread->content = $request->content;
        $tread->user_id = $request->user()->id;
        //$tread->slug = $slug;

        if($request->hasFile('featured_image') && $tread->featured_image != null && $tread->featured_image != "" && Storage::exists($tread->featured_image)){

            Storage::delete($tread->featured_image);

            $tread->featured_image = $request->file('featured_image')->storeAs(
                'public/uploads/images', $tread->slug.'.jpg'
            );

        }

        $tread->save();

        $video_path = TreadVideoPath::where('tread_id', $tread->id)->first();

        if($request->hasFile('attachment') && $video_path->video_path != null && $video_path->video_path != "" && Storage::exists($video_path->video_path)){

            Storage::delete($video_path->video_path);

            $video_path->video_path = $request->file('attachment')->storeAs(
                'public/uploads/videos', $tread->slug.'.mp4'
            );

        }


        if($video_path->save()){

            return redirect()->back()->with('success','Video editted successfully');

        }

    }

    public function editUser(User $user){

        return view('admin.users.edit', compact('user'));

    }

    public function editUserPost(Request $request, User $user){

        $request->validate([
            'fullname' => 'required|string',
            'username' => 'required|string|min:8|unique:users',
            'email' => 'required|email|unique:users',
            'phone_number' => 'required|digits:11|unique:users',
        ]);

        $user->phone_number = $request->phone_number;
        $user->fullname = $request->fullname;
        $user->username = $request->username;
        $user->email = $request->email;

        if(!empty($request->password)){

            $user->password = $request->password;

        }

        if($user->save()){

            return redirect()->back()->with('success','Profile updated successfully');

        }

    }


    public function editTreads(Request $request){


        for ($i=0; $i < count($request->treads); $i++) { 

            //dd($request->sponsored[$i]);

            $t = Tread::find($request->treads[$i]);
            $t->is_ads = $request->ads[$i] == '1' ? 1 : 0;
            $t->is_sponsored = $request->sponsored[$i] == '1' ? 1 : 0;
            $t->is_trending = $request->trending[$i] == '1' ? 1 : 0;
            $t->save();

        }


        return redirect()->back()->with('success','Changes made successfully');

    }


    public function ads(){

        $data['ads'] = Ad::paginate(10);

        return view('admin.ad.index', $data);

    }


    public function createAd(){

        return view('admin.ad.create');
        
    }

    public function createAdPost(Request $request){

        $request->validate([

            'url' => 'required|url',
            'flier' => 'required|image',

        ]);

        $ad = Ad::where('url', $request->url)->exists() ? Ad::where('url', $request->url)->first() : new Ad;
        $ad->url = $request->url;

        if($request->hasFile('flier') && Ad::where('url', $request->url)->exists() && Ad::where('url', $request->url)->first()->ad_image_path != "" && Storage::exists(Ad::where('url', $request->url)->first()->ad_image_path)){

            Storage::delete(Ad::where('url', $request->url)->first()->ad_image_path);

            $ad->ad_image_path = $request->file('flier')->storeAs(
                'public/uploads/ads', time().'.jpg'
            );

        } else {

            $ad->ad_image_path = $request->file('flier')->storeAs(
                'public/uploads/ads', time().'.jpg'
            );

        }


        if($ad->save()){

            return back()->with('success', 'Ad added successfully');

        }
    }


    public function deleteAd(Ad $ad){

        if($ad->delete()){

            return back()->with('success', 'Ad deleted successfully');

        }

    }


    public function statusAd(Request $request){

        for ($i=0; $i < count($request->ads); $i++) { 

            $ad = Ad::find($request->ads[$i]);
            $ad->status = isset($request->status[$i]) && $request->status[$i] == 'on' ? 1 : 0;
            $ad->save();

        }


        return redirect()->back()->with('success','Changes made successfully');

    }

    public function updateUsersRole(Request $request){

        for ($i=0; $i < count($request->users); $i++) { 

            $user = User::find($request->users[$i]);
            $user->role_id = isset($request->roles[$i]) ? $request->roles[$i] : $user->role_id;
            $user->save();

        }


        return redirect()->back()->with('success','Changes made successfully');

    }

    public function createTreadPost(Request $request){

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


}
