@extends('FrontEndView.layouts.frontMaster')
@push('metaTitle')
    <meta title="Building Management system (BMS)">
@endpush

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
                    {{ __('BMS') }}
                </h1>
            </div>
        </div>
    </div>

    <div class="rs-services style2 rs-services-style2 gray-bg pt-100 md-pt-70 md-pb-70">
        <div class="container custom">
            <div class="row">
                <div class="col-lg-12 col-md-6 mb-20">
                    @foreach ($data as $key => $bmsAuto)
                    <div class="service-wrap">
                        <div class="text-center">
                            <h4 style="color: #141313"><i>{{ $bmsAuto->__prosername }}</i></h4>
                            <hr/>
                        </div>
                        <div class="image-part prodectDetail_img">
                            <img src="{{ asset('public/image/productservice') }}/{{ $bmsAuto->__proserheadimage }}" alt="{{ $bmsAuto->__prosername }}">
                        </div>
                        <p>{!! $bmsAuto->__proserdescription !!}</p>
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
                            $currentUrl = route('FrontEndProduct.DesignAndConsultancy').'/'.$bmsAuto->__proserslug;
                            // echo $currentUrl;
                            $productName = $bmsAuto->__prosername;
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


@endsection