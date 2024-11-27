@extends('layouts.SupUserMaster')

@section('title', 'Multiple Image - Techno Apogee')
@section('SupUserContent')


    <div class="pagetitle">
        <h1>Project Multiple Image List</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('Administrator.index') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('SupUser.ProjectComplete') }}">Complete Project List</a></li>
                <li class="breadcrumb-item"><a href="{{ route('SupUser.ProjectComplete') }}">On-Going Project List</a></li>
                <li class="breadcrumb-item active">Project Multiple Image</li>
            </ol>
        </nav>
    </div>

    <div class="">
        <a href="{{ URL::previous() }}" class="btn btn-info">{{ __('Back') }} &#8617;</a>
        <a href="{{ route('SupUser.ProjectCategoryShow') }}" class="btn btn-secondary">Categories list</a>
        <a class="btn btn-primary" href="{{ route('SupUser.ProjectOnGoing') }}">On-Going Project</a>
        <a class="btn btn-primary float-right" href="{{ route('SupUser.ProjectComplete') }}">Complete Project list</a>
    </div>
    <hr>

    <div class="container">
        @if (Session::get('MultiSucc'))
        <div class="alert alert-primary bg-primary text-light border-0 alert-dismissible fade show" role="alert">
            {{ Session::get('MultiSucc') }}
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
        @if (Session::get('MultipleErr'))
        <div class="alert alert-danger bg-danger text-light border-0 alert-dismissible fade show" role="alert">
            {{ Session::get('MultipleErr') }}
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <br>
        <div class="row g-3">
            @foreach ($multipleImageGet as $multipleImage)
            <div class="col-12 col-md-6 col-lg-4">
                <div class="mt-3"></div>
                <div class="card">
                    <div class="card-body">
                        <img src="{{ asset('image/project/multipleimage') }}/{{ $multipleImage->image }}" alt="">
                        <form action="{{ route('SupUserProjectMultile.Update') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <input type="file" class="form-control form-control-sm" name="image" id="image">
                            <input type="hidden" name="id" value="{{ $multipleImage->id }}" hidden>
                            <hr>
                            <button class="btn btn-primary btn-sm"><i class="bi bi-cloud-arrow-up-fill"></i> Update</button>
                            <a href="{{ route('SupUserProjectMultile.Delete',['multiple_id'=>$multipleImage->id]) }}" class="btn btn-danger btn-sm"><i class="bi bi-trash3"></i> Delete</a>
                        </form>
                        
                    </div>
                </div>
                <div class="mt-3"></div>
            </div>
            @endforeach
            
        </div>
    </div>

@include('dashboard.project.partials.modal')
@endsection
@section('js')
@include('dashboard.project.partials.js')
@endsection
