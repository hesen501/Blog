@extends('front.layout.master')
@section('title','Contact')
@section('content')
    <main class="mb-4">
        <div class="container px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-md-10 col-lg-8 col-xl-7">
                        <form method="POST" action="{{route('send')}}" id="contactForm">
                            @csrf
                            <div class="form-group controls">
                                <label for="name">FullName</label>
                                <input name="fullname" value="{{old('fullname')}}" class="form-control" id="name" type="text" placeholder="Enter your name..." />
                            </div>
                            <div class="form-group controls">
                                <label for="email">Email address</label>
                                <input name="email" value="{{old('email')}}" class="form-control" id="email" type="email" placeholder="Enter your email..." />
                            </div>
                            <div class="form-group controls">
                                <label for="phone">Phone Number</label>
                                <input name="phone" value="{{old('phone')}}" class="form-control" id="phone" type="tel" placeholder="Enter your phone number..." />
                            </div>
                                <label for="message">Message</label>
                                <textarea name="message" value="{{old('message')}}" class="form-control" id="message" placeholder="Enter your message here..." style="height: 12rem"></textarea>
                            <br />
                            @include('front.widgets.error')
                            <!-- Submit Button-->
                            <button class="btn btn-primary text-uppercase" id="submitButton" type="submit">Send</button>
                        </form>
                </div>
            </div>
        </div>
    </main>
@endsection