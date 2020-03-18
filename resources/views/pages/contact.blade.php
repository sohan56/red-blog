@extends('home')

@section('main_content')

<div id="templatemo_content">
            
            
                <h2>Contact Information</h2>
                
               
        <div class="cleaner_h40"></div>
        
        	<div class="float_l">
            
           		<h6>Address </h6>
                Uttara,Dhaka <br />
                Sector:10<br />
                Tel: 01768284056
                
            </div>
               
                <div class="cleaner_h50"></div>
                
                <div id="contact_form">
                
                <h3>Contact Form</h3>
                
               <h3 style="color: green">
                                     <?php
                                     $message=Session::get('message');
                                     if ($message)
                                      {
                                        echo $message;
                                        Session::put('message','');
                                     }



                                     ?>
                                     </h3>
                             {!! Form::open(['url' => '/save-message','class'=>'form','method'=>'post','enctype'=>'multipart/form-data']) !!}
                                       @csrf
                    
                        <input type="hidden" name="post" value="Send" />
                        <label for="author">Name:</label> <input type="text" id="author" name="name" class="required input_field" />
                        <div class="cleaner_h10"></div>
                        
                        <label for="email">Email:</label> <input type="text" id="email" name="email" class="validate-email required input_field" />
                        <div class="cleaner_h10"></div>
                        
                       
                        <div class="cleaner_h10"></div>
                        
                        <label for="text">Message:</label> <textarea id="text" name="message" rows="0" cols="0" class="required"></textarea>
                        <div class="cleaner_h10"></div>
                        
                        <input type="submit" class="submit_btn" name="submit" id="submit" value="Send" />
                        <input type="reset" class="submit_btn" name="reset" id="reset" value="Reset" />
                    
                    {!! Form::close() !!}
                
                </div> 
            
            
            </div>
@endsection