@extends('layouts.SupUserMaster')
@section('title', 'Image Slider Front-page ~ Techno Apogee Engineering Limited')
@section('SupUserContent')

    <div class="pagetitle">
        <h1>Front side image slider </h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('Administrator.index') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="">Settings</a></li>
                
                <li class="breadcrumb-item active">Image Slider</li>
            </ol>
        </nav>
    </div>
    <hr>
    <div class="card">
        <div class="card-header">
            <h4>Current Slider</h4>
            <div class="float-right">
                <a class="btn btn-primary" href="{{ route('SupUser.FrontSliderInsert') }}">+ New Slider</a>
            </div>
        </div>
        <div class="card-body">
            <div>
                @if (Session::get('updateDone'))
                <div class="alert alert-primary bg-primary text-light border-0 alert-dismissible fade show" role="alert">
                    {{ Session::get('updateDone') }}
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert"
                        aria-label="Close"></button>
                </div>
            @endif
            @if (Session::get('updateError'))
                <div class="alert alert-danger bg-danger text-light border-0 alert-dismissible fade show" role="alert">
                    {{ Session::get('updateError') }}
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert"
                        aria-label="Close"></button>
                </div>
            @endif
            </div>
            <table class="table table-sm datatable">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Image</th>
                        <th>Image Preview</th>
                        <th>Added by</th>
                        <th>Activate</th>
                        <th>action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($caroselImageData as $key => $caroselImage)
                        <tr>
                            <td>{{ $caroselImage->id }}</td>
                            <td>{{ $caroselImage->imagename }}</td>
                            <td><img height="40" width="35" src="{{ asset('image/carosel-slider') }}/{{ $caroselImage->imagename }}" alt=""></td>
                            <td>{{ $caroselImage->added_by }}</td>
                            <td>
                                <button type="submit" class="badge {{ $caroselImage->is_active == 1 ? 'bg-warning':'bg-info'; }}">
                                    @if ($caroselImage->is_active == 1)
                                        <a href="{{ route('SupUser.FrontSliderDeactive',['carosel_id'=>$caroselImage->id]) }}" class="text-white">deactive</a>
                                    @else
                                        <a href="{{ route('SupUser.FrontSliderActive',['carosel_id'=>$caroselImage->id]) }}" class="text-white">active</a>
                                    @endif
                                </button>
                            </td>
                            <td>
                                <a href="{{ route('SupUser.FrontSliderDelete',['carosel_id'=>$caroselImage->id]) }}" class="btn btn-danger btn-sm">
                                    <i class="bi bi-trash3"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    
                </tbody>
            </table>
            
        </div>
    </div>



@endsection
