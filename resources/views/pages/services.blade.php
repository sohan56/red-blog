@extends('home')

@section('main_content')

 <div id="templatemo_content">
            
            
                <h2>Our Services</h2>
               
                <div><br />
                </div>
                <p>&nbsp;</p>
                
              <div class="cleaner_h30"></div>

            <?php 
            $all_publish_service = DB::table('tbl_service')
                                 ->where('publication_status',1)
                                 ->get();

            ?>
               @foreach($all_publish_service as $v_service)
                <div class="service_box">
                    <h3>{{$v_service->service_name}}</h3>
                    
                    <div class="left">
                        <img src="{{asset('public/assets/')}}/images/chart2.png" alt="image" />
                    </div>
                    <div class="right">
                        <p>{{$v_service->service_description}} </p>
                
                    
                    </div>
                    <div class="cleaner"></div>
                </div>
                @endforeach
            
            
            </div>
@endsection