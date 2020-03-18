@extends('admin.admin_master')

@section('content')


 <div class="row-fluid">
                <div class="span12">
                    <!-- BEGIN VALIDATION STATES-->
                    <div class="widget green">
                        <div class="widget-title">
                            <h4><i class="icon-reorder"></i> Advanced form Validation</h4>
                            <div class="tools">
                                <a href="javascript:;" class="collapse"></a>
                                <a href="#portlet-config" data-toggle="modal" class="config"></a>
                                <a href="javascript:;" class="reload"></a>
                                <a href="javascript:;" class="remove"></a>
                            </div>
                        </div>
                        <div class="widget-body form">
                            <!-- BEGIN FORM-->
                             
                            
                          
                            {!! Form::open(['url' => '/update-category','class'=>'cmxform form-horizontal','id'=>'signupForm','method'=>'post']) !!}
                             @csrf
                                <div class="control-group ">
                                    <label for="firstname" class="control-label">Category Name</label>
                                    <div class="controls">
                                        <input class="span6 " id="" name="category_name" type="text" value="{{$category_info->category_name}}" />
                                        <input class="span6 " id="" name="category_id" type="hidden" value="{{$category_info->category_id}}" />
                                    </div>
                                </div>
                                <div class="control-group ">
                                    <label for="lastname" class="control-label">Category Description</label>
                                    <div class="controls">
                                        
                                        <textarea class="span6 " id="" name="category_description" type="text" >{{$category_info->category_description}}</textarea>
                                    </div>
                                </div>
                               

                                <div class="form-actions">
                                    <button class="btn btn-success" type="submit">Update</button>
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