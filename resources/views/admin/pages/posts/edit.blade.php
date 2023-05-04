@extends('admin.layout.master')
@section('title','Edit Category')
@section('content')
    <div class="container px-4 py-4" style="background-color: #ededed; border-radius: 3px; ">
        <form action="{{route('admin.posts.update',$post->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('put')
            @include('front.widgets.error')
            <div id="">
                <div class="form-group">
                    <label for="title">Title </label>
                    <input type="text" name="title" class="form-control" id="title" value="{{$post->title}}">
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea type="text" cols="20" rows="7" name="description" class="form-control"  id="description" >{{$post->description}}</textarea> te
                </div>
                <div class="form-group">
                    <label for="category">Category </label>
                    <select name="category_id" >
                        @foreach ($categories as $category)
                            <option @if ($category->id==$post->category_id) selected @endif value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                    </select>
                </div>
                <label for="">Status </label>
                <div class="form-group">
                    <label for="active">Active </label>
                    <input type="radio" name="status" value="1" id="active" @if($post->status == 1) checked @endif>
                    <label for="passive">Passive </label>
                    <input type="radio" name="status" value="0" id="passive" @if($post->status == 0) checked @endif>
                </div>
                <div class="form-group">
                    <label for="title">Old Image </label>
                    <img src="{{asset('storage/'.$post->image)}}" height="100px" width="160px">
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