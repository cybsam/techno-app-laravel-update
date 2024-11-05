@extends('layouts.SupUserMaster')
@section('title', 'Our Expertise ~ About Us - Techno Apogee Limited')
@section('SupUserContent')
@include('dashboard.summernote.summernote')

    <div class="pagetitle">
        <h1>Update Expertise</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('Administrator.index') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('SupUser.AboutUsIndex') }}">About Us</a></li>
                <li class="breadcrumb-item"><a href="{{ route('SupUser.OurExpertiseIndex') }}">Expertise</a></li>
                <li class="breadcrumb-item active">Update Expertise</li>
            </ol>
        </nav>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title">
                            Expertise Update
                        </div>
                        <div class="text-info">
                            @if (Session::get('expertiseUpdSuc'))
                                <div class="alert alert-primary bg-primary text-light border-0 alert-dismissible fade show"
                                    role="alert">
                                    {{ Session::get('expertiseUpdSuc') }}
                                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                </div>
                                
                            @endif
                        </div>
                        <div class="text-danger">
                            @if (Session::get('expertiseUpdateFail'))
                            <div class="alert alert-danger bg-danger text-light border-0 alert-dismissible fade show" role="alert">
                                {{ Session::get('expertiseUpdateFail') }}
                                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                            
                            @endif
                        </div>
                        <form action="{{ route('SupUser.OurExpertiseUpdatePost') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="">Expertise Name</label>
                                <input type="text" name="expertise_name" value="{{ $fetchExpertData->expertise_name }}" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">Description or education</label>
                                <textarea name="expertise_description" class="form-control" id="summernote" cols="30" rows="10">{{ $fetchExpertData->expertise_description }}</textarea>
                                <input type="hidden" name="id" value="{{ $fetchExpertData->id }}">
                            </div>
                            <div class="d-grid gap-2 col-6 mx-auto">
                                <button type="submit" class="btn btn-outline-warning text-black">Update Expertise</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
    <script>
        $('#summernote').summernote({
            placeholder: 'Description...',
            tabsize: 2,
            height: 200
        });
    </script>
@endsection