@extends('front.layout.master')
@section('title',$post->title)
@section('content')
@section('bg',$post->image)

<!-- Post Content-->
<div class="container px-4 px-lg-5">
    <div class="row gx-4 gx-lg-5 justify-content-center">
        <div class="col-md-10 col-lg-8 col-xl-7">
                <p>{{$post->description}}</p>
                <span style='color:blue'>View Count : <b>{{$post->hit}}</b></span>
            </div>
            @include('front.widgets.category')
        </div>
    </div>


@endsection