@extends('home')

@section('main_content')
<div id="templatemo_content">
            
            <h2>Portfolio Page</h2>
            
        
    		<div id="gallery">
            <ul>
             <?php 
                $all_portfolio = DB::table('tbl_portfolio')
                                    ->orderBy('portfolio_id','desc')
                                    
                                     ->where('publication_status',1)
                                     ->get();

                ?>

                  @foreach($all_portfolio as $v_portfolio)
                <li>
                  
                    <a href="{{asset($v_portfolio->img)}}" class="pirobox" title="Project 1"><img src="{{asset($v_portfolio->img)}}" alt="1" /></a>
                    <h5>{{$v_portfolio->portfolio_title}}</h5>
                   
                    <a href="#">Visit</a>
                   
                </li>
                 @endforeach
               
               
                
               
               
            </ul>
            
            <div class="cleaner"></div>
        </div>
                
       	  </div>
       	  @endsection