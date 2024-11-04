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
                        <form action="" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="">Expertise Name</label>
                                <input type="text" name="" value="{{ $fetchExpertData->expertise_name }}" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">Expertise Name</label>
                                {{-- <input type="text" name="" value="{{ $fetchExpertData->expertise_name }}" class="form-control"> --}}
                                <textarea name="summernote" class="form-control" id="summernote" cols="30" rows="10">{{ $fetchExpertData->expertise_description }}</textarea>
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