<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $users = [
            [
                "fullname" => "Mujeeb Muhideen",
                "email" => 'admin@mywiggle.com',
                "username" => "Mujhtech",
                "role_id" => "1",
                "phone_number" => "0707686576",
                "password" => "12345678",
                "referred_by" => "1",
                "referral_code" => "857878"
            ],
        ];

    	foreach ($users as $user) {
    		$existingUser = User::where('email', $user['email'])->get();
    		if( !$existingUser->isEmpty() ){
    			continue;
    		}
           User::create($user);
    	}
    }
}
