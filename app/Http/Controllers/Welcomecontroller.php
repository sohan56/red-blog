<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Welcomecontroller extends Controller
{
    public function index(){

	    $blog = view('pages.bloge');
	       return view('home')
	         ->with('blog',$blog);
    }
    public function protfolio(){

	  $protfolio = view('pages.protfolio');
     return view('home')
            ->with('protfolio',$protfolio);
    }

    public function contact(){

	  $contact = view('pages.contact');
     return view('home')
            ->with('contact',$contact);
    }
    public function services(){

	  $services = view('pages.services');
     return view('home')
            ->with('services',$services);
    }
}
