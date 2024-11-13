@extends('FrontEndView.layouts.frontMaster')

@section('content')

    
    <style>
        .team-member {
            background: #e6e2e0;
            text-align: center;
            transition: all 0.3s ease-in-out;
            -moz-transition: all 0.3s ease-in-out;
            -webkit-transition: all 0.3s ease-in-out;
            -o-transition: all 0.3s ease-in-out;
            -ms-transition: all 0.3s ease-in-out;
        }

        .team-member .team-photo {
            background: #fff;
            min-height: 200px;
            margin: 0 auto;
            padding: 24px 24px 32px 24px;
        }

        .team-member .team-attrs {
            padding: 2px 16px 16px 16px;
            color: #303030;
        }

        .team-member .team-attrs .team-name {
            font-size: 21px;
        }

        .team-member .team-attrs .team-position {
            font-size: 12px;
            letter-spacing: 2px;
            color: #a7a7a7;
        }

        .team-member .team-content {
            color: #303030;
            opacity: .8;
            padding: 16px 24px 40px 24px;
        }

        .team-member:hover {
            box-shadow: 2px 3px 9px rgba(0, 0, 0, 0.2);
        }


        /*------------------------------------------------------------------
        [10. Hover Effects]
        */

        .item-wrap {
            margin-bottom: 30px;
        }

        figure {
            position: relative;
            overflow: hidden;
            text-align: center;
        }

        figure img {
            position: relative;
            opacity: 1.0;
        }

        figure figcaption {
            padding: 1.0em;
            color: #303030;
            text-transform: uppercase;
            -webkit-backface-visibility: hidden;
            backface-visibility: hidden;
        }

        figure figcaption>.fig-description a {
            z-index: 1000;
            text-indent: 200%;
            white-space: nowrap;
            font-size: 0;
        }

        figure figcaption:before,
        figure figcaption:after {
            pointer-events: none;
        }

        figure figcaption,
        figure figcaption>a {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
        }

        figure h3 {
            word-spacing: -0.15em;
            font-family: "Montserrat", sans-serif;
        }

        figure h3 span {
            font-family: "Montserrat", sans-serif;
        }

        figure h3,
        figure p {
            margin: 0;
        }

        figure p {
            letter-spacing: 1px;
            font-size: 68.5%;
        }


        /* Team Hover */

        figure.effect-zoe {
            margin: 0;
            width: 100%;
            height: auto;
            min-width: 200px;
            max-height: none;
            max-width: none;
            float: none;
        }

        figure.effect-zoe img {
            display: inline-block;
            opacity: 1;
        }

        figure.effect-zoe p.icon-links {
            margin: 0px;
        }

        figure.effect-zoe p.icon-links a {
            color: #fff;
            -webkit-transition: -webkit-transform 0.35s;
            transition: transform 0.35s;
            -webkit-transform: translate3d(0, 200%, 0);
            transform: translate3d(0, 200%, 0);
        }

        figure.effect-zoe p.icon-links a i::before {
            color: #fff;
            font-size: 24px;
            display: inline-block;
            padding: 15px 10px;
            margin-left: 0;
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
        }

        figure.effect-zoe p.icon-links a:hover i::before {
            color: #f2f2f2;
        }

        figure.effect-zoe p.phone-number a {
            color: #fff;
            font-size: 12px;
        }

        figure.effect-zoe p.phone-number a:hover {
            color: #f2f2f2;
            text-decoration: none;
        }

        figure.effect-zoe figcaption {
            top: auto;
            bottom: 0;
            padding: 0;
            height: 8em;
            background: #a7a7a7;
            border-top: 3px solid #fff;
            color: #5d5d5d;
            -webkit-transition: -webkit-transform 0.5s;
            transition: transform 0.5s;
            -webkit-transform: translate3d(0, 100%, 0);
            transform: translate3d(0, 100%, 0);
        }

        figure.effect-zoe:hover figcaption,
        figure.effect-zoe:hover h2,
        figure.effect-zoe:hover p.icon-links a {
            -webkit-transform: translate3d(0, 0, 0);
            transform: translate3d(0, 0, 0);
        }

        figure.effect-zoe:hover p.icon-links a:nth-child(3) {
            -webkit-transition-delay: 0.1s;
            transition-delay: 0.1s;
        }

        figure.effect-zoe:hover p.icon-links a:nth-child(2) {
            -webkit-transition-delay: 0.15s;
            transition-delay: 0.15s;
        }

        figure.effect-zoe:hover p.icon-links a:first-child {
            -webkit-transition-delay: 0.2s;
            transition-delay: 0.2s;
        }
    </style>

    <!-- Breadcrumbs Start -->
    <div class="rs-breadcrumbs">
        <div class="container">
            <div class="breadcrumbs-inner">
                <h1 class="page-title " style="color:#ffffff">
                    Our team
                </h1>
            </div>
        </div>
    </div>
    <section id="weDo">
        <div class="container">
            <div class="row mt-5 mb-5">
                <div class="col-lg-12">
                    
    <h4 class="align-center text-black" style="text-align: center;color:#303030;font-style:italic;">Management</h4>

                    @foreach ($management as $key => $management)
                        <div class="managementTem m-auto text-center">
                            <div class="managementTemImg">
                                <img src="{{ asset('public/image/about-us/our-team') }}/{{ $management->image }}" alt="">
                            </div>

                            <h4>{{ $management->name }}</h4>
                            <p>{{ $management->degination }}</p>
                            
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    
    <div class="pt-5"></div>
    <h4 class="align-center text-black" style="text-align: center;color:#303030;font-style:italic;">Admin & Operation</h4>
    <div class="container">
        <div class="row bootstrap snippets bootdey">

            @foreach ($admin_operation as $key => $admin_operation)
                <div class="col-md-4">
                    <div class="team-member">
                        <figure class="effect-zoe">
                            <div class="team-photo">
                                <img src="{{ asset('public/image/about-us/our-team') }}/{{ $admin_operation->image }}"
                                    alt="{{ $admin_operation->name }}" class="img-responsive">
                            </div>
                            <div class="team-attrs">
                                <div class="team-name font-accident-two-bold-italic">{{ $admin_operation->name }}</div>
                                <div class="team-position">{{ $admin_operation->degination }}</div>
                            </div>

                            <figcaption>

                                <p class="icon-links">
                                    <a href="mailto:{{ $admin_operation->email }}"><i class="fa fa-google"></i></a>
                                    <a href="tel:{{ $admin_operation->mobile }}"><i class="fa fa-phone"></i></a>
                                    <a href="tel:{{ $admin_operation->whatsapp }}"><i class="fa fa-whatsapp"></i></a>
                                </p>

                                <p class="phone-number">
                                    <a href="tel:{{ $admin_operation->mobile }}">tel: {{ $admin_operation->mobile }}</a>
                                </p>
                            </figcaption>
                        </figure>
                    </div>
                    <div class="dividewhite4"></div>
                </div>
            @endforeach

        </div>
    </div>

    <div class="pt-5"></div>
    <h4 class="align-center text-black" style="text-align: center;color:#303030;font-style:italic;">Business Development
    </h4>
    <div class="container">
        <div class="row bootstrap snippets bootdey">

            @foreach ($business_development as $key => $business_development)
                <div class="col-md-4">
                    <div class="team-member">
                        <figure class="effect-zoe">
                            <div class="team-photo">
                                <img src="{{ asset('public/image/about-us/our-team') }}/{{ $business_development->image }}"
                                    alt="{{ $business_development->name }}" class="img-responsive">
                            </div>
                            <div class="team-attrs">
                                <div class="team-name font-accident-two-bold-italic">{{ $business_development->name }}
                                </div>
                                <div class="team-position">{{ $business_development->degination }}</div>
                            </div>

                            <figcaption>

                                <p class="icon-links">
                                    <a href="mailto:{{ $business_development->email }}"><i class="fa fa-google"></i></a>
                                    <a href="tel:{{ $business_development->mobile }}"><i class="fa fa-phone"></i></a>
                                    <a href="tel:{{ $business_development->whatsapp }}"><i class="fa fa-whatsapp"></i></a>
                                </p>

                                <p class="phone-number">
                                    <a href="tel:{{ $business_development->mobile }}">tel:
                                        {{ $business_development->mobile }}</a>
                                </p>
                            </figcaption>
                        </figure>
                    </div>
                    <div class="dividewhite4"></div>
                </div>
            @endforeach

        </div>
    </div>

    <div class="pt-5"></div>
    <h4 class="align-center text-black" style="text-align: center;color:#303030;font-style:italic;">Information Technology &
        Design</h4>
    <div class="container">
        <div class="row bootstrap snippets bootdey">

            @foreach ($information_technology_design as $key => $information_technology_design)
                <div class="col-md-4">
                    <div class="team-member">
                        <figure class="effect-zoe">
                            <div class="team-photo">
                                <img src="{{ asset('public/image/about-us/our-team') }}/{{ $information_technology_design->image }}"
                                    alt="{{ $information_technology_design->name }}" class="img-responsive">
                            </div>
                            <div class="team-attrs">
                                <div class="team-name font-accident-two-bold-italic">
                                    {{ $information_technology_design->name }}</div>
                                <div class="team-position">{{ $information_technology_design->degination }}</div>
                            </div>

                            <figcaption>

                                <p class="icon-links">
                                    <a href="mailto:{{ $information_technology_design->email }}"><i
                                            class="fa fa-google"></i></a>
                                    <a href="tel:{{ $information_technology_design->mobile }}"><i
                                            class="fa fa-phone"></i></a>
                                    <a href="tel:{{ $information_technology_design->whatsapp }}"><i
                                            class="fa fa-whatsapp"></i></a>
                                </p>

                                <p class="phone-number">
                                    <a href="tel:{{ $information_technology_design->mobile }}">tel:
                                        {{ $information_technology_design->mobile }}</a>
                                </p>
                            </figcaption>
                        </figure>
                    </div>
                    <div class="dividewhite4"></div>
                </div>
            @endforeach

        </div>
    </div>

    <div class="pt-5"></div>
    <h4 class="align-center text-black" style="text-align: center;color:#303030;font-style:italic;">Project Engineering &
        Operation Department</h4>
    <div class="container">
        <div class="row bootstrap snippets bootdey">

            @foreach ($project_engineering_operation_department as $key => $project_engineering_operation_department)
                <div class="col-md-4">
                    <div class="team-member">
                        <figure class="effect-zoe">
                            <div class="team-photo">
                                <img src="{{ asset('public/image/about-us/our-team') }}/{{ $project_engineering_operation_department->image }}"
                                    alt="{{ $project_engineering_operation_department->name }}" class="img-responsive">
                            </div>
                            <div class="team-attrs">
                                <div class="team-name font-accident-two-bold-italic">
                                    {{ $project_engineering_operation_department->name }}</div>
                                <div class="team-position">{{ $project_engineering_operation_department->degination }}
                                </div>
                            </div>

                            <figcaption>

                                <p class="icon-links">
                                    <a href="mailto:{{ $project_engineering_operation_department->email }}"><i
                                            class="fa fa-google"></i></a>
                                    <a href="tel:{{ $project_engineering_operation_department->mobile }}"><i
                                            class="fa fa-phone"></i></a>
                                    <a href="tel:{{ $project_engineering_operation_department->whatsapp }}"><i
                                            class="fa fa-whatsapp"></i></a>
                                </p>

                                <p class="phone-number">
                                    <a href="tel:{{ $project_engineering_operation_department->mobile }}">tel:
                                        {{ $project_engineering_operation_department->mobile }}</a>
                                </p>
                            </figcaption>
                        </figure>
                    </div>
                    <div class="dividewhite4"></div>
                </div>
            @endforeach

        </div>
    </div>

    <div class="pt-5"></div>
    <h4 class="align-center text-black" style="text-align: center;color:#303030;font-style:italic;">Support Team
        Electrical & Maintenance</h4>
    <div class="container">
        <div class="row bootstrap snippets bootdey">

            @foreach ($support_team_electrical_maintenance as $key => $support_team_electrical_maintenance)
                <div class="col-md-4">
                    <div class="team-member">
                        <figure class="effect-zoe">
                            <div class="team-photo">
                                <img src="{{ asset('public/image/about-us/our-team') }}/{{ $support_team_electrical_maintenance->image }}"
                                    alt="{{ $support_team_electrical_maintenance->name }}" class="img-responsive">
                            </div>
                            <div class="team-attrs">
                                <div class="team-name font-accident-two-bold-italic">
                                    {{ $support_team_electrical_maintenance->name }}</div>
                                <div class="team-position">{{ $support_team_electrical_maintenance->degination }}</div>
                            </div>

                            <figcaption>

                                <p class="icon-links">
                                    <a href="mailto:{{ $support_team_electrical_maintenance->email }}"><i
                                            class="fa fa-google"></i></a>
                                    <a href="tel:{{ $support_team_electrical_maintenance->mobile }}"><i
                                            class="fa fa-phone"></i></a>
                                    <a href="tel:{{ $support_team_electrical_maintenance->whatsapp }}"><i
                                            class="fa fa-whatsapp"></i></a>
                                </p>

                                <p class="phone-number">
                                    <a href="tel:{{ $support_team_electrical_maintenance->mobile }}">tel:
                                        {{ $support_team_electrical_maintenance->mobile }}</a>
                                </p>
                            </figcaption>
                        </figure>
                    </div>
                    <div class="dividewhite4"></div>
                </div>
            @endforeach

        </div>
    </div>

@endsection
