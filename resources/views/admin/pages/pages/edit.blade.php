@extends('admin.layout.master')
@section('title','Edit Page')
@section('content')
    <div class="container px-4 py-4" style="background-color: #ededed; border-radius: 3px; ">
        <form action="{{route('admin.pages.update',$page->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('put')
            @include('front.widgets.error')
            <div id="">
                <div class="form-group">
                    <label for="title">Title </label>
                    <input type="text" name="title" class="form-control" id="title" value="{{$page->title}}">
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea type="text" cols="20" rows="7" name="description" class="form-control"  id="description" >{{$page->description}}</textarea>
                </div>
            </div>
            <div class="form-group">
                <label for="title">Old Image </label>
                <img src="{{asset('storage/'.$page->image)}}" height="100px" width="160px">
            </div>
            <div class="form-group">
                <label for="image">Image </label>
                <input type="file" name="image" class="form-control" id="image" >
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection