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
                           
                          
                            {!! Form::open(['url' => '/update-blog','class'=>'cmxform form-horizontal','id'=>'signupForm','method'=>'post', 'name'=>'edit_blog','enctype'=>'multipart/form-data']) !!}
                             @csrf
                                <div class="control-group ">
                                    <label for="firstname" class="control-label">Blog Title</label>
                                    <div class="controls">
                                        <input class="span6 " id="" name="blog_title" value="{{$blog_info->blog_title}}" type="text" />
                                         <input class="span6 " id="" name="blog_id" value="{{$blog_info->blog_id}}" type="hidden" />
                                    </div>
                                </div>

                              <div class="control-group ">
                                    <label for="firstname" class="control-label">Category name</label>
                                    <div class="controls">
                                        <?php 
                                        $category_info = DB::table('tbl_category')
                                                             ->where('publication_status',1)
                                                             ->get();

                                        ?>
                                        <select class="span6 "  style="" name="category_id">
                                            
                                            <option value="">Select Category Name</option>
                                            @foreach($category_info as $v_category)
                                            <option value="{{$v_category->category_id}}">{{$v_category->category_name}}</option>
                                            
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="control-group ">
                                    <label for="lastname" class="control-label">Blog Short Description</label>
                                    <div class="controls">
                                        
                                        <textarea class="span6 " id="" name="blog_short_description" type="text">{{$blog_info->blog_short_description}}</textarea>
                                    </div>
                                </div>
                                <div class="control-group ">
                                    <label for="lastname" class="control-label">Blog Long Description</label>
                                    <div class="controls">
                                        
                                        <textarea class="span6 " id="" name="blog_long_description" type="text">{{$blog_info->blog_long_description}}</textarea>
                                    </div>
                                </div>

                                <div class="control-group ">
                                    <label for="lastname" class="control-label">Blog Image</label>
                                    <div class="controls">
                                        
                                        <input type="file" name="blog_img"> <span><img src="{{asset($blog_info->blog_img)}}" width="50" height="50"></span>
                                        <input type="hidden" name="blog_old_img" value="{{$blog_info->blog_img}}">
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
                                    <button class="btn btn-success" type="submit">update Blog</button>
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
                document.forms['edit_blog'].elements['publication_status'].value='<?php echo $blog_info->publication_status ?>';

                document.forms['edit_blog'].elements['category_id'].value='<?php echo $blog_info->category_id ?>';
            </script>

            @endsection