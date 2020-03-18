<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use Carbon\Carbon;
use Illuminate\Support\Facades\Redirect;
use Symfony\Component\HttpFoundation\File\File;
session_start();

class PortfoioController extends Controller
{
      public function add_portfolio()
    {
      
        return view('admin.portfolio.add_portfolio');
                        
       
    }
     public function save_portfolio(Request $request)
    {
       
        $data = array();
        $data['portfolio_title'] = $request->portfolio_title;
        $data['publication_status'] = $request->publication_status;
        $data['created_at'] = Carbon::now();

        //image uploading code s

        $files = $request->file('img'); //form fild name
        $filename = $files->getClientOriginalName();
        $extension = $files->getClientOriginalExtension();
        $picture = date('His').$filename;
        $image_url = 'public/portfolio_image/'.$picture; //for DB table
        $destinationPath = base_path() .'/public/portfolio_image'; //for server image upload
        $success = $files->move($destinationPath,$picture);

        if ($success) {
            $data['img'] = $image_url;
            DB::table('tbl_portfolio')
                  ->insert($data);
        

        }
      
        Session::put('message','Save  information successfully !');
        return Redirect::to('/add-portfolio');
 
    }
     public function manage_portfolio()
    {
        $all_portfolio = DB::table('tbl_portfolio')
                         ->get();
        return view('admin.portfolio.manage_portfolio')
                         ->with('all_portfolio',$all_portfolio);

    }
     public function unpublish_portfolio($portfolio_id)
    {
        DB::table('tbl_portfolio')
             ->where('portfolio_id',$portfolio_id)
             ->update(['publication_status'=>0]);
              return Redirect::to('/manage-portfolio');
       

    }
    public function publish_portfolio($portfolio_id)
    {
        DB::table('tbl_portfolio')
             ->where('portfolio_id',$portfolio_id)
             ->update(['publication_status'=>1]);
              return Redirect::to('/manage-portfolio');
       

    }
    public function delete_portfolio($portfolio_id)
    {
        DB::table('tbl_portfolio')
             ->where('portfolio_id',$portfolio_id)
             ->delete();
              return Redirect::to('/manage-portfolio');
    }
     public function edit_portfolio($portfolio_id)
    {
       $portfolio_info = DB::table('tbl_portfolio')
             ->where('portfolio_id',$portfolio_id)
             ->first();
              return view('admin.portfolio.edit_portfolio')
                         ->with('portfolio_info', $portfolio_info);
    }
     public function update_portfolio(Request $request)
    {
        $data = array();
        $portfolio_id=$request->portfolio_id;
       
        $data['portfolio_title'] = $request->portfolio_title;
       
        $data['publication_status'] = $request->publication_status;
        $data['created_at'] = Carbon::now();

        //image uploading code s

        $files = $request->file('img'); //form fild name
        
        if ( $files)
         {
        $filename = $files->getClientOriginalName();
        $data['img'] = $request->old_img;
        $extension = $files->getClientOriginalExtension();
        $picture = date('His').$filename;
        $image_url = 'public/portfolio_image/'.$picture; //for DB table
        $destinationPath = base_path() .'/public/portfolio_image'; //for server image upload
        $success = $files->move($destinationPath,$picture);

        if ($success) {
            $data['img'] = $image_url;
            DB::table('tbl_portfolio')
                  ->where('portfolio_id',$portfolio_id)
                  ->update($data);
                  unlink($request->old_img);
                  return Redirect::to('/manage-portfolio');
        }
      }
      else{
        DB::table('tbl_portfolio')
                  ->where('portfolio_id',$portfolio_id)
                  ->update($data);

        
        return Redirect::to('/manage-portfolio');

        }
          
    }
}
