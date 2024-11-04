  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

      <div class="d-flex align-items-center justify-content-between">
          <a href="{{ route('Administrator.index') }}" class="logo d-flex align-items-center">
              <img src="{{ asset('public/SupUser/logo.png') }}" height="55%" width="90%"  alt="">
              {{-- <span class="d-none d-lg-block">Techno</span> --}}
          </a>
          <i class="bi bi-list toggle-sidebar-btn"></i>
      </div><!-- End Logo -->



      <nav class="header-nav ms-auto">
          <ul class="d-flex align-items-center">

              <li class="nav-item d-block d-lg-none">
                  <a class="nav-link nav-icon search-bar-toggle " href="#">
                      <i class="bi bi-search"></i>
                  </a>
              </li><!-- End Search Icon-->

              <li class="nav-item dropdown">

                  <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
                      <i class="bi bi-bell"></i>
                      <span class="badge bg-primary badge-number">4</span>
                  </a><!-- End Notification Icon -->

                  <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow notifications">
                      <li class="dropdown-header">
                          You have 4 new notifications
                          <a href="#"><span class="badge rounded-pill bg-primary p-2 ms-2">View all</span></a>
                      </li>
                      <li>
                          <hr class="dropdown-divider">
                      </li>

                      <li class="notification-item">
                          <i class="bi bi-exclamation-circle text-warning"></i>
                          <div>
                              <h4>Lorem Ipsum</h4>
                              <p>Quae dolorem earum veritatis oditseno</p>
                              <p>30 min. ago</p>
                          </div>
                      </li>

                      <li>
                          <hr class="dropdown-divider">
                      </li>

                      <li class="notification-item">
                          <i class="bi bi-x-circle text-danger"></i>
                          <div>
                              <h4>Atque rerum nesciunt</h4>
                              <p>Quae dolorem earum veritatis oditseno</p>
                              <p>1 hr. ago</p>
                          </div>
                      </li>

                      <li>
                          <hr class="dropdown-divider">
                      </li>

                      <li class="notification-item">
                          <i class="bi bi-check-circle text-success"></i>
                          <div>
                              <h4>Sit rerum fuga</h4>
                              <p>Quae dolorem earum veritatis oditseno</p>
                              <p>2 hrs. ago</p>
                          </div>
                      </li>

                      <li>
                          <hr class="dropdown-divider">
                      </li>

                      <li class="notification-item">
                          <i class="bi bi-info-circle text-primary"></i>
                          <div>
                              <h4>Dicta reprehenderit</h4>
                              <p>Quae dolorem earum veritatis oditseno</p>
                              <p>4 hrs. ago</p>
                          </div>
                      </li>

                      <li>
                          <hr class="dropdown-divider">
                      </li>
                      <li class="dropdown-footer">
                          <a href="#">Show all notifications</a>
                      </li>

                  </ul><!-- End Notification Dropdown Items -->

              </li><!-- End Notification Nav -->

              <li class="nav-item dropdown">
                  
                @php
                    $countUnSeenMsg = DB::table('front_contacts')->where('is_seen',0)->count();
                    $fetchMsgFrnt = DB::table('front_contacts')->where('is_seen',0)->take(7)->get()->reverse();
                @endphp

                  <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
                      <i class="bi bi-chat-left-text"></i>
                      <span class="badge bg-success badge-number">{{ $countUnSeenMsg }}</span>
                  </a><!-- End Messages Icon -->

                  <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow messages">
                      <li class="dropdown-header">
                          You have {{ $countUnSeenMsg }} new messages
                          <a href="{{ route('supUser.FrontEndContact') }}"><span
                                  class="badge rounded-pill bg-primary p-2 ms-2">View all</span></a>
                      </li>
                      <li>
                          <hr class="dropdown-divider">
                      </li>
                      @foreach ($fetchMsgFrnt as $key => $fetchMsgFrnt)
                      <li class="message-item">
                          <a href="{{ route('supUser.FrontEndContactShow',['id'=>$fetchMsgFrnt->id]) }}">
                              <img src="assets/img/messages-1.jpg" alt="" class="rounded-circle">
                              <div>
                                  <h4>{{ $fetchMsgFrnt->sender_name }}</h4>
                                  <p>{{ $fetchMsgFrnt->sender_ip }}...</p>
                                  <p>{{ $fetchMsgFrnt->created_at }}</p>
                              </div>
                          </a>
                      </li>
                      <li>
                          <hr class="dropdown-divider">
                      </li>
                      @endforeach

                      <li>
                          <hr class="dropdown-divider">
                      </li>

                      <li class="dropdown-footer">
                          <a href="{{ route('supUser.FrontEndContact') }}">Show all messages</a>
                      </li>

                  </ul><!-- End Messages Dropdown Items -->

              </li><!-- End Messages Nav -->

              <li class="nav-item dropdown pe-3">

                  <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#"
                      data-bs-toggle="dropdown">
                      <img src="{{ asset('public/image/users') }}/{{ Auth::user()->user_image }}" alt="Profile"
                          class="rounded-circle">
                      <span class="d-none d-md-block dropdown-toggle ps-2">{{ Str::title(Auth::user()->name) }}</span>
                  </a><!-- End Profile Iamge Icon -->

                  <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                      <li class="dropdown-header">
                          <h6>{{ Str::title(Auth::user()->name) }}</h6>
                          <span>{{ Str::title(Auth::user()->role) }}</span>
                      </li>
                      <li>
                          <hr class="dropdown-divider">
                      </li>

                      <li>
                          <a class="dropdown-item d-flex align-items-center"
                              href="{{ route('SupUser.Profile') }}">
                              <i class="bi bi-person"></i>
                              <span>My Profile</span>
                          </a>
                      </li>
                      <li>
                          <hr class="dropdown-divider">
                      </li>

                      <li>
                          <a class="dropdown-item d-flex align-items-center"
                              href="{{ route('SupUser.Profile') }}">
                              <i class="bi bi-gear"></i>
                              <span>Account Settings</span>
                          </a>
                      </li>
                      <li>
                          <hr class="dropdown-divider">
                      </li>


                      <li>
                          <hr class="dropdown-divider">
                      </li>

                      <li>
                          <a class="dropdown-item d-flex align-items-center" href="{{ route('logout') }}"
                              onclick="event.preventDefault();
              document.getElementById('logout-form').submit();">

                              <i class="bi bi-box-arrow-right"></i>
                              <span>Sign Out</span>
                              <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                  @csrf
                              </form>
                          </a>
                      </li>

                  </ul>
              </li>
          </ul>
      </nav>
  </header>
