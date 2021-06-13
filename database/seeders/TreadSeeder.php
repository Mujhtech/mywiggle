<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Tread;

class TreadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $ts = [
            [
                "category_id" => 1,
                "user_id" => 1,
                "title" => "I love you sweetheart",
                "slug" => "i-love-you-sweetheart-ck2qgk",
                "content" => "It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).",
                "status" => 1,
                "featured_image" => "uploads/images/i-love-you-sweetheart-ck2qgk.jpg",
                "is_sponsored" => 1,
                "is_trending" => 1,
            ],
        ];

    	foreach ($ts as $t) {
    		$existing = Tread::where('slug', $t['slug'])->get();
    		if( !$existing->isEmpty() ){
    			continue;
    		}
           Tread::create($t);
    	}
    }
}
