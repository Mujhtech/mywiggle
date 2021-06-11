<?php


use App\Models\Setting;


if( !function_exists('get_setting') ){

	function get_setting( $name ){

		$s = Setting::where('name', $name)->first();

		return $s->value;

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