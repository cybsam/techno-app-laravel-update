@extends('layouts.SupUserMaster')

@section('title', 'On Going Project - Techno Apogee Limited')
@section('SupUserContent')


    <div class="pagetitle">
        <h1>On Going Project</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('Administrator.index') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('SupUser.ProjectComplete') }}">Complete Project List</a></li>
                <li class="breadcrumb-item active">On-Going Project</li>
            </ol>
        </nav>
    </div>

    <div class="">
        <a href="{{ URL::previous() }}" class="btn btn-info">{{ __('Back') }} &#8617;</a>
        <a href="{{ route('SupUser.ProjectCategoryShow') }}" class="btn btn-secondary">Categories list</a>
        <a class="btn btn-primary float-right" href="{{ route('SupUser.ProjectComplete') }}">Complete Project list</a>
    </div>
    <table class="table table-hover datatable table-sm">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Project Name</th>
                <th scope="col">Category</th>
                <th scope="col">Image</th>
                <th scope="col">Multiple Image</th>
                <th scope="col">User</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($onGoingProject as $key => $onGoingProject)
            <tr>
                <td>{{ ++$key }}</td>
                <td><a href="{{ route('SupUser.ProjectUpdate',['project_id'=>$onGoingProject->id,'project_slug'=>$onGoingProject->project_slug]) }}">{{ $onGoingProject->project_name }}</a></td>
                <td>{{ $onGoingProject->project_category_slug }}</td>
                <td><img src="{{ asset('public/image/project') }}/{{ $onGoingProject->project_header_image }}" alt="{{ $onGoingProject->project_name }}" height="40px" width="80px"></td>
                <td>
                    @php
                        $multipleImage = DB::table('project_multiple_images')->where('project_id',$onGoingProject->id)->get();
                        $countImage = count($multipleImage);
                    @endphp
                        
                    @if ($countImage)
                        <a href="{{ route('SupUserProjectMultile.show',['project_slg'=>$onGoingProject->project_category_slug,'project_id'=>$onGoingProject->id]) }}" class="badge text-bg-success">{{ $countImage }} Image</a>
                    @else
                        <span class="badge text-bg-info">Not Found</span>
                    @endif
                </td>
                <td>{{ ucwords($onGoingProject->project_added_by) }}</td>
                
                <td>
                    <div class="button-group">
                        <a href="{{ route('SupUser.ProjectUpdate',['project_id'=>$onGoingProject->id,'project_slug'=>$onGoingProject->project_slug]) }}" class="btn btn-secondary btn-sm"><i class="bi bi-pencil-square"></i></a>
                        <button type="button" value="{{ $onGoingProject->id }}" class="btn btn-danger btn-sm ProjectArchiveButton"><i class="bi bi-archive"></i></button>
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
