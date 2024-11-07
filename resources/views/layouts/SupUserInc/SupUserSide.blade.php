    <!-- ======= Sidebar ======= -->
    <aside id="sidebar" class="sidebar">

        <ul class="sidebar-nav" id="sidebar-nav">

            <li class="nav-item">
                <a class="nav-link " href="{{ route('Administrator.index') }}">
                    <i class="bi bi-grid"></i>
                    <span>Dashboard</span>
                </a>
            </li>

            <li class="nav-heading">Apps</li>




            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#email-nav" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-envelope"></i><span>Emails</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="email-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="#">
                            <i class="bi bi-circle"></i><span>Compose</span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="bi bi-download"></i><span>Inbox</span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="bi bi-circle"></i><span>Drifts</span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="bi bi-circle"></i><span>Trash</span>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="nav-heading">Product & Service</li>
            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#product_and_service" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-gem"></i><span>Product & Service</span><i
                        class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="product_and_service" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                    <li>
                    <a href="{{ route('SupUser.ProductSerIndex') }}" class="@if(URL::current() == route('SupUser.ProductSerIndex')) active @endif">
                    <i class="bi bi-circle"></i><span>Index</span>
                    </a>
                </li>
                    <li>
                        <a href="{{ route('SupUser.ProductSerInsertChk') }}" class="@if(URL::current() == route('SupUser.ProductSerInsertChk')) active @endif">
                <i class="bi bi-circle"></i><span>Insert</span>
                </a>
                    </li>
                    <li>
                        <a href="{{ route('SupUser.ProductSerArchiveList') }}" class="@if(URL::current() == route('SupUser.ProductSerArchiveList')) active @endif">
                <i class="bi bi-circle"></i><span>Archive</span>
                </a>
                    </li>
 
                </ul>
            </li><!-- End Components Nav -->
            
            <li class="nav-heading">Our Project</li>
            
            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#our_project_front" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-journal-text"></i><span>Our Project</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="our_project_front" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="{{ route('SupUser.ProjectOnGoing') }}" class="@if(URL::current() == route('SupUser.ProjectOnGoing')) active @endif">
                            <i class="bi bi-circle"></i><span>On Going</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('SupUser.ProjectComplete') }}" class="@if(URL::current() == route('SupUser.ProjectComplete')) active @endif">
                            <i class="bi bi-circle"></i><span>Complete</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('SupUser.ProjectList') }}" class="@if(url()->current() == route('SupUser.ProjectList')) active @endif">
                            <i class="bi bi-circle"></i><span>Insert New</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('SupUser.projectArchiveList') }}"
                            class="@if (url()->current() == route('SupUser.projectArchiveList')) active @endif">
                            <i class="bi bi-circle"></i><span>Archived List</span>
                        </a>
                    </li>

                </ul>
            </li>
            <li class="nav-heading">Blog</li>
            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#blog-nav-item" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-bar-chart"></i><span>Blog</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="blog-nav-item" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="{{ route('SupUserBlog.Index') }}">
                            <i class="bi bi-circle"></i><span>Index / List</span>
                        </a>
                    </li>
                    
                </ul>
            </li><!-- End Charts Nav -->
            <li class="nav-heading">About Us</li>
            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#about_us_frontend" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-journal-text"></i><span>About Us </span><i
                        class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="about_us_frontend" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="{{ route('SupUser.OurTeam') }}" class="@if(URL()->current() == route('SupUser.OurTeam')) active @endif">
                            <i class="bi bi-circle"></i><span>Our Team </span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('SupUser.AboutUsIndex') }}" class="@if(URL()->current() == route('SupUser.AboutUsIndex')) active @endif">
                            <i class="bi bi-circle"></i><span>About Us </span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('SupUser.OurConcernBck') }}" class="@if(URL::current() == route('SupUser.OurConcernBck')) active @endif">
                            <i class="bi bi-circle"></i><span>Our Concern </span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('SupUser.OurExpertiseIndex') }}" class="@if(URL::current() == route('SupUser.OurExpertiseIndex')) active @endif">
                            <i class="bi bi-circle"></i><span>Our Expertise </span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('SupUser.MissionVission') }}" class="@if(URL()->current() == route('SupUser.MissionVission')) active @endif">
                            <i class="bi bi-circle"></i><span>Our Mission & Vission </span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('SupUser.OurStrategicPartners') }}" class="@if (URL::current() == route('SupUser.OurStrategicPartners'))
                            active
                        @endif">
                            <i class="bi bi-circle"></i><span>Our strategic-partners </span>
                        </a>
                    </li>

                </ul>
            </li>
            

            <li class="nav-heading">Users</li>
            <li class="nav-item @if (url()->current() == route('SupUser.ListUsers')) active @endif">
                <a class="nav-link collapsed" data-bs-target="#users-nav" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-person-lines-fill"></i><span>Users</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="users-nav" class="nav-content collapse active" data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="{{ route('SupUser.ListUsers') }}"
                            class="@if (url()->current() == route('SupUser.ListUsers')) active @endif">
                            <i class="bi bi-circle"></i><span>Users List</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('Administrator.UserArchiveListSh') }}">
                            <i class="bi bi-circle"></i><span>Archive Users</span>
                        </a>
                    </li>
                    
                </ul>
            </li>

            <li class="nav-heading">Files</li>
            <li class="nav-item ">
                <a class="nav-link collapsed" data-bs-target="#downloads_sidebar_loc" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-download"></i><span>Files</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="downloads_sidebar_loc" class="nav-content collapse active" data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="{{ route('SupUserDownload.indexList') }}" class="@if(URL::current() == route('SupUserDownload.indexList')) active @endif">
                            <i class="bi bi-circle"></i><span>Index</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('SupUserDownload.insertDown') }}" class="@if(URL::current() == route('SupUserDownload.insertDown')) active @endif">
                            <i class="bi bi-circle"></i><span>Insert File</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('SupUserDownload.archivelist') }}" class="@if(URL::current() == route('SupUserDownload.archivelist')) active @endif">
                            <i class="bi bi-circle"></i><span>Archived File</span>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="nav-heading">Settings</li>
            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#settings-nav" data-bs-toggle="collapse"
                    href="#">
                    <i class="bi bi-gear"></i><span>Settings</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="settings-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                    {{-- <li>
                        <a href="">
                            <i class="bi bi-circle"></i><span>Main Settings</span>
                        </a>
                    </li> --}}
                    <li>
                        <a href="{{ route('SupUser.FrontSliderImage') }}" class="@if(URL::current() == route('SupUser.FrontSliderImage')) active @endif">
                            <i class="bi bi-circle"></i><span>Front Slider</span>
                        </a>
                    </li>
                    <li>
                        <a href="">
                            <i class="bi bi-circle"></i><span>Find Us</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('SupUser.SetingsAboutUsInfo') }}"
                            class="@if (url()->current() == route('SupUser.SetingsAboutUsInfo')) active @endif">
                            <i class="bi bi-circle"></i><span>About Us Info</span>
                        </a>
                    </li>
                    <li>
                        <a href="">
                            <i class="bi bi-circle"></i><span>Terms Of Condition</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('SupUser.TeamManagementInsert') }}" class="@if(URL()->current() == route('SupUser.TeamManagementInsert')) active @endif">
                            <i class="bi bi-circle"></i><span>Employee Management Department List</span>
                        </a>
                    </li>

                </ul>
            </li>
            <li class="nav-heading">Pages</li>
            
            @php
                $countUnSeenMsg = DB::table('front_contacts')->where('is_seen',0)->count();
            @endphp
            <li class="nav-item">
                <a class="nav-link collapsed" href="{{ route('supUser.FrontEndContact') }}">
                    <i class="bi bi-envelope"></i>
                    <span>Contact Message <span class="badge bg-success badge-number">{{ $countUnSeenMsg }}</span></span>
                </a>
            </li>
            
            <li class="nav-heading">CYBSAM DEV</li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="{{ route('dashboard.shuvodev') }}">
                    <i class="bi bi-question-circle"></i>
                    <span>CYBSAM DEVs</span>
                </a>
            </li>

            
        </ul>
    </aside>
