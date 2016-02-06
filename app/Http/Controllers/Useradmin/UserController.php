<?php

namespace App\Http\Controllers\Useradmin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use App\User;
use App\Group;

class UserController extends Controller
{
	//

	public
	function index()
	{
		//
		$data['users'] = User::all();
		return view('useradmin/user')->with($data);
	}

	public
	function ajax()
	{
		//
		$data['users'] = User::all();
		//$data['groups']->load('manager');
		return ($data);
	}

	public
	function axsave(Request $request)
	{
		//
		$gid      = Input::get('id');

		$response = array(
			'status'=> 'success',
			'msg'   => 'OK!',
		);

		if( $gid  )
		{
			try
			{
				$user = User::find($gid);
				$user->name = Input::get('name');
				$user->login = Input::get('login');
				$user->email = Input::get('email');
				$user->save();
			} //try
			catch( \Illuminate\Database\QueryException $e)
			{
				$response['status'] = "danger";
				$response['msg'] = "Database error: " . $e->getMessage();
				return response()->json($response);
			}
			
			return response()->json($response);
		}
		else
		{
			$rules = array(
				'name' => 'required|max:255',
				'login'=> 'required|max:255|unique:users',
				'email'=> 'required|max:255|unique:users'
			);
			$validator = Validator::make(Input::all(), $rules);

			if($validator->fails())
			{
				$response['status'] = "warning";
				$response['msg'] = $validator->messages()->toJson();
				return response()->json($response);
			}
			else
			{

				try
				{

					$user = new User;

					$user->name = Input::get('name');
					$user->login = Input::get('login');
					$user->email = Input::get('email');
					
					$user->save();
				} catch( \Illuminate\Database\QueryException $e)
				{
					$response['status'] = "danger";
					$response['msg'] = "Database error: " . $e->getMessage();
					return response()->json($response);
				}

				return response()->json($response);
			} //else validatorfails
		} //else
	}



}
