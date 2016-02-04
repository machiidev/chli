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
    
    public function index()
    {
        //
        $data['users']= User::all();
        return view('useradmin/user')->with($data);
    }    
    
    public function ajax()
    {
        //
        $data['users']= User::all();
        //$data['groups']->load('manager');
        return ($data);
    }
    
    public function axsave(Request $request)
    {
        //


        $response = array(
            'status' => 'success',
            'msg' => 'OK!',
        );
        

        $rules = array(
            'fname'       => 'required',
            'flogin'     => 'required',
            'femail'      => 'required'
        );
        $validator = Validator::make(Input::all(), $rules);

        if ($validator->fails()) {
        	$response['status']="warning";
        	$response['msg']=$validator->messages()->toJson();
            return response()->json($response);
        } else {

        try {
            $gid = Input::get('fid');
            if ( $gid  ) {
                $user= User::find($gid);
            } else {
                $user = new User;
                
            };
            $user->name       = Input::get('fname');
            $user->login     = Input::get('flogin');
            $user->email      = Input::get('femail');
            //$user = \App\User::find(1) ;
            $user->save();
        } catch ( \Illuminate\Database\QueryException $e) {
            $response['status']="danger";
            $response['msg']="Database error: " . $e->getMessage();
            return response()->json($response);
        }
            //return Response::json( $response );

            return response()->json($response);
      } //validatorf

    }
    
    
    
}
