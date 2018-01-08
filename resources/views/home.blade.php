@extends('layouts.template')
@section('content')
    <!--about-starts-->
    <div class="about">
        <div class="container">
            <div class="about-main">
                
                <div class="col-md-8 about-left">
                    @foreach($featured_posts as $featured_post)
                        <div class="about-one">
                            <p>
                                Featured
                            </p>
                            <h3>
                                {{$featured_post->title}}
                            </h3>
                        </div>

                        <div class="about-two">
                            <a href="{{url('blog/post/'.$featured_post->id)}}">
                                <img alt="" src="{{asset($featured_post->featured_image->medium)}}"/>
                            </a>
                            <p>
                                Posted by
                                <a href="#">
                                    {{$featured_post->user->name}}
                                </a>
                                {{$featured_post->created_at->diffForHumans()}}
                                <a href="#">
                                    comments(2)
                                </a>
                            </p>
                            {!!str_limit($featured_post->content,280)!!}
                            <div class="about-btn">
                                <a href="{{url('blog/post/'.$featured_post->id)}}">
                                    Read More
                                </a>
                            </div>

                            <ul>
                                <li>
                                    <p>
                                        Share :
                                    </p>
                                </li>
                                <li>
                                    <a href="#">
                                <span class="fb">
                                </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                <span class="twit">
                                </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                <span class="pin">
                                </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                <span class="rss">
                                </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                <span class="drbl">
                                </span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    @endforeach
                    {{--  Recent Posts Section --}}
                    <div class="row">
                        {{--<div class="a-1">--}}
                            @php
                                $recent_posts_count = 0;
                            @endphp
                            @foreach($recent_posts as $recent_post)

                                <div class="col-md-6 abt-left">
                                    @php
                                        //$featured_image = json_decode($recent_post->featured_image,true);
                                        //dd($recent_post->featured_image->thumb);

                                    @endphp
                                    <a href="{{url('/blog/post/'.$recent_post->id)}}">
                                        <img alt="" src="{{asset($recent_post->featured_image->thumb)}}"/>
                                    </a>
                                    {{-- <h6>
                                    Find The Most
                                    </h6> --}}
                                    <h3>
                                        <a href="{{url('/blog/post/'.$recent_post->id)}}">
                                            {{$recent_post->title}}
                                        </a>
                                    </h3>
                                    <div>
                                        {!!str_limit($recent_post->content,280)!!}
                                    </div>
                                    <label>
                                        {{$recent_post->created_at->diffForHumans()}}
                                    </label>
                                </div>
                                @php
                                    $recent_posts_count++;
                                @endphp
                                @if($recent_posts_count%2 == 0)
                                    <div class="clearfix"></div>
                                @endif

                            @endforeach

                        {{--</div>--}}
                    </div>
                </div>
                <div class="col-md-4 about-right heading">
                    <div class="blog-list categories-side">
                        <h3>
                            CATEGORIES
                        </h3>

                        <ul>
                            @foreach($post_categories as $post_category)
                                <li>
                                    <a href="{{route('post_category',['id'=>$post_category])}}">
                                        {{$post_category->name}}
                                    </a>
                                </li>
                            @endforeach

                        </ul>

                    </div>

                </div>
            
                
                <div class="col-md-4 about-right heading">
                    <div class="blog-list categories-side">
                        <h3>
                            TAGS
                        </h3>

                        <ul class="tags">
                            @foreach($tags as $tag)
                            <li><a href="{{route('blog.search',['search_str' => $tag->name])}}" class="tag">{{$tag->name}}</a></li>
                            @endforeach
                        </ul>

                    </div>

                </div>

                <div class="clearfix"></div>
            </div>
        </div>
    </div>
    <!--slide-end-->
@endsection
