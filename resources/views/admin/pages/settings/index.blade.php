@extends('admin.layout.master')
@section('title','Edit Category')
@section('content')
    <div class="container px-4 py-4" style="background-color: #ededed; border-radius: 3px; ">
        <form action="{{route('admin.settings.update',$setting->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('put')
            @include('front.widgets.error')
            <div class="form-group">
                <label for="email">Email </label>
                <input type="text" name="email" class="form-control" id="email" value="{{$setting->email}}">
            </div>
            <div class="form-group">
                <label for="phone">Phone </label>
                <input type="text" name="phone" class="form-control" id="phone" value="{{$setting->phone}}">
            </div>
            <div class="form-group">
                <label for="youtube">Youtube </label>
                <input type="text" name="youtube" class="form-control" id="youtube" value="{{$setting->youtube}}">
            </div>
            <div class="form-group">
                <label for="instagram">Instagram </label>
                <input type="text" name="instagram" class="form-control" id="instagram" value="{{$setting->instagram}}">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection