@extends('admin.admin_master')

@section('content')


 <div class="row-fluid">
                <div class="span12">
                    <!-- BEGIN VALIDATION STATES-->
                    <div class="widget green">
                        <div class="widget-title">
                            <h4><i class="icon-reorder"></i> Edit Portfolio</h4>
                            <div class="tools">
                                <a href="javascript:;" class="collapse"></a>
                                <a href="#portlet-config" data-toggle="modal" class="config"></a>
                                <a href="javascript:;" class="reload"></a>
                                <a href="javascript:;" class="remove"></a>
                            </div>
                        </div>
                        <div class="widget-body form">
                            <!-- BEGIN FORM-->
                           
                          
                            {!! Form::open(['url' => '/update-portfolio','class'=>'cmxform form-horizontal','id'=>'signupForm','method'=>'post','enctype'=>'multipart/form-data','name'=>'edit_portfolio']) !!}
                             @csrf
                                <div class="control-group ">
                                    <label for="firstname" class="control-label"  >Portfolio Title</label>
                                    <div class="controls">
                                        <input class="span6 " id="" name="portfolio_title" type="text" value="{{$portfolio_info->portfolio_title}}" />
                                         <input class="span6 " id="" name="portfolio_id" type="hidden" value="{{$portfolio_info->portfolio_id}}" />
                                    </div>
                                </div>

                               

                               
                                

                                <div class="control-group ">
                                    <label for="lastname" class="control-label">Portfolio Image</label>
                                    <div class="controls">
                                        
                                        <input type="file" name="img"><span><img src="{{asset($portfolio_info->img)}}" width="50" height="50"></span>
                                         <input type="hidden" name="img" value="{{$portfolio_info->img}}">
                                    </div>
                                </div>


                                <div class="control-group">
                                    <label for="" class="control-label">Publication Status</label>
                                    <div class="controls">

                                        
                                        <select class="span6 "  style="" name="publication_status">
                                            
                                            <option value="">Select Status</option>
                                            <option value="1">publish</option>
                                            <option value="0">Unpublish</option>
                                            
                                        </select>
                                    </div>
                                </div>

                                <div class="form-actions">
                                    <button class="btn btn-success" type="submit">Save portfolio</button>
                                    <button class="btn" type="reset">Cancel</button>
                                </div>
                                {!! Form::close() !!}

                           <!-- </form>-->
                            <!-- END FORM-->
                        </div>
                    </div>
                    <!-- END VALIDATION STATES-->
                </div>
            </div>
              <script type="text/javascript">
                document.forms['edit_portfolio'].elements['publication_status'].value='<?php echo $portfolio_info->publication_status ?>';

               
            </script>

            @endsection