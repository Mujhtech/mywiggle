<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $ccc = [
            [
                "name" => "Short Skit",
                "slug" => 'short-skit',
            ],
            [
                "name" => "Instagram Skit",
                "slug" => 'instagram-skit',
            ],
            [
                "name" => "Youtube Skit",
                "slug" => 'youtube-skit',
            ],
        ];

    	foreach ($ccc as $cc) {
    		$existing = Category::where('slug', $cc['slug'])->get();
    		if( !$existing->isEmpty() ){
    			continue;
    		}
           Category::create($cc);
    	}
    }
}
