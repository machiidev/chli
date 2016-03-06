<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class test extends Controller
{
    //
      public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function editor()  {
		
	
    
    return View('test/editor');
     
     //return View::make('test')->with('entry', $server);
     
     }
}
