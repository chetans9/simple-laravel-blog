@extends('layouts.template')
@section('content')


<div class="container">
    <div class="single-top">
        <div class="abt-2">
			<h3>Search Results for "{{$search_str}}"</h3>
				@foreach($search_results as $post)
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
					{{ $search_results->links()}}
				</div>
											
		</div>
    </div>
</div>
@endsection