@extends('FrontEndView.layouts.frontMaster')
@section('content')
    <div class="rs-breadcrumbs">
        <div class="container">
            <div class="breadcrumbs-inner">
                <h1 class="page-title " style="color:#ffffff">
                    Product Datasheet
                </h1>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row g-3">
            @foreach ($checkProDataSheet as $ProductDataSheet)
            <div class="col-12 col-md-6 col-lg-3">
                <div class="mt-3"></div>
                <div class="card">
                    <div class="card-body">
                        <img src="{{ $ProductDataSheet->picture }}" alt="">
                        <h5 class="card-title">{{ Str::limit($ProductDataSheet->remarks, 25,'...') }}</h5>
                        <a href="https://technoapogee.com/public/files/downloadsFile/{{ $ProductDataSheet->file_name }}" class="btn btn-outline-success">Download</a>
                    </div>
                </div>
                <div class="mt-3"></div>
            </div>
            @endforeach
        </div>
    </div>



@endsection
