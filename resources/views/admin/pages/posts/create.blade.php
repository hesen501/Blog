@extends('admin.layout.master')
@section('title','Create Post')
@section('content')
    <div class="container px-4 py-4" style="background-color: #ededed; border-radius: 3px; ">
        <form action="{{route('admin.posts.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            @include('front.widgets.error')
            <div id="">
                <div class="form-group">
                    <label for="title">Title </label>
                    <input type="text" name="title" class="form-control" id="title" value="">
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea type="text" name="description" class="form-control" id="description" ></textarea>
                </div>
                <div class="form-group">
                    <label for="category">Category </label>
                    <select name="category_id" >
                        @foreach ($categories as $category)
                            <option  value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                    </select>
                </div>
                <label for="">Status </label>
                <div class="form-group">
                    <label for="active">Active </label>
                    <input type="radio" name="status" value="1" id="active" >
                    <label for="passive">Passive </label>
                    <input type="radio" name="status" value="0" id="passive" >
                </div>
                <div class="form-group">
                    <label for="image">Image </label>
                    <input type="file" name="image" class="form-control" id="image" >
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
