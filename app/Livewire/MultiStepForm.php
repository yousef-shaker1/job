<?php

namespace App\Livewire;

use Carbon\Carbon;
use Livewire\Component;
use App\Models\UserSkill;
use App\Models\UserAddress;
use App\Models\UserProfile;
use App\Models\UserProject;
use App\Models\UserPersonal;
use Livewire\WithFileUploads;
use App\Models\UserWorkExperience;
use App\Models\UserWorkExperience2;
use Illuminate\Support\Facades\Auth;
use App\Models\UserEducationInformation;

class MultiStepForm extends Component
{
    use WithFileUploads;
    public $step = 1;
    public $img, $first_name, $middle_name, $last_name,
    $age, $job_title, $year_experience,$phone, $birth_day,
    $birth_month, $birth_year, $gender;
    public $address, $city, $state, $zip;
    public $company_name1, $job_title1, $job_description1, $start_date_month1, $start_date_year1, $end_date_month1, $end_date_year1;
    public $company_name2, $job_title2, $job_description2, $start_date_month2, $start_date_year2, $end_date_month2, $end_date_year2;
    public $company_name3, $job_title3, $job_description3, $start_date_month3, $start_date_year3, $end_date_month3, $end_date_year3;
    public $skills, $github, $linkedin;
    public $showJobForm2 = false;
    public $showProjectForm2 = false;
    public $showProjectForm3 = false;
    public $showJobForm3 = false;
    public $currently_working = false;
    public $currently_university = false; 
    public $end_date_month, $end_date_year;
    public $end_date_month_university, $start_date_year_university, $start_date_month_university, $end_date_year_university;
    public $college, $major, $university_year, $cv;
    public $project_name, $skills_project, $project_url, $project_description;
    public $project_name2, $skills_project2, $project_url2, $project_description2;
    public $project_name3, $skills_project3, $project_url3, $project_description3;
    
    public $experienceOptions = [
        '0-1' => '0-1 years',
        '1-3' => '1-3 years',
        '3-5' => '3-5 years',
        '5-10' => '5-10 years',
        '10+' => '10+ years'
    ];

    public function render()
    {
        return view('livewire.multi-step-form');
    }
    
    
    public function add_job2(){
        $this->showJobForm2 = true;
    }
    public function del_jop2(){
        $this->showJobForm2 = false;
    } 
    public function add_job3(){
        $this->showJobForm3 = true;
    }
    public function del_jop3(){
        $this->showJobForm3 = false;
    }

    public function add_project2(){
        $this->showProjectForm2 = true;
    }
    public function del_project2(){
        $this->showProjectForm2 = false;
    } 

    public function add_project3(){
        $this->showProjectForm3 = true;
    }
    public function del_project3(){
        $this->showProjectForm3 = false;
    } 
    public function goToNextStep()
    {
        $this->validateStep();
        $this->step++;
    }

    public function toggleCurrentlyWorking()
    {
        if ($this->currently_working) {
            $this->end_date_month1 = null;
            $this->end_date_year1 = null;
        }
    }
    public function goToPreviousStep()
    {
        $this->step--;
    }


    public function save()
    {
        $this->validateStep();
        if ($this->cv) {
            $path_cv = $this->cv->store('cv_files', 'public');
        }
        if ($this->img) {
            $img_user = $this->img->store('img_user', 'public');
        }
        $birthDate = null;
        if ($this->birth_day && $this->birth_month && $this->birth_year) {
            $birthDate = Carbon::create($this->birth_year, $this->birth_month, $this->birth_day)->format('Y-m-d');
        }
    
        $User_Personal = UserPersonal::create([
            'img' => $img_user,
            'first_name' => $this->first_name,
            'middle_name' => $this->middle_name,
            'last_name' => $this->last_name,
            'age' => $this->age,
            'job_title' => $this->job_title,
            'year_experience' => $this->year_experience,
            'phone' => $this->phone,
            'birth_day' => $birthDate,
            'gender' => $this->gender,
        ]);

        $User_Address = UserAddress::create([
            'address' => $this->address,
            'city' => $this->city,
            'state' => $this->state,
            'zip' => $this->zip,
        ]);

        if(!empty($this->project_name) || !empty($this->project_description) || !empty($this->skills_project) || !empty($this->skills_project)){
            $UserProject = UserProject::create([
            'project_name' => $this->project_name,
            'project_description' => $this->project_description,
            'skills_project' => $this->skills_project,
            'project_url' => $this->project_url,
            'project_name2' => $this->project_name2,
            'project_description2' => $this->project_description2,
            'skills_project2' => $this->skills_project2,
            'project_url2' => $this->project_url2,
            'project_name3' => $this->project_name3,
            'project_description3' => $this->project_description3,
            'skills_project3' => $this->skills_project3,
            'project_url3' => $this->project_url3,
        ]);
    }
    
        if(!empty($this->company_name1) || !empty($this->job_title1) || !empty($this->job_description1) || !empty($this->skills_project)){
            $data = [
                'company_name1' => $this->company_name1,
                'job_title1' => $this->job_title1,
                'job_description1' => $this->job_description1,
                'start_date_month1' => $this->start_date_month1,
                'start_date_year1' => $this->start_date_year1,
            ];
            
            if (!$this->currently_working) {
                $data['end_date_month1'] = $this->end_date_month1;
                $data['end_date_year1'] = $this->end_date_year1;
            } else {
                $data['currently_working'] = 'Currently working now';
            }

            $UserWorkExperience = UserWorkExperience::create($data);
        }
        if($this->showJobForm2){
            $UserWorkExperience2 = UserWorkExperience2::create([
                'company_name2' => $this->company_name2,
                'job_title2' => $this->job_title2,
                'job_description2' => $this->job_description2,
                'start_date_month2' => $this->start_date_month2,
                'start_date_year2' => $this->start_date_year2,    
                'end_date_month2' =>  $this->end_date_month2,
                'end_date_year2' => $this->end_date_year2,
                'company_name3' => $this->company_name3,
                'job_title3' => $this->job_title3,
                'job_description3' => $this->job_description3,
                'start_date_month3' => $this->start_date_month3,
                'start_date_year3' => $this->start_date_year3,    
                'end_date_month3' =>  $this->end_date_month3,
                'end_date_year3' => $this->end_date_year3,
            ]);
        }

        $data = [
            'college' => $this->college,
            'major' => $this->major,
            'start_date_month_university' => $this->start_date_month_university,
            'start_date_year_university' => $this->start_date_year_university,
        ];
        
        if ($this->end_date_month_university != "" && $this->end_date_year_university != "" ) {
            $data['end_date_month_university'] = $this->end_date_month_university;
            $data['end_date_year_university'] = $this->end_date_year_university;
        } else {
            $data['university_year'] = $this->university_year;
        }
        $UserEducationInformation = UserEducationInformation::create($data);

        $UserSkill = UserSkill::create([
            'skills' => $this->skills,
            'cv' => $path_cv,
            'linkedin' => $this->linkedin,
            'github' => $this->github,
        ]);
    

        $data = [
            'user_id' => Auth::user()->id,
            'user_personal_id' => $User_Personal->id,
            'user_education_information_id' => $UserEducationInformation->id,
            'user_address_id' => $User_Address->id,
            'user_skill_id' => $UserSkill->id,
        ];
        if(!empty($this->project_name) || !empty($this->project_description) || !empty($this->skills_project) || !empty($this->skills_project)){
            $data["user_project_id"] =$UserProject->id;
        }else {
            $data["user_project_id"] = null;
        }
        if(!empty($this->company_name1) || !empty($this->job_title1) || !empty($this->job_description1) || !empty($this->skills_project)){
            $data["user_work_experience_id"] =$UserWorkExperience->id;
        }else {
            $data["user_work_experience_id"] = null;
        }
            if($this->showJobForm2){
        $data["user_work_experience2_id"] =$UserWorkExperience2->id;
        } else {
            $data["user_work_experience2_id"] = null;
        }
        UserProfile::create($data);
        session()->flash('message', 'Profile saved successfully.');
        return redirect()->route('home');
    }

    private function validateStep()
    {
        if ($this->step == 1) {
            $this->validate([
                'img' => 'nullable|image|max:1024',
                'first_name' => 'required|string|max:100',
                'middle_name' => 'required|string|max:100',
                'last_name' => 'required|string|max:100',
                'age' => 'required|integer|min:17|max:50',
                'job_title' => 'required|string|max:255',
                'year_experience' => 'nullable',
                'phone' => 'required|string', 
                'birth_day' => 'required|integer|min:1|max:31',
                'birth_month' => 'required|integer|min:1|max:12',
                'birth_year' => 'required|integer|min:1950|max:2008',
                'gender' => 'required|in:male,female',
            ]);
        } elseif ($this->step == 2) {
            $this->validate([
                'address' => 'required|string|max:255',
                'city' => 'required|string|max:100',
                'state' => 'required|string|max:100',
                'zip' => 'required|string|max:10',
            ]);
        } elseif ($this->step == 3) {
            $this->validate([
                //project1
                'project_name' => 'nullable|string|max:100',
                'project_description' => 'nullable|string|max:500',
                'skills_project' => 'nullable|string|max:355',
                'project_url' => 'nullable',
                //project2
                'project_name2' => 'nullable|string|max:100',
                'project_description2' => 'nullable|string|max:500',
                'skills_project2' => 'nullable|string|max:355',
                'project_url2' => 'nullable',
                //project3
                'project_name3' => 'nullable|string|max:100',
                'project_description3' => 'nullable|string|max:500',
                'skills_project3' => 'nullable|string|max:355',
                'project_url3' => 'nullable',
            ]);
        } elseif ($this->step == 4) {
            $this->validate([
                //Work Experience1
                'company_name1' => 'nullable|string|max:100',
                'job_title1' => 'nullable|string|max:100',
                'job_description1' => 'nullable|string|max:355',
                'start_date_month1' => 'nullable|integer',
                'start_date_year1' => 'nullable|integer',
                //Work Experience2
                'company_name2' => 'nullable|string|max:100',
                'job_title2' => 'nullable|string|max:100',
                'job_description2' => 'nullable|string|max:355',
                'start_date_month2' => 'nullable|integer',
                'start_date_year2' => 'nullable|integer',
                'end_date_month2' => 'nullable|integer',
                'end_date_year2' => 'nullable|integer',
                //Work Experience3
                'company_name3' => 'nullable|string|max:100',
                'job_title3' => 'nullable|string|max:100',
                'job_description3' => 'nullable|string|max:355',
                'start_date_month3' => 'nullable|integer',
                'start_date_year3' => 'nullable|integer',
                'end_date_month3' => 'nullable|integer',
                'end_date_year3' => 'nullable|integer',
            ]);
        } elseif($this->step == 5) {
            $this->validate([
                'college' => 'required|string|max:100',
                'major' => 'required|string|max:100',
                'start_date_month_university' => 'required|string|max:100',
                'start_date_year_university' => 'required|string|max:100',
            ]);
        } elseif ($this->step == 6) {
            $this->validate([
                'skills' => 'required|string|max:100',
                'cv' => 'nullable|file|mimes:pdf,doc,docx',
                'linkedin' => 'required|url',
                'github' => 'nullable|url',
            ]);
        }
    }
}
