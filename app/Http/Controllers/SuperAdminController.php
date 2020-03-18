<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use Carbon\Carbon;
use Illuminate\Support\Facades\Redirect;
use Symfony\Component\HttpFoundation\File\File;
session_start();

class SuperAdminController extends Controller
{
    public function __construct()
   {

   }
    public function index()
    {
        $this->authCheck();
    	return view('admin.pages.deshboard');
    	
    	//function for Super Admin

    }

     public function logout()
    {
        Session::put('admin_name','');
        Session::put('admin_id','');
        Session::put('message','You are successfully Logout !');
        return Redirect::to('/admin');
        
        //function for  Admin logout

    }
    public function authCheck()
    {
        $admin_id=Session::get('admin_id');
        if ($admin_id ==NULL)
         {
             return Redirect::to('/admin')->send();
        }
    }

    public function add_category()
    {
    	return view('admin.pages.add_category');
    	
    	  // function for Add category

    }
     public function save_category(Request $request)
    {
    	/*
    	dd($request->all());
    	browser a data dekhar jonno ai code gulo use kora hoi
    	*/

    	$data = array();
    	$data['category_name'] = $request->category_name;
    	$data['category_description'] = $request->category_description;
    	$data['publication_status'] = $request->publication_status;
    	$data['created_at'] = Carbon::now();

    	DB::table('tbl_category')
                  ->insert($data);
        Session::put('message','Save category information successfully !');
        return Redirect::to('/add-category');
    	  // function for save category
    }

    public function manage_category()
    {
        $all_category = DB::table('tbl_category')
                         ->get();
        return view('admin.pages.manage_category')
                         ->with('all_category',$all_category);
        
          // function for manage category

    }
     public function unpublish_category($category_id)
    {
        DB::table('tbl_category')
             ->where('category_id',$category_id)
             ->update(['publication_status'=>0]);
              return Redirect::to('/manage-category');
       

    }
    public function publish_category($category_id)
    {
        DB::table('tbl_category')
             ->where('category_id',$category_id)
             ->update(['publication_status'=>1]);
              return Redirect::to('/manage-category');
       

    }
    public function delete_category($category_id)
    {
        DB::table('tbl_category')
             ->where('category_id',$category_id)
             ->delete();
              return Redirect::to('/manage-category');
       

    }
    public function edit_category($category_id)
    {
       $category_info = DB::table('tbl_category')
             ->where('category_id',$category_id)
             ->first();
              return view('admin.pages.edit_category')
                         ->with('category_info', $category_info);
    }
     public function update_category(Request $request)
    {
        $data = array();
        $category_id=$request->category_id;
        $data['category_name'] = $request->category_name;
        $data['category_description'] = $request->category_description;
        $data['updated_at'] = Carbon::now();
        DB::table('tbl_category')
                  ->where('category_id',$category_id)
                  ->update($data);

        return Redirect::to('/manage-category');

    }

    // function for Blog
    public function add_blog()
    {
        $category_info=DB::table('tbl_category')
                                ->get();
        return view('admin.pages.add_blog')
                         ->with('category_info',$category_info);
          

    }


    public function save_blog(Request $request)
    {
        
        //dd($request->all());
        //browser a data dekhar jonno ai code gulo use kora hoi
        

        $data = array();
        $data['category_id'] = $request->category_id;
        $data['blog_title'] = $request->blog_title;
        $data['blog_short_description'] = $request->blog_short_description;
        $data['blog_long_description'] = $request->blog_long_description;
        $data['author_name'] = Session::get('admin_name');
        //$data['blog_img'] = $request->blog_img;
       
        $data['publication_status'] = $request->publication_status;
        $data['created_at'] = Carbon::now();

        //image uploading code s

        $files = $request->file('blog_img'); //form fild name
        $filename = $files->getClientOriginalName();
        $extension = $files->getClientOriginalExtension();
        $picture = date('His').$filename;
        $image_url = 'public/blog_image/'.$picture; //for DB table
        $destinationPath = base_path() .'/public/blog_image'; //for server image upload
        $success = $files->move($destinationPath,$picture);

        if ($success) {
            $data['blog_img'] = $image_url;
            DB::table('tbl_blog')
                  ->insert($data);
        

        }
       // else{
         //   $error = $files->getErrorMessage();
          //  print_r($error);


        //}
        Session::put('message','Save blog information successfully !');
        return Redirect::to('/add-blog');
 
        //DB::table('tbl_blog')
        //          ->insert($data);
        //Session::put('message','Save blog information successfully !');
       // return Redirect::to('/add-blog');
         
    }
    public function manage_blog()
    {
        $all_blog = DB::table('tbl_blog')
                         ->get();
        return view('admin.pages.manage_blog')
                         ->with('all_blog',$all_blog);

    }
    public function unpublish_blog($blog_id)
    {
        DB::table('tbl_blog')
             ->where('blog_id',$blog_id)
             ->update(['publication_status'=>0]);
              return Redirect::to('/manage-blog');
       

    }
    public function publish_blog($blog_id)
    {
        DB::table('tbl_blog')
             ->where('blog_id',$blog_id)
             ->update(['publication_status'=>1]);
              return Redirect::to('/manage-blog');
       

    }
    public function delete_blog($blog_id)
    {
        DB::table('tbl_blog')
             ->where('blog_id',$blog_id)
             ->delete();
              return Redirect::to('/manage-blog');
       

    }
    public function edit_blog($blog_id)
    {
       $blog_info = DB::table('tbl_blog')
             ->where('blog_id',$blog_id)
             ->first();


              $category_info = DB::table('tbl_category')
                         ->get();

              return view('admin.pages.edit_blog')
                         ->with('blog_info', $blog_info)
                         ->with('category_info', $category_info);
    }
     public function update_blog(Request $request)
    {
        $data = array();
        $blog_id=$request->blog_id;
        $data['category_id'] = $request->category_id;
        $data['blog_title'] = $request->blog_title;
        $data['blog_short_description'] = $request->blog_short_description;
        $data['blog_long_description'] = $request->blog_long_description;
        $data['author_name'] = Session::get('admin_name');
        $data['publication_status'] = $request->publication_status;
        $data['created_at'] = Carbon::now();

        //image uploading code s

        $files = $request->file('blog_img'); //form fild name
        
        if ( $files)
         {
        $filename = $files->getClientOriginalName();
        $data['blog_img'] = $request->blog_old_img;
        $extension = $files->getClientOriginalExtension();
        $picture = date('His').$filename;
        $image_url = 'public/blog_image/'.$picture; //for DB table
        $destinationPath = base_path() .'/public/blog_image'; //for server image upload
        $success = $files->move($destinationPath,$picture);

        if ($success) {
            $data['blog_img'] = $image_url;
            DB::table('tbl_blog')
                  ->where('blog_id',$blog_id)
                  ->update($data);
                  unlink($request->blog_old_img);
                  return Redirect::to('/manage-blog');
        }
      }
      else{
        DB::table('tbl_blog')
                  ->where('blog_id',$blog_id)
                  ->update($data);

        
        return Redirect::to('/manage-blog');

        }
          
    }
    public function blog_details($blog_id)
    {
        $blog_info = DB::table('tbl_blog')
                   ->where('blog_id',$blog_id)
                   ->first();

        $data['hit_counter'] = $blog_info->hit_counter+1;//code for popolar blog
        
                    DB::table('tbl_blog')
                   ->where('blog_id',$blog_id)
                   ->update($data);


         
        $blog_details = view('pages.blog_details')
                    ->with('blog_info',$blog_info);
         return view('home')
                  ->with('blog_details',$blog_details);

    }
    public function search_blog(Request $request)
    {
      $search_text = $request->search_text;
      $search_blog=DB::table('tbl_blog')
          ->where('publication_status',1)
          ->where('blog_title','like','%'.$search_text.'%')
          ->orderBy('blog_id','desc')
          ->get();

           $blog = view('pages.search_blog')
                        ->with('search_blog' ,$search_blog);
                        return view('home')
                       ->with('blog',$blog);

    }

}
