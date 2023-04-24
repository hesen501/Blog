<div class="col-md-3">
    <div class="card">
        <div class="card-header">Categories</div>  
        <div class="list-group">
            @foreach ($categories as $category)
            <li class="list-group-item @if (Request::segment(2)==$category->slug) active @endif"> 
                <a style="color: black" href="{{route('category',$category->slug)}}">{{$category->name}}</a> 
                <span class="badge bg-danger float-right">{{$category->postcount()}}</span>
            </li>
            @endforeach
        </div>   
    </div>
</div>