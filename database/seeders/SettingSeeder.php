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
                "name" => "Mujeeb Muhideen",
                "value" => 'admin@myschool.com',
            ],
        ];

    	foreach ($sss as $ss) {
    		$existing = Setting::where('name', $ss['name'])->get();
    		if( !$existing->isEmpty() ){
    			continue;
    		}
           User::create($ss);
    	}
    }
}
