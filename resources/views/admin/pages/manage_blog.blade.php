@extends('admin.admin_master')

@section('content')


<div class="row-fluid">
                 <div class="span12">
                     <!-- BEGIN EXAMPLE TABLE widget-->
                     <div class="widget purple">
                         <div class="widget-title">
                             <h4><i class="icon-reorder"></i> Editable Table</h4>
                            <span class="tools">
                                <a href="javascript:;" class="icon-chevron-down"></a>
                                <a href="javascript:;" class="icon-remove"></a>
                            </span>
                         </div>
                         <div class="widget-body">
                             <div>
                                 <div class="clearfix">
                                     <div class="btn-group">
                                         <button id="editable-sample_new" class="btn green">
                                             Add New <i class="icon-plus"></i>
                                         </button>
                                     </div>
                                     <div class="btn-group pull-right">
                                         <button class="btn dropdown-toggle" data-toggle="dropdown">Tools <i class="icon-angle-down"></i>
                                         </button>
                                         <ul class="dropdown-menu pull-right">
                                             <li><a href="#">Print</a></li>
                                             <li><a href="#">Save as PDF</a></li>
                                             <li><a href="#">Export to Excel</a></li>
                                         </ul>
                                     </div>
                                 </div>
                                 <div class="space15"></div>
                                 <div id="editable-sample_wrapper" class="dataTables_wrapper form-inline" role="grid"><div class="row-fluid"><div class="span6"><div id="editable-sample_length" class="dataTables_length"><label><select size="1" name="editable-sample_length" aria-controls="editable-sample" class="xsmall"><option value="5" selected="selected">5</option><option value="15">15</option><option value="20">20</option><option value="-1">All</option></select> records per page</label></div></div><div class="span6"><div class="dataTables_filter" id="editable-sample_filter"><label>Search: <input type="text" aria-controls="editable-sample" class="medium"></label></div></div></div>
                                 <table class="table table-striped table-hover table-bordered dataTable" id="editable-sample" aria-describedby="editable-sample_info">
                                     <thead>
                                     <tr role="row">
                                        <th class="sorting_disabled" role="columnheader" rowspan="1" colspan="1" aria-label="Username" style="width: 193px;">Blog Id</th>
                                        <th class="sorting" role="columnheader" tabindex="0" aria-controls="editable-sample" rowspan="1" colspan="1" aria-label="Full Name: activate to sort column ascending" style="width: 288px;">Blog Title</th>
                                        <th class="sorting" role="columnheader" tabindex="0" aria-controls="editable-sample" rowspan="1" colspan="1" aria-label="Points: activate to sort column ascending" style="width: 128px;">Status</th>
                                        <th class="sorting" role="columnheader" tabindex="0" aria-controls="editable-sample" rowspan="1" colspan="1" aria-label="Notes: activate to sort column ascending" style="width: 184px;">Action</th>
                                        
                                    </tr>
                                     </thead>
                                     
                                 <tbody role="alert" aria-live="polite" aria-relevant="all">
                                    @foreach($all_blog as $v_blog)
                                    <tr class="odd ">
                                         <td class="  sorting_1">{{$v_blog->blog_id}}</td>
                                         <td class=" ">{{$v_blog->blog_title}}</td>
                                         <td class=" ">
                                             @if($v_blog->publication_status==1)
                                             Publish
                                             @else
                                             Unpublish
                                             @endif
                                         </td>
                                         <td class="center ">
                                            @if($v_blog->publication_status==1)
                                            <a href="{{URL::to('/unpublish-blog',$v_blog->blog_id)}}" class="btn btn-danger"><i class="icon-thumbs-down"></i></a>
                                            @else
                                            <a href="{{URL::to('/publish-blog',$v_blog->blog_id)}}" class="btn btn-success"><i class="icon-thumbs-up"></i></a>
                                            @endif
                                            <a href="{{URL::to('/edit-blog',$v_blog->blog_id)}}" class="btn btn-primary"><i class="icon-pencil"></i></a>
                                            @if(Session::get('access_label')==2)
                                            <a href="{{URL::to('/delete-blog',$v_blog->blog_id)}}" class="btn btn-danger" onclick="return checkDelete()"><i class="icon-trash"></i></a>
                                            @endif

                                         </td>
                                         
                                     </tr>
                                     @endforeach
                                     
                                 </tbody>
                             </table>
                             <div class="row-fluid">
                                <div class="span6">
                                    <div class="dataTables_info" id="editable-sample_info">Showing 1 to 5 of 12 entries</div>
                                </div>
                                <div class="span6">
                                    <div class="dataTables_paginate paging_bootstrap pagination">
                                        <ul><li class="prev disabled"><a href="#">? Prev</a></li>
                                            <li class="active"><a href="#">1</a></li>
                                            <li><a href="#">2</a></li>
                                            <li><a href="#">3</a></li>
                                            <li class="next"><a href="#">Next ? </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                             </div>
                         </div>
                     </div>
                     <!-- END EXAMPLE TABLE widget-->
                 </div>
             </div>


                 @endsection