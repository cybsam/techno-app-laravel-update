@extends('FrontEndView.layouts.frontMaster')
@section('title', 'Company Profile Show | Techno Apogee')
@section('metaTitle', ' ')
@section('metaDescription', ' ')

@section('content')

    <div class="rs-breadcrumbs">
        <div class="container">
            <div class="breadcrumbs-inner">
                <h1 class="page-title " style="color:#ffffff">
                    Profile Show
                </h1>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="embed-responsive embed-responsive-16by9">
                    <iframe class="embed-responsive-item" style="width:100%; height:500px;" frameborder="0" src="https://technoapogee.com/public/files/Portfolio-of-Techno-Apogee.pdf" allowfullscreen></iframe>
                  </div>
            </div>
        </div>
    </div>


@endsection
