@extends('layouts.SupUserMaster')
@section('title', 'Image Slider Front-page ~ Techno Apogee Engineering Limited')
@section('SupUserContent')

    <div class="pagetitle">
        <h1>Insert Slider </h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('Administrator.index') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="">Settings</a></li>
                <li class="breadcrumb-item"><a href="{{ route('SupUser.FrontSliderImage') }}">Slider</a></li>
                <li class="breadcrumb-item active">Insert Slider</li>
            </ol>
        </nav>
    </div>
    <hr>

    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div class="card">
                    <div class="card body">
                        @if ($errors->all())
                            <span class="text-danger">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </span>
                        @endif
                        @if (Session::get('somethingW'))
                            <div class="alert alert-danger bg-danger text-light border-0 alert-dismissible fade show" role="alert">
                                {{ Session::get('somethingW') }}
                                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        @endif
                        <form action="{{ route('SupUser.FrontSliderInsertSave') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="">Image only .png and .jpg image support</label>
                                <input type="file" name="image" id="image" class="form-control">
                                <br>
                            </div>
                            <div class="form-group">
                                <label for="">Name of this image is?</label>
                                <input type="text" name="typeofimage" id="typeofimage" class="form-control">
                                <br>
                            </div>
                            <div class="">
                                <button type="submit" class="btn btn-success">Insert Image</button>
                                <button type="reset" class="btn btn-secondary">Reset</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>



@endsection
