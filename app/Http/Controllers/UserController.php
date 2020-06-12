<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Rules\EmailMatch;
use App\Rules\PasswordMatch;

class UserController extends Controller
{
	public function submit(Request $request)
	{

		$validator = Validator::make($request->all(), [
            		'email' => [
						'required',
						'email:rfc,dns',
						new EmailMatch,
					],
					'password' => [
						'required',
						'min:4',
						'max:20',
						'regex:/^[A-Za-z0-9_]+$/',
						new PasswordMatch,
					],
        ]);
        
        if ($validator->fails()) {

        	return redirect()->back()->withInput()->withErrors($validator);
        
        }

        $email = $request->email;
        $password = $request->password;

        if ($email === 'admin@mail.com' && $password === 'secret') {

        	return view('welcome');

         } else {

        	return redirect()->back()->withInput()->withErrors($validator);
        }

	}
}