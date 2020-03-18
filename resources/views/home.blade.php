<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Red Blog </title>
<meta name="keywords" content="Red Blog Theme, Free CSS Templates" />
<meta name="description" content="Red Blog Theme - Free CSS Templates by templatemo.com" />
<link href="{{asset('public/assets/templatemo_style.css')}}" rel="stylesheet" type="text/css" />

</head>
<body>

<div id="templatemo_top_wrapper">
	<div id="templatemo_top">
    
        <div id="templatemo_menu">
                    
            <ul>
                <li><a href="{{url('/')}}" class="current">Home</a></li>
                <li><a href="{{url('/protfolio')}}">Portfolio</a></li>
                <li><a href="{{url('/services')}}">Services</a></li>
                <li><a href="{{url('/contact')}}">Contact Us</a></li>
            </ul>    	
        
        </div> <!-- end of templatemo_menu -->
        
        <div id="twitter">
        	<a href="#">follow us <br />
        	on twitter</a>
        </div>
        
  </div>
</div>

<div id="templatemo_header_wrapper">
	<div id="templatemo_header">
    
    	<div id="site_title">
            <h1><a href="http://www.templatemo.com" target="_parent"><strong>Red Blog</strong><span></span></a></h1>
        </div>
    
    </div>
</div>

<div id="templatemo_main_wrapper">
	<div id="templatemo_main">
		<div id="templatemo_main_top">
        
        	@yield('main_content')
            
          
          <div id="templatemo_sidebar">

            <?php 
            $all_publish_category = DB::table('tbl_category')
                                 ->where('publication_status',1)
                                 ->get();

            ?>
                <h4>Categories</h4>
                <ul class="templatemo_list">
                    @foreach($all_publish_category as $v_category)
        
                    <li><a href="index.html">{{$v_category->category_name}}</a></li>
                    @endforeach
                </ul>
                
                <div class="cleaner_h40"></div>

                <?php 
                $latest_blog = DB::table('tbl_blog')
                                    ->orderBy('blog_id','desc')
                                    ->limit(3)
                                     ->where('publication_status',1)
                                     ->get();

                ?>
                
                <h4>Latest Blog</h4>
                <ul class="templatemo_list">
                    @foreach($latest_blog as $v_blog)
                    <li><a href="{{URL::to('blog-details/'.$v_blog->blog_id)}}" target="_parent">{{$v_blog->blog_title}}</a></li>
                    @endforeach
                    
                </ul>

                 <?php 
                $populer_blog = DB::table('tbl_blog')
                                    ->orderBy('hit_counter','desc')
                                    ->limit(3)
                                     ->where('publication_status',1)
                                     ->get();

                ?>

                <h4>Populer Blog</h4>
                <ul class="templatemo_list">
                    @foreach($populer_blog as $v_blog)
                    <li><a href="{{URL::to('blog-details/'.$v_blog->blog_id)}}" target="_parent">{{$v_blog->blog_title}}(Hit:{{$v_blog->hit_counter}})</a></li>
                    @endforeach
                    
                </ul>
                
                <div id="ads">
                	<a href="#"><img src="{{asset('public/assets/')}}/images/templatemo_200x100_banner.jpg" alt="banner 1" /></a>
                    
                    <a href="#"><img src="{{asset('public/assets/')}}/images/templatemo_200x100_banner.jpg" alt="banner 2" /></a>
                </div>
                
            </div>
        
        	<div class="cleaner"></div>
            
        </div>
        
    </div>
    
    <div id="templatemo_main_bottom"></div>
    
</div>

<div id="templatemo_footer">

    Copyright © 2048 <a href="">SRS IT</a> | 
   
    
</div>

</body>
</html>