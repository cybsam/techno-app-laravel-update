@extends('layouts.SupUserMaster')
@section('title', 'Users Page - Techno Apogee Limited')
@section('SupUserContent')
    <div class="pagetitle">
        <h1>Users</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('Administrator.index') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('SupUser.ListUsers') }}">Users List</a></li>
                <li class="breadcrumb-item active">Archived Users</li>
            </ol>
        </nav>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        @if (Session::get('restoreUsers'))
                            <div class="alert alert-primary bg-primary text-light border-0 alert-dismissible fade show" role="alert">
                                {{ Session::get('restoreUsers') }}
                                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        @endif
                        @if (Session::get('restoreProblem'))
                            <div class="alert alert-danger bg-danger text-light border-0 alert-dismissible fade show" role="alert">
                                {{ Session::get('restoreProblem') }}
                                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        @endif
                        <table class="table table-hover datatable table-sm">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">username</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Image</th>
                                    <th scope="col">Verified</th>
                                    <th scope="col">is active</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($archiveData as $key => $archiveDataSh)
                                    <tr class="table-light">
                                        <th scope="row"><a href="#">#{{ $archiveDataSh->id }}</a></td>
                                        <td>{{ Str::limit($archiveDataSh->name, 10) }}</td>
                                        <td><a class="" href=""><span>@</span>{{ Str::limit($archiveDataSh->username, 6) }}</a></td>
                                        <td><a href="mailto:{{ $archiveDataSh->email }}">{{ $archiveDataSh->email }}</a></td>
                                        <td><img src="{{ asset('public/image/users') }}/{{ $archiveDataSh->user_image }}"
                                                height="35px" width="35px" alt=""></td>
                                        <td>
                                            @if ($archiveDataSh->email_verified == 1)
                                                <i class="bi bi-patch-check-fill text-primary"></i>
                                            @else
                                                <i class="bi bi-patch-exclamation text-danger"></i>
                                            @endif
                                        </td>
                                        <td>
                                            <div class="form-check form-switch">
                                                <input type="checkbox" class="form-check-input is_active_switch"
                                                    id="switch[{{ $key }}]" data-id="{{ $archiveDataSh->id }}"
                                                    {{ $archiveDataSh->is_active ? 'checked' : '' }}>
                                                <label class="form-check-label" for="switch[{{ $key }}]"></label>
                                            </div>

                                        </td>
                                        
                                        <td>
                                            <div class="btn-group" role="group">
                                                <a onclick="alert('restoring...')" href="{{ route('Administrator.UsersRestoreUser', ['user_id' => $archiveDataSh->id, 'user_name' => $archiveDataSh->name]) }}"
                                                    class="btn btn-primary"><i class="bi bi-arrow-counterclockwise"></i></a>
                                                <a onclick="alert('Permanent deleting...')"
                                                    href="{{ route('Administrator.UserDelete', ['user_id' => $archiveDataSh->id]) }}"
                                                    class="btn btn-danger"><i class="bi bi-trash"
                                                        aria-hidden="true"></i></a>

                                            </div>


                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
