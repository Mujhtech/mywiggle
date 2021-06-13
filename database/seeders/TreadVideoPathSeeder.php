<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\TreadVideoPath;

class TreadVideoPathSeeder extends Seeder
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
                "tread_id" => 1,
                "video_path" => "uploads/videos/i-love-you-sweetheart-ck2qgk.mp4",
            ],
        ];

    	foreach ($ts as $t) {
    		$existing = TreadVideoPath::where('tread_id', $t['tread_id'])->get();
    		if( !$existing->isEmpty() ){
    			continue;
    		}
           Tread::create($t);
    	}
    }
}
