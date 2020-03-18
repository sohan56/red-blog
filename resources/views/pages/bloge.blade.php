
@extends('home')
@section('main_content')


<?php
$all_blog=DB::table('tbl_blog')
          ->where('publication_status',1)
          ->orderBy('blog_id','desc')
          ->get();
?>

<div id="templatemo_content">
  <div>
    {!! Form::open(['url' => '/search-blog','method'=>'post']) !!}
      <input type="text" name="search_text" size="40">
      <input type="submit" name="btn" value="Search Blog">
    {!! Form::close() !!}
  </div>
    @foreach($all_blog as $v_blog)
        
    		<div class="post_section">
            
            	<div class="post_date">
                	30<span>Nov</span>
            	</div>
<div class="post_content">
                
                    <h2><a href="{{'blog-details/'.$v_blog->blog_id}}">{{$v_blog->blog_title}}</a></h2>

                    <strong>Author:</strong>{{$v_blog->author_name}} | <strong>Category:</strong> <a href="#">PSD</a>, <a href="#">{{$v_blog->created_at}}</a>

                    @if($v_blog->author_name)
                    <a href="#" target="_parent"><img src="{{asset($v_blog->blog_img)}}" width="500" height="300" alt="image" /></a>
                    @endif
                    
                    <p>{{$v_blog->blog_short_description}}</p>
                    <p><a href="#">24 Comments</a> | <a href="{{URL::to('blog-details/'.$v_blog->blog_id)}}">Continue reading...</a>                </p>
</div>
                <div class="cleaner"></div>
            </div>
                
            
        @endforeach
       	  </div>

@endsection
