@extends('admin_master')

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
            	
            <h2>
                <?php
                $message = Session::get('message');
                if($message){
                    echo $message;
                    Session::put('message','');
                }
                ?>
            </h2>
                <!-- BEGIN FORM-->

        	{!! Form::open(['url' => '/save-blog','method'=>'post', 'class'=>'cmxform form-horizontal', 'id'=>'signupForm']) !!}
            <div class="control-group ">
                <label for="firstname" class="control-label">Blog Title</label>
                <div class="controls">
                    <input class="span6 " id="firstname" name="blog_title" type="text" />
                </div>
            </div>
            <div class="control-group ">
                <label for="firstname" class="control-label">Category Name</label>
                <div class="controls">
                    <select class="span6 " data-placeholder="Choose a Category" tabindex="-1" id="selXZ1" name="category_id" >
                        <option value="">Select Category</option>
                        @foreach($category_info as $vcategory_info)
                        <option value="{{$vcategory_info->category_id}}">{{$vcategory_info->category_name}}</option>
                        @endforeach
                    </select>
                </div>

            </div>
            <div class="control-group ">
                <label for="lastname" class="control-label">Blog Short Description</label>
                <div class="controls">
                 <textarea class="span6 " id="lastname" name="blog_short_description"></textarea>

                </div>
                </div>
                <div class="control-group ">
                    <label for="lastname" class="control-label">Blog Long Description</label>
                    <div class="controls">
                     <textarea class="span6 " id="lastname" name="blog_long_description"></textarea>

                    </div>
                </div>
                <div class="control-group ">
                    <label for="lastname" class="control-label">Blog Image</label>
                    <div class="controls">
                     <input type="file" name="blog_image">
                    </div>
                </div>


                <div class="control-group ">
                	<label for="lastname" class="control-label">Category Description</label>
                	<div class="controls">
                    	<select class="span6 " data-placeholder="Choose a Category" tabindex="-1" id="selXZ1" name="publication_status" >
                            <option value="">Select Status</option>
                            <option value="1">Publish</option>
                            <option value="0">Unpublish</option>
                        </select>
                    </div>
                </div>

                <div class="form-actions">
                    <button class="btn btn-success" type="submit">Save</button>
                    <button class="btn" type="button">Cancel</button>
                </div>
                {!! Form::close() !!}
            <!-- END FORM-->
        </div>
    </div>
    <!-- END VALIDATION STATES-->
</div>
</div>

<script type="text/javascript">
            // for Insert Ajax
            $('#insert').click(function(){
                $.ajax({
                    type:'post',
                    url: 'insertdata',
                    data:{
                        '_token':$('input[name=_token').val(),
                        'name':$('input[name=name').val(),
                        'age':$('input[name=age').val(),
                        'email':$('input[name=email').val(),
                        'address':$('input[name=address').val()
                    },
                    success:function(data){
                        window.location.reload();
                    },
                });
            });

            // for Update Ajax
            $('#update').click(function(){
                $.ajax({
                    type:'post',
                    url: 'updatedata',
                    data:{
                        '_token':$('input[name=_token').val(),
                        'id':$('#upid').val(),
                        'name':$('input[name=upname').val(),
                        'age':$('input[name=upage').val(),
                        'email':$('input[name=upemail').val(),
                        'address':$('input[name=upaddress').val()
                    },
                    success:function(data){
                        window.location.reload();
                    },
                });
            });

                // for Delete Ajax
                $('#delete').click(function(){
                    $.ajax({
                        type:'post',
                        url: 'deletedata',
                        data:{
                            '_token':$('input[name=_token').val(),
                            'id':$('#delid').val(),
                        },
                        success:function(data){
                            window.location.reload();
                        },
                    });
                });
            </script>
            
@endsection