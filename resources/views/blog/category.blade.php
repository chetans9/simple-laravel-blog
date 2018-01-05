@extends('layouts.template')
@section('content')


<div class="container">
    <div class="single-top">
        <div class="category-blog-list">
			<h3>{{$category->name}}</h3>
			<hr>
				@foreach($posts as $post)
					<div class="might-grid">
						<div class="grid-might">
							<a href="{{route('post',['id'=>$post->id])}}"><img src="{{asset($post->featured_image->thumb)}}" class="img-responsive" alt=""> </a>
						</div>
						<div class="might-top">
							<h4><a href="{{route('post',['id'=>$post->id])}}">{{$post->title}}</a></h4>
							<p>{!!str_limit($post->content,280)!!}</p> 
						</div>
						<div class="clearfix"></div>
					</div>
				@endforeach	
				<div class="text-center">
					{{ $posts->links()}}
				</div>								
		</div>
    </div>
</div>
@endsection