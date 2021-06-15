<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Setting;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $sss = [
            [
                "name" => "app-name",
                "value" => 'MyWiggle',
            ],
            [
                "name" => "app-description",
                "value" => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Libero quis beatae officia saepe perferendis voluptatum minima eveniet voluptates dolorum, temporibus nisi maxime nesciunt totam repudiandae commodi sequi dolor quibusdam',
            ],
            [
                "name" => "app-logo",
                "value" => null,
            ],
            [
                "name" => "enable-ads",
                "value" => false,
            ],
            [
                "name" => "enable-loader",
                "value" => false,
            ],
            [
                "name" => "facebook-link",
                "value" => "#",
            ],
            [
                "name" => "twitter-link",
                "value" => "#",
            ],
            [
                "name" => "instagram-link",
                "value" => "#",
            ],
            [
                "name" => "whatsapp-link",
                "value" => "#",
            ],
            [
                "name" => "android-link",
                "value" => "#",
            ],
            [
                "name" => "ios-link",
                "value" => "#",
            ],
            [
                "name" => "meta-description",
                "value" => "Lorem ipsum, dolor sit amet consectetur adipisicing elit"
            ],
            [
                "name" => "share-post-point",
                "value" => "10"
            ],
            [
                "name" => "point-equal-balance",
                "value" => "5"
            ]
        ];

    	foreach ($sss as $ss) {
    		$existing = Setting::where('name', $ss['name'])->get();
    		if( !$existing->isEmpty() ){
    			continue;
    		}
           Setting::create($ss);
    	}
    }
}
