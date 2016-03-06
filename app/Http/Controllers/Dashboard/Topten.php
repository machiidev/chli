<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use View;

class Topten extends Controller
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
    public function server()
    {
    	$url = "http://checklist.dev/api/apigettopten.php";
		$csv = file_get_contents($url);
		$server = json_decode($csv);
		//print_r($server);
         return View::make('test')->with('entry', $server);
    }
}
