@extends('admin.layout.master')
@section('title','Create Page')
@section('content')
    <div class="container px-4 py-4" style="background-color: #ededed; border-radius: 3px; ">
        <form action="{{route('admin.pages.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            @include('front.widgets.error')
            <div id="">
                <div class="form-group">
                    <label for="title">title </label>
                    <input type="text" name="title" class="form-control" id="title"
                            placeholder="Enter title " value="{{old('title')}}">
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea type="text" name="description" class="form-control" id="description" ></textarea>
                </div>
            </div>
            <div class="form-group">
                <label for="image">Image </label>
                <input type="file" name="image" class="form-control" id="image" >
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
