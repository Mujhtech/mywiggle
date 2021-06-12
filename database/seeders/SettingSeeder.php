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
                "value" => null,
            ],
            [
                "name" => "enable-loader",
                "value" => null,
            ],
            [
                "name" => "facebook-link",
                "value" => null,
            ],
            [
                "name" => "twitter-link",
                "value" => null,
            ],
            [
                "name" => "instagram-link",
                "value" => null,
            ],
            [
                "name" => "skype-link",
                "value" => null,
            ],
            [
                "name" => "android-link",
                "value" => null,
            ],
            [
                "name" => "ios-link",
                "value" => null,
            ],
            [
                "name" => "meta-description",
                "value" => ""
            ]
            [
                "name" => "share-post-point",
                "value" => "10"
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
