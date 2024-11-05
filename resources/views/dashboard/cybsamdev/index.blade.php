@extends('layouts.SupUserMaster')
@section('title', 'CybSam Dev || SHUVO DEV - Techno Apogee')
@section('SupUserContent')

<div class="pagetitle">
    <h1>CYBSAM / SHUVO Devs</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('Administrator.index') }}">Dashboard</a></li>
            
            <li class="breadcrumb-item active">Dev Index</li>
        </ol>
    </nav>
</div>

<div class="container">
    <div class="row g-3">
        <div class="col-12 col-md-6 col-lg-4">
            <div class="mt-3"></div>
            <div class="card">
                <div class="card-body">
                    <p class="card-title">Web Optimize</p>
                    <div class="d-grid gap-2">
                        <a href="{{ url('/') }}/cybsamdev/optimize" class="btn btn-outline-primary" type="button">Optimize</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-6 col-lg-4">
            <div class="mt-3"></div>
            <div class="card">
                <div class="card-body">
                    <p class="card-title">Clear Cache</p>
                    <div class="d-grid gap-2">
                        <a href="{{ url('/') }}/cybsamdev/clear-cache" class="btn btn-outline-secondary" type="button">Clear Cache</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-6 col-lg-4">
            <div class="mt-3"></div>
            <div class="card">
                <div class="card-body">
                    <p class="card-title">Route Cache</p>
                    <div class="d-grid gap-2">
                        <a href="{{ url('/') }}/cybsamdev/route-cache" class="btn btn-outline-success" type="button">Route Cache</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-6 col-lg-4">
            <div class="mt-3"></div>
            <div class="card">
                <div class="card-body">
                    <p class="card-title">Config Cache</p>
                    <div class="d-grid gap-2">
                        <a href="{{ url('/') }}/cybsamdev/config-cache" class="btn btn-outline-warning" type="button">Config Cache</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-6 col-lg-4">
            <div class="mt-3"></div>
            <div class="card">
                <div class="card-body">
                    <p class="card-title">View Clear</p>
                    <div class="d-grid gap-2">
                        <a href="{{ url('/') }}/cybsamdev/view-clear" class="btn btn-outline-info" type="button">View Clear</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-6 col-lg-4">
            <div class="mt-3"></div>
            <div class="card">
                <div class="card-body">
                    <p class="card-title">Migrate</p>
                    <div class="d-grid gap-2">
                        <a href="{{ url('/') }}/cybsamdev/migrate-force" class="btn btn-outline-danger">Migrate</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-6 col-lg-4">
            <div class="mt-3"></div>
            <div class="card">
                <div class="card-body">
                    <p class="card-title">Storage Link</p>
                    <div class="d-grid gap-2">
                        <a href="{{ url('/') }}/cybsamdev/storage-link" class="btn btn-outline-dark" type="button">Storage Link</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection