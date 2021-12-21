<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Tread;
use App\Models\Page;
use Auth;
use App\Models\EarningHistory;
use App\Models\TreadHistory;
use App\Models\WatchList;

class FrontendController extends Controller
{

    public function index()
    {
        //
        $data['short_skit'] = Tread::where('status', 1)->where('is_short_skit', 1)->orderBy('id', 'DESC')->take(10)->get();
        $data['slider_video'] = Tread::where('status', 1)->orderBy('id', 'DESC')->take(5)->get();
        $data['sponsored'] = Tread::where('status', 1)->where('is_sponsored', 1)->orderBy('id', 'DESC')->take(10)->get();
        $data['trending'] = Tread::where('status', 1)->where('is_trending', 1)->orderBy('id', 'DESC')->take(10)->get();
        $data['popular'] = Tread::where('status', 1)->where('is_popular', 1)->orderBy('id', 'DESC')->take(10)->get();
        $data['social_media'] = Tread::where('status', 1)->where('is_social_media', 1)->orderBy('id', 'DESC')->take(10)->get(); 
        $data['ads'] = Tread::where('status', 1)->where('is_ads', 1)->orderBy('id', 'DESC')->take(3)->get();

        return view('user.index', $data);

    }

    public function single($slug)
    {
        //
        $tread = Tread::where('slug', $slug)->first();
        $tread->views += 1;
        $tread->save();

        $data['tread'] = $tread;
        $data['title'] = $tread->title;
        $data['related'] = Tread::where('id', '!=', $tread->id)->where('category_id', $tread->category_id)->get();

        return view('user.single', $data);

    }


    public function page($slug)
    {
        //
        if(Page::where('slug', $slug)->exists()){

            $data['page'] = Page::where('slug', $slug)->first();

            return view('user.page', $data);

        } else {

            abort(404);

        }

    }


    public function category($slug)
    {
        //
        if(Category::where('slug', $slug)->exists()){
            $cat = Category::where('slug', $slug)->first();

            $data['title'] = $cat->name;
            $data['cat'] = Tread::where('category_id', $cat->id)->paginate(20);

            return view('user.category', $data);

        } else {

            abort(404);

        }

    }


    public function search(Request $request)
    {
        //
        $data['id'] = $request['s'];
        $data['search'] = Tread::where('title','LIKE','%'.$request['s'].'%')->where('status', 1)->orderBy('created_at', 'DESC')->paginate(20);

        return view('user.search', $data);

    }


    public function allvideo($type)
    {
        //
        if($type == "sponsored"){
            $data['all'] = Tread::where('is_sponsored', 1)->paginate(20);
        } elseif($type == "popular"){
            $data['all'] = Tread::where('is_popular', 1)->paginate(20);
        } elseif($type == "short"){
            $data['all'] = Tread::where('is_short_skit', 1)->paginate(20);
        } elseif($type == "trending"){
            $data['all'] = Tread::where('is_trending', 1)->paginate(20);
        } else {
            $data['all'] = Tread::paginate(20);
        }

        return view('user.all', $data);

    }

    public function share( $platform, $slug ){

        $tread = Tread::where('slug', $slug)->first();

        if(Auth::check() && !TreadHistory::where('tread_id', $tread->id)->where('user_id', Auth::user()->id)->exists()){

            $th = new TreadHistory;
            $th->tread_id = $tread->id;
            $th->user_id = Auth::user()->id;
            $th->save();

            $eh = new EarningHistory;
            $eh->user_id = Auth::user()->id;
            $eh->amount = get_setting('share-post-point');
            $eh->description = "You earned ".get_setting('share-post-point')." for sharing ".$tread->title;
            $eh->save();

            $user = Auth::user();
            $user->point_earn += get_setting('share-post-point');
            $user->save(); 

        }

        if ( $platform == 'twitter' ) {

            return redirect()->away("https://twitter.com/intent/tweet?text=".urlencode(url('/')."/video/".$slug));

        } elseif ( $platform == 'instagram' ) {

            return redirect()->away('');
            
        } elseif ( $platform == 'facebook' ) {
            
            return redirect()->away("https://www.facebook.com/sharer/sharer.php?u=".urlencode(url('/')."/video/".$slug));

        } elseif ( $platform == 'whatsapp' ) {
            
            return redirect()->away("whatsapp://send?text=".urlencode(url('/')."/video/".$slug));
            
        } else {

            return redirect()->back();

        }

    }

    public function addToWatchList( $slug ){

        //dd($slug);

        if(Auth::check()){

            $tread = Tread::where('slug', $slug)->first();

            if(WatchList::where('tread_id', $tread->id)->where('user_id', 1)->exists()){

                return redirect()->back()->with('error', 'Already added to watch list');


            } else {

                $wl = new WatchList;
                $wl->tread_id = $tread->id;
                $wl->user_id = Auth::user()->id;
                $wl->save();

                return redirect()->back()->with('success', 'Video added to watch list successfully');

            }

        } else {

            return redirect()->back()->with('error', 'Please login to add to watch list');

        }
    }

    
}
