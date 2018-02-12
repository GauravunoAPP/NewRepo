<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\Session;
use Illuminate\Validation\Rule;
use Validator;
use view;
use Hash;
use App\User;

class AuthController extends Controller
{

	public function index()
	{	


	}
	public function signup(Request $request)
		{
			return view ('signup_form');
		}
	public function signme(Request $request)
		{		
				$validator = Validator::make($request->all(), 
					[
						'name' => 'required',
            			'email' => 'unique:users|required', 
            			'password' => 'required',
            			'rpassword' => 'required | same:password',
        			]);

        	if ($validator->fails())
        		{
            	return redirect('signup') ->withErrors($validator)->withInput();
        		}
        	else
        		{
        			$user=new User;

    				$user->name=$request->input('name');
    				$user->email=$request->input('email');
    				$user->password=Hash::make($request->input('password'));
    				$user->save();
			return redirect('signup')->with('status', 'Data Entered Successfully!');
 	       		}

	    
 	     }
}
