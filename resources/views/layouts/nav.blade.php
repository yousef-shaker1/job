<!-- header-start -->
<header>
  <div class="header-area ">
      <div id="sticky-header" class="main-header-area">
          <div class="container-fluid ">
              <div class="header_bottom_border">
                  <div class="row align-items-center">
                      <div class="col-xl-3 col-lg-2">
                          <div class="logo">
                              <a href="{{ route('home') }}">
                                  <img src="{{ URL::asset('assets/img/logo.png') }}" alt="">
                              </a>
                          </div>
                      </div>
                      <div class="col-xl-6 col-lg-7">
                          <div class="main-menu  d-none d-lg-block">
                              <nav>
                                  <ul id="navigation">
                                      <li><a href="{{ route('home') }}">home</a></li>
                                      <li><a href="{{ route('jobspage') }}">Find a Jobs</a></li>
                                      <li><a href="#">pages <i class="ti-angle-down"></i></a>
                                          <ul class="submenu">
                                              <li><a href="{{ route('internship_page') }}">Internships</a></li>
                                              @auth
                                              <li><a href="{{ route('Featured_job_page') }}">Featured job</a></li>
                                              @endauth
                                              <li><a href="{{ route('about_page') }}">about</a></li>
                                              <li><a href="{{ route('contact_page') }}">Contact Us</a></li>
                                            </ul>
                                        </li>                                 
                                        <li><a href="{{ route('blog_page') }}">blog</a></li>
                                    
                                        <li><a href="{{ route('cv_page') }}">Make Cv</a></li>
                                      @if(Auth::user() && Auth::user()->hrAccount)
                                      <li><a href="{{ route('create_job') }}">Post a Job</a></li>
                                      @endif
                                  </ul>
                              </nav>
                          </div>
                      </div>
                      <div class="col-xl-3 col-lg-3 d-none d-lg-block">
                        <div class="Appointment">
                            <div class="phone_num d-flex justify-content-between align-items-center">
                                @if (Auth::user())
                                    @if(Auth::user()->hrAccount)
                                        <div class="dropdown">
                                            @if(Auth::user()->hrAccount->img)
                                            <img id="imgPreview" src="{{ asset('storage/' . Auth::user()->hrAccount->img) }}" alt="Image preview" class="img-thumbnail" data-toggle="dropdown">
                                            @else
                                            <img id="imgPreview" src="{{ URL::asset('assets/img/Screenshot 2024-09-10 031852.png') }}"  alt="Image preview" class="img-thumbnail" data-toggle="dropdown">
                                            @endif
                                            <div class="dropdown-menu">
                                                <div class="dropdown-header">
                                                    @if(Auth::user()->hrAccount->img)
                                                    <a href="{{ asset('storage/' . Auth::user()->hrAccount->img) }}">
                                                        <img src="{{ asset('storage/' . Auth::user()->hrAccount->img) }}" alt="Image preview" class="img-thumbnail-large">
                                                    </a>
                                                    @else
                                                    <a href="{{ URL::asset('assets/img/Screenshot 2024-09-10 031852.png') }}">
                                                        <img src="{{ URL::asset('assets/img/Screenshot 2024-09-10 031852.png') }}" alt="Image preview" class="img-thumbnail-large">
                                                    </a>
                                                    @endif
                                                    <div class="user-info">
                                                        <p class="name">{{ Auth::user()->hrAccount->first_name }} {{ Auth::user()->hrAccount->last_name }}</p>
                                                        <p class="email">{{ Auth::user()->hrAccount->business_email }}</p>
                                                    </div>
                                                </div>
                                                
                                                <a class="dropdown-item text-dark" href="{{ route('view_profile_hr') }}"><i class="fas fa-user"></i>View & Edit Profile</a>
                                                <a class="dropdown-item text-dark" href="{{ route('Job_management_page') }}"><i class="fas fa-info-circle"></i>Job Management</a>
                                                <a class="dropdown-item text-dark" href="{{ route('about_page') }}"><i class="fas fa-info-circle"></i> About Us</a>
                                                <a class="dropdown-item text-dark" href="{{ route('contact_page') }}"><i class="fas fa-phone-alt"></i> Contact Us</a>
                                                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="dropdown-item text-dark "><i class="fas fa-sign-out-alt"></i>Logout</a>
                                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                    @csrf
                                                </form>
                                            </div>
                                        </div>
                                        
                                        
                                    @elseif(Auth::user()->UserProfile)
                                    <div class="dropdown">
                                        @if(Auth::user()->UserProfile->userPersonal->img)
                                        <img id="imgPreview" src="{{ asset('storage/' . Auth::user()->UserProfile->userPersonal->img) }}" alt="Image preview" class="img-thumbnail" data-toggle="dropdown">
                                        @else
                                        <img id="imgPreview" src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="Image preview" class="img-thumbnail" data-toggle="dropdown">
                                        @endif
                                        <div class="dropdown-menu">
                                            <div class="dropdown-header">
                                                @if(Auth::user()->UserProfile->userPersonal->img)
                                                <a href="{{ asset('storage/' . Auth::user()->UserProfile->userPersonal->img) }}">
                                                    <img src="{{ asset('storage/' . Auth::user()->UserProfile->userPersonal->img) }}" alt="Image preview" class="img-thumbnail-large">
                                                </a>
                                                @else
                                                <a href="https://bootdey.com/img/Content/avatar/avatar7.png">
                                                    <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="Image preview" class="img-thumbnail-large">
                                                </a>  

                                                @endif
                                                <div class="user-info">
                                                    <p class="name">{{ Auth::user()->UserProfile->userPersonal->first_name }} {{ Auth::user()->UserProfile->userPersonal->middle_name }} {{ Auth::user()->UserProfile->userPersonal->last_name }}</p>
                                                    <p class="email">{{ Auth::user()->UserProfile->user->email }}</p>
                                                </div>
                                            </div>
                                            <?php $id = Auth::user()->id;?>
                                            <a class="dropdown-item text-dark" href="{{ route('view_profile_user',$id) }}"><i class="fas fa-user"></i>View Profile</a>
                                            <a class="dropdown-item text-dark" href="{{ route('edit_profile_user') }}"><i class="fas fa-edit"></i> Edit Profile</a>
                                            <a class="dropdown-item text-dark" href="{{ route('about_page') }}"><i class="fas fa-info-circle"></i> About Us</a>
                                            <a class="dropdown-item text-dark" href="{{ route('contact_page') }}"><i class="fas fa-phone-alt"></i> Contact Us</a>
                                            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="dropdown-item text-dark "><i class="fas fa-sign-out-alt"></i>Logout</a>
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                @csrf
                                            </form>
                                        </div>
                                    </div>
                                    @else
                                    <a class="btn btn-success mr-2" href="{{ route('login_user') }}">create profile</a>
                                    @endif
                                @else
                                <div class="container mt-3">
                                    <div class="button-group">
                                        <a href="{{ route('login') }}" class="btn btn-success">Login</a>
                                        <a href="{{ route('register') }}" class="btn btn-secondary">Get Started</a>
                                    </div>
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                      <div class="col-12">
                          <div class="mobile_menu d-block d-lg-none"></div>
                      </div>
                  </div>
              </div>

          </div>
      </div>
  </div>
</header>
<!-- header-end -->