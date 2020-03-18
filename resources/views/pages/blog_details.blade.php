
@extends('home')
@section('main_content')



<div id="templatemo_content">
   
        
    		<div class="post_section">
            
            	<div class="post_date">
                	30<span>Nov</span>
            	</div>
<div class="post_content">
                
                    <h2><a href="">{{$blog_info->blog_title}}</a></h2>

                    <strong>Author:</strong>{{$blog_info->author_name}} | <strong>Category:</strong> <a href="#">PSD</a>, <a href="#">{{$blog_info->created_at}}</a>

                    @if($blog_info->blog_img)
                    <a href="#" target="_parent"><img src="{{asset($blog_info->blog_img)}}" width="500" height="300" alt="image" /></a>
                    @endif
                    
                    <p>{{$blog_info->blog_long_description}}</p>
                    <p><a href="">24 Comments</a> </p>
</div>
                <div class="cleaner"></div>
            </div>
                
            
        
       	  </div>

@endsection
