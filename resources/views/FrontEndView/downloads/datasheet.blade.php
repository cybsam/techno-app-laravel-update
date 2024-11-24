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
            <div class="col-12 col-md-6 col-lg-4">
                <div class="mt-3"></div>
                <div class="card">
                    <div class="card-body">
                        <p class="card-title">{{ $ProductDataSheet->remarks }}</p>
                        <a href="{{ $ProductDataSheet->file_path }}/{{ $ProductDataSheet->file_name }}" class="btn btn-outline-success">Download</a>
                    </div>
                </div>
                <div class="mt-3"></div>
            </div>
            @endforeach
        </div>
    </div>



@endsection
