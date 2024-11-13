@extends('FrontEndView.layouts.frontMaster')

@section('content')

    
    <div class="rs-breadcrumbs">
        <div class="container">
            <div class="breadcrumbs-inner">
                <h1 class="page-title " style="color:#ffffff">
                    Our Concern
                </h1>
            </div>
        </div>
    </div>

    
    <section id="weDo">
        <div class="container">
            <div class="float-left">
                <br/>
                <img src="{{ asset('public/image/FrontEnd/logoFav/logo.PNG') }}" width="200px" height="150px">
                <!--<h5 class="color:#383838;">Techno Apogee</h5>-->
                <p>Techno Apogee has a Core Management Team comprising of well qualified and 
highly experienced Consultants and Engineers, which looks after the design of 
any project, quality of installation/workmanship and ensuring after-sales services 
to customers. Under this Core Management Team, we have different 
independent units as the following.</p>
            </div>
            <div class="row mt-5 mb-5">
                @foreach ($fetchFromDb as $key => $fetchConcern)
                <div class="col-lg-4 ">
                    <div class="ourConcern">
                        <img src="{{ asset('public/image/about-us/our-concern') }}/{{ $fetchConcern->concern_image }}" width="100%" height="100px" alt="{{ $fetchConcern->concern_name }}">
                        <p>{!! $fetchConcern->concern_description !!}.</p>
                    </div>
                </div>
                @endforeach
            </div>

        </div>
    </section>




@endsection