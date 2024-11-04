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
                                    <a href="mailto:{{ $AboutUsInformation->company_email }}">{{ $AboutUsInformation->company_email }}</a>
                                </li>
                                <li>
                                    <i class="flaticon-call"></i>
                                    <a href="tel:{{ $AboutUsInformation->company_mobile_1 }}"> {{ $AboutUsInformation->company_mobile_1 }}</a>
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
                                <li class="opening"> <em><i class="flaticon-clock"></i>Saturday - Thursday / {{ $AboutUsInformation->company_office_time }}</em> </li>
                                <li><a href="{{ route('login') }}">Login</a></li>
                                
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
                            <a href="{{ url('/') }}">
                                <img src="{{ asset('image/FrontEnd/logoFav/logo.png') }}" alt="techno logo">
                            </a>
                        </div>
                    </div>
                    <div class="col-cell">
                        <div class="rs-menu-area">
                            <div class="main-menu">
                                <nav class="rs-menu hidden-md">
                                    <ul class="nav-menu">
                                        <li class="current-menu-item">
                                            <a href="{{ url('/') }}">Home</a>
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
                                                            <a href="">DESIGN
                                                                & CONSULTANCY SERVICES</a>
                                                            <ul>
                                                                {{-- @foreach ($menu as $item)
                                                                    @if ($item->parentid == 2)
                                                                        
                                                                        <li><a
                                                                                href="{{ url($item->slug) }}">{{ $item->name }}</a>
                                                                        </li>
                                                                    @endif
                                                                @endforeach --}}

                                                            </ul>
                                                        </div>
                                                        <div class="meu-item ">
                                                            <a href="">ELECTRICAL
                                                                SOLUTION</a>
                                                            <ul>
                                                                {{-- @foreach ($menu as $item)
                                                                    @if ($item->parentid == 3)
                                                                        <li><a
                                                                                href="{{ url($item->slug) }}">{{ $item->name }}</a>
                                                                        </li>
                                                                    @endif
                                                                @endforeach --}}
                                                            </ul>
                                                        </div>
                                                        <div class="meu-item">
                                                            <a href="">FIRE
                                                                SOLUTION</a>
                                                            <ul>
                                                                {{-- @foreach ($menu as $item)
                                                                    @if ($item->parentid == 4)
                                                                        <li><a
                                                                                href="{{ url($item->slug) }}">{{ $item->name }}</a>
                                                                        </li>
                                                                    @endif
                                                                @endforeach --}}
                                                            </ul>
                                                        </div>
                                                        <div class="meu-item">
                                                            <a href="">AUTOMATION
                                                                SOLUTION</a>
                                                            <ul>
                                                                {{-- @foreach ($menu as $item)
                                                                    @if ($item->parentid == 5)
                                                                        <li><a
                                                                                href="{{ url($item->slug) }}">{{ $item->name }}</a>
                                                                        </li>
                                                                    @endif
                                                                @endforeach --}}
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                        </li>

                                        <li class="menu-item-has-children">
                                            <a href="">Our project</a>
                                            <ul class="sub-menu">
                                                <li><a href="">Ongoing
                                                        Project</a></li>
                                                <li class="menu-item-has-children-sub">
                                                    <a href="#">Complete
                                                        Project</a>
                                                    <ul>
                                                        <li><a href="">Industry
                                                                Projects</a></li>
                                                        <li><a href="">Bank
                                                                & Financial Projects</a></li>
                                                        <li><a href="">NGO</a></li>
                                                        <li><a href="">Club</a></li>
                                                        <li><a href="">Hotel &
                                                                Resorts</a></li>
                                                        <li><a href="">Govt.
                                                                Projects</a></li>
                                                        <li><a href="">Commercial
                                                                Building Projects</a></li>
                                                    </ul>
                                                </li>
                                            </ul>
                                        </li>
                                        <li>
                                            <a href="">Blog</a>
                                        </li>
                                        <li class="bg-warning">
                                            <a class="" href="{{ route('logout') }}"
                                                onclick="event.preventDefault();
                                                        document.getElementById('logout-form').submit();">
                                                {{ __('Logout') }}
                                            </a>
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                                class="d-none">
                                                @csrf
                                            </form>
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
                    <a href="index.html">Home</a>

                </li>
                {{-- <li class="menu-item-has-children">
                  <a href="#">Pages</a>                                                        
                 
              </li> --}}
                <li class="menu-item-has-children">
                    <a href="#">About Us</a>
                    <ul class="sub-menu">
                        <li><a href="portfolio.html">Our Mission & Vision</a></li>
                        <li><a href="portfolio2.html">Our Team</a></li>
                        <li><a href="portfolio3.html">Our Expertise</a></li>
                        <li><a href="portfolio3.html">Strategic Partners</a></li>

                    </ul>
                </li>
                <li class="menu-item-has-children">
                    <a href="#">PRODUCT & SERVICES</a>
                    <ul class="sub-menu">
                        <li><a href="services-style1.html">DESIGN & CONSULTANCY SERVICES</a></li>
                        <li><a href="services-style2.html">ELECTRICAL SOLUTION</a></li>
                        <li><a href="business-planning.html">FIRE SOLUTION</a></li>
                        <li><a href="business-planning.html">AUTOMATION SOLUTION</a></li>

                    </ul>
                </li>
                <li>
                    <a href="blog.html">Our project</a>
                </li>
                <li>
                    <a href="blog.html">Blog</a>
                </li>

                <li class="menu-item-has-children">
                    <a class="" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                            class="d-none">
                            @csrf
                        </form>

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
                            <em><a href="mailto:{{ $AboutUsInformation->company_email }}">{{ {{ $AboutUsInformation->company_email }} }}</a></em>
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
        <!-- Canvas Menu end -->
    </header>
    <!--Header End-->
</div>
<!--Full width header End-->
