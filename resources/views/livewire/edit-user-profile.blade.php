<div>
    <div class="container">
        <div class="sidebar">
            <h2>Profile Sections</h2>
            <ul class="nav-links">
                <li><a wire:click='showPersonal' class="active">Personal Information</a></li>
                <li><a wire:click='showAddress'>Address Information</a></li>
                <li><a wire:click="showEducation">Education Information</a></li>
                <li><a wire:click="showWork">Work Information</a></li>
                <li><a wire:click="showProject">Project Information</a></li>
                <li><a wire:click="showCv">cv</a></li>
                <li><a wire:click="showSkills">Skills</a></li>
            </ul>
        </div>
        <div class="main-content">
            <nav aria-label="breadcrumb" class="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Edit Profile</li>
                </ol>
            </nav>
            @if ($personal)
                <div class="card">
                    <div class="card-body">
                        <div class="profile-info">
                            @if ($user->userPersonal->img)
                                <a href="{{ asset('storage/' . $user->userPersonal->img) }}">
                                    <img src="{{ asset('storage/' . $user->userPersonal->img) }}" alt="User"
                                        wire:model='img' class="rounded-circle" width="150">
                                </a>
                            @else
                                <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="User">
                            @endif
                            <h3>Profile Photo</h3>
                            <div class="d-flex mt-2">
                                <form wire:submit.prevent="updatePhoto" class="me-2">
                                    @csrf
                                    <!-- إضافة Margin End للتأخير ناحية اليسار -->
                                    <label class="file-label">
                                        <input type="file" class="file-input" wire:model="photo">
                                        <span>Edit Photo</span>
                                    </label>
                                    @if ($photo && $isPhotoUpdated)
                                        <button type="submit" class="del_button">Save Photo</button>
                                    @endif
                                </form>
                                <button class="del_button ms-2" wire:click='del_photo'>Delete</button>
                                <!-- إضافة Margin Start للتأخير ناحية اليسار -->
                            </div>

                        </div>
                    </div>

                    <div class="container mt-5">
                        <div class="form-container">
                            @if (session()->has('message'))
                                <div class="alert alert-success">
                                    {{ session('message') }}
                                </div>
                            @endif
                            <h2>Personal Information</h2>
                            <form wire:submit.prevent="savepersonal">
                                @csrf
                                <div class="row mb-3 align-items-center">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">First Name</h6>
                                    </div>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" wire:model="first_name"
                                            placeholder="First Name" />
                                        @error('first_name')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div> 

                                <div class="row mb-3 align-items-center">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Middle Name</h6>
                                    </div>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" wire:model="middle_name"
                                            placeholder="Middle Name" />
                                        @error('middle_name')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3 align-items-center">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Last Name</h6>
                                    </div>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" wire:model="last_name"
                                            placeholder="Last Name" />
                                        @error('last_name')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3 align-items-center">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Email</h6>
                                    </div>
                                    <div class="col-sm-9">
                                        <input type="email" class="form-control" wire:model="email"
                                            placeholder="Email" />
                                        @error('email')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3 align-items-center">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Phone</h6>
                                    </div>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" wire:model="phone"
                                            placeholder="Phone" />
                                        @error('phone')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3 align-items-center">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Age</h6>
                                    </div>
                                    <div class="col-sm-9">
                                        <select id="age" class="form-control" wire:model="age">
                                            @for ($i = 17; $i <= 50; $i++)
                                                <option value="{{ $i }}">{{ $i }}</option>
                                            @endfor
                                        </select>
                                    </div>
                                </div>

                                <div class="row mb-3 align-items-center">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Job Title</h6>
                                    </div>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" wire:model="job_title"
                                            placeholder="Job Title" />
                                        @error('job_title')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3 align-items-center">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Year Experience</h6>
                                    </div>
                                    <div class="col-sm-9">
                                        <select id="experience" class="form-control" wire:model="year_experience">
                                            @foreach ($experienceOptions as $value => $label)
                                                <option value="{{ $value }}">{{ $label }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="row mb-3 align-items-center">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Birth Day</h6>
                                    </div>
                                    <div class="col-sm-9">
                                        <input type="date" class="form-control" wire:model="birth_day" />
                                        @error('birth_day')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-12 text-right">
                                        <button class="btn btn-success" type="submit">Save</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
        </div>
    @elseif($Address)
        <div class="container mt-5">
            <div class="form-container">
                @if (session()->has('message'))
                    <div class="alert alert-success">
                        {{ session('message') }}
                    </div>
                @endif
                <h2>Address Information</h2>
                <br>
                <form wire:submit.prevent="save_address">
                    @csrf
                    <div class="row mb-3 align-items-center">
                        <div class="col-sm-3">
                            <h6 class="mb-0">Address</h6>
                        </div>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" wire:model="address" placeholder="Address" />
                            @error('address')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3 align-items-center">
                        <div class="col-sm-3">
                            <h6 class="mb-0">City</h6>
                        </div>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" wire:model="city" placeholder="city" />
                            @error('city')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3 align-items-center">
                        <div class="col-sm-3">
                            <h6 class="mb-0">State</h6>
                        </div>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" wire:model="state" placeholder="State" />
                            @error('state')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3 align-items-center">
                        <div class="col-sm-3">
                            <h6 class="mb-0">Zip Code</h6>
                        </div>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" wire:model="zip" placeholder="zip code" />
                            @error('zip')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-12 text-right">
                            <button class="btn btn-success" type="submit">Save</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    @elseif ($project)
        <div class="card">
            @if(!empty($project_name) || !empty($project_description) || !empty($skills_project) || !empty($project_url))
                <div class="form-container">
                    @if (session()->has('message'))
                        <div class="alert alert-success">
                            {{ session('message') }}
                        </div>
                    @endif
                    <h2>Project Information1 :</h2>
                    <br>
                    <form wire:submit.prevent="save_project">
                        @csrf
                        <div class="row mb-3 align-items-center">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Project Name</h6>
                            </div>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" wire:model="project_name"
                                    placeholder="Project Name" />
                                @error('project_name')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3 align-items-center">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Description</h6>
                            </div>
                            <div class="col-sm-9">
                                <textarea type="text" class="form-control" wire:model="project_description"></textarea>
                                @error('project_description')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3 align-items-center">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Skills Project</h6>
                            </div>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" wire:model="skills_project"
                                    placeholder="Skills Project" />
                                @error('skills_project')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3 align-items-center">
                            <div class="col-sm-3">
                                <h6 class="mb-0">project_url</h6>
                            </div>
                            <div class="col-sm-9">
                                <input type="url" class="form-control" wire:model="project_url"
                                    placeholder="Project Url" />
                                @error('project_url')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 text-right">
                                <button class="btn btn-success" type="submit">Save</button>
                            </div>
                        </div>
                    </form>
                </div>
            @endif
                @if (!empty($project_name2) && !empty($project_description2) && !empty($skills_project2))
                    <div class="container mt-5">
                        <div class="form-container">
                            @if (session()->has('message2'))
                                <div class="alert alert-success">
                                    {{ session('message2') }}
                                </div>
                            @endif
                            <h2>Project Information2 :</h2>
                            <br>
                            <form wire:submit.prevent="save_project2">
                                @csrf
                                <div class="row mb-3 align-items-center">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Project Name2</h6>
                                    </div>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" wire:model="project_name2"
                                            placeholder="Project name2" />
                                        @error('project_name2')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3 align-items-center">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Description2</h6>
                                    </div>
                                    <div class="col-sm-9">
                                        <textarea type="text" class="form-control" wire:model="project_description2"></textarea>
                                        @error('project_description2')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3 align-items-center">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Skills Project2</h6>
                                    </div>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" wire:model="skills_project2"/>
                                        @error('skills_project2')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3 align-items-center">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Project Url2</h6>
                                    </div>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" wire:model="project_url2">
                                        @error('project_url2')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12 text-right">
                                        <button class="btn btn-success" type="submit">Save</button>
                                    </div>
                                </div>
                            </form>
                @endif
                
                @if (!empty($project_name3) && !empty($project_description3) && !empty($skills_project3))
                    <div class="container mt-5">
                        <div class="form-container">
                            @if (session()->has('message3'))
                                <div class="alert alert-success">
                                    {{ session('message3') }}
                                </div>
                            @endif
                            <h2>Project Information3 :</h2>
                            <br>
                            <form wire:submit.prevent="save_project3">
                                @csrf
                                <div class="row mb-3 align-items-center">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Project Name3</h6>
                                    </div>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" wire:model="project_name3"
                                            placeholder="Project name3" />
                                        @error('project_name3')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3 align-items-center">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Description3</h6>
                                    </div>
                                    <div class="col-sm-9">
                                        <textarea type="text" class="form-control" wire:model="project_description3"></textarea>
                                        @error('project_description3')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3 align-items-center">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Skills Project3</h6>
                                    </div>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" wire:model="skills_project3"/>
                                        @error('skills_project3')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3 align-items-center">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Project Url3</h6>
                                    </div>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" wire:model="project_url3">
                                        @error('project_url3')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12 text-right">
                                        <button class="btn btn-success" type="submit">Save</button>
                                    </div>
                                </div>
                            </form>
                @endif
                

        </div>
    @elseif ($education)
        <div class="container mt-5">
            <div class="form-container">
                @if (session()->has('message'))
                    <div class="alert alert-success">
                        {{ session('message') }}
                    </div>
                @endif
                <h2>Education Information</h2>
                <br>
                <form wire:submit.prevent="save_education">
                    @csrf
                    <div class="row mb-3 align-items-center">
                        <div class="col-sm-3">
                            <h6 class="mb-0">College</h6>
                        </div>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" wire:model="college" placeholder="College" />
                            @error('college')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3 align-items-center">
                        <div class="col-sm-3">
                            <h6 class="mb-0">Major</h6>
                        </div>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" wire:model="major" placeholder="Major" />
                            @error('major')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3 align-items-center">
                        <div class="col-sm-3">
                            <h6 class="mb-0">Start Date</h6>
                        </div>
                        <div class="col-sm-9">
                            <div class="d-flex">
                                <select id="start_date_month" name="start_date_month" class="form-control mr-2"
                                    wire:model='start_date_month_university' wire:model="start_date_month1">
                                    <option value="" selected>Choose Month</option>
                                    @foreach (range(1, 12) as $month)
                                        <option value="{{ $month }}">
                                            {{ DateTime::createFromFormat('!m', $month)->format('F') }}</option>
                                    @endforeach
                                </select>
                                @error('start_date_month1')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                                <select id="start_date_year" name="start_date_year" class="form-control"
                                    wire:model='start_date_year_university' wire:model="start_date_year1">
                                    <option value="" selected>Choose Year</option>
                                    @for ($year = date('Y'); $year >= 2000; $year--)
                                        <option value="{{ $year }}">{{ $year }}</option>
                                    @endfor
                                </select>
                                @error('start_date_year1')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            @error('state')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    @if (!$university_year)
                        <div class="row mb-3 align-items-center">
                            <div class="col-sm-3">
                                <h6 class="mb-0">End Data</h6>
                            </div>
                            <div class="col-sm-9">
                                <div class="d-flex">
                                    <select id="end_date_month" name="end_date_month" class="form-control mr-2"
                                        wire:model='end_date_month_university' wire:model="end_date_month1">
                                        @foreach (range(1, 12) as $month)
                                            <option value="{{ $month }}">
                                                {{ DateTime::createFromFormat('!m', $month)->format('F') }}</option>
                                        @endforeach
                                    </select>
                                    <select id="end_date_year" name="end_date_year" class="form-control"
                                        wire:model='end_date_year_university' wire:model="end_date_year1">
                                        @for ($year = date('Y'); $year >= 2000; $year--)
                                            <option value="{{ $year }}">{{ $year }}</option>
                                        @endfor
                                    </select>
                                </div>
                            </div>
                        </div>
                    @else
                        <!-- Select Element (To Hide) -->
                        <div class="row mb-3 align-items-center" id="university_year_div">
                            <div class="col-sm-3">
                                <h6 class="mb-0">University Year</h6>
                            </div>
                            <div class="col-sm-9">
                                <select id="academic_year" name="university_year" class="form-control"
                                    wire:model='university_year'>
                                    <option value="First_grade">First Grade</option>
                                    <option value="Second_grade">Second Grade</option>
                                    <option value="Third_grade">Third Grade</option>
                                    <option value="Fourth_grade">Fourth Grade</option>
                                </select>
                            </div>
                        </div>


                        <!-- Checkbox -->
                        <div class="form-check mb-4">
                            <input type="checkbox" name="currently_working_university" id="lock_checkbox_university"
                                wire:model="currently_university" class="form-check-input"
                                onchange="toggleAcademicYearDiv(this)">
                            <label for="lock_checkbox_university" class="form-check-label">I am currently graduated
                                </label>
                        </div>


                        <!-- Input Element (To Show) -->
                        <div id="academic_year_div" style="display: none;">
                            <div class="row mb-3 align-items-center">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">End Date</h6>
                                </div>
                                <div class="col-sm-9">
                                    <div class="d-flex">
                                        <select id="end_date_month" name="end_date_month" class="form-control mr-2"
                                            wire:model='end_date_month_university'>
                                            <option value="" selected>Choose month</option>
                                            @foreach (range(1, 12) as $month)
                                                <option value="{{ $month }}">
                                                    {{ DateTime::createFromFormat('!m', $month)->format('F') }}
                                                </option>
                                            @endforeach

                                        </select>
                                        <select id="end_date_year" name="end_date_year" class="form-control"
                                            wire:model='end_date_year_university'>
                                            <option value="" selected>Choose Year</option>
                                            @for ($year = date('Y'); $year >= 2000; $year--)
                                                <option value="{{ $year }}">{{ $year }}</option>
                                            @endfor
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>

                    @endif
                    <div class="row">
                        <div class="col-sm-12 text-right">
                            <button class="btn btn-success" type="submit">Save</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    @elseif($work)
        <div class="card">
            <div class="container mt-4">
                @if (!empty($company_name1) && !empty($job_title1) && !empty($job_description1))
                <div class="form-container">
                    @if (session()->has('message'))
                        <div class="alert alert-success">
                            {{ session('message') }}
                        </div>
                    @endif
                    <h2>Work Expertise Information</h2>
                    <br>
                        <form wire:submit.prevent="save_work_expertise">
                            @csrf
                            <!-- حقول الشركة -->
                            <div class="row mb-3 align-items-center">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Company Name</h6>
                                </div>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" wire:model="company_name1"
                                        placeholder="Company name" />
                                    @error('company_name1')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3 align-items-center">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Job Title</h6>
                                </div>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" wire:model="job_title1"
                                        placeholder="Job Title" />
                                    @error('job_title1')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3 align-items-center">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Job Description</h6>
                                </div>
                                <div class="col-sm-9">
                                    <textarea type="text" class="form-control" wire:model="job_description1" placeholder="job_description1"></textarea>
                                    @error('job_description1')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-10 align-items-center">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Start Date</h6>
                                </div>
                                <div class="col-sm-9">
                                    <div class="d-flex">
                                        <select id="end_date_month" name="end_date_month" class="form-control mr-2"
                                            wire:model="start_date_month1">
                                            @foreach (range(1, 12) as $month)
                                                <option value="{{ $month }}">
                                                    {{ DateTime::createFromFormat('!m', $month)->format('F') }}
                                                </option>
                                            @endforeach
                                        </select>
                                        <select id="end_date_year" name="end_date_year" class="form-control"
                                            wire:model="start_date_year1">
                                            @for ($year = date('Y'); $year >= 2000; $year--)
                                                <option value="{{ $year }}">{{ $year }}</option>
                                            @endfor
                                        </select>
                                    </div>
                                </div>
                            </div>
                            @if ($end_date_month1 === null && $end_date_year1 === null)
                                <div class="form-check mb-4">
                                    <input type="checkbox" name="currently_working" id="lock_checkbox"
                                        class="form-check-input" wire:model="currently_working"
                                        wire:change="toggleCurrentlyWorking">
                                    <label for="lock_checkbox" class="form-check-label">Currently left working</label>
                                </div>
                            @endif
                            @if ($currently_working || ($end_date_month1 !== null && $end_date_year1 !== null))
                                <div class="row mb-3 align-items-center">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">End Date</h6>
                                    </div>
                                    <div class="col-sm-9">
                                        <div class="d-flex">
                                            <select id="end_date_month" name="end_date_month"
                                                class="form-control mr-2" wire:model="end_date_month1">
                                                <option value="" selected>Choose Month</option>
                                                @foreach (range(1, 12) as $month)
                                                    <option value="{{ $month }}">
                                                        {{ DateTime::createFromFormat('!m', $month)->format('F') }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            <select id="end_date_year" name="end_date_year" class="form-control"
                                                wire:model="end_date_year1">
                                                <option value="" selected>Choose Year</option>
                                                @for ($year = date('Y'); $year >= 2000; $year--)
                                                    <option value="{{ $year }}">{{ $year }}</option>
                                                @endfor
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            @endif
                            <div class="row">
                                <div class="col-sm-12 text-right">
                                    <button class="btn btn-success" type="submit">Save</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    @endif
            </div>
            @if (!empty($company_name2) && !empty($job_title2) && !empty($job_description2))
                <div class="container mt-5">
                    <div class="form-container">
                        @if (session()->has('message2'))
                            <div class="alert alert-success">
                                {{ session('message2') }}
                            </div>
                        @endif
                        <h2>Work Expertise Information2</h2>
                        <br>
                        <form wire:submit.prevent="save_expertise2">
                            @csrf
                            <!-- حقول الشركة -->
                            <div class="row mb-3 align-items-center">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Company Name2</h6>
                                </div>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" wire:model="company_name2"
                                        placeholder="Company name2" />
                                    @error('company_name2')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3 align-items-center">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Job Title2</h6>
                                </div>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" wire:model="job_title2"
                                        placeholder="Job Title2" />
                                    @error('job_title2')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3 align-items-center">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Job Description</h6>
                                </div>
                                <div class="col-sm-9">
                                    <textarea type="text" class="form-control" wire:model="job_description2" placeholder="Job Description2"></textarea>
                                    @error('job_description2')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3 align-items-center">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Start Date</h6>
                                </div>
                                <div class="col-sm-9">
                                    <div class="d-flex">
                                        <select id="end_date_month2" name="end_date_month2" class="form-control mr-2"
                                            wire:model="start_date_month2">
                                            @foreach (range(1, 12) as $month)
                                                <option value="{{ $month }}">
                                                    {{ DateTime::createFromFormat('!m', $month)->format('F') }}
                                                </option>
                                            @endforeach
                                        </select>
                                        <select id="end_date_year2" name="end_date_year2" class="form-control"
                                            wire:model="start_date_year2">
                                            @for ($year = date('Y'); $year >= 2000; $year--)
                                                <option value="{{ $year }}">{{ $year }}</option>
                                            @endfor
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3 align-items-center">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">End Date</h6>
                                </div>
                                <div class="col-sm-9">
                                    <div class="d-flex">
                                        <select id="end_date_month2" name="end_date_month2" class="form-control mr-2"
                                            wire:model="end_date_month2">
                                            <option value="" selected>Choose Month</option>
                                            @foreach (range(1, 12) as $month)
                                                <option value="{{ $month }}">
                                                    {{ DateTime::createFromFormat('!m', $month)->format('F') }}
                                                </option>
                                            @endforeach
                                        </select>
                                        <select id="end_date_year" name="end_date_year" class="form-control"
                                            wire:model="end_date_year1">
                                            <option value="" selected>Choose Year</option>
                                            @for ($year = date('Y'); $year >= 2000; $year--)
                                                <option value="{{ $year }}">{{ $year }}</option>
                                            @endfor
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12 text-right">
                                    <button class="btn btn-success" type="submit">Save</button>
                                </div>
                            </div>
                        </form>
            @endif
            @if (!empty($company_name3) && empty($job_title3) && empty($job_description3))
                <div class="container mt-5">
                    <div class="form-container">
                        @if (session()->has('message3'))
                            <div class="alert alert-success">
                                {{ session('message3') }}
                            </div>
                        @endif
                        <h2>Work Expertise Information3</h2>
                        <br>
                        <form wire:submit.prevent="save_expertise3">
                            @csrf
                            <!-- حقول الشركة -->
                            <div class="row mb-3 align-items-center">
                                <div class="col-sm-4">
                                    <label class="form-label mb-1" for="company_name3">Company Name3</label>
                                </div>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="company_name3"
                                        wire:model="company_name3" placeholder="Company name3" />
                                    @error('company_name3')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3 align-items-center">
                                <div class="col-sm-4">
                                    <label class="form-label mb-1" for="job_title3">Job Title3</label>
                                </div>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="job_title3"
                                        wire:model="job_title3" placeholder="Job Title3" />
                                    @error('job_title3')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3 align-items-center">
                                <div class="col-sm-4">
                                    <label class="form-label mb-1" for="job_description3">Job Description3</label>
                                </div>
                                <div class="col-sm-8">
                                    <textarea type="text" class="form-control" id="job_description3" wire:model="job_description3"
                                        placeholder="Job Description3"></textarea>
                                    @error('job_description3')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3 align-items-center">
                                <div class="col-sm-4">
                                    <label class="form-label mb-1" for="start_date_month3">Start Date</label>
                                </div>
                                <div class="col-sm-8">
                                    <div class="d-flex">
                                        <select id="start_date_month3" name="start_date_month3"
                                            class="form-control mr-2" wire:model="start_date_month3">
                                            @foreach (range(1, 12) as $month)
                                                <option value="{{ $month }}">
                                                    {{ DateTime::createFromFormat('!m', $month)->format('F') }}
                                                </option>
                                            @endforeach
                                        </select>
                                        <select id="start_date_year3" name="start_date_year3" class="form-control"
                                            wire:model="start_date_year3">
                                            @for ($year = date('Y'); $year >= 2000; $year--)
                                                <option value="{{ $year }}">{{ $year }}</option>
                                            @endfor
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-3 align-items-center">
                                <div class="col-sm-4">
                                    <label class="form-label mb-1" for="end_date_month3">End Date</label>
                                </div>
                                <div class="col-sm-8">
                                    <div class="d-flex">
                                        <select id="end_date_month3" name="end_date_month3" class="form-control mr-2"
                                            wire:model="end_date_month3">
                                            <option value="" selected>Choose Month</option>
                                            @foreach (range(1, 12) as $month)
                                                <option value="{{ $month }}">
                                                    {{ DateTime::createFromFormat('!m', $month)->format('F') }}
                                                </option>
                                            @endforeach
                                        </select>
                                        <select id="end_date_year3" name="end_date_year3" class="form-control"
                                            wire:model="end_date_year3">
                                            <option value="" selected>Choose Year</option>
                                            @for ($year = date('Y'); $year >= 2000; $year--)
                                                <option value="{{ $year }}">{{ $year }}</option>
                                            @endfor
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-12 text-right">
                                    <button class="btn btn-success" type="submit">Save</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

            @endif

        </div>
    </div>
</div>

</form>
</div>
</div>
</div>
@endif
@if ($skills)
    <div class="container mt-5">
        <div class="form-container">
            @if (session()->has('message'))
                <div class="alert alert-success">
                    {{ session('message') }}
                </div>
            @endif
            <h2>Skills Information</h2>
            <br>
            <form wire:submit.prevent="save_skills">
                @csrf
                <div class="row mb-3 align-items-center">
                    <div class="col-sm-3">
                        <h6 class="mb-0">skills</h6>
                    </div>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" wire:model="skill" placeholder="skills" />
                        @error('skills')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 text-right">
                        <button class="btn btn-success" type="submit">Save</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endif
@if ($resume)
    <div class="container mt-5">
        <div class="form-container">
            @if (session()->has('message1'))
                <div class="alert alert-success">
                    {{ session('message1') }}
                </div>
            @endif
            @if (session()->has('message2'))
                <div class="alert alert-danger">
                    {{ session('message2') }}
                </div>
            @endif
            <h2>Cv/Resume Information</h2>
            <br>
            <form wire:submit.prevent="save_resume">
                @csrf
                <div class="row mb-3 align-items-center">
                    <div class="col-sm-3">
                        <h6 class="mb-0">cv</h6>
                    </div>
                    <div class="col-sm-9">
                        <div class="col-sm-9 text-secondary">
                            @if ($user->UserSkill->cv)
                                <a href="{{ asset('storage/' . $user->UserSkill->cv) }}" target="_blank">
                                    Show-cv
                                </a>
                                <button wire:click='del_cv' target="_blank" class='btn btn-danger'>
                                    Delete
                                </button>
                            @else
                                <div class="col-sm-9">
                                    <div class="col-sm-9 text-secondary">
                                        <input id="cv" type="file" class="form-control-file border rounded"
                                            wire:model="cv">

                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12 text-right">
                                        <button class="btn btn-success" type="submit">Save</button>
                                    </div>
                                </div>
                                <span>No CV uploaded</span>
                            @endif
                        </div>
                        @error('skills')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

            </form>
        </div>
    </div>
@endif
</div>
</div>
