<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use Illuminate\Support\Facades\Redirect;

session_start();

class AdminController extends Controller
{
   
    public function index()
    {
         $this->authCheck();
        return view('admin.admin_login');
    }

    public function adminLoginCheck(Request $request)
    {
       
        $email_address = $request->email_address;
        $password = $request->password;

       $result = DB::table('admin')
                ->select('*')
                ->where('admin_email',$email_address)
                ->where('admin_password',md5($password))
                ->first();

                if ($result) {

                    Session::put('admin_id',$result->admin_id);
                    Session::put('admin_name',$result->admin_name);
                    Session::put('access_label',$result->access_label);
                    return Redirect::to('/deshboard');
                }
                else{

                    Session::put('exception','Your User Email Or Password Invalide !');
                    return Redirect::to('/admin');
                }

                /*echo '<pre>';
                print_r($result);

                data dekhar jonno use kora hoi
                */
   }
   public function authCheck()
    {
        $admin_id=Session::get('admin_id');
        if ($admin_id !=NULL)
         {
             return Redirect::to('/deshboard')->send();
        }
    }
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
