<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use Carbon\Carbon;
use Illuminate\Support\Facades\Redirect;
use Symfony\Component\HttpFoundation\File\File;
session_start();

class ServiceController extends Controller
{
     public function add_service()
    {
    	return view('admin.service.add_service');
    }
     public function save_service(Request $request)
    {
    	
    	$data = array();
    	$data['service_name'] = $request->service_name;
    	$data['service_description'] = $request->service_description;
    	$data['publication_status'] = $request->publication_status;
    	$data['created_at'] = Carbon::now();

    	DB::table('tbl_service')
                  ->insert($data);
        Session::put('message','Save  information successfully !');
        return Redirect::to('/add-service');
    	 
    }
     public function manage_service()
    {
        $all_service = DB::table('tbl_service')
                         ->get();
        return view('admin.service.manage_service')
                         ->with('all_service',$all_service);

    }
     public function unpublish_service($service_id)
    {
        DB::table('tbl_service')
             ->where('service_id',$service_id)
             ->update(['publication_status'=>0]);
              return Redirect::to('/manage-service');
       

    }
    public function publish_service($service_id)
    {
        DB::table('tbl_service')
             ->where('service_id',$service_id)
             ->update(['publication_status'=>1]);
              return Redirect::to('/manage-service');
       

    }
    public function delete_service($service_id)
    {
        DB::table('tbl_service')
             ->where('service_id',$service_id)
             ->delete();
              return Redirect::to('/manage-service');
    }

     public function edit_service($service_id)
    {
       $service_info = DB::table('tbl_service')
             ->where('service_id',$service_id)
             ->first();
              return view('admin.service.edit_service')
                         ->with('service_info', $service_info);
    }
     public function update_service(Request $request)
    {
        $data = array();
        $service_id=$request->service_id;
        $data['service_name'] = $request->service_name;
        $data['service_description'] = $request->service_description;
         $data['publication_status'] = $request->publication_status;
        $data['updated_at'] = Carbon::now();
        DB::table('tbl_service')
                  ->where('service_id',$service_id)
                  ->update($data);

        return Redirect::to('/manage-service');

    }

}
