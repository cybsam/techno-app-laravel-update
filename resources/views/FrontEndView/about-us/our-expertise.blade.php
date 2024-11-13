@extends('FrontEndView.layouts.frontMaster')

@section('content')


    <div class="rs-breadcrumbs">
        <div class="container">
            <div class="breadcrumbs-inner">
                <h1 class="page-title " style="color:#ffffff">
                    Our Expertise
                </h1>
            </div>
        </div>
    </div>

    <section id="weDo">
        <div class="container">
            <div class="row mt-5 mb-5">

                <div class="col-lg-12 weDoContent">
                    <div class="weDoContent">
                        <p>We manage complex projects offering results that fit our client’s needs including general
                            contracting, design, construction management, business development, feasibility studies and
                            production planning among others. We are committed to continuous training and instruction to
                            ensure a safe working environment for our employees and the clients we serve. We also
                            provide a full range of virtual design and construction services, as well as the latest in
                            smart mapping and computerized modeling with our In house expert and chartered highly
                            qualified expert consultant.</p>
                    </div>
                </div>
            </div>
            <div class="row mb-5">
                @foreach ($expertiseFetch as $key => $expertise)
                <div class="col-lg-6 expartice-col">
                    <div class="expartise text-center">
                        <h5><b>{{ $expertise->expertise_name }}</b></h5>
                        <p>{!! $expertise->expertise_description !!}</p>
                    </div>
                </div>
                @endforeach
                
            </div>
        </div>

    </section>

    </main>

@endsection
