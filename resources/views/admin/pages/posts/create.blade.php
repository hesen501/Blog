@extends('admin.layout.master')
@section('title','Create Post')
@section('content')
    <div class="container px-4 py-4" style="background-color: #ededed; border-radius: 3px; ">
        <form action="{{route('admin.posts.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            @include('front.widgets.error')
            <div id="">
                <div class="form-group">
                    <label for="name">Name </label>
                    <input type="text" name="name" class="form-control" id="name"
                            placeholder="Enter name " value="{{old('name')}}">
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
