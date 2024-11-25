@extends('layouts.SupUserMaster')

@section('title', 'insert PDF - Techno Apogee')
@section('SupUserContent')


<div class="pagetitle">
    <h1>Files</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('Administrator.index') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('supUser.companyProfileShow') }}">Company profile</a></li>
            <li class="breadcrumb-item active">Insert PDF</li>
        </ol>
    </nav>
</div>


<div class="container">
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                @if (Session::get('fileAlreadyAvailable'))
                        <div class="alert alert-primary bg-danger text-light border-0 alert-dismissible fade show"
                            role="alert">
                            {{ Session::get('fileAlreadyAvailable') }}
                            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert"
                                aria-label="Close"></button>
                        </div>
                    @endif
                <div class="card-header">
                    <a href="{{ route('supUser.companyProfileShow') }}" class="btn btn-primary float-right">Return Back</a>
                </div>
                <div class="card-body">
                    <form action="{{ route('supUser.companyProfileInsertSave') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="form-file">Identity Name</label>
                            <input type="text" value="{{ old('identity') }}" name="identity" placeholder="PDF identity" id="identity" class="form-control">
                            <div class="text-danger">
                                @error('identity')
                                    <b>{{ $message }}</b>
                                @enderror
                            </div>
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="form-file">Profile PDF</label>
                            <input type="file" name="pdf" id="pdf" class="form-control">
                            <div class="text-danger">
                                @error('pdf')
                                    <b>{{ $message }}</b>
                                @enderror
                            </div>
                        </div>
                        <br>
                        <div class="form-group">
                            <div class="d-grid gap-2 col-6 mx-auto">
                                <button class="btn btn-primary" type="submit">Insert File</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>



@endsection