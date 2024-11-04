@extends('layouts.SupUserMaster')

@section('title', 'Front Page Contact - Techno Apogee Limited')
@section('SupUserContent')
    @include('dashboard.summernote.summernote')

    <div class="pagetitle">
        <h1>Contact List</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('Administrator.index') }}">Dashboard</a></li>
                
                <li class="breadcrumb-item active">Message</li>
            </ol>
        </nav>
    </div>
    <hr>
        <div class="">
            @if (Session::get('msgDltDone'))
                <div class="alert alert-primary bg-primary text-light border-0 alert-dismissible fade show" role="alert">
                    {{ Session::get('msgDltDone') }}
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert"
                        aria-label="Close"></button>
                </div>
            @endif
            @if (Session::get('msgDltErr'))
                <div class="alert alert-danger bg-danger text-light border-0 alert-dismissible fade show" role="alert">
                    {{ Session::get('msgDltErr') }}
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert"
                        aria-label="Close"></button>
                </div>
            @endif
        </div>
    <table class="table table-hover datatable table-sm">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Subject</th>
                <th scope="col">Action</th>
                
            </tr>
        </thead>
        <tbody>
            @foreach ($showContact as $key => $contactU)
                <tr class="@if($contactU->is_seen == 1)text-muted @endif">
                    <td>{{ $contactU->id }}</td>
                    <td><a href="{{ route('supUser.FrontEndContactShow',['id'=>$contactU->id]) }}">{{ $contactU->sender_name }}</a></td>
                    <td><a href="mailto:{{ $contactU->sender_email }}">{{ $contactU->sender_email }}</a></td>
                    <td><a href="{{ route('supUser.FrontEndContactShow',['id'=>$contactU->id]) }}" >{{ Str::limit($contactU->sender_subject, 20) }}</a></td>
                    <td>
                        <div class="btn-group" role="group">
                            <a class="btn btn-primary btn-sm" href="{{ route('supUser.FrontEndContactShow',['id'=>$contactU->id]) }}"><i class="bi bi-eye"></i></a>
                            <a class="btn btn-danger btn-sm" href="{{ route('supUser.FrontEndContactDelete',['id'=>$contactU->id]) }}"><i class="bi bi-trash3"></i></a>
                        </div>
                    </td>
                </tr>
            @endforeach
            
        </tbody>
    </table>



    @include('dashboard.contact.partials.modal')
@endsection
@section('js')
    @include('dashboard.contact.partials.js')
@endsection
