@extends('layouts.SupUserMaster')
@section('title', 'Image Slider Front-page ~ Techno Apogee Engineering Limited')
@section('SupUserContent')

    <div class="pagetitle">
        <h1>Front image slider </h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('Administrator.index') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="">Settings</a></li>
                <li class="breadcrumb-item"><a href="">Front-End</a></li>
                <li class="breadcrumb-item active">Image Slider</li>
            </ol>
        </nav>
    </div>
    <hr>
    <div class="card">
        <div class="card-header">
            <h4>Current Slider</h4>
            <div class="float-right">
                <button class="btn btn-primary" type="button">+ New Slider</button>
            </div>
        </div>
        <div class="card-body">

            <table class="table table-sm datatable">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>image</th>
                        <th>action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>#</td>
                        <td>n</td>
                    </tr>
                </tbody>
            </table>
            <div class="folat-left">
                <h5>Image preview</h5>
            </div>
            <div class="mh-50 mw:50">
                <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="{{ asset('image/carosel-slider') }}/engrieening.png" class="d-block w-100 mh-50" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="{{ asset('image/carosel-slider') }}/installsutation.png" class="d-block w-100 mh-50"
                                alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="{{ asset('image/carosel-slider') }}/pocurement.jpg" class="d-block w-100 mh-50" alt="...">
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
        </div>
    </div>



@endsection
