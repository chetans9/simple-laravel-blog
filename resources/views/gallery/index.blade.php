@extends('layouts.template')

@section('page_css')
<link rel="stylesheet" href="{{URL::asset('css/chocolat.css')}}" type="text/css" media="screen" charset="utf-8">
@endsection

@section('content')
<div class="gallery">
	<div class="container">
		<div class="gallery-top heading">
			<h3>GALLERY</h3>
		</div>
		<section>
			<ul id="da-thumbs" class="da-thumbs">
				@foreach($galleries as $gallery)
				<li>
					<a href="{{asset($gallery->image->original)}}" rel="title" class="b-link-stripe b-animate-go  thickbox">
						<img src="{{asset($gallery->image->thumb)}}" alt="">
						<div>
							<h5>{{$gallery->image_title}}</h5>
							<span>{{$gallery->image_desc}}</span>
						</div>
					</a>
				</li>
				@endforeach
				<div class="clearfix"> </div>
			</ul>
		</section>
	</div>
</div>
@endsection

@section('page_scripts')
<script src="{{URL::asset('js/jquery.chocolat.js')}}"></script>


<script src="{{URL::asset('js/modernizr.custom.97074.js')}}"></script>

<script type="text/javascript" src="{{URL::asset('js/jquery.hoverdir.js')}}"></script>
<script type="text/javascript">
$(function() {
	$(' #da-thumbs > li ').each( function() { $(this).hoverdir(); } );
	$('.gallery a').Chocolat();
});
</script>
@endsection