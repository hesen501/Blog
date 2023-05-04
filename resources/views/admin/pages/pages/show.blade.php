@extends('admin.layout.master')
@section('title','View Page')
@section('content')
    <div class="container" class="container px-4 py-4" style="background-color: #ededed; border-radius: 3px;height:500px ">
        <div class="row">
            <div class="col-4">
                <h3>Title</h3>
                <p class="text-info">{{ $page->title }}</p>
                <h3>Description</h3>
                <p class="text-info">{{ $page->description }}</p>
            </div>
            <div class="col-4">
                <h3>Image</h3>
                <img src="{{asset('storage/'.$page->image)}}" height="100px" width="160px">
            </div>
        </div>
    </div>
@endsection