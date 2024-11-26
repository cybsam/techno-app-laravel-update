@extends('layouts.SupUserMaster')

@section('title', 'Archive Project List - Techno Apogee Limited')
@section('SupUserContent')


    <div class="pagetitle">
        <h1>Archive List</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('Administrator.index') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('SupUser.ProjectOnGoing') }}">Project on-going</a></li>
                <li class="breadcrumb-item"><a href="{{ route('SupUser.ProjectList') }}">Project Complete</a></li>
                <li class="breadcrumb-item active">Archive Project List</li>
            </ol>
        </nav>
    </div>
    @if (Session::get('ProjectRestoreComplete'))
    <div class="alert alert-primary bg-primary text-light border-0 alert-dismissible fade show"
        role="alert">
        {{ Session::get('ProjectRestoreComplete') }}
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert"
            aria-label="Close"></button>
    </div>
@endif
@if (Session::get('ProjectDeleteComplete'))
<div class="alert alert-danger bg-danger text-light border-0 alert-dismissible fade show"
    role="alert">
    {{ Session::get('ProjectDeleteComplete') }}
    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert"
        aria-label="Close"></button>
</div>
@endif

<div class="">
    <a href="{{ URL::previous() }}" class="btn btn-info">{{ __('Back') }} &#8617;</a>
    <a href="{{ route('SupUser.ProjectCategoryShow') }}" class="btn btn-secondary">Categories list</a>
    <a class="btn btn-primary float-right" href="{{ route('SupUser.ProjectOnGoing') }}">On-Going Project</a>
</div>
    <table class="table table-hover datatable table-sm">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Project Name</th>
                <th scope="col">Project Category</th>
                <th scope="col">Project Image</th>
                <th scope="col">User</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($archiveProjectList as $key => $archiveProject)
            <tr>
                <td>{{ ++$key }}</td>
                <td>{{ $archiveProject->project_name }}</td>
                <td>{{ $archiveProject->project_category_slug }}</td>
                <td><img src="{{ asset('public/image/project') }}/{{ $archiveProject->project_header_image }}" alt="{{ $archiveProject->project_name }}" height="40px" width="80px"></td>
                <td>{{ ucwords($archiveProject->project_added_by) }}</td>
                <td>
                    <div class="button-group">
                        <button type="button" value="{{ $archiveProject->id }}" class="btn btn-primary btn-sm ProjectArchiveRestoreBTN"><i class="bi bi-arrow-clockwise"></i></button>
                        <button type="button" value="{{ $archiveProject->id }}" class="btn btn-danger btn-sm ProjectArchiveDeleteBTN"><i class="bi bi-trash"></i></button>
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
