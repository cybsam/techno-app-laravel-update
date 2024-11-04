@extends('layouts.SupUserMaster')

@section('title', 'View Message - Techno Apogee Limited')
@section('SupUserContent')
    @include('dashboard.summernote.summernote')

    <div class="pagetitle">
        <h1>View Message</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('Administrator.index') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('supUser.FrontEndContact') }}">Contact Message</a></li>
                <li class="breadcrumb-item active">View Message</li>
            </ol>
        </nav>
    </div>
    <hr>

    <div class="card">
        <div class="card-header">
            {{ __('Message From: ') }} <b>{{ $getData->sender_name }}</b>
            <div class="float-right">
                <a href="{{ URL::previous() }}" class="btn btn-primary">Previous Page</a>
            </div>
        </div>
        <div class="card-body">
            <h6>Email: <a href="">{{ $getData->sender_email }}</a>.</h6>
            <h6>Number: <a href="">{{ $getData->sender_number }}</a>.</h6>
            <hr>
            <h6>Subject: <b>{{ $getData->sender_subject }}.</b></h6>
            <hr>
            <p>Description:</br>{{ $getData->sender_message }}</p>
            <hr>
            <div class="button-group">
                <a href="mailto:{{ $getData->sender_email }}" class="btn btn-primary">Email</a>
                <a href="tel:{{ $getData->sender_number }}" class="btn btn-info">Call</a>
                <div class="float-right">
                    <p>Sender IP: <b>{{ $getData->sender_ip }}</b></p>
                </div>
            </div>
            
        </div>
    </div>




    @include('dashboard.contact.partials.modal')
@endsection
@section('js')
    @include('dashboard.contact.partials.js')
@endsection
