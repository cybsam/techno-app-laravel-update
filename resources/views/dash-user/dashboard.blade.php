@extends('dash-user.layouts.master')
@section('title', 'User Dashboard ~ Fire Panel Repair & Maintenance BD - Techno Apogee Limited')
@section('content')


<h1 class="float-center">
    
</h1>
<div class="container">
    <div class="row">
        <div class="col-md-10 m-auto">
            <div class="card">
                <div class="card-header">
                    <div>
                        User: <b>{{ Auth::user()->name }}</b>
                    </div>
                    <div class="text-right">
                        <a class="align-item-center btn btn-secondary" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <span>Sign Out</span>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="contactlist">
                        
                        <img src="{{ asset('image/users') }}/{{ Auth::user()->user_image }}" width="60" height="60"  alt="{{ Auth::user()->name }}">
                        <br>
                        <h6>hello - {{ Auth::user()->name }} , Welcome to our world. </h6>
                        <div>
                            <h6>Your Activity: </h6>
                        </div>
                    </div>
                    <hr>
                    <div class="contactlist text-center">
                        <form action="{{ route('frontEnd.ContactStore') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @if ($errors->all())
                                <span style="color: red;">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </span>
                            @endif
                            @if (Session::get('succFrontEnd'))
                                <span style="color: green">{{ Session::get('succFrontEnd') }}</span>
                            @endif
                            @if (Session::get('errFrontEnd'))
                                <span style="color: red">{{ Session::get('errFrontEnd') }}</span>
                            @endif
                            <h5>Your opinion, Contact the administrator</h5>
                            <div class="row">
                                <div class="col">
                                    <input type="text" name="sender_name" class="form-control" value="{{ Auth::user()->name }}" placeholder="Your Name">
                                </div>
                                <div class="col">
                                    <input type="text" name="sender_number" class="form-control" placeholder="Mobile No.">
                                </div>
                            </div>
                            <div class="row mt-4">
                                <div class="col">
                                    <input type="text" name="sender_subject" class="form-control" placeholder="Subject">
                                </div>
                                <div class="col">
                                    <input type="email" name="sender_email" class="form-control" value="{{ Auth::user()->email }}" placeholder="Email Address">
                                </div>
                            </div>
                            <div class="message">
                                <textarea name="sender_message" id="sender_message" placeholder="Message"></textarea>
                            </div>
                            <div>
                                {!! HCaptcha::display() !!}
                            </div>
                            <button type="submit">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection