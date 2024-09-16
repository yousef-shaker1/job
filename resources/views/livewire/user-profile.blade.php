<div>
    <div class="container">
        <div class="main-body">
            <nav aria-label="breadcrumb" class="main-breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Profile</li>
                </ol>
            </nav>
    
            <div class="row gutters-sm">
                <div class="col-md-4 mb-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex flex-column align-items-center text-center position-relative">
                                <!-- Icon for editing -->
                                <a href="{{ route('edit_profile_user') }}" class="edit-icon position-absolute">
                                    <svg width="24" height="24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                                        <path d="M3 17.25V21h3.75L17.708 9.992l-3.75-3.75L3 17.25zM20.708 7.292a1 1 0 0 0 0-1.416l-1.58-1.58a1 1 0 0 0-1.416 0L15.5 6.844l3.75 3.75 1.458-1.458z"></path>
                                    </svg>
                                </a>
                                @if (!empty($user->userPersonal->img))
                                    <a href="{{ asset('storage/' . $user->userPersonal->img) }}">
                                        <img src="{{ asset('storage/' . $user->userPersonal->img) }}" alt="User" class="rounded-circle" width="150">
                                    </a>
                                @else
                                    <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="User" class="rounded-circle" width="150">
                                @endif
                                <div class="mt-3">
                                    <h4>{{ $user->userPersonal->first_name }} {{ $user->userPersonal->middle_name }} {{ $user->userPersonal->last_name }}</h4>
                                    <p class="text-secondary mb-1">{{ $user->userPersonal->job_title }}</p>
                                    <p class="text-muted font-size-sm">{{ $user->UserAddress->address }}-{{ $user->UserAddress->state }}-{{ $user->UserAddress->city }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- روابط الشبكات الاجتماعية -->
                    <div class="card mt-3">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                <h6 class="mb-0">
                                    <svg width="40" height="34" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                                        <path d="M4 3h16a1 1 0 0 1 1 1v16a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V4a1 1 0 0 1 1-1zM9 16V10H7v6h2zm-1-8c.69 0 1.26.56 1.26 1.26S8.69 11.26 8 11.26 6.74 10.7 6.74 10 7.3 8 8 8zm11 8h-2v-3.5c0-1.16-.24-2-1.26-2-1.26 0-1.76.77-1.76 1.76V16h-2v-6h2v.84c.27-.42.71-.84 1.26-1.26.55-.42 1.27-.56 1.76-.56 1.26 0 2.26 1 2.26 2.26V16z"></path>
                                    </svg>
                                    
                                </h6>
                                <a class="text-secondary" target="_blank"
                                    href="{{ $user->UserSkill->linkedin }}">{{ $user->UserSkill->linkedin }}</a>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                <h6 class="mb-0">
                                    <svg class="mr-2" width="24" height="24" fill="none"
                                        stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round">
                                        <path
                                            d="M9 19c-5 1.5-5-2.5-7-3m14 6v-3.87a3.37 3.37 0 0 0-.94-2.61c3.14-.35 6.44-1.54 6.44-7A5.44 5.44 0 0 0 20 4.77 5.07 5.07 0 0 0 19.91 1S18.73.65 16 2.48a13.38 13.38 0 0 0-7 0C6.27.65 5.09 1 5.09 1A5.07 5.07 0 0 0 5 4.77a5.44 5.44 0 0 0-1.5 3.78c0 5.42 3.3 6.61 6.44 7A3.37 3.37 0 0 0 9 18.13V22">
                                        </path>
                                    </svg>Github
                                </h6>
                                <a class="text-secondary" target="_blank"
                                    href="{{ $user->UserSkill->github }}">{{ $user->UserSkill->github }}</a>
                            </li>
                            <!-- باقي الروابط -->
                        </ul>
                    </div>
                </div>
    
                <div class="col-md-8">
                    <div class="card mb-3">
                        <div class="card-body">
                            <!-- أزرار التنقل بين الأقسام -->
                            <button wire:click="showPersonal" class="btn btn-primary">Personal Information</button>
                            <button wire:click="showEducation" class="btn btn-primary">Education</button>
                            <button wire:click="showSkills" class="btn btn-primary">Skills</button>
                            <button wire:click="showProject" class="btn btn-primary">Projects</button>
                            <button wire:click="showWork" class="btn btn-primary">Work Experience</button>
                        </div>
                    </div>
    
                    <!-- المعلومات الشخصية -->
                    @if($personal)

                        <div class="card mb-3">
                            <div class="card-body">
                                <h4 class="mb-4 text-primary">Personal Information</h4>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Full Name</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        {{ $user->userPersonal->first_name }} {{ $user->userPersonal->middle_name }}
                                        {{ $user->userPersonal->last_name }}
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">email Name</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        {{ $user->user->email }}
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Phone</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        {{ $user->userPersonal->phone }}
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Age</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        {{ $user->userPersonal->age }}
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">job title</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        {{ $user->userPersonal->job_title }}
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Year Experience</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        {{ $user->userPersonal->year_experience }}
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Birth Day</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        {{ $user->userPersonal->birth_day }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
    
                    <!-- معلومات التعليم -->
                    @if($educ)
                    <div class="card mt-3">
                        <div class="card-body">
                            <h4 class="mb-4 text-primary">Education Information</h4>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">College</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    {{ $user->UserEducationInformation->college }}
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Major</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    {{ $user->UserEducationInformation->major }}
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Start Date</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    {{ $user->UserEducationInformation->start_date_month_university }}/{{ $user->UserEducationInformation->start_date_year_university }}
                                </div>
                            </div>
                            <hr>
                            @if (
                                !$user->UserEducationInformation->end_date_month_university == null &&
                                    !$user->UserEducationInformation->end_date_year_university == null)
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">End Date</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        {{ $user->UserEducationInformation->end_date_month_university }}/{{ $user->UserEducationInformation->end_date_year_university }}
                                    </div>
                                </div>
                            @else
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">End Date</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        currently studying there
                                        ({{ $user->UserEducationInformation->university_year }})
                                    </div>
                                </div>
                            @endif
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">year</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    @if (!$user->UserEducationInformation->end_date_year_university == null)
                                        ({{ $user->UserEducationInformation->start_date_year_university }} -
                                        {{ $user->UserEducationInformation->end_date_year_university }})
                                    @endif
                                    @if ($user->UserEducationInformation->university_year == 'First_grade')
                                        ({{ $user->UserEducationInformation->start_date_year_university }} -
                                        {{ $user->UserEducationInformation->start_date_year_university + 4 }})
                                    @elseif($user->UserEducationInformation->university_year == 'Second_grade')
                                        ({{ $user->UserEducationInformation->start_date_year_university }} -
                                        {{ $user->UserEducationInformation->start_date_year_university + 3 }})
                                    @elseif($user->UserEducationInformation->university_year == 'Third_grade')
                                        ({{ $user->UserEducationInformation->start_date_year_university }} -
                                        {{ $user->UserEducationInformation->start_date_year_university + 2 }})
                                    @elseif($user->UserEducationInformation->university_year == 'Fourth_grade')
                                        ({{ $user->UserEducationInformation->start_date_year_university }} -
                                        {{ $user->UserEducationInformation->start_date_year_university + 1 }})
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif

                    @if($projects)
                    <div class="card mt-3">
                        <div class="card-body">
                            @if(!empty($user->UserProject->project_name) || !empty($user->UserProject->project_description) || !empty($user->UserProject->skills_project))
                            <h4 class="mb-4 text-primary">Projects Information</h4>
                            <h4>Project1 :</h4>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Project Name</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    @if(!empty($user->UserProject->project_name)){{ $user->UserProject->project_name }}@endif
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Project Description</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    @if(!empty($user->UserProject->project_description)){{ $user->UserProject->project_description }}@endif
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Skills Project</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    @if(!empty($user->UserProject->skills_project)){{ $user->UserProject->skills_project }}@endif
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Project Url</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    @if(!empty($user->UserProject->project_url)){{ $user->UserProject->project_url }}@endif
                                </div>
                            </div>
                            @endif
                            @if(!empty($project_name2) && !empty($project_description2))
                            <hr>
                            <hr>
                            <h4>Project2 :</h4>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Project Name2</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    {{ $user->UserProject->project_name2 }}
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Project Description2</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    {{ $user->UserProject->project_description2 }}
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Skills Project2</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    {{ $user->UserProject->skills_project2 }}
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Project Url2</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    {{ $user->UserProject->project_url2 }}
                                </div>
                            </div>
                            @endif
                            <br>
                            @if(!empty($project_name3) && !empty($project_description3))
                            <hr>
                            <hr>
                            <h4>Project3 :</h4>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Project Name3</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    {{ $user->UserProject->project_name3 }}
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Project Description3</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    {{ $user->UserProject->project_description3 }}
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Skills Project3</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    {{ $user->UserProject->skills_project3 }}
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Project Url3</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    {{ $user->UserProject->project_url3 }}
                                </div>
                            </div>
                            @endif
                        </div>
                    </div>
                    @endif
    
                    <!-- معلومات المهارات -->
                    @if($skills)
                    <div class="card mt-3">
                        <div class="card-body">
                            <h4 class="mb-4 text-primary">Skills Information</h4>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Skills and tools</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    {{ $user->UserSkill->skills }}
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">CV</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    @if ($user->UserSkill->cv)
                                        <a href="{{ asset('storage/' . $user->UserSkill->cv) }}" target="_blank">
                                            show CV
                                        </a>
                                    @else
                                        <span>No CV uploaded</span>
                                    @endif
                                </div>
                            </div>

                        </div>
                    </div>

                    @endif
    
                    <!-- معلومات الخبرة العملية -->
                    @if($work)
                    <div class="card mt-3">
                        <div class="card-body">
                            <h4 class="mb-4 text-primary">Work Experiences Information</h4>
                            @if(!empty($user->UserWorkExperience->company_name1) || !empty($user->UserWorkExperience->job_title1) || !empty($user->UserWorkExperience->job_description1))
                                <h5>Experiences1 :</h5>
                                <br>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Company Name</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        @if(!empty($user->UserWorkExperience->company_name1)){{ $user->UserWorkExperience->company_name1 }}@endif
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Job Title</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        @if(!empty($user->UserWorkExperience->job_title1)){{ $user->UserWorkExperience->job_title1 }}@endif
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Job description</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        @if(!empty($user->UserWorkExperience->job_description1)){{ $user->UserWorkExperience->job_description1 }}@endif
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Start Date</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        @if(!empty($user->UserWorkExperience->start_date_month1) && !empty($user->UserWorkExperience->start_date_year1))
                                        {{ $user->UserWorkExperience->start_date_month1 }}/{{ $user->UserWorkExperience->start_date_year1 }}
                                        @endif
                                    </div>
                                </div>
                                <hr>
                                @if (!empty($user->UserWorkExperience->end_date_month1) && !empty($user->UserWorkExperience->end_date_month1))
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">End Date</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            {{ $user->UserWorkExperience->end_date_month1 }}/{{ $user->UserWorkExperience->end_date_month1 }}
                                        </div>
                                    </div>
                                @else
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">End Date</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            @if(!empty($user->UserWorkExperience->currently_working)){{ $user->UserWorkExperience->currently_working }}@endif
                                        </div>
                                    </div>
                                @endif
                            @endif
                            <hr>
                            @if ($user->user_work_experience2_id)
                                <h5>Experiences2 :</h5>
                                <br>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Company Name2</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        {{ $user->UserWorkExperience2->company_name2 }}
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Job Title2</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        {{ $user->UserWorkExperience2->job_title2 }}
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Job description2</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        {{ $user->UserWorkExperience2->job_description2 }}
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Start Date2</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        {{ $user->UserWorkExperience2->start_date_month2 }}/{{ $user->UserWorkExperience2->start_date_year2 }}
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">End Date2</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        {{ $user->UserWorkExperience2->end_date_month2 }}/{{ $user->UserWorkExperience2->end_date_year2 }}
                                    </div>
                                </div>
                            @endif
                            @if (!empty($user->UserWorkExperience2->company_name3) && !empty($user->UserWorkExperience2->job_title3))
                                <br>
                                <h5>Experiences3 :</h5>
                                <br>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Company Name3</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        {{ $user->UserWorkExperience2->company_name3 }}
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Job Title3</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        {{ $user->UserWorkExperience2->job_title3 }}
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Job description3</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        {{ $user->UserWorkExperience2->job_description3 }}
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Start Date3</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        {{ $user->UserWorkExperience2->start_date_month3 }}/{{ $user->UserWorkExperience2->start_date_year3 }}
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">End Date3</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        {{ $user->UserWorkExperience2->end_date_month3 }}/{{ $user->UserWorkExperience2->end_date_year3 }}
                                    </div>
                                </div>
                            @endif
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    </div>