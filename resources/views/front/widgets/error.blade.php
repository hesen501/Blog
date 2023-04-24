@if (!empty($errors->all()))
    <ul>
        @foreach ($errors->all() as $error)
            <li> <div class="alert alert-danger">{{$error}}</div></li>
        @endforeach
    </ul>
@endif