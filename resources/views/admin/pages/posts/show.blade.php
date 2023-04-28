@extends('admin.layout.master')
@section('title','View Category')
@section('content')
    <div class="container" class="container px-4 py-4" style="background-color: #ededed; border-radius: 3px;height:500px ">
        <div class="row">
            <div class="col-4">
                <h3>Name</h3>
                <p class="text-info">{{ $post->name }}</p>
            </div>
        </div>
    </div>
@endsection