@extends('front.layout.master')
@section('title','Blog site')
@section('content')
<!-- Main Content-->
        
        <div class="container px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-md-10 col-lg-8 col-xl-7">
                    <!-- Post preview-->
                    @foreach ($posts as $post)
                      <div class="post-preview">
                        <a href="{{route('post-single',[$post->category->slug,$post->slug])}}">
                            <h2 class="post-title">{{$post->title}}</h2>
                            <img src="{{asset($post->image)}}" alt="">
                            <h3 class="post-subtitle">{!!Str::limit($post->description, 200)!!}</h3>
                        </a>
                        <p class="post-meta">
                            Category:
                            <a href="#!">{{$post->category->name}}</a>
                            <span class="float-right">posted on {{$post->created_at->format('M d,Y')}}</span> 
                        </p>
                        </div>  
                    @endforeach
                    <div></div>
                    {{$posts->links()}}
                    @if (count($posts)<=0)
                        <div class="alert alert-danger">
                            <h1>Post not found for this category</h1>
                        </div>
                    @endif
                    <!-- Divider-->
                    <hr class="my-4" />
                    <!-- Pager-->
                    <div class="d-flex justify-content-end mb-4"><a class="btn btn-primary text-uppercase" href="#!">Older Posts →</a></div>
                </div>
                @include('front.widgets.category')
            </div>
        </div>        
        
@endsection
