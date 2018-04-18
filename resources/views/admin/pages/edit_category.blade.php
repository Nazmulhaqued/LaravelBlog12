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
            	
               
                <?php if(session('msg')){?>
                    <div class="alert alert-success">
                        <?php echo session('msg') ?>
                    </div>
                <?php } ?>

                


                <!-- BEGIN FORM-->

                	{!! Form::open(['url' => '/update-category','method'=>'post', 'class'=>'cmxform form-horizontal', 'id'=>'signupForm']) !!}
                    <div class="control-group ">
                        <label for="firstname" class="control-label">Category Name</label>

                        <div class="controls">
                            <input class="span6 " id="firstname" value="{{$category_info->category_name}}"name="category_name" type="text" />
                            <input class="span6 " id="firstname" value="{{$category_info->category_id}}"name="category_id" type="hidden" />
                        </div>
                    </div>
                    <div class="control-group ">
                        <label for="lastname" class="control-label">Category Description</label>
                        <div class="controls">
                         <textarea class="span6 " id="lastname" name="category_description">{{$category_info->category_description}}</textarea>

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
@stop