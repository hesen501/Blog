@extends('admin.layout.master')
@section('title','Categories')
@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">

    <div class="card-body">
        <a href="{{route('admin.pages.create')}}" class="alert alert-primary">Create Page</a>
    </div>
    <!-- Page Heading -->

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Image</th>
                            <th>Title</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pages as $page)
                        <tr>
                            <td><img src="{{ asset('storage/'.$page->image) }}" height="60px" width="100px" alt=""></td>
                            <td>{{$page->title}}</td>
                            <td>
                                <a href="{{route('admin.pages.edit',$page->id)}}" class="btn btn-primary btn-circle btn-sm">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <a href="{{route('admin.pages.show',$page->id)}}" class="btn btn-warning btn-circle btn-sm">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <form action="{{ route('admin.pages.destroy',$page->id) }}"
                                    method="POST">
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