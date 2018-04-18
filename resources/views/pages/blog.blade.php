
@extends('home')

@section('main_content')

<?php
    $all_blog=DB::table('tbl_blog')
                    ->where('publication_status',1)
                    ->get();

?>

<div id="templatemo_content">
    @foreach($all_blog as $Vall_blog)  
    <div class="post_section">
    
        <div class="post_date">
            30<span>Nov</span>
        </div>
<div class="post_content">
                
        <h2><a href="blog_post.html">{{$Vall_blog->blog_title}}</a></h2>

        <strong>Author:</strong> {{$Vall_blog->author_name}} | <strong>Category:</strong> <a href="#">{{$Vall_blog->category_id}}</a>
        
        <a href="http://www.templatemo.com/page/1" target="_parent"><img src="{{asset('public/assets/')}}/images/templatemo_image_01.jpg" alt="image" /></a>
        
        <p>{{$Vall_blog->blog_short_description}}</p>
        <p><a href="blog_post.html">24 Comments</a> | <a href="blog_post.html">Continue reading...</a> </p>
</div>
        <div class="cleaner"></div>
    </div>
    @endforeach  

  </div>
    

@endsection