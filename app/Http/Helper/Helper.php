<?php


use App\Models\Setting;
use Illuminate\Support\Facades\Storage;


if( !function_exists('get_setting') ){

	function get_setting( $name ){

		if(!Setting::where('name', $name)->exists()){

			return null;
			
		}

		$s = Setting::where('name', $name)->first();

		return $s->value;

	}

}


if( !function_exists('get_app_logo') ){

	function get_app_logo( ){

		$s = Setting::where('name', 'app-logo')->first();

		if($s->value == null || $s->value == ""){

			return "https://ui-avatars.com/api/?name=MyWiggle&color=E50916&background=000000";
			
		}

		return Storage::url($s->value);

	}

}


if( !function_exists('generate_slug') ){

	function generate_slug( $title, $length = 6 ) {

	    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';

	    $charactersLength = strlen($characters);
	    $randomString = '';

	    for ($i = 0; $i < $length; $i++) {

	        $randomString .= $characters[rand(0, $charactersLength - 1)];

	    }

	    return str_replace(' ', '-', strtolower($title)).'-'.strtolower($randomString);

	}

}