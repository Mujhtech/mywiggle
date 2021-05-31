<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $rrr = [
            [
                "name" => "Admin"
            ],
            [
                "name" => "User"
            ],
        ];

    	foreach ($rrr as $rr) {
    		$existing = Role::where('name', $rr['name'])->get();
    		if( !$existing->isEmpty() ){
    			continue;
    		}
           Role::create($rr);
    	}
    }
}
