<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CV Form</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="{{ asset('assets/css/cv_form.css') }}" rel="stylesheet">
    @include('layouts.main-css')
    @livewireStyles

</head>

<body>
    @include('layouts.nav')
    <div class="bradcam_area bradcam_bg_1">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="bradcam_text">
                        <h3>make cv</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- <livewire:cv-form /> --}}

    <div class="container">
        <div class="form-container">
            <h2 class="mb-4">Fill out the form data to create a professional CV</h2>
            <form action="{{ route('cv_generate') }}" method="POST">
                @csrf

                <div class="form-group">
                    <label for="first_name">First Name*</label>
                    <input type="text" id="first_name" name="first_name" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="middel_name">Middle Name*</label>
                    <input type="text" id="middel_name" name="middel_name" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="Family_name">Family Name*</label>
                    <input type="text" id="Family_name" name="Family_name" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="email">Email*</label>
                    <input type="email" id="email" name="email" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="phone">Phone*</label>
                    <input type="text" id="phone" name="phone" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="address">Address*</label>
                    <input type="text" id="address" name="address" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="county">County*</label>
                    <input type="text" id="county" name="county" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="github">GitHub</label>
                    <input type="text" id="github" name="github" class="form-control">
                </div>

                <div class="form-group">
                    <label for="linkedin">LinkedIn</label>
                    <input type="text" id="linkedin" name="linkedin" class="form-control">
                </div>

                <div class="form-group">
                    <label for="career_job">Career Job*</label>
                    <input type="text" id="career_job" name="career_job" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="Summary">Summary*</label>
                    <textarea id="Summary" name="Summary" class="form-control" rows="4" required></textarea>
                </div>

                <h3 class="mb-3">Experiences</h3>

                <div class="form-group">
                    <label for="type_jop">Job Type</label>
                    <input type="text" id="type_jop" name="type_jop" class="form-control">
                </div>

                <div class="form-group">
                    <label for="company_name">Company Name</label>
                    <input type="text" id="company_name" name="company_name" class="form-control">
                </div>

                <div class="form-group">
                    <label for="Job_summary">Job Summary</label>
                    <textarea id="Job_summary" name="Job_summary" class="form-control" rows="4"></textarea>
                </div>

                <div class="form-group">
                    <label for="start_date_month">Start Date:</label>
                    <div class="d-flex">
                        <select id="start_date_month" name="start_date_month" class="form-control mr-2">
                            <option value="" selected disabled>Choose Month</option>
                            @foreach (range(1, 12) as $month)
                                <option value="{{ $month }}">
                                    {{ DateTime::createFromFormat('!m', $month)->format('F') }}</option>
                            @endforeach
                        </select>
                        <select id="start_date_year" name="start_date_year" class="form-control">
                            <option value="" selected disabled>Choose Year</option>
                            @for ($year = date('Y'); $year >= 2000; $year--)
                                <option value="{{ $year }}">{{ $year }}</option>
                            @endfor
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label for="end_date_month">End Date:</label>
                    <div class="d-flex">
                        <select id="end_date_month" name="end_date_month" class="form-control mr-2">
                            <option value="" selected disabled>Choose Month</option>
                            @foreach (range(1, 12) as $month)
                                <option value="{{ $month }}">
                                    {{ DateTime::createFromFormat('!m', $month)->format('F') }}</option>
                            @endforeach
                        </select>
                        <select id="end_date_year" name="end_date_year" class="form-control">
                            <option value="" selected disabled>Choose Year</option>
                            @for ($year = date('Y'); $year >= 2000; $year--)
                                <option value="{{ $year }}">{{ $year }}</option>
                            @endfor
                        </select>
                    </div>
                </div>

                <div class="form-check mb-4">
                    <input type="checkbox" name="currently_working" id="lock_checkbox" class="form-check-input">
                    <label for="lock_checkbox" class="form-check-label">Currently working there</label>
                </div>

                @livewire('jop2')
                <br>
                <h3 class="mb-3">Projects</h3>

                <div class="form-group">
                    <label for="project_name">Project Name</label>
                    <input type="text" id="project_name" name="project_name" class="form-control">
                </div>

                <div class="form-group">
                    <label for="skills_project">Skills Used (comma-separated)</label>
                    <input type="text" id="skills_project" name="skills_project" class="form-control"
                        placeholder="html, css, js">
                </div>

                <div class="form-group">
                    <label for="url_project">Project URL</label>
                    <input type="text" id="url_project" name="url_project" class="form-control">
                </div>

                @livewire('project2')
                <br>
                <h3 class="mb-3">Skills</h3>

                <div class="form-group">
                    <label for="skills">Skills (comma-separated)</label>
                    <input type="text" id="skills" name="skills" class="form-control"
                        placeholder="html, css, js">
                </div>

                <h3 class="mb-3">Education</h3>

                <div class="form-group">
                    <label for="University_name">University Name</label>
                    <input type="text" id="University_name" name="University_name" class="form-control">
                </div>

                <div class="form-group">
                    <label for="MAJOR">Major</label>
                    <input type="text" id="MAJOR" name="MAJOR" class="form-control">
                </div>

                <div class="form-group">
                    <label for="start_date_month_university">Start Date:</label>
                    <div class="d-flex">
                        <select id="start_date_month_university" name="start_date_month_university"
                            class="form-control mr-2">
                            <option value="" selected disabled>Choose Month</option>
                            @foreach (range(1, 12) as $month)
                                <option value="{{ $month }}">
                                    {{ DateTime::createFromFormat('!m', $month)->format('F') }}</option>
                            @endforeach
                        </select>
                        <select id="start_date_year_university" name="start_date_year_university"
                            class="form-control">
                            <option value="" selected disabled>Choose Year</option>
                            @for ($year = date('Y'); $year >= 2000; $year--)
                                <option value="{{ $year }}">{{ $year }}</option>
                            @endfor
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label for="end_date_month_university">End Date:</label>
                    <div class="d-flex">
                        <select id="end_date_month_university" name="end_date_month_university"
                            class="form-control mr-2">
                            <option value="" selected disabled>Choose Month</option>
                            @foreach (range(1, 12) as $month)
                                <option value="{{ $month }}">
                                    {{ DateTime::createFromFormat('!m', $month)->format('F') }}</option>
                            @endforeach
                        </select>
                        <select id="end_date_year_university" name="end_date_year_university" class="form-control">
                            <option value="" selected disabled>Choose Year</option>
                            @for ($year = date('Y'); $year >= 2000; $year--)
                                <option value="{{ $year }}">{{ $year }}</option>
                            @endfor
                        </select>
                    </div>
                </div>

                <div class="form-check mb-4">
                    <input type="checkbox" name="currently_working_university" id="lock_checkbox_university"
                        class="form-check-input">
                    <label for="lock_checkbox_university" class="form-check-label">Currently working there</label>
                </div>

                <div id="academic_year_div" style="display: none;" class="form-group">
                    <label for="academic_year">University Year</label>
                    <select id="academic_year" name="university_year" class="form-control">
                        <option value="" selected disabled>Choose the Academic Stage</option>
                        <option value="First grade">First Grade</option>
                        <option value="Second grade">Second Grade</option>
                        <option value="Third grade">Third Grade</option>
                        <option value="Fourth grade">Fourth Grade</option>
                    </select>
                </div>

                <h3 class="mb-3">Languages</h3>

                <div class="form-group">
                    <label for="languages_name1">Language Name 1</label>
                    <input type="text" id="languages_name1" name="languages_name1" class="form-control">
                </div>

                <div class="form-group">
                    <label for="language_level1">Language Level 1</label>
                    <br>
                    <select id="language_level1" name="language_level1" class="form-control">
                        <option value="" selected disabled>Choose Language Level</option>
                        <option value="professional_level">Native Language</option>
                        <option value="beginner">Beginner</option>
                        <option value="intermediate">Intermediate</option>
                        <option value="advanced">Advanced</option>
                    </select>
                </div>
                <br><br>
                @livewire('lang2')
                <br>
                <div class='choose'>
                    <h2>choose them : </h2>
                </div>
                <br>
                <div class="form-group d-flex justify-content-between">


                    <!-- CV Theme 1 -->
                    <div class="cv-theme">
                        <input type="radio" id="cv1" name="selectedTheme" value="cv1">
                        <label for="cv1">
                            <img src="{{ URL::asset('assets/img/cv1.png') }}" alt="CV Theme 1" class="img-thumbnail"
                                style="width: 150px; height: auto;">
                        </label>
                    </div>

                    <!-- CV Theme 2 -->
                    <div class="cv-theme">
                        <input type="radio" id="cv2" name="selectedTheme" value="cv2">
                        <label for="cv2">
                            <img src="https://cdn-images.livecareer.co.uk/images/lc/common/cv-templates/jt/uk/cv-templates-modern-01@3x.png"
                                style="width: 150px; height: auto;" alt="CV Theme 2" class="img-thumbnail">
                        </label>
                    </div>

                    <!-- CV Theme 3 -->
                    <div class="cv-theme">
                        <input type="radio" id="cv3" name="selectedTheme" value="cv3">
                        <label for="cv3">
                            <img src="https://cdn-images.zety.com/pages/how_to_write_a_cv_template_minimo.png"
                                alt="CV Theme 3" class="img-thumbnail" style="width: 150px; height: auto;">
                        </label>
                    </div>

                    <!-- CV Theme 4 -->
                    <div class="cv-theme">
                        <input type="radio" id="cv4" name="selectedTheme" value="cv4">
                        <label for="cv4">
                            <img src="https://d25iein5sonfaj.cloudfront.net/v1/public-drupal-medmastery-assets-production/2023-05/CV%20template.PNG?cfg=eyJ3aWR0aCI6NjAwLCJoZWlnaHQiOjQwMCwib3V0cHV0Ijoid2VicCJ9"
                                alt="CV Theme 4" class="img-thumbnail" style="width: 150px; height: auto;">
                        </label>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">Generate CV</button>
            </form>
        </div>
    </div>


    <script>
        document.getElementById('lock_checkbox').addEventListener('change', function() {
            const isLocked = this.checked;
            document.getElementById('end_date_month').disabled = isLocked;
            document.getElementById('end_date_year').disabled = isLocked;
        });

        document.getElementById('lock_checkbox_university').addEventListener('change', function() {
            const endDateMonth = document.getElementById('end_date_month_university');
            const endDateYear = document.getElementById('end_date_year_university');
            const academicYearDiv = document.getElementById('academic_year_div');

            if (this.checked) {
                endDateMonth.value = '';
                endDateYear.value = '';
                endDateMonth.disabled = true;
                endDateYear.disabled = true;
                academicYearDiv.style.display = 'block';
            } else {
                endDateMonth.disabled = false;
                endDateYear.disabled = false;
                academicYearDiv.style.display = 'none';
            }
        });
    </script>
    <script>
        document.getElementById('lock_checkbox').addEventListener('change', function() {
            const isLocked = this.checked;
            const endDateMonth = document.getElementById('end_date_month');
            const endDateYear = document.getElementById('end_date_year');

            if (isLocked) {
                endDateMonth.value = ''; // تفريغ القيمة
                endDateYear.value = ''; // تفريغ القيمة
                endDateMonth.disabled = true; // تعطيل الحقل
                endDateYear.disabled = true; // تعطيل الحقل
            } else {
                endDateMonth.disabled = false; // إعادة تفعيل الحقل
                endDateYear.disabled = false; // إعادة تفعيل الحقل
            }
        });
    </script>
    @include('layouts.main-script')
    @livewireScripts
</body>

</html>
