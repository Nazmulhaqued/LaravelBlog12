@extends('admin_master')

@section('content')

<div class="row-fluid">
 <div class="span12">
     <!-- BEGIN EXAMPLE TABLE widget-->
     <div class="widget purple">
         <div class="widget-title">
             <h4><i class="icon-reorder"></i> Category Manage Table</h4>
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
                     <th class="sorting_disabled" role="columnheader" rowspan="1" colspan="1" aria-label="Username" style="width: 177px;">Category ID</th>
                     <th class="sorting" role="columnheader" tabindex="0" aria-controls="editable-sample" rowspan="1" colspan="1" aria-label="Full Name: activate to sort column ascending" style="width: 264px;">Category Name</th>
                     <th class="sorting" role="columnheader" tabindex="0" aria-controls="editable-sample" rowspan="1" colspan="1" aria-label="Points: activate to sort column ascending" style="width: 116px;">Status</th>
                     <th class="sorting" role="columnheader" tabindex="0" aria-controls="editable-sample" rowspan="1" colspan="1" aria-label="Edit: activate to sort column ascending" style="width: auto;">Action</th>
                     </tr>
                     </thead>
                     
                 <tbody role="alert" aria-live="polite" aria-relevant="all"><tr class="odd">
                 @foreach($category_name as $single_category_name)
                         <td class="  sorting_1">{{$single_category_name->category_id}}</td>
                         <td class=" "> {{$single_category_name->category_name}}</td>
                         <td class=" "> @if($single_category_name->status == 1) Publish @else Unpublish @endif</td>
                        <td>
                        @if($single_category_name->status==1)
                            <button class="btn btn-danger"><a style="color:#fff;" href="{{URL::to('/unpublish-category/'.$single_category_name->category_id)}}"><i class="icon-thumbs-down"></i></a></button>
                            @else
                            <button class="btn btn-success"><a style="color:#fff;" href="{{URL::to('/publish-category/'.$single_category_name->category_id)}}"><i class="icon-thumbs-up"></i></a></button>
                            @endif
                            <button class="btn btn-success"><a style="color:#fff;" href="{{URL::to('/edit-category/'.$single_category_name->category_id)}}"><i class="icon-pencil"></i></button>

                            <button class="btn btn-danger"><a style="color:#fff;" href="{{URL::to('/delete-category/'.$single_category_name->category_id)}}" onclick="return confirm('Are you sure you want to delete this item?')";><i class="icon-trash "></i></a></button>
                        </td>
                       
                     </tr>
                     @endforeach
                     </tbody></table><div class="row-fluid"><div class="span6"><div class="dataTables_info" id="editable-sample_info">Showing 1 to 5 of 12 entries</div></div><div class="span6"><div class="dataTables_paginate paging_bootstrap pagination"><ul><li class="prev disabled"><a href="#">← Prev</a></li><li class="active"><a href="#">1</a></li><li><a href="#">2</a></li><li><a href="#">3</a></li><li class="next"><a href="#">Next → </a></li></ul></div></div></div></div>
             </div>
         </div>
     </div>
     <!-- END EXAMPLE TABLE widget-->
 </div>
</div>
@endsection