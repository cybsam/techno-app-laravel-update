@extends('layouts.SupUserMaster')
@section('title', 'Our Expertise ~ About Us - Techno Apogee Limited')
@section('SupUserContent')
@include('dashboard.summernote.summernote')

    <div class="pagetitle">
        <h1>Our Expertise</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('Administrator.index') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('SupUser.AboutUsIndex') }}">About Us</a></li>
                <li class="breadcrumb-item active">Our Expertise</li>
            </ol>
        </nav>
    </div>


    <div class="text-primary">
        @if(Session::get('expSuccess'))
        <b>{{ Session::get('expSuccess') }}</b>
        @endif
    </div>
    <div class="text-danger">
        @if(Session::get('expError'))
        <b>{{ Session::get('expError') }}</b>
        @endif
    </div>
    <div class="card">
        <div class="card-header">
            Our Expertise
            <div class="float-right">
                <button type="button" data-bs-toggle="modal" data-bs-target=".expertiseModel" class="btn btn-primary btn-sm">+ Expertise</button>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-hover datatable table-sm">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Description</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($fetchData as $key => $fetchExpertise)
                        <tr>
                            <td>{{ $fetchExpertise->id }}</td>
                            <td>{{ $fetchExpertise->expertise_name }}</td>
                            <td>{{ Str::limit($fetchExpertise->expertise_description, 100) }}</td>
                            <td>
                                <div class="button-group">
                                    <a href="{{ route('SupUser.OurExpertiseUpdate',['exper_id'=>$fetchExpertise->id]) }}" class="btn btn-secondary btn-sm"><i class="bi bi-pencil-square" aria-hidden="true"></i></a>
                                    <a href="{{ route('SupUser.OurExpertiseDelete',['exper_id'=>$fetchExpertise->id]) }}" class="btn btn-danger btn-sm"><i class="bi bi-trash" aria-hidden="true"></i></a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    

@include('dashboard.about-us.our-expertise.partials.modal')
@endsection
@section('js')
@include('dashboard.about-us.our-expertise.partials.js')
@endsection