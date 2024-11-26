@extends('layouts.SupUserMaster')

@section('title', 'Complete Project - Techno Apogee Limited')
@section('SupUserContent')
    @include('dashboard.summernote.summernote')

    <div class="pagetitle">
        <h1>Category wise project list</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('Administrator.index') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('SupUser.ProjectOnGoing') }}">Project On-Going</a></li>
                <li class="breadcrumb-item"><a href="{{ route('SupUser.ProjectComplete') }}">Complete Project list</a></li>
                <li class="breadcrumb-item active">Category wise project</li>
            </ol>
        </nav>
    </div>
    @if (Session::get('ProjectArchiveComplete'))
        <div class="alert alert-primary bg-primary text-light border-0 alert-dismissible fade show" role="alert">
            {{ Session::get('ProjectArchiveComplete') }}
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
<div class="">
    <a href="{{ URL::previous() }}" class="btn btn-info">{{ __('Back') }} &#8617;</a>
    <a href="{{ route('SupUser.ProjectCategoryShow') }}" class="btn btn-secondary">Categories list</a>
    <a class="btn btn-primary float-right" href="{{ route('SupUser.ProjectOnGoing') }}">On-Going Project</a>
    
</div>
<hr>
    <table class="table table-hover datatable table-sm">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Project Name</th>
                <th scope="col">Category</th>
                <th scope="col">Group</th>
                <th scope="col">Image</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($fetchData as $key => $completeProject)
            <tr>
                <td>{{ ++$key }}</td>
                <td><a href="{{ route('SupUser.ProjectUpdate',['project_id'=>$completeProject->id,'project_slug'=>$completeProject->project_slug]) }}">{{ $completeProject->project_name }}</a></td>
                <td>{{ $completeProject->project_category_slug }}</td>
                <td>{{ ucwords($completeProject->is_ongoing_str) }}</td>
                <td><img src="{{ asset('public/image/project') }}/{{ $completeProject->project_header_image }}" alt="{{ $completeProject->project_name }}" height="60px" width="80px"></td>
                <td>
                    <div class="button-group">
                        <a href="{{ route('SupUser.ProjectUpdate',['project_id'=>$completeProject->id,'project_slug'=>$completeProject->project_slug]) }}" class="btn btn-secondary btn-sm"><i class="bi bi-pencil-square"></i></a>
                        <button type="button" value="{{ $completeProject->id }}" class="btn btn-danger btn-sm ProjectArchiveButton"><i class="bi bi-archive"></i></button>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@include('dashboard.project.partials.modal')
@endsection
@section('js')
@include('dashboard.project.partials.js')
@endsection
