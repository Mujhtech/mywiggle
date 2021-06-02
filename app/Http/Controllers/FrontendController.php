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
        $data['categories'] = Category::get();

        return view('user.index', $data);

    }

    public function single($slug)
    {
        //
        $data['categories'] = Category::where('slug', $slug)->first();

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

            $data['categories'] = Category::where('slug', $slug)->first();

            return view('user.category', $data);

        } else {

            abort(404);

        }

    }


    public function search(Request $request)
    {
        //
        $data['id'] = $request['s'];
        $get_tread = Tread::where('title','LIKE','%'.$id.'%')->where('status', 1)->where('is_tread', 1)->orderBy('created_at', 'DESC')->get();

        return view('user.search', $data);

    }

    
}
