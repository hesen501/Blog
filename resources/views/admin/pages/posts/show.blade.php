@extends('admin.layout.master')
@section('title','View Category')
@section('content')
    <div class="container" class="container px-4 py-4" style="background-color: #ededed; border-radius: 3px;height:500px ">
        <div class="row">
            <div class="col-4">
                <h3>Title</h3>
                <p class="text-info">{{ $post->title }}</p>
                <h3>Title</h3>
                <p class="text-info">{!! $post->description !!}</p>
                <h3>Category</h3>
                <p class="text-info">{{ $post->category->name }}</p>
            </div>
            <div class="col-4">
                <h3>Image</h3>
                <img src="{{asset('storage/'.$post->image)}}" height="100px" width="160px">
                <h3>View count</h3>
                <p class="text-info">{{ $post->hit }}</p>
            </div>
        </div>
    </div>
@endsection