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
                "email" => 'admin@myschool.com',
                "role_id" => "1",
                "password" => "12345678",
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
