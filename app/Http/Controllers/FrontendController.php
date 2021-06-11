<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Tread;
use App\Models\Page;

class FrontendController extends Controller
{

    public function index()
    {
        //
        $tread = Tread::where('status', 1);
        $data['short_skit'] = $tread->orderBy('id', 'DESC')->take(10)->get();
        $data['slider_video'] = $tread->orderBy('id', 'DESC')->take(3)->get();
        $data['sponsored'] = $tread->where('is_sponsored', 1)->orderBy('id', 'DESC')->take(10)->get();
        $data['trending'] = $tread->orderBy('id', 'DESC')->take(10)->get();
        $data['popular'] = $tread->orderBy('id', 'DESC')->take(10)->get();

        return view('user.index', $data);

    }

    public function single($slug)
    {
        //
        $tread = Tread::where('slug', $slug)->first();
        $tread->views += 1;
        $tread->save()

        $data['tread'] = $tread;
        $data['title'] = $tread->title;

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
            $data['cat'] = Tread::where('category_id', $slug)->paginate(20);

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


    public function allvideo()
    {
        //
        $data['all'] = Tread::paginate(20);

        return view('user.all', $data);

    }

    public function share( $platform, $slug ){

    }

    
}
