<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use Carbon\Carbon;
use Illuminate\Support\Facades\Redirect;

class MessageController extends Controller
{
	public function save_message(Request $request)
    {

    	$data = array();
    	$data['name'] = $request->name;
    	$data['email'] = $request->email;
    	$data['message'] = $request->message;
    	$data['publication_status'] = $request->publication_status;
    	$data['created_at'] = Carbon::now();

    	DB::table('tbl_message')
                  ->insert($data);
        Session::put('message','Message sent successfully !');
        return Redirect::to('/contact');
    }
    
    
}
