@extends('FrontEndView.layouts.frontMaster')

@section('content')



<!-- Breadcrumbs Start -->
<div class="rs-breadcrumbs">
    <div class="container">
        <div class="breadcrumbs-inner">
            <h1 class="page-title">
                Contact Us
            </h1>
        </div>
    </div>
</div>
@php
        $AboutUsInformation = DB::table('about_us_information')->where('id','1')->first();
    @endphp

<section id="contact-information">
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <div class="address-contact text-center">

                    <h5>Address</h5>
                    <h6><b>Dhaka Office:</b> {{ $AboutUsInformation->company_address_1 }}.</h6>
                    <h6><b>Ctg. Office:</b> {{ $AboutUsInformation->company_address_2 }}.
                    </h6>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="address-contact text-center">
                    <h5>Phone</h5>
                    <h6>{{ $AboutUsInformation->company_telephone }}</h6>
                    <h6>{{ $AboutUsInformation->company_mobile_1 }}</h6>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="address-contact text-center">
                    <h5>Email</h5>
                    <h6>{{ $AboutUsInformation->company_email }}</h6>
                    <h6>{{ $AboutUsInformation->company_email_1 }}</h6>
                </div>
            </div>
        </div>
    </div>
</section>
<section id="conform">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="contactlist text-center">
                    <form action="{{ route('frontEnd.ContactStore') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @if ($errors->all())
                            <span style="color: red;">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </span>
                        @endif
                        @if (Session::get('succFrontEnd'))
                            <span style="color: green">{{ Session::get('succFrontEnd') }}</span>
                        @endif
                        @if (Session::get('errFrontEnd'))
                            <span style="color: red">{{ Session::get('errFrontEnd') }}</span>
                        @endif
                        <div class="row">
                            <div class="col">
                                <input type="text" name="sender_name" class="form-control" placeholder="Your Name">
                            </div>
                            <div class="col">
                                <input type="text" name="sender_number" class="form-control" placeholder="Mobile No.">
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col">
                                <input type="text" name="sender_subject" class="form-control" placeholder="Subject">
                            </div>
                            <div class="col">
                                <input type="email" name="sender_email" class="form-control" placeholder="Email Address">
                            </div>
                        </div>
                        <div class="message">
                            <textarea name="sender_message" id="sender_message" placeholder="Message"></textarea>
                        </div>
                        <div>
                            {!! HCaptcha::display() !!}
                        </div>
                        <button type="submit">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="iframe">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="contact-map">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3649.5574241040745!2d90.36603400000001!3d23.834332!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xcf8b78b8fb2e30e0!2sTechno%20Apogee!5e0!3m2!1sen!2sus!4v1674060355076!5m2!1sen!2sus"
                        width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
        </div>
    </div>
</section>

</div>




@endsection