<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Category;
use App\Models\Ad;
use App\Models\Page;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        $data['cat'] = Category::get();
        $data['ads'] = Ad::get();
        $data['pages'] = Page::where('is_frontend', 1)->get();

        view::share($data);
    }
}
