        <!-- Footer Start -->
        <footer id="rs-footer" class="rs-footer style1">
            <div class="footer-top">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-3 col-md-12 col-sm-12 md-mb-10">
                            <div class="footer-logo mb-40">
                                <a href="{{ route('frontEndIndex') }}"><img src="{{ asset('image/FrontEnd/logoFav/logo.PNG') }}"
                                        alt="Techno Apogee"></a>
                            </div>
                            <div class="textwidget white-color pb-40">
                                <p>{{ $AboutUsInformation->company_description }}</p>
                            </div>
                            <ul class="footer-social md-mb-30">
                                <li>
                                    <a href="{{ $AboutUsInformation->company_facebook }}" target="_blank"><span><i class="fa fa-facebook"></i></span></a>
                                </li>
                                <li>
                                    <a href="{{ $AboutUsInformation->company_twitter }}" target="_blank"><span><i class="fa fa-twitter"></i></span></a>
                                </li>

                                <li>
                                    {{-- <a href="" target="_blank"><span><i class="fa fa-pinterest-p"></i></span></a> --}}
                                    <a href="{{ $AboutUsInformation->company_youtube }}" target="_blank"><span><i class="fa fa-youtube"></i></span></a>
                                </li>
                                <li>
                                    <a href="{{ $AboutUsInformation->company_linkedin }}" target="_blank"><span><i class="fa fa-linkedin"></i></span></a>
                                </li>

                            </ul>
                        </div>
                        <div class="col-lg-3 col-md-12 col-sm-12 md-mb-10 pl-55 md-pl-15">
                            <h3 class="footer-title">Our Services</h3>
                            <ul class="site-map">
                                <li><a href="{{ route('FrontEndProduct.DesignAndConsultancy') }}">DESIGN & CONSULTANCY</a></li>
                                <li><a href="{{ route('FrontEndProduct.hvacAndBBTsolution') }}">HVAC & BBT SOLUTIONS</a></li>
                                <li><a href="{{ route('FrontEndProduct.fireSolutions') }}">FIRE SAFETY SOLUTIONS</a></li>
                                <li><a href="{{ route('FrontEndProduct.BmsAutomation') }}">AUTOMATION</a></li>
                            </ul>
                        </div>
                        <div class="col-lg-3 col-md-12 col-sm-12 md-mb-10">
                            <h3 class="footer-title">Contact Info</h3>
                            <ul class="address-widget">
                                <li>
                                    <i class="flaticon-location"></i>
                                    <div class="desc"> {{ $AboutUsInformation->company_address_1 }}</div>
                                </li>
                                <li>
                                    <i class="flaticon-call"></i>
                                    <div class="desc">
                                        <a href="tel:{{ $AboutUsInformation->company_mobile_1 }}">{{ $AboutUsInformation->company_mobile_1 }}</a>
                                    </div>
                                </li>
                                <li>
                                    <i class="flaticon-email"></i>
                                    <div class="desc">
                                        <a href="mailto:{{ $AboutUsInformation->company_email_1 }}">{{ $AboutUsInformation->company_email_1 }}</a>
                                    </div>
                                </li>
                                <li>
                                    <i class="flaticon-clock-1"></i>
                                    <div class="desc">
                                        Office Hours: {{ $AboutUsInformation->company_office_time }}
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="col-lg-3 col-md-12 col-sm-12">
                            <h3 class="footer-title">Search</h3>
                            <p class="widget-desc white-color">Stay up to update with our latest news and products.</p>
                            <p>
                                <!--<input type="email" name="EMAIL" placeholder="Your email address" required="">-->
                                <div class="gcse-search"></div>
                                <!--<input type="submit" value="submit">-->
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-bottom">
                <div class="container">
                    <div class="row y-middle">
                        <div class="col-lg-6 md-mb-10 text-lg-end text-center order-last">
                            <ul class="copy-right-menu">
                                <li><a href="{{ route('login') }}">Auth</a></li>
                                <li><a href="{{ route('frontEndIndex.about-us') }}">About Us</a></li>
                                <li><a href="{{ route('FrontEndSitemap') }}">Sitemap</a></li>
                                <li><a href="{{ route('FrontEndprivacyandPolicy') }}">Privacy</a></li>
                                <li><a href="{{ route('FrontEndtermsandconditions') }}">Terms</a></li>
                            </ul>
                        </div>
                        <div class="col-lg-6">
                            <div class="copyright text-lg-start text-center ">
                                <p>&copy;2006 - <?php echo date('Y'); ?> Techno Apogee | All Rights Reserved.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- Footer End -->
