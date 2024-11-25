@extends('FrontEndView.layouts.frontMaster')


@section('content')

    <div class="rs-breadcrumbs">
        <div class="container">
            <div class="breadcrumbs-inner">
                <h1 class="page-title " style="color:#ffffff">
                    Our Article
                </h1>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row g-3">
            
            @foreach ($fetchAllBlocgFromDb as $key => $fetchBlogData)
            <div class="col-12 col-md-6 col-lg-4">
                <div class="mt-3"></div>
                <div class="card-deck">
                    <div class="card">
                        <a href="{{ route('FrontEndBlog.ShowSingleBlog',['blog_slug'=>$fetchBlogData->__blog_slug]) }}">
                            <img src="{{ asset('public/image/blog') }}/{{ $fetchBlogData->__blog_header_image }}"  alt="">
                        </a>
                        <div class="card-body">
                            <h5 class="card-title">
                                <a href="{{ route('FrontEndBlog.ShowSingleBlog',['blog_slug'=>$fetchBlogData->__blog_slug]) }}" style="color: #000;">{{ $fetchBlogData->__blog_name }}</a>
                            </h5>
                            <p class="card-text">
                                {{ Str::limit($fetchBlogData->__blog_short_description, 70) }}
                            </p>
                            <a href="{{ route('FrontEndBlog.ShowSingleBlog',['blog_slug'=>$fetchBlogData->__blog_slug]) }}" class="btn btn-secondary btn-sm">Read More...</a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            <div class="d-flex justify-content-center">
                {{ $fetchAllBlocgFromDb->links() }}
            </div>
        </div>
    </div>

@endsection
