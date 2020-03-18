@extends('admin.admin_master')

@section('content')


 <div class="row-fluid">
                <div class="span12">
                    <!-- BEGIN VALIDATION STATES-->
                    <div class="widget green">
                        <div class="widget-title">
                            <h4><i class="icon-reorder"></i> Add portfolio</h4>
                            <div class="tools">
                                <a href="javascript:;" class="collapse"></a>
                                <a href="#portlet-config" data-toggle="modal" class="config"></a>
                                <a href="javascript:;" class="reload"></a>
                                <a href="javascript:;" class="remove"></a>
                            </div>
                        </div>
                        <div class="widget-body form">
                            <!-- BEGIN FORM-->
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
                          
                            {!! Form::open(['url' => '/save-portfolio','class'=>'cmxform form-horizontal','id'=>'signupForm','method'=>'post','enctype'=>'multipart/form-data']) !!}
                             @csrf
                                <div class="control-group ">
                                    <label for="firstname" class="control-label">Portfolio Title</label>
                                    <div class="controls">
                                        <input class="span6 " id="" name="portfolio_title" type="text" />
                                    </div>
                                </div>

                               

                               
                                

                                <div class="control-group ">
                                    <label for="lastname" class="control-label">Portfolio Image</label>
                                    <div class="controls">
                                        
                                        <input type="file" name="img">
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

            @endsection