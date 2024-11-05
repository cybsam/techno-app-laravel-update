  <!--Full width header Start-->
  <div class="full-width-header">
    <!--Header Start-->
    <header id="rs-header" class="rs-header style2 header-transparent">
        <!-- Topbar Area Start -->
        <div class="topbar-area style1">
            <div class="container custom">
                <div class="row y-middle">
                    <div class="col-lg-8">
                        <div class="topbar-contact">
                            <ul>
                                <li>
                                    <i class="flaticon-email"></i>
                                    <a
                                        href="mailto:{{ $AboutUsInformation->company_email_1 }}">{{ $AboutUsInformation->company_email_1 }}</a>
                                </li>
                                <li>
                                    <i class="flaticon-call"></i>
                                    <a href="tel:{{ $AboutUsInformation->company_mobile_1 }}">
                                        {{ $AboutUsInformation->company_mobile_1 }}</a>
                                       
                                </li>
                                
                                <li>
                                    <i class="flaticon-location"></i>
                                    {{ $AboutUsInformation->company_address_1 }}
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-4 text-right">
                        <div class="toolbar-sl-share">
                            <ul>
                                <li class="opening"> <em><i class="flaticon-clock"></i>Saturday - Thursday /
                                        {{ $AboutUsInformation->company_office_time }}</em> </li>
                               <li>
                                    <a href="{{ route('frontEnd.ContactS') }}">Contact Us</a>
                              </li>

                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Topbar Area End -->


        <!-- Menu Start -->
        <div class="menu-area menu-sticky">
            <div class="container custom">
                <div class="row-table">
                    <div class="col-cell header-logo">
                        <div class="logo-area">
                            <a href="{{ route('frontEndIndex') }}">
                                <img src="{{ asset('image/FrontEnd/logoFav/logo.PNG') }}" alt="Techno Apogee">
                            </a>
                        </div>
                    </div>
                    <div class="col-cell">
                        <div class="rs-menu-area">
                            <div class="main-menu">
                                <nav class="rs-menu hidden-md">
                                    <ul class="nav-menu">
                                        <li class="current-menu-item">
                                            <a href="{{ route('frontEndIndex') }}"><i class="fa fa-home" aria-hidden="true"></i></a>
                                        </li>
                                        <li class="menu-item-has-children">
                                            <a href="{{ route('frontEndIndex.about-us') }}">About Us</a>
                                            <ul class="sub-menu">
                                                <li><a href="{{ route('frontEndIndex.MissionAndVission') }}">Our
                                                        Mission & Vision</a></li>
                                                <li><a href="{{ route('frontEndIndex.ourTeam') }}">Our Team</a></li>
                                                <li><a href="{{ route('frontEndIndex.OurConcern') }}">Our Concern</a>
                                                </li>
                                                <li><a href="{{ route('frontEndIndex.our-expertise') }}">Our
                                                        Expertise</a></li>
                                                <li><a href="{{ route('frontEndIndex.strategic-partners') }}">Strategic
                                                        Partners</a>
                                                </li>

                                            </ul>
                                        </li>


                                        <li class="menu-item-has-children">
                                            <a href="#">PRODUCT & SERVICES</a>
                                            <ul class="mega-menu">
                                                <li>
                                                    <div class="sub-menu-mega">
                                                        <div class="meu-item " style="padding-left: 56px;">
                                                            <a href="{{ route('FrontEndProduct.DesignAndConsultancy') }}">DESIGN & CONSULTANCY SERVICE</a>
                                                            
                                                            <ul>
                                                                @foreach ($productAndServiceDesign as $ProductDesign)
                                                                    <li><a href="{{ route('frontEndIndex.ProductAndService',['slug'=>$ProductDesign->__proserslug]) }}">{{ $ProductDesign->__prosername }}</a></li>
                                                                @endforeach
                                                            </ul>
                                                        </div>
                                                        <div class="meu-item ">
                                                            <a href="{{ route('FrontEndProduct.hvacAndBBTsolution') }}">Solar Power & Cleanroom</a>
                                                            <ul>
                                                                @foreach ($productAndServiceElectrial as $ElectricalSol)
                                                                    
                                                                        <li><a
                                                                                href="{{ route('frontEndIndex.ProductAndService',['slug'=>$ElectricalSol->__proserslug]) }}">{{ $ElectricalSol->__prosername }}</a>
                                                                        </li>
                                                                    
                                                                @endforeach
                                                            </ul>
                                                        </div>
                                                        <div class="meu-item">
                                                            <a href="{{ route('FrontEndProduct.fireSolutions') }}">FIRE SAFETY SOLUTIONS</a>
                                                            <ul>
                                                                @foreach ($productAndServiceFire as $FireSolutions)
                                                                    
                                                                        <li><a
                                                                                href="{{ route('frontEndIndex.ProductAndService',['slug'=>$FireSolutions->__proserslug]) }}">{{ $FireSolutions->__prosername }}</a>
                                                                        </li>
                                                                    
                                                                @endforeach
                                                            </ul>
                                                        </div>
                                                        <div class="meu-item">
                                                            <a href="{{ route('FrontEndProduct.BmsAutomation') }}">AUTOMATION</a>
                                                            <ul>
                                                                @foreach ($productAndServiceAutomation as $ProductAndAutomationSolution)
                                                                    
                                                                        <li><a
                                                                                href="{{ route('frontEndIndex.ProductAndService',['slug'=>$ProductAndAutomationSolution->__proserslug]) }}">{{ $ProductAndAutomationSolution->__prosername }}</a>
                                                                        </li>
                                                                    
                                                                @endforeach
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                        </li>

                                        <li class="menu-item-has-children">
                                            <a href="">Our project</a>
                                            <ul class="sub-menu">
                                                <li><a href="{{ route('FrontEnd.OnGoingProject') }}">Ongoing
                                                        Project</a></li>
                                                <li class="menu-item-has-children-sub">
                                                    <a href="#">Complete Project</a>
                                                    <ul>
                                                        @foreach ($projectCategory as $key => $projectCategory)
                                                            <li><a
                                                                    href="{{ route('FrontEnd.CompleteProjectShow', ['project_cate_slug' => $projectCategory->project_category_slug]) }}">{{ $projectCategory->project_category }}</a>
                                                            </li>
                                                        @endforeach

                                                    </ul>
                                                </li>
                                            </ul>
                                        </li>
                                        
                                        <li class="menu-item-has-children">
                                          <a href="">Files</a>
                                              @php
                                                  $enlishtmentDoc = 'enlistment-document';
                                                  $datasheet = 'product-datasheet';
                                              @endphp
                                            <ul class="sub-menu">
                                                <li><a href="{{ route('FrontEndDownload.CompanyProfileshow') }}">Company Profile</a></li>
                                                <li><a href="{{ route('FrontEndDownload.EnlishtmentsDocuments',['enlist_slug'=>$enlishtmentDoc]) }}">Enlistment Documents</a></li>
                                                <li><a href="{{ route('FrontEndDownload.ProductDataSheet',['prod_slug'=>$datasheet]) }}">Product DataSheet</a></li>
                                            </ul>
                                      </li>
                                      <li>
                                            <a href="{{ route('FrontEndBlog.Index') }}">Blogs</a>
                                        </li>
                                    </ul> <!-- //.nav-menu -->
                                </nav>
                            </div> <!-- //.main-menu -->
                        </div>
                    </div>
                    <div class="col-cell">
                        <div class="expand-btn-inner">
                            <ul>

                                <li class="humburger">
                                    <a id="nav-expander" class="nav-expander bar" href="#">
                                        <div class="bar">
                                            <img src="" alt="">
                                            <span class="dot1"></span>
                                            <span class="dot2"></span>
                                            <span class="dot3"></span>
                                            <span class="dot4"></span>
                                            <span class="dot5"></span>
                                            <span class="dot6"></span>
                                            <span class="dot7"></span>
                                            <span class="dot8"></span>
                                            <span class="dot9"></span>
                                        </div>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Menu End -->



        <!-- Canvas Mobile Menu start -->
        <nav class="right_menu_togle mobile-navbar-menu" id="mobile-navbar-menu">
            <div class="close-btn">
                <a id="nav-close2" class="nav-close">
                    <div class="line">
                        <span class="line1"></span>
                        <span class="line2"></span>
                    </div>
                </a>
            </div>
            <ul class="nav-menu">
                <li class="menu-item-has-children current-menu-item">
                    <a href="{{ route('frontEndIndex') }}">Home</a>

                </li>
                
                <li class="menu-item-has-children">
                    <a href="#">About Us</a>
                    <ul class="sub-menu">
                          <li><a href="{{ route('frontEndIndex.MissionAndVission') }}">Our Mission & Vision</a></li>
                          <li><a href="{{ route('frontEndIndex.ourTeam') }}">Our Team</a></li>
                          <li><a href="{{ route('frontEndIndex.OurConcern') }}">Our Concern</a></li>
                          <li><a href="{{ route('frontEndIndex.our-expertise') }}">Our Expertise</a></li>
                          <li><a href="{{ route('frontEndIndex.strategic-partners') }}">Strategic Partners</a></li>
                    </ul>
                </li>
                <li class="menu-item-has-children">
                    <a href="#">PRODUCT & SERVICES</a>
                    <ul class="sub-menu">
                        <li><a href="{{ route('FrontEndProduct.DesignAndConsultancy') }}">DESIGN & CONSULTANCY</a></li>
                        <li><a href="{{ route('FrontEndProduct.hvacAndBBTsolution') }}">SOLAR & CLEAN-ROOM</a></li>
                        <li><a href="{{ route('FrontEndProduct.fireSolutions') }}">FIRE SAFETY SOLUTION</a></li>
                        <li><a href="{{ route('FrontEndProduct.BmsAutomation') }}">AUTOMATION</a></li>

                    </ul>
                </li>
                <li class="menu-item-has-children">
                    <a href="#">Projects</a>
                    <ul class="sub-menu">
                        <li><a href="{{ route('FrontEnd.OnGoingProject') }}">On Going Projects</a></li>
                        <li class="menu-item-has-children-sub">
                                                    <a href="#">Complete Projects</a>
                                                    @php
                                                    $projectCate = DB::table('project_categories')->get();
                                                    @endphp
                                                    <ul>
                                                        @foreach ($projectCate as $key => $projectCategory)
                                                            <li><a
                                                                    href="{{ route('FrontEnd.CompleteProjectShow', ['project_cate_slug' => $projectCategory->project_category_slug]) }}">{{ $projectCategory->project_category }}</a>
                                                            </li>
                                                        @endforeach

                                                    </ul>
                                                </li>
                        
                    </ul>
                </li>
                <li>
                  <a href="{{ route('FrontEndBlog.Index') }}">Blog</a>
                </li>

                <li class="menu-item-has-children">
                    <a href="{{ route('frontEnd.ContactS') }}">Contact</a>

                </li>
            </ul> <!-- //.nav-menu -->
            <div class="canvas-contact">
                <div class="address-area">
                    <div class="address-list">
                        <div class="info-icon">
                            <i class="flaticon-location"></i>
                        </div>
                        <div class="info-content">
                            <h4 class="title">Address</h4>
                            <em>{{ $AboutUsInformation->company_address_1 }}</em>
                        </div>
                    </div>
                    <div class="address-list">
                        <div class="info-icon">
                            <i class="flaticon-email"></i>
                        </div>
                        <div class="info-content">
                            <h4 class="title">Email</h4>
                            <em><a href="mailto:{{ $AboutUsInformation->company_email_1 }}">{{ $AboutUsInformation->company_email_1 }}</a></em>
                        </div>
                    </div>
                    <div class="address-list">
                        <div class="info-icon">
                            <i class="flaticon-call"></i>
                        </div>
                        <div class="info-content">
                            <h4 class="title">Phone</h4>
                            <em>{{ $AboutUsInformation->company_mobile_1 }}</em>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
        
    </header>
    
</div>
