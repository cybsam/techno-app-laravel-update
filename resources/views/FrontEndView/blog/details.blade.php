@extends('FrontEndView.layouts.frontMaster')


@section('content')

    <div class="rs-breadcrumbs">
        <div class="container">
            <div class="breadcrumbs-inner">
                <h1 class="page-title " style="color:#ffffff">
                    {{ $blogDetailesView->__blog_name }}
                </h1>
            </div>
        </div>
    </div>
    <style>
        body {
            margin-top: 20px;
        }

        /*
    Blog post entries
    */

        .entry-card {
            -webkit-box-shadow: 0px 5px 15px rgba(0, 0, 0, 0.05);
            -moz-box-shadow: 0px 5px 15px rgba(0, 0, 0, 0.05);
            box-shadow: 0px 5px 15px rgba(0, 0, 0, 0.05);
        }

        .entry-content {
            background-color: #fff;
            padding: 36px 36px 36px 36px;
            border-bottom-left-radius: 6px;
            border-bottom-right-radius: 6px;
        }

        .entry-content .entry-title a {
            color: #333;
        }

        .entry-content .entry-title a:hover {
            color: #4782d3;
        }

        .entry-content .entry-meta span {
            font-size: 12px;
        }

        .entry-title {
            font-size: .95rem;
            font-weight: 500;
            margin-bottom: 15px;
        }

        .entry-thumb {
            display: block;
            position: relative;
            overflow: hidden;
            border-top-left-radius: 6px;
            border-top-right-radius: 6px;
        }

        .entry-thumb img {
            border-top-left-radius: 6px;
            border-top-right-radius: 6px;
        }

        .entry-thumb .thumb-hover {
            position: absolute;
            width: 100px;
            height: 100px;
            background: rgba(71, 130, 211, 0.85);
            display: block;
            top: 50%;
            left: 50%;
            color: #fff;
            font-size: 40px;
            line-height: 100px;
            border-radius: 50%;
            margin-top: -50px;
            margin-left: -50px;
            text-align: center;
            transform: scale(0);
            -webkit-transform: scale(0);
            opacity: 0;
            transition: all .3s ease-in-out;
            -webkit-transition: all .3s ease-in-out;
        }

        .entry-thumb:hover .thumb-hover {
            opacity: 1;
            transform: scale(1);
            -webkit-transform: scale(1);
        }

        .article-post {
            border-bottom: 1px solid #eee;
            padding-bottom: 70px;
        }

        .article-post .post-thumb {
            display: block;
            position: relative;
            overflow: hidden;
        }

        .article-post .post-thumb .post-overlay {
            position: absolute;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.6);
            transition: all .3s;
            -webkit-transition: all .3s;
            opacity: 0;
        }

        .article-post .post-thumb .post-overlay span {
            width: 100%;
            display: block;
            vertical-align: middle;
            text-align: center;
            transform: translateY(70%);
            -webkit-transform: translateY(70%);
            transition: all .3s;
            -webkit-transition: all .3s;
            height: 100%;
            color: #fff;
        }

        .article-post .post-thumb:hover .post-overlay {
            opacity: 1;
        }

        .article-post .post-thumb:hover .post-overlay span {
            transform: translateY(50%);
            -webkit-transform: translateY(50%);
        }

        .post-content .post-title {
            font-weight: 500;
        }

        .post-meta {
            padding-top: 15px;
            margin-bottom: 20px;
        }

        .post-meta li:not(:last-child) {
            margin-right: 10px;
        }

        .post-meta li a {
            color: #999;
            font-size: 13px;
        }

        .post-meta li a:hover {
            color: #4782d3;
        }

        .post-meta li i {
            margin-right: 5px;
        }

        .post-meta li:after {
            margin-top: -5px;
            content: "/";
            margin-left: 10px;
        }

        .post-meta li:last-child:after {
            display: none;
        }

        .post-masonry .masonry-title {
            font-weight: 500;
        }

        .share-buttons li {
            vertical-align: middle;
        }

        .share-buttons li a {
            margin-right: 0px;
        }

        .post-content .fa {
            color: #ddd;
        }

        .post-content a h2 {
            font-size: 1.5rem;
            color: #333;
            margin-bottom: 0px;
        }

        .article-post .owl-carousel {
            margin-bottom: 20px !important;
        }

        .post-masonry h4 {
            text-transform: capitalize;
            font-size: 1rem;
            font-weight: 700;
        }

        .mb40 {
            margin-bottom: 40px !important;
        }

        .mb30 {
            margin-bottom: 30px !important;
        }

        .media-body h5 a {
            color: #555;
        }

        .categories li a:before {
            content: "\f0da";
            font-family: 'FontAwesome';
            margin-right: 5px;
        }

        /*
    Template sidebar
    */

        .sidebar-title {
            margin-bottom: 1rem;
            font-size: 1.1rem;
        }

        .categories li {
            vertical-align: middle;
        }

        .categories li>ul {
            padding-left: 15px;
        }

        .categories li>ul>li>a {
            font-weight: 300;
        }

        .categories li a {
            color: #999;
            position: relative;
            display: block;
            padding: 5px 10px;
            border-bottom: 1px solid #eee;
        }

        .categories li a:before {
            content: "\f0da";
            font-family: 'FontAwesome';
            margin-right: 5px;
        }

        .categories li a:hover {
            color: #444;
            background-color: #f5f5f5;
        }

        .categories>li.active>a {
            font-weight: 600;
            color: #444;
        }

        .media-body h5 {
            font-size: 15px;
            letter-spacing: 0px;
            line-height: 20px;
            font-weight: 400;
        }

        .media-body h5 a {
            color: #555;
        }

        .media-body h5 a:hover {
            color: #4782d3;
        }
    </style>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="mt-5"></div>
                <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
                <div class="container pb50">
                    <div class="row">
                        <div class="col-md-9 mb40">
                            <article>
                                <img src="{{ asset('public/image/blog') }}/{{ $blogDetailesView->__blog_header_image }}" alt="" class="img-fluid mb30">
                                <div class="post-content">
                                    <h3>{{ $blogDetailesView->__blog_name }}</h3>
                                    <ul class="post-meta list-inline">
                                        <li class="list-inline-item">
                                            @php
                                                $explodeAuthor = explode('-',$blogDetailesView->__blog_added_by);

                                            @endphp
                                            <b style="color: #333;"><i class="fa fa-eye"></i> </b><a href="#">{{ $postViewCount }}</a>
                                        </li>
                                        <li class="list-inline-item">
                                            
                                            <i class="fa fa-calendar-o"></i> <a href="#">29 June 2017</a>
                                        </li>
                                        <li class="list-inline-item">
                                            <i class="fa fa-tags"></i> <a href="#">Techno Apogee Blog</a>
                                        </li>
                                    </ul>
                                    {!! $blogDetailesView->__blog_description !!}
                                    
                                    <hr style="color: #333">
                                    <hr style="color: #333">
                                    <ul class="list-inline share-buttons">
                                        <li class="list-inline-item">Share Post:</li>
                                        <style>
                                            div#social-links ul li{
                                                display: inline-block;
                                            }
                                            div#social-links ul li a{
                                                padding: 10px;
                                                margin: 1px;
                                                font-size: 30px;

                                            }
                                        </style>
                                        <div>{!! $socialShare !!}</div>
                                    </ul>
                                    <hr class="mb40">
                                    <h4 class="mb40 text-uppercase font500">About Author</h4>
                                    <div class="media mb40">
                                        <i class="d-flex mr-3 fa fa-user-circle fa-5x text-primary"></i>
                                        <div class="media-body">
                                            <h5 class="mt-0 font700"><b>{{ $explodeAuthor[1] }}</b></h5>
                                        </div>
                                        
                                    </div>
                                    <hr class="mb40">
                                    <h4 class="mb40 text-uppercase font500">Comments</h4>
                                    @comments(['model' => $blogDetailesView])
                                </div>
                            </article>
                            <!-- post article-->

                        </div>
                        <div class="col-md-3 mb40">
                            <div class="mb40">
                                <form action="{{ route('frontEndView.FrontEndSearch') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="input-group">
                                        <input type="text" name="searchData" id="searchData" class="form-control" placeholder="Search..."
                                            aria-describedby="basic-addon2">
                                        <button type="submit" class="input-group-addon" id="basic-addon2"><i
                                                class="fa fa-search"></i></button>
                                    </div>
                                </form>
                            </div>
                            <!--/col-->
                            
                            <!--/col-->
                            <div>
                                <h4 class="sidebar-title">Latest News</h4>
                                <ul class="list-unstyled">
                                    @foreach($reletedBlog as $key => $reletedBlog)
                                    <li class="media">
                                        <img class="d-flex mr-3 img-fluid" width="64"
                                            src="{{ asset('public/image/blog') }}/{{ $reletedBlog->__blog_header_image }}"
                                            alt="Generic placeholder image">
                                        <div class="media-body">
                                            <h5 class="mt-0 mb-1"><a href="{{ route('FrontEndBlog.ShowSingleBlog',['blog_slug'=>$reletedBlog->__blog_slug]) }}"><i>{{ $reletedBlog->__blog_name }}</i></a></h5>
                                            April 05, 2017
                                        </div>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha256-4+XzXVhsDmqanXGHaHvgh1gMQKX40OUvDEBTu8JcmNs=" crossorigin="anonymous"></script>
<script src="{{ asset('js/share.js') }}"></script>

@endsection
