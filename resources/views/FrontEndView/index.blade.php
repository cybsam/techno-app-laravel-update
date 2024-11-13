@extends('FrontEndView.layouts.frontMaster')

@push('title')
    <title>Techno Apogee</title>
@endpush
@section('content')

<style>
    .blog-img img{
        height: 300px;
    }

</style>


<div class="main">

    
    <div id="cybsamCarouselApogee" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#cybsamCarouselApogee" data-bs-slide-to="0" class="active"
                    aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#cybsamCarouselApogee" data-bs-slide-to="1"
                    aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#cybsamCarouselApogee" data-bs-slide-to="2"
                    aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
                @foreach ($getCaroselSlider as $caroselSlider)
                    
                    <div class="carousel-item {{ $loop->first ? 'active':' ' }}">
                        <img src="{{ asset('image/carosel-slider/') }}/{{ $caroselSlider->imagename }}" class="d-block w-100" alt="{{ $caroselSlider->added_by }}">
                        <div class="carousel-caption d-none d-md-block">
                            <h1 style="color: #383838;">{{ $caroselSlider->added_by }}</h1>
                            <p style="color: #383838;">{{ $caroselSlider->added_by }}.</p>
                        </div>
                    </div>
                @endforeach
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#cybsamCarouselApogee"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#cybsamCarouselApogee"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>

       <!-- Services Section Start -->
       <div class="rs-services style1 reverse">
        <div class="container">
            <div class="row service-wrap mr-0 ml-0">
                <div class="col-lg-4 padding-0">
                    <div class="service-grid">
                        <div class="service-icon mb-23">
                            <img src="{{ asset('public/image/svg/design&Consultancy.svg')}}" alt="Chartered industrial engineers and consultants work with you to">
                        </div>
                        <h4 class="title mb-18"><a href="{{ route('FrontEndProduct.DesignAndConsultancy') }}">Design & Consultancy Services</a></h4>
                        <div class="desc mb-12">Our Chartered Industrial Engineers and Consultants work with you to provide practical and cost-effective.</div>
                        <div class="btn-wrap">
                            <a class="readmore" href="{{ route('FrontEndProduct.DesignAndConsultancy') }}">Read more <div class="btn-arrow"></div></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 padding-0">
                    <div class="service-grid">
                        <div class="service-icon mb-23">
                            <img src="{{ asset('public/image/svg/electrical&Fire.svg')}}" alt="Electrical and fire solution">
                        </div>
                        <h4 class="title mb-18"><a href="{{ route('FrontEndProduct.fireSolutions') }}">Fire & Electrical Solution</a></h4>
                        <div class="desc mb-12">Fire & Electrical Solutions is competent to work in all types of domestic & business settings.</div>
                        <div class="btn-wrap">
                            <a class="readmore" href="{{ route('FrontEndProduct.fireSolutions') }}">Read more <div class="btn-arrow"></div></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 padding-0">
                    <div class="service-grid br-none bdru">
                        <div class="service-icon mb-23">
                            <img src="{{ asset('public/image/svg/risks.svg')}}" alt="Automation systems regarding buildings control">
                        </div>
                        <h4 class="title mb-18"><a href="{{ route('FrontEndProduct.BmsAutomation') }}">Automation Solution</a></h4>
                        <div class="desc mb-12">The implementation of automation systems regarding building controls has been growing lately, and it is only getting better as technology .</div>
                        <div class="btn-wrap">
                            <a class="readmore" href="{{ route('FrontEndProduct.BmsAutomation') }}">Read more <div class="btn-arrow"></div></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Services Section End -->

    <!-- About Section Start -->
    <div class="rs-about style5 relative pt-140 md-pt-80">
        <div class="container">
            <div class="row rs-vertical-middle">
                <div class="col-lg-6 pr-72">
                    <div class="left-side">
                        <img src="{{ asset('public/image/about-us/about.jpg')}}" alt="Techno Apogee started its operation from June 2006">
                        <div class="skill-tag"><span>16</span> Years <br> Experience</div>
                        {{-- <img class="left-pattern" src="{{ asset('public/image/fontend/img/pattern/pattern1.png')}}" alt=""> --}}
                    </div>
                </div>
                <div class="col-lg-6 md-pt-50">
                    <div class="sec-title4 mb-30">
                        <div class="sub-title secondary-color mb-10">About us</div>
                        <h2 class="title primary-color">Techno Apogee started its operation from June 2006 in Dhaka, Bangladesh.</h2>
                        <div class="desc left-line-v">
                            <div class="draw-line start-draw"></div>
                            We are providing the best EPC support on Fire Electrical & Automation field in Bangladesh. We confirm the most precise and cost-effective solution for Government and private sectors in Bangladesh.
                        </div>
                    </div>
                    <div class="row mb-40">
                        <div class="col-md-6">
                            <ul class="services">
                                <li><i class="fa fa-check"></i>Affordable Support</li>
                                <li><i class="fa fa-check"></i>Client Oriented</li>
                                <li><i class="fa fa-check"></i>Affordable Support</li>
                            </ul>
                        </div>
                        <div class="col-md-6">
                            <ul class="services">
                                <li><i class="fa fa-check"></i>Professional Team</li>
                                <li><i class="fa fa-check"></i>24/7 Active Service</li>
                            </ul>
                        </div>
                    </div>
                    <div class="btn-part">
                        <a class="readon2" href="{{ route('frontEndIndex.about-us') }}">Learn More <div class="btn-arrow"></div></a>
                    </div>
                </div>
            </div>
            <div class="pattern-img">
                {{-- <img class="left-pattern" src="{{ asset('public/image/fontend/img/pattern/pattern1.png')}}" alt=""> --}}
            </div>
        </div>
    </div>
    <!-- About Section End -->

    <!-- Services Section Start -->
    <div class="rs-services style1 modify shape-bg pt-128 md-pt-70 md-pb-80">
        <div class="container">
            <div class="sec-title4 text-center mb-60">
                <div class="sub-title mb-6">Services</div>
                <h2 class="title primary-color">What We Provide</h2>
            </div>
            <div class="row service-wrap mr-0 ml-0">
                <div class="col-lg-4 padding-0 pr-1">
                    <div class="service-grid">
                        <div class="service-icon mb-23">
                            <img src="{{ asset('public/image/svg/service-product/electrical&Fire.svg')}}" alt="">
                        </div>
                        <h4 class="title mb-18"><a href="{{ route('frontEndIndex.ProductAndService',['slug'=>'electrical-fire-safety-audit-consultancy-dife']) }}">Electrical & Fire Safety Audit & Consultancy</a></h4>
                        <div class="desc mb-12">Electrical & Fire Safety in Industrial Sector by Electrical & Fire Safety Audit & Risk Assessment.</div>
                        <div class="btn-wrap">
                            <a class="readmore" href="{{ route('frontEndIndex.ProductAndService',['slug'=>'electrical-fire-safety-audit-consultancy-dife']) }}">Read more <div class="btn-arrow"></div></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 padding-0">
                    <div class="service-grid">
                        <div class="service-icon mb-23">
                            <img src="{{ asset('public/image/svg/service-product/noc.svg')}}" alt="">
                        </div>
                        <h4 class="title mb-18"><a href="{{ route('frontEndIndex.ProductAndService',['slug'=>'noc-fire-safety-plan-for-fscd']) }}">NOC & Fire Safety Plan for FSCD</a></h4>
                        <div class="desc mb-12">NOC & Fire Safety Plan in Industrial, Commercial, Residential  Sector by NOC & Fire Safety Plan .</div>
                        <div class="btn-wrap">
                            <a class="readmore" href="{{ route('frontEndIndex.ProductAndService',['slug'=>'noc-fire-safety-plan-for-fscd']) }}">Read more <div class="btn-arrow"></div></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 padding-0">
                    <div class="service-grid">
                        <div class="service-icon mb-23">
                            <img src="{{ asset('public/image/svg/service-product/busbar.svg')}}" alt="Busbar Trunking (BBT) Systems">
                        </div>
                        <h4 class="title mb-18"><a href="{{ route('frontEndIndex.ProductAndService',['slug'=>'busbar-trunking-bbt-systems']) }}">Busbar Trunking (BBT) Systems</a></h4>
                        <div class="desc mb-12">Busbar Trunking (BBT) Systems.</div>
                        <div class="btn-wrap">
                            <a class="readmore" href="{{ route('frontEndIndex.ProductAndService',['slug'=>'busbar-trunking-bbt-systems']) }}">Read more <div class="btn-arrow"></div></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 padding-0 pr-1">
                    <div class="service-grid">
                        <div class="service-icon mb-23">
                            <img src="{{ asset('public/image/svg/service-product/fireDetection.svg')}}" alt="Fire Detection & Protection System">
                        </div>
                        <h4 class="title mb-18"><a href="{{ route('frontEndIndex.ProductAndService',['slug'=>'fire-protection-systems']) }}">Fire Detection & Protection System</a></h4>
                        <div class="desc mb-12">Its purpose is to enhance life safety and lower the possible property damage by fire.</div>
                        <div class="btn-wrap">
                            <a class="readmore" href="{{ route('frontEndIndex.ProductAndService',['slug'=>'fire-protection-systems']) }}">Read more <div class="btn-arrow"></div></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 padding-0">
                    <div class="service-grid">
                        <div class="service-icon mb-23">
                            <img src="{{ asset('public/image/svg/service-product/lightingProtection.svg')}}" alt="Lightning Protection System">
                        </div>
                        <h4 class="title mb-18"><a href="{{ route('frontEndIndex.ProductAndService',['slug'=>'lightning-protection-system']) }}">Lightning Protection System</a></h4>
                        <div class="desc mb-12">A Lightning Protection System’s only purpose is to ensure safety to a building and its occupants.</div>
                        <div class="btn-wrap">
                            <a class="readmore" href="{{ route('frontEndIndex.ProductAndService',['slug'=>'lightning-protection-system']) }}">Read more <div class="btn-arrow"></div></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 padding-0">
                    <div class="service-grid">
                        <div class="service-icon mb-23">
                            <img src="{{ asset('public/image/svg/service-product/home&HotelAutomation.svg')}}" alt="Home & Hotel Automation">
                        </div>
                        <h4 class="title mb-18"><a href="{{ route('frontEndIndex.ProductAndService',['slug'=>'home-hotel-automation']) }}">Home & Hotel Automation</a></h4>
                        <div class="desc mb-12">Home Automation or Smart Home allows the automatic grip of frequently used elements.</div>
                        <div class="btn-wrap">
                            <a class="readmore" href="{{ route('frontEndIndex.ProductAndService',['slug'=>'home-hotel-automation']) }}">Read more <div class="btn-arrow"></div></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="view-btn text-center mt-40">
                <a class="readon2" href="#">All Services <div class="btn-arrow"></div></a>
            </div>
        </div>
    </div>
    <!-- Services Section End -->

      <!-- Blog Section Start -->
      <div class="rs-blog style1 shape-bg pt-130 md-pt-70 sm-pt-10">
        <div class="container">
            <div class="sec-title4 text-center mb-50">
                <h2 class="title">Our Project</h2>
            </div>
            <div class="rs-carousel owl-carousel owl-loaded owl-drag" data-loop="true" data-items="3" data-margin="30" data-autoplay="true" data-hoverpause="true" data-autoplay-timeout="5000" data-smart-speed="800" data-dots="false" data-nav="false" data-nav-speed="false" data-center-mode="false" data-mobile-device="1" data-mobile-device-nav="false" data-mobile-device-dots="false" data-ipad-device="3" data-ipad-device-nav="false" data-ipad-device-dots="false" data-ipad-device2="2" data-ipad-device-nav2="false" data-ipad-device-dots2="false" data-md-device="3" data-md-device-nav="false" data-md-device-dots="false">
                
                @foreach ($frontProjectShow as $key => $frontProjectRand)
                    
                
                <div class="blog-wrap">
                    <div class="blog-img">
                        <img src="{{ asset('public/image/project') }}/{{ $frontProjectRand->project_header_image }}" alt="{{ $frontProjectRand->project_name }}">
                    </div>
                    <div class="blog-contant">
                        <h4 class="title"><a href="{{ route('FrontEnd.ProjectDetailsShow',['project_slug'=>$frontProjectRand->project_slug]) }}">{{ $frontProjectRand->project_name }}</a></h4>

                        
                        <div class="blog-meta">
                            {{ $frontProjectRand->project_keyword }}
                        </div>
                    </div>
                </div>
                @endforeach
                
            </div>
        </div>
    </div>
    <!-- Blog Section End -->
</div> 
<!-- Main content End -->
@endsection