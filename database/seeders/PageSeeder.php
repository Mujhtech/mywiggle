<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Page;

class PageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $ppp = [
            [
                "title" => "About Us",
                "slug" => 'about-us',
                "content" => "",
                "status" => 1
            ],
            [
                "title" => "Terms and condition",
                "slug" => 'terms-and-condition',
                "content" => "",
                "status" => 1
            ],
        ];

    	foreach ($ppp as $pp) {
    		$existing = Page::where('slug', $pp['slug'])->get();
    		if( !$existing->isEmpty() ){
    			continue;
    		}
           Page::create($pp);
    	}
    }
}
