@extends('FrontEndView.layouts.frontMaster')
@section('cssFront')
@section('content')

<style>
    .prodectDetail_img img {
            width: 100%;
            height: 450px;
        }

        .product img {
            width: 100% !important;
            height: 250px !important;
        }

        .prodectDetail_img {
            width: 80%;
            margin: auto;
        }

        .content-part .desc a {
            font-size: 11px;
        }

        .productPageInnder {
            margin-bottom: -5px;
        }
</style>
    <div class="rs-breadcrumbs">
        <div class="container">
            <div class="breadcrumbs-inner">
                <h1 class="page-title " style="color:#ffffff">
                    {{ __('Design & Consultancy Services') }}
                </h1>
            </div>
        </div>
    </div>
    
    <div class="rs-services style2 rs-services-style2 gray-bg pt-100 md-pt-70 md-pb-70">
        <div class="container custom">
            <div class="row">
                <div class="col-lg-12 col-md-6 mb-20">
                @php
                $consultancyProduct = DB::table('product_services')->where('__proserslug','design-consultancy-service')->first();
                
                @endphp
                
                    
                    <div class="service-wrap">
                        <div class="text-center">
                            <h4 style="color: #141313"><i>{{ $consultancyProduct->__prosername }}</i></h4>
                            
                        </div>
                        <div class="image-part prodectDetail_img">
                            <img src="{{ asset('public/image/productservice') }}/{{ $consultancyProduct->__proserheadimage }}" alt="Design & Consultancy Services">
                        </div>
                        <p>  {{ $consultancyProduct->__proserdescription }} </p>
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
                        @php
                            $currentUrl = route('FrontEndProduct.DesignAndConsultancy').'/'.$consultancyProduct->__proserslug;
                            
                            $productName = $consultancyProduct->__prosername;
                            $socialShareUrl = \Share::page(
                                $currentUrl,
                                $productName,
                            )->facebook()
                            ->twitter()
                            ->linkedin()
                            ->whatsapp()
                            ->reddit()
                            ->telegram();
                        @endphp
                        <div>
                            {!! $socialShareUrl !!}
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>

    <div class="rs-services style2 rs-services-style2 gray-bg pt-100 md-pt-70 md-pb-70">
        <div class="container custom">
            <div class="row">
                <div class="col-lg-12 col-md-6 mb-20">
                    
                    @foreach ($data as $productService)
                    <div class="service-wrap">
                        <div class="text-center">
                            <h4 style="color: #141313"><i>{{ $productService->__prosername }}</i></h4>
                            <hr/>
                        </div>
                        <div class="image-part prodectDetail_img">
                            <img src="{{ asset('public/image/productservice') }}/{{ $productService->__proserheadimage }}" alt="{{ $productService->__prosername }}">
                        </div>
                        <p>{!! $productService->__proserdescription !!}</p>
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
                        @php
                            $currentUrl = route('FrontEndProduct.DesignAndConsultancy').'/'.$productService->__proserslug;
                            // echo $currentUrl;
                            $productName = $productService->__prosername;
                            $socialShareUrl = \Share::page(
                                $currentUrl,
                                $productName,
                            )->facebook()
                            ->twitter()
                            ->linkedin()
                            ->whatsapp()
                            ->reddit()
                            ->telegram();
                        @endphp
                        <div>
                            {!! $socialShareUrl !!}
                        </div>
                    </div>
                    <hr>
                    @endforeach
                    
                </div>
            </div>
        </div>
    </div>
    
    <!-- Services Section End -->

    <!-- Services Section Start -->
    {{-- <div class="rs-services style2 rs-services-style2 gray-bg pb-100 md-pt-70 md-pb-70">
        <div class="container custom">
            <div class="row">

                @php
                    $randPro = DB::table('product_service_subs')->where('__prosermaincateslug',$fetchPro->__proserslug)->inRandomOrder()->take(6)->get();
                @endphp

                @foreach ($randPro as $RandProduct)
                    <div class="col-lg-4 col-md-6 mb-20">
                        <div class="service-wrap">
                            <div class="image-part product">
                                <img src="{{ asset('image/productservice/subproduct') }}/{{ $RandProduct->__proserheadimage }}" alt="{{ $RandProduct->__prosername }}">
                            </div>
                            <div class="content-part">

                                <div class="desc"><a href="{{ route('frontEndIndex.ProductAndServiceSubPro',['s_slug'=>$RandProduct->__prosermaincateslug,'sub_slug'=>$RandProduct->__proserslug]) }}" target="_blank">{{ $RandProduct->__prosername }}</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </div> --}}
    


@endsection