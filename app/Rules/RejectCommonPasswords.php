<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class RejectCommonPasswords implements Rule
{

	public function passes($attribute, $value)
	{

		return !in_array($value, [
			'12345',
			'123456',
			'123456789',
			'test1',
			'Password',
			'maria',
			'lovely',
		]);

	}


	public function message()
	{

		return "Please choose a stronger password";

	}

}