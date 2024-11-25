@extends('FrontEndView.layouts.frontMaster')
@section('content')
    <div class="rs-breadcrumbs">
        <div class="container">
            <div class="breadcrumbs-inner">
                <h1 class="page-title " style="color:#ffffff">
                    Enlishtments Documents
                </h1>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row g-3">
            @foreach ($checkEnlishtment as $enlishtment)
            <div class="col-12 col-md-6 col-lg-3">
                <div class="mt-3"></div>
                <div class="card">
                    <div class="card-body">
                        <img src="{{ $enlishtment->picture }}" alt="">
                        <p class="card-title">{{ Str::limit($enlishtment->remarks, 25,'...') }}</p>
                        <a href="https://technoapogee.com/public/files/downloadsFile/{{ $enlishtment->file_name }}" class="btn btn-outline-success">Download</a>
                    </div>
                </div>
                <div class="mt-3"></div>
            </div>
            @endforeach
            <div class="d-flex justify-content-center">
                {{ $checkEnlishtment->links() }}
            </div>
        </div>
    </div>



@endsection
