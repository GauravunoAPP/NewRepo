<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use Session;
use Illuminate\Validation\Rule;
use App\Http\Controllers\input;
use Validator;
use view;
use Hash;
use Auth;
use App\User;
use Html;

class AuthController extends Controller
{
	public function index()
		{
			return view('login');
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

 	    public function userprofile()
		{
			if(Session::has('id') && Session::get('id') != '')
			{
    			return view('userprofile');
			}
			else
			{
				return redirect('/');
			}
 	    }

 	public function login(Request $request)
 		{
		
		$validator = Validator::make($request->all(), 
			[
            	'email' => 'required', 
            	'password' => 'required',
        	]);

        	if ($validator->fails())
        		{
            		return redirect('/') ->withErrors($validator)->withInput();
        		}
        	else
        		{
					$user = array('email' =>$request->input('email'),'password' =>$request->input('password'));

					if (Auth::attempt($user)) 
						{
							$users = User::Select('email','name','id')->where('email','=',$request->input('email'))->first();
							$request->session()->put('id',$users->id);
							$request->session()->put('email',$users->email);
							$request->session()->put('name',$users->name);
							return redirect('userprofile');
						}
					else
							{
								return redirect('/')->with('error','Provide valid Email-ID and Password');
							}
					}	
		}

	public function logout(Request $request)
		{

			Auth::logout();
			Session::flush();
			return redirect('/');
		}
}	