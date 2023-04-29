@extends('admin.layout.master')
@section('title','Posts')
@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">

    <div class="card-body">
        <a href="{{route('admin.posts.create')}}" class="alert alert-primary">Create Post</a>
    </div>
    <!-- Page Heading -->

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>image</th>
                            <th>Title</th>
                            <th>Category</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($posts as $post)
                        <tr>
                            <td><img src="{{asset($post->image)}}" height="60px" width="100px" alt=""></td>
                            <td>{{$post->title}}</td>
                            <td>
                            @if ($post->category_id>0)
                                {{$post->category->name}}
                            @else
                                {{'empty'}}
                            @endif
                            <td>@if($post->status==0)  
                                <span class='text-danger'>Passive</span>
                                @else 
                                <span class='text-success'>Active</span></td>
                                @endif
                            </td>
                            <td>
                                <a href="{{route('admin.posts.edit',$post->id)}}" class="btn btn-primary btn-circle btn-sm">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <a href="{{route('admin.posts.show',$post->id)}}" class="btn btn-warning btn-circle btn-sm">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <form action="{{ route('admin.posts.destroy',$post->id) }}"
                                    method="post">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-danger btn-circle btn-sm">
                                    <i class="fas fa-trash"></i>
                                </button>
                                </form>
                            </td>
                        </tr> 
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
@endsection