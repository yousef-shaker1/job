<div>


    <!-- شريط التقدم -->
    <div class="progress mb-4">
        <div class="progress-bar" role="progressbar" style="width: {{ ($step / 7) * 100 }}%;"
            aria-valuenow="{{ $step }}" aria-valuemin="0" aria-valuemax="7">
            Step {{ $step }} of 7
        </div>
    </div>

    @if ($step == 1)
        <div class="form-container">
            <h2>Step 1: Personal Information</h2>
            <form wire:submit.prevent="goToNextStep">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="img">Image</label>
                            <input id="img" type="file" class="form-control" wire:model="img">
                            @error('img')<div class="text-danger">{{ $message }}</div>@enderror
                            @if ($img)
                                <div class="image-preview mt-2">
                                    <img id="imgPreview" src="{{ $img->temporaryUrl() }}" alt="Image preview"
                                        class="img-fluid">
                                </div>
                            @endif
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="first_name">First Name</label>
                            <input id="first_name" type="text" class="form-control" wire:model="first_name">
                            @error('first_name')<div class="text-danger">{{ $message }}</div>@enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="middle_name">Middle Name</label>
                            <input id="middle_name" type="text" class="form-control" wire:model="middle_name">
                            @error('middle_name')<div class="text-danger">{{ $message }}</div>@enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="last_name">Last Name</label>
                        <input id="last_name" type="text" class="form-control" wire:model="last_name">
                        @error('last_name')<div class="text-danger">{{ $message }}</div>@enderror
                    </div>
                    <div class="col-md-6">
                        <label for="age">Age</label>
                        <select id="age" class="form-control" wire:model="age">
                            <option value="">Select Age</option>
                            @for ($i = 17; $i <= 50; $i++)
                                <option value="{{ $i }}">{{ $i }}</option>
                            @endfor
                        </select>
                        @error('age')<div class="text-danger">{{ $message }}</div>@enderror
                    </div>
                    <div class="col-md-6">
                        <label for="job_title">Job Title</label>
                        <input id="job_title" type="text" class="form-control" wire:model="job_title">
                        @error('job_title')<div class="text-danger">{{ $message }}</div>@enderror
                    </div>
                    <br><br><br><br>
                    <div class="col-md-6">
                        <label for="experience">Number of Years of Experience</label>
                        <select id="experience" class="form-control" wire:model="year_experience">
                            <option value="">Select Experience Range</option>
                            @foreach ($experienceOptions as $value => $label)
                                <option value="{{ $value }}">{{ $label }}</option>
                            @endforeach
                        </select>
                        @error('year_experience')<div class="text-danger">{{ $message }}</div>@enderror
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="phone">Phone</label>
                            <input id="phone" type="tel" class="form-control" wire:model="phone">
                            @error('phone')<div class="text-danger">{{ $message }}</div>@enderror
                        </div>
                    </div>                    
                </div>
                <div class="form-group">
                    <label for="birth_date">Date of Birth:</label>
                    <div class="d-flex">
                        <select id="birth_day" name="birth_day" class="form-control mr-2" wire:model.lazy="birth_day">
                            <option value="" selected>Day</option>
                            @for ($day = 1; $day <= 31; $day++)
                                <option value="{{ $day }}">{{ $day }}</option>
                            @endfor
                        </select>
                        <select id="birth_month" name="birth_month" class="form-control mr-2" wire:model="birth_month">
                            <option value="" selected>Month</option>
                            @foreach (range(1, 12) as $month)
                            <option value="{{ $month }}">
                                {{ DateTime::createFromFormat('!m', $month)->format('F') }}</option>
                                @endforeach
                            </select>
                            <select id="birth_year" name="birth_year" class="form-control" wire:model="birth_year">
                                <option value="" selected>Year</option>
                                @for ($year = 2008; $year >= 1950; $year--)
                                <option value="{{ $year }}">{{ $year }}</option>
                            @endfor
                        </select>
                        <br>
                    </div>
                    @error('birth_day')<div class="text-danger">{{ $message }}</div>@enderror
                    @error('birth_month')<div class="text-danger">{{ $message }}</div>@enderror
                    @error('birth_year')<div class="text-danger">{{ $message }}</div>@enderror
                    <div class="col-md-6">
                        <label for="gender">Gender :</label>
                        <div class="d-flex">
                            <div class="form-check mr-3">
                                <input id="male" type="radio" class="form-check-input" name="gender"
                                    value="male" wire:model="gender">
                                <label for="male" class="form-check-label">Male</label>
                            </div>
                            <div class="form-check mr-3">
                                <input id="female" type="radio" class="form-check-input" name="gender"
                                    value="female" wire:model="gender">
                                <label for="female" class="form-check-label">Female</label>
                            </div>
                            <div class="form-check">
                                <input id="other" type="radio" class="form-check-input" name="gender"
                                    value="other" wire:model="gender">
                                <label for="other" class="form-check-label">Other</label>
                            </div>
                            <br>
                        </div>
                        @error('gender')<div class="text-danger">{{ $message }}</div>@enderror
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Next</button>
            </form>
        </div>
    @elseif ($step == 2)
        <div class="form-container">
            <h2>Step 2: Address Information</h2>
            <form wire:submit.prevent="goToNextStep">
                @csrf
                <div class="form-group">
                    <label for="address">Address</label>
                    <input id="address" type="text" class="form-control" wire:model="address">
                    @error('address')<div class="text-danger">{{ $message }}</div>@enderror
                </div>
                <div class="form-group">
                    <label for="city">City</label>
                    <input id="city" type="text" class="form-control" wire:model="city">
                    @error('city')<div class="text-danger">{{ $message }}</div>@enderror
                </div>
                <div class="form-group">
                    <label for="state">State</label>
                    <input id="state" type="text" class="form-control" wire:model="state">
                    @error('state')<div class="text-danger">{{ $message }}</div>@enderror
                </div>
                <div class="form-group">
                    <label for="zip">ZIP Code</label>
                    <input id="zip" type="text" class="form-control" wire:model="zip">
                    @error('zip')<div class="text-danger">{{ $message }}</div>@enderror
                </div>
                <button type="button" wire:click="goToPreviousStep" class="btn btn-secondary">Previous</button>
                <button type="submit" class="btn btn-primary">Next</button>
            </form>
        </div>
    @elseif ($step == 3)
    <div class="form-container">
        <h2>Step 3: Project Information</h2>
        <form wire:submit.prevent="goToNextStep">
            @csrf
            <div class="form-group">
                <label for="project_name">Project Name</label>
                <input id="project_name" type="text" class="form-control" wire:model="project_name">
                @error('project_name')<div class="text-danger">{{ $message }}</div>@enderror
            </div>
            <div class="form-group">
                <label for="project_description">Project Description</label>
                <textarea id="project_description" type="text" class="form-control" wire:model="project_description"></textarea>
                @error('project_description')<div class="text-danger">{{ $message }}</div>@enderror
            </div>
            <div class="form-group">
                <label for="skills_project">Skills Used (comma-separated)</label>
                <input id="skills_project" type="text" class="form-control" wire:model="skills_project">
                @error('skills_project')<div class="text-danger">{{ $message }}</div>@enderror
            </div>
            <div class="form-group">
                <label for="project_url">Project URL</label>
                <input id="project_url" type="url" class="form-control" wire:model="project_url">
                @error('project_url')<div class="text-danger">{{ $message }}</div>@enderror
            </div>
            @if(!$showProjectForm2)
                <button wire:click='add_project2' type="button" class="btn btn-primary mt-3">+Add Another
                Project</button>
            @else
                <br>
                <br>
                    <h2>Project Information 2</h2>
                        <div class="form-group">
                            <label for="project_name2">Project Name2</label>
                            <input id="project_name2" type="text" class="form-control" wire:model="project_name2">
                            @error('project_name2')<div class="text-danger">{{ $message }}</div>@enderror
                        </div>
                        <div class="form-group">
                            <label for="project_description2">Project Description2</label>
                            <textarea id="project_description2" type="text" class="form-control" wire:model="project_description2"></textarea>
                            @error('project_description2')<div class="text-danger">{{ $message }}</div>@enderror
                        </div>
                        <div class="form-group">
                            <label for="skills_project2">Skills Used (comma-separated)</label>
                            <input id="skills_project2" type="text" class="form-control" wire:model="skills_project2">
                            @error('skills_project2')<div class="text-danger">{{ $message }}</div>@enderror
                        </div>
                        <div class="form-group">
                            <label for="project_url2">Project URL</label>
                            <input id="project_url2" type="url" class="form-control" wire:model="project_url2">
                            @error('project_url2')<div class="text-danger">{{ $message }}</div>@enderror
                        </div>
                        <br>
                        <button wire:click='del_project2' type="button" class="btn btn-danger"
                            style="padding: 5px; width: 60px; height: 35px;">
                            <i class="fas fa-trash-alt"></i> Delete
                        </button>
                        @if(!$showProjectForm3)
                            <button wire:click='add_project3' type="button" class="btn btn-primary mt-3">+Add Another
                            Project</button>
                        @endif
            @endif
            @if($showProjectForm3)
            <br><br>
                <h2>Project Information 3</h2>
                    <div class="form-group">
                        <label for="project_name3">Project Name3</label>
                        <input id="project_name3" type="text" class="form-control" wire:model="project_name3">
                        @error('project_name3')<div class="text-danger">{{ $message }}</div>@enderror
                    </div>
                    <div class="form-group">
                        <label for="project_description3">Project Description3</label>
                        <textarea id="project_description3" type="text" class="form-control" wire:model="project_description3"></textarea>
                        @error('project_description3')<div class="text-danger">{{ $message }}</div>@enderror
                    </div>
                    <div class="form-group">
                        <label for="skills_project3">Skills Used (comma-separated)</label>
                        <input id="skills_project3" type="text" class="form-control" wire:model="skills_project3">
                        @error('skills_project3')<div class="text-danger">{{ $message }}</div>@enderror
                    </div>
                    <div class="form-group">
                        <label for="project_url3">Project URL</label>
                        <input id="project_url3" type="url" class="form-control" wire:model="project_url3">
                        @error('project_url3')<div class="text-danger">{{ $message }}</div>@enderror
                    </div>
                    <button wire:click='del_project3' type="button" class="btn btn-danger"
                                style="padding: 5px; width: 60px; height: 35px;">
                                <i class="fas fa-trash-alt"></i> Delete
                            </button>

            @endif
                <br><br>
            <button type="button" wire:click="goToPreviousStep" class="btn btn-secondary">Previous</button>
            <button type="submit" class="btn btn-primary">Next</button>
        </form>
    </div>
    @elseif ($step == 4)
        <div class="form-container">
            <h2>Step 3: Work Experience</h2>
            <form wire:submit.prevent="goToNextStep">
                @csrf
                <div class="form-group">
                    <label for="company_name">Company Name</label>
                    <input id="company_name" type="text" class="form-control" wire:model="company_name1">
                    @error('company_name1')<div class="text-danger">{{ $message }}</div>@enderror
                </div>
                <div class="form-group">
                    <label for="job_title">Job Title</label>
                    <input id="job_title" type="text" class="form-control" wire:model="job_title1">
                    @error('job_title1')<div class="text-danger">{{ $message }}</div>@enderror
                </div>
                <div class="form-group">
                    <label for="job_description">Job Description</label>
                    <textarea id="job_description" class="form-control" wire:model="job_description1" rows="3"></textarea>
                    @error('job_description1')<div class="text-danger">{{ $message }}</div>@enderror
                </div>
                <div class="form-group">
                    <label for="start_date_month">Start Date:</label>
                    <div class="d-flex">
                        <select id="start_date_month" name="start_date_month" class="form-control mr-2"
                            wire:model="start_date_month1">
                            <option value="" selected >Choose Month</option>
                            @foreach (range(1, 12) as $month)
                                <option value="{{ $month }}">
                                    {{ DateTime::createFromFormat('!m', $month)->format('F') }}</option>
                            @endforeach
                        </select>
                        @error('start_date_month1')<div class="text-danger">{{ $message }}</div>@enderror
                        <select id="start_date_year" name="start_date_year" class="form-control"
                            wire:model="start_date_year1">
                            <option value="" selected >Choose Year</option>
                            @for ($year = date('Y'); $year >= 2000; $year--)
                                <option value="{{ $year }}">{{ $year }}</option>
                            @endfor
                        </select>
                        @error('start_date_year1')<div class="text-danger">{{ $message }}</div>@enderror
                    </div>
                </div>

                <div class="form-group">
                    <label for="end_date_month">End Date:</label>
                    <div class="d-flex">
                        <select id="end_date_month" name="end_date_month" class="form-control mr-2"
                            wire:model="end_date_month1" {{ $currently_working ? 'disabled' : '' }}>
                            <option value="" selected>Choose Month</option>
                            @foreach (range(1, 12) as $month)
                                <option value="{{ $month }}">
                                    {{ DateTime::createFromFormat('!m', $month)->format('F') }}</option>
                            @endforeach
                        </select>
                        <select id="end_date_year" name="end_date_year" class="form-control"
                            wire:model="end_date_year1" {{ $currently_working ? 'disabled' : '' }}>
                            <option value="" selected>Choose Year</option>
                            @for ($year = date('Y'); $year >= 2000; $year--)
                                <option value="{{ $year }}">{{ $year }}</option>
                            @endfor
                        </select>
                    </div>
                </div>
                <div class="form-check mb-4">
                    <input type="checkbox" name="currently_working" id="lock_checkbox" class="form-check-input"
                        wire:model="currently_working" wire:change="toggleCurrentlyWorking">
                    <label for="lock_checkbox" class="form-check-label">Currently working there</label>
                </div>
                @if (!$showJobForm2)
                <button wire:click='add_job2' type="button" class="btn btn-primary mt-3">+Add Another
                    Experience</button>
                @else
                    <br>
                    <h2>Work Experience2</h2>
                    <form wire:submit.prevent="goToNextStep">
                        @csrf
                        <div class="form-group">
                            <label for="company_name">Company Name2</label>
                            <input id="company_name" type="text" class="form-control" wire:model="company_name2">
                            @error('company_name2')<div class="text-danger">{{ $message }}</div>@enderror
                        </div>
                        <div class="form-group">
                            <label for="job_title">Job Title2</label>
                            <input id="job_title" type="text" class="form-control" wire:model="job_title2">
                            @error('job_title2')<div class="text-danger">{{ $message }}</div>@enderror
                        </div>
                        <div class="form-group">
                            <label for="job_description">Job Description2</label>
                            <textarea id="job_description" class="form-control" wire:model="job_description2" rows="3"></textarea>
                            @error('job_description2')<div class="text-danger">{{ $message }}</div>@enderror
                        </div>
                        <div class="form-group">
                            <label for="start_date_month">Start Date:</label>
                            <div class="d-flex">
                                <select id="start_date_month" name="start_date_month2" class="form-control mr-2"
                                    wire:model="start_date_month2">
                                    <option value="" selected>Choose Month</option>
                                    @foreach (range(1, 12) as $month)
                                        <option value="{{ $month }}">
                                            {{ DateTime::createFromFormat('!m', $month)->format('F') }}</option>
                                    @endforeach
                                </select>
                                @error('start_date_month2')<div class="text-danger">{{ $message }}</div>@enderror
                                <select id="start_date_year" name="start_date_year2" class="form-control"
                                    wire:model="start_date_year2">
                                    <option value="" selected>Choose Year</option>
                                    @for ($year = date('Y'); $year >= 2000; $year--)
                                        <option value="{{ $year }}">{{ $year }}</option>
                                    @endfor
                                </select>
                                @error('start_date_year2')<div class="text-danger">{{ $message }}</div>@enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="end_date_month">End Date:</label>
                            <div class="d-flex">
                                <select id="end_date_month" name="end_date_month" class="form-control mr-2"
                                    wire:model="end_date_month2">
                                    <option value="" selected>Choose Month</option>
                                    @foreach (range(1, 12) as $month)
                                        <option value="{{ $month }}">
                                            {{ DateTime::createFromFormat('!m', $month)->format('F') }}</option>
                                    @endforeach
                                </select>
                                @error('end_date_month2')<div class="text-danger">{{ $message }}</div>@enderror
                                <select id="end_date_year" name="end_date_year" class="form-control"
                                    wire:model="end_date_year2">
                                    <option value="" selected>Choose Year</option>
                                    @for ($year = date('Y'); $year >= 2000; $year--)
                                        <option value="{{ $year }}">{{ $year }}</option>
                                    @endfor
                                </select>
                                @error('end_date_year2')<div class="text-danger">{{ $message }}</div>@enderror
                            </div>
                        </div>

                        <div class="button-container" style="display: flex; gap: 10px;">
                            <button wire:click='del_jop2' type="button" class="btn btn-danger"
                                style="padding: 5px; width: 60px; height: 35px;">
                                <i class="fas fa-trash-alt"></i> Delete
                            </button>
                            @if ($showJobForm3)
                            <button wire:click='add_job3' type="button" class="btn btn-primary"
                                style="padding: 2px; width: 250px; height: 40px;">
                                + Add Another Experience
                            </button>
                            @endif
                        </div>
                @endif
                @if ($showJobForm3)
                    <br>
                    <h2>Work Experience3</h2>
                    <form wire:submit.prevent="goToNextStep">
                        @csrf
                        <div class="form-group">
                            <label for="company_name3">Company Name2</label>
                            <input id="company_name3" type="text" class="form-control"
                                wire:model="company_name3">
                                @error('company_name3')<div class="text-danger">{{ $message }}</div>@enderror
                        </div>
                        <div class="form-group">
                            <label for="job_title3">Job Title2</label>
                            <input id="job_title3" type="text" class="form-control" wire:model="job_title3">
                            @error('job_title3')<div class="text-danger">{{ $message }}</div>@enderror
                        </div>
                        <div class="form-group">
                            <label for="job_description3">Job Description2</label>
                            <textarea id="job_description3" class="form-control" wire:model="job_description3" rows="3"></textarea>
                            @error('job_description3')<div class="text-danger">{{ $message }}</div>@enderror
                        </div>
                        <div class="form-group">
                            <label for="start_date_month3">Start Date:</label>
                            <div class="d-flex">
                                <select id="start_date_month3" name="start_date_month3" class="form-control mr-2"
                                    wire:model="start_date_month3">
                                    <option value=""selected>Choose Month</option>
                                    @foreach (range(1, 12) as $month)
                                        <option value="{{ $month }}">
                                            {{ DateTime::createFromFormat('!m', $month)->format('F') }}</option>
                                    @endforeach
                                </select>
                                <select id="start_date_year3" name="start_date_year3" class="form-control"
                                wire:model="start_date_year3">
                                <option value="" selected >Choose Year</option>
                                @for ($year = date('Y'); $year >= 2000; $year--)
                                        <option value="{{ $year }}">{{ $year }}</option>
                                    @endfor
                                </select>
                            </div>
                            @error('start_date_month3')<div class="text-danger">{{ $message }}</div>@enderror
                            @error('start_date_year3')<div class="text-danger">{{ $message }}</div>@enderror
                        </div>

                        <div class="form-group">
                            <label for="end_date_month">End Date:</label>
                            <div class="d-flex">
                                <select id="end_date_month" name="end_date_month" class="form-control mr-2"
                                    wire:model="end_date_month">
                                    <option value="" selected>Choose Month</option>
                                    @foreach (range(1, 12) as $month)
                                        <option value="{{ $month }}">
                                            {{ DateTime::createFromFormat('!m', $month)->format('F') }}</option>
                                    @endforeach
                                </select>
                                @error('end_date_month')<div class="text-danger">{{ $message }}</div>@enderror
                                <select id="end_date_year" name="end_date_year" class="form-control"
                                    wire:model="end_date_year">
                                    <option value="" selected>Choose Year</option>
                                    @for ($year = date('Y'); $year >= 2000; $year--)
                                        <option value="{{ $year }}">{{ $year }}</option>
                                    @endfor
                                </select>
                                @error('end_date_year')<div class="text-danger">{{ $message }}</div>@enderror
                            </div>
                        </div>

                        <div class="button-container" style="display: flex; gap: 10px;">
                            <button wire:click='del_jop3' type="button" class="btn btn-danger"
                                style="padding: 5px; width: 60px; height: 35px;">
                                <i class="fas fa-trash-alt"></i> Delete
                            </button>
                        </div>
                @endif
                <br>
                <br>
                <button type="button" wire:click="goToPreviousStep" class="btn btn-secondary">Previous</button>
                <button type="submit" class="btn btn-primary">Next</button>
            </form>
        </div>
    @elseif ($step == 5)
    <div class="form-container">
        <h2>Step 4: Education Information</h2>
        <form wire:submit.prevent="goToNextStep">
            @csrf
            <div class="form-group">
                <label for="college">College/University</label>
                <input id="college" type="text" class="form-control" wire:model="college" placeholder="Enter the name of the college or university">
                @error('college')<div class="text-danger">{{ $message }}</div>@enderror
            </div>
            <div class="form-group">
                <label for="major">Major/Field of Study</label>
                <input id="major" type="text" class="form-control" wire:model="major" placeholder="Enter your major or field of study">
                @error('major')<div class="text-danger">{{ $message }}</div>@enderror
            </div>
            <div class="form-group">
                <label for="start_date_month_university">Start Date:</label>
                <div class="d-flex">
                    <select id="start_date_month_university" name="start_date_month_university" wire:model="start_date_month_university" class="form-control mr-2">
                        <option value="" selected >Choose Month</option>
                        @foreach(range(1, 12) as $month)
                            <option value="{{ $month }}">{{ DateTime::createFromFormat('!m', $month)->format('F') }}</option>
                        @endforeach
                    </select>
                    <select id="start_date_year_university" name="start_date_year_university" wire:model="start_date_year_university" class="form-control">
                        <option value="" selected>Choose Year</option>
                        @for($year = date('Y'); $year >= 2000; $year--)
                        <option value="{{ $year }}">{{ $year }}</option>
                        @endfor
                    </select>
                </div>
            </div>
            @error('start_date_month_university')<div class="text-danger">{{ $message }}</div>@enderror
            @error('start_date_year_university')<div class="text-danger" >{{ $message }}</div>@enderror
            <div class="form-group">
                <label for="end_date_month_university">End Date:</label>
                <div class="d-flex">
                    <select id="end_date_month_university" name="end_date_month_university" class="form-control mr-2"
                        @if($currently_university) disabled @endif wire:model="end_date_month_university">
                        <option value="" selected>Choose Month</option>
                        @foreach(range(1, 12) as $month)
                            <option value="{{ $month }}">{{ DateTime::createFromFormat('!m', $month)->format('F') }}</option>
                        @endforeach
                    </select>
                    <select id="end_date_year_university" name="end_date_year_university" class="form-control"
                        @if($currently_university) disabled @endif wire:model="end_date_year_university">
                        <option value="" selected>Choose Year</option>
                        @for($year = date('Y'); $year >= 2000; $year--)
                            <option value="{{ $year }}">{{ $year }}</option>
                        @endfor
                    </select>
                </div>
            </div>
            
            <div class="form-check mb-4">
                <input type="checkbox" name="currently_working_university" id="lock_checkbox_university"
                    wire:model="currently_university" class="form-check-input"
                    onchange="toggleAcademicYearDiv(this)">
                <label for="lock_checkbox_university" class="form-check-label">Currently working there</label>
            </div>
            
            <div id="academic_year_div" style="display: none;" class="form-group">
                <label for="academic_year">University Year</label>
                <select id="academic_year" name="university_year" class="form-control" wire:model='university_year'>
                    <option value="" selected>Choose the Academic Stage</option>
                    <option value="First_grade">First Grade</option>
                    <option value="Second_grade">Second Grade</option>
                    <option value="Third_grade">Third Grade</option>
                    <option value="Fourth_grade">Fourth Grade</option>
                </select>
            </div>
            <button type="button" wire:click="goToPreviousStep" class="btn btn-secondary">Previous</button>
            <button type="submit" class="btn btn-primary">Save</button>
        </form>
    </div>
    @elseif ($step == 6)
    <div class="form-container">
        <h2>Step 5: skills</h2>
        <form wire:submit.prevent="goToNextStep">
            @csrf
            <div class="form-group">
                <label for="skills">Key Skills</label>
                <p>Enter skills you use at work like Java, SQL, etc.</p>
                <input id="skills" type="text" class="form-control" wire:model='skills'
                    placeholder="Enter skills and press Enter">
                    @error('skills')<div class="text-danger">{{ $message }}</div>@enderror
            </div>
            <div class="form-group">
                <label for="cv" class="font-weight-bold">CV/Resume</label>
                <div class="input-group">
                    <input id="cv" type="file" class="form-control-file border rounded" wire:model="cv">
                    @error('cv')<div class="text-danger mt-2">{{ $message }}</div>@enderror
                </div>
            </div>
        
            <!-- Adding LinkedIn -->
            <div class="form-group">
                <label for="linkedin">LinkedIn Profile</label>
                <input id="linkedin" type="url" class="form-control" wire:model="linkedin"
                    placeholder="https://linkedin.com/in/yourprofile">
                @error('linkedin')<div class="text-danger">{{ $message }}</div>@enderror
            </div>

            <!-- Adding GitHub -->
            <div class="form-group">
                <label for="github">GitHub Profile</label>
                <input id="github" type="url" class="form-control" wire:model="github"
                    placeholder="https://github.com/yourprofile">
                    @error('github')<div class="text-danger">{{ $message }}</div>@enderror
            </div>
            <button type="button" wire:click="goToPreviousStep" class="btn btn-secondary">Previous</button>
            <button type="submit" class="btn btn-primary">Next</button>
        </form>
        </div>
    @elseif ($step == 7)
        <div class="form-container">
            <h2>Step 6: Review & Submit</h2>

            <div class="image-preview mt-2">
                @if ($img)
                    <img id="imgPreview" src="{{ $img->temporaryUrl() }}" alt="Image preview" class="img-fluid">
                @else
                    <p>No image available</p>
                @endif
            </div>

            <div class="card-container mt-4">
                <div class="card">
                    <div class="card-header">
                        <h5>Personal Information</h5>
                    </div>
                    <div class="card-body">
                        <p><strong>First Name:</strong> {{ $first_name }}</p>
                        <p><strong>Middle Name:</strong> {{ $middle_name }}</p>
                        <p><strong>Last Name:</strong> {{ $last_name }}</p>
                        <p><strong>Age:</strong> {{ $age }}</p>
                        <p><strong>Gender:</strong> {{ $gender }}</p>
                        <p><strong>Phone:</strong> {{ $phone }}</p>
                        <p><strong>Job Title:</strong> {{ $job_title }}</p>
                        @if(!empty($year_experience))<p><strong>Year of Experience:</strong> {{ $year_experience }}</p>@endif
                        <p><strong>Address:</strong> {{ $address }}</p>
                        <p><strong>City:</strong> {{ $city }}</p>
                        <p><strong>State:</strong> {{ $state }}</p>
                    </div>
                </div>

                <div class="card mt-3">
                    <div class="card-header">
                        <h5>Job Information</h5>
                    </div>
                    <div class="card-body">
                        @if(!empty($company_name1))<p><strong>Company Name1:</strong> {{ $company_name1 }}</p>@endif
                        @if(!empty($job_title1))<p><strong>Job Title1:</strong> {{ $job_title1 }}</p>@endif
                        @if(!empty($job_description1))<p><strong>Job Description1:</strong> {{ $job_description1 }}</p>@endif
                        @if(!empty($start_date_month1) && !empty($start_date_year1))<p><strong>Start Date1:</strong> {{ $start_date_month1 }}/{{ $start_date_year1 }}</p>@endif
                        @if (!$currently_working)
                         @if(!empty($end_date_month1) && !empty($end_date_year1))
                            <p><strong>End Date1:</strong> {{ $end_date_month1 }}/{{ $end_date_year1 }}</p>
                         @endif
                        @else
                            <p><strong>End Date1:</strong> Currently working there</p>
                        @endif
                        @if(!empty($company_name2))
                        <h4>job2 :</h4>
                        <p><strong>Company Name2:</strong> {{ $company_name2 }}</p>@endif
                        @if(!empty($job_title2))<p><strong>Job Title2:</strong> {{ $job_title2 }}</p>@endif
                        @if(!empty($job_description2))<p><strong>Job Description2:</strong> {{ $job_description2 }}</p>@endif
                        @if(!empty($start_date_month2) && !empty($start_date_year2))<p><strong>Start Date2:</strong> {{ $start_date_month2 }}/{{ $start_date_year2 }}</p>@endif
                        @if(!empty($end_date_month2)  && !empty($end_date_year2))<p><strong>End Date2:</strong> {{ $end_date_month2 }}/{{ $end_date_year2 }}</p>@endif
                        @if(!empty($company_name3))
                        <h4>job3 :</h4>
                        <p><strong>Company Name3:</strong> {{ $company_name3 }}</p>@endif
                        @if(!empty($job_title3))<p><strong>Job Title3:</strong> {{ $job_title3 }}</p>@endif
                        @if(!empty($job_description3))<p><strong>Job Description3:</strong> {{ $job_description3 }}</p>@endif
                        @if(!empty($start_date_month3) && !empty($start_date_year3))<p><strong>Start Date3:</strong> {{ $start_date_month3 }}/{{ $start_date_year3 }}</p>@endif
                        @if(!empty($end_date_month3) && !empty($end_date_year3))<p><strong>End Date3:</strong> {{ $end_date_month3 }}/{{ $end_date_year3 }}</p>@endif
                    </div>
                </div>

                <div class="card">
                    <div class="card-header">
                        <h5>skills</h5>
                    </div>
                    <div class="card-body">
                        <p><strong>skills:</strong> {{ $skills }}</p>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <h5>Education Information</h5>
                    </div>
                    <div class="card-body">
                        <p><strong>University:</strong> {{ $college }}</p>
                        <p><strong>major:</strong> {{ $major }}</p>
                        <p><strong>start_year_university:</strong>{{ $start_date_month_university }}/{{ $start_date_year_university }}</p>
                        @if (!$currently_university)
                            @if(!empty($end_date_month_university) && !empty($end_date_year_university))
                                <p><strong>End Date1:</strong> {{ $end_date_month_university }}/{{ $end_date_year_university }}</p>
                            @endif
                        @else
                        <p><strong>End Date1:</strong>currently studying there.</p>
                        <p><strong>university Year1:</strong> {{ $university_year }}</p>
                        @endif
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <h5>Project Information</h5>
                    </div>
                    <div class="card-body">
                        @if(empty('project_name'))<p><strong>Project Name:</strong> {{ $project_name }}</p>@endif
                        @if(empty('project_description'))<p><strong>Project Description:</strong> {{ $project_description }}</p>@endif
                        @if(empty('skills_project'))<p><strong>Skills Project:</strong> {{ $skills_project }}</p>@endif
                        @if(empty('project_url'))<p><strong>Project Url:</strong> {{ $project_url }}</p>@endif
                        @if($showProjectForm2)
                        <h4>Project2 :</h4>
                        @if(!empty('project_name2'))<p><strong>Project Name:</strong> {{ $project_name2 }}</p>@endif
                        @if(!empty('project_description2'))<p><strong>Project Description:</strong> {{ $project_description2 }}</p>@endif
                        @if(!empty('skills_project2'))<p><strong>Skills Project:</strong> {{ $skills_project2 }}</p>@endif
                        @if(!empty('project_url2'))<p><strong>Project Url:</strong> {{ $project_url2 }}</p>@endif
                        @endif
                        @if($showProjectForm3)
                        <h4>Project3 :</h4>
                        @if(!empty('project_name3'))<p><strong>Project Name:</strong> {{ $project_name3 }}</p>@endif
                        @if(!empty('project_description3'))<p><strong>Project Description:</strong> {{ $project_description3 }}</p>@endif
                        @if(!empty('skills_project3'))<p><strong>Skills Project:</strong> {{ $skills_project3 }}</p>@endif
                        @if(!empty('project_url3'))<p><strong>Project Url:</strong> {{ $project_url3 }}</p>@endif
                        @endif
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <h5>links</h5>
                    </div>
                    <div class="card-body">
                        <p><strong>linkedin:</strong> {{ $linkedin }}</p>
                        <p><strong>github:</strong> {{ $github }}</p>
                    </div>
                </div>
            </div>
            <br>
            <form wire:submit.prevent="save">
                @csrf
                <button type="button" wire:click="goToPreviousStep" class="btn btn-secondary">Previous</button>
                <button type="submit" class="btn btn-success">Submit</button>
            </form>
        </div>
    @endif
</div>
