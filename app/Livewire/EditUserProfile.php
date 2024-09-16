<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use App\Models\UserSkill;
use App\Models\UserAddress;
use App\Models\UserProfile;
use App\Models\UserProject;
use App\Models\UserPersonal;
use Livewire\WithFileUploads;
use Illuminate\Validation\Rule;
use App\Models\UserWorkExperience;
use App\Models\UserWorkExperience2;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\UserEducationInformation;

class EditUserProfile extends Component
{
    use WithFileUploads;
    public $photo, $first_name, $last_name, $phone, $email, $middle_name, $age, $job_title, $birth_day, $year_experience;
    public $address,$city , $zip, $state;
    public $college, $major, $start_date_month_university, $start_date_year_university, $end_date_month_university, $end_date_year_university, $university_year;
    public $company_name1, $job_description1, $job_title1, $end_date_year1, $end_date_month1, $start_date_month1, $start_date_year1;
    public $company_name2, $job_description2, $job_title2, $end_date_year2, $end_date_month2, $start_date_month2, $start_date_year2;
    public $company_name3, $job_description3, $job_title3, $end_date_year3, $end_date_month3, $start_date_month3, $start_date_year3;
    public $project_name,$project_description, $skills_project, $project_url;
    public $project_name2,$project_description2, $skills_project2, $project_url2;
    public $project_name3,$project_description3, $skills_project3, $project_url3;
    public $user, $skill, $cv;
    public $currently_university = false;
    public $currently_working = false;
    public $personal = true;
    public $education = false;
    public $project = false;
    public $skills = false;
    public $resume = false;
    public $work = false;
    public $Address = false;
    public $isPhotoUpdated = true;
    public $experienceOptions = [
        '0-1' => '0-1 years',
        '1-3' => '1-3 years',
        '3-5' => '3-5 years',
        '5-10' => '5-10 years',
        '10+' => '10+ years'
    ];

    public function mount()
    {
        $this->user = UserProfile::where('user_id', Auth::user()->id)->first();;
        $this->first_name = $this->user->userPersonal->first_name;
        $this->middle_name = $this->user->userPersonal->middle_name;
        $this->last_name = $this->user->userPersonal->last_name;
        $this->email = $this->user->user->email;
        $this->age = $this->user->userPersonal->age;
        $this->phone = $this->user->userPersonal->phone;
        $this->job_title = $this->user->userPersonal->job_title;
        $this->year_experience = $this->user->userPersonal->year_experience;
        $this->birth_day = $this->user->userPersonal->birth_day;
        $this->address = $this->user->UserAddress->address;
        $this->city = $this->user->UserAddress->city;
        $this->state = $this->user->UserAddress->state;
        $this->zip = $this->user->UserAddress->zip;
        $this->college = $this->user->UserEducationInformation->college;
        $this->major = $this->user->UserEducationInformation->major;
        $this->start_date_month_university = $this->user->UserEducationInformation->start_date_month_university;
        $this->start_date_year_university = $this->user->UserEducationInformation->start_date_year_university;
        $this->end_date_month_university = $this->user->UserEducationInformation->end_date_month_university;
        $this->end_date_year_university = $this->user->UserEducationInformation->end_date_year_university;
        $this->university_year = $this->user->UserEducationInformation->university_year;
        $this->company_name1 = optional($this->user->UserWorkExperience)->company_name1; 
        $this->job_title1 = optional($this->user->UserWorkExperience)->job_title1;
        $this->job_description1 = optional($this->user->UserWorkExperience)->job_description1;
        $this->start_date_month1 = optional($this->user->UserWorkExperience)->start_date_month1;
        $this->start_date_year1 = optional($this->user->UserWorkExperience)->start_date_year1;
        $this->end_date_month1 = optional($this->user->UserWorkExperience)->end_date_month1;
        $this->end_date_year1 = optional($this->user->UserWorkExperience)->end_date_year1;
        $this->company_name2 = optional($this->user->UserWorkExperience2)->company_name2;
        $this->job_title2 = optional($this->user->UserWorkExperience2)->job_title2;
        $this->job_description2 = optional($this->user->UserWorkExperience2)->job_description2;
        $this->start_date_month2 = optional($this->user->UserWorkExperience2)->start_date_month2;
        $this->start_date_year2 = optional($this->user->UserWorkExperience2)->start_date_year2;
        $this->end_date_month2 = optional($this->user->UserWorkExperience2)->end_date_month2;
        $this->end_date_year2 = optional($this->user->UserWorkExperience2)->end_date_year2;
        $this->company_name3 = optional($this->user->UserWorkExperience2)->company_name3;
        $this->job_title3 = optional($this->user->UserWorkExperience2)->job_title3;
        $this->job_description3 = optional($this->user->UserWorkExperience2)->job_description3;
        $this->start_date_month3 = optional($this->user->UserWorkExperience2)->start_date_month3;
        $this->start_date_year3 = optional($this->user->UserWorkExperience2)->start_date_year3;
        $this->end_date_month3 = optional($this->user->UserWorkExperience2)->end_date_month3;
        $this->end_date_year3 = optional($this->user->UserWorkExperience2)->end_date_year3;
        $this->skill = $this->user->UserSkill->skills;
        $this->cv = $this->user->UserSkill->cv;
        $this->project_name = optional($this->user->UserProject)->project_name;
        $this->project_description = optional($this->user->UserProject)->project_description;
        $this->skills_project = optional($this->user->UserProject)->skills_project;
        $this->project_url = optional($this->user->UserProject)->project_url;
        $this->project_name2 = optional($this->user->UserProject)->project_name2;
        $this->project_description2 = optional($this->user->UserProject)->project_description2;
        $this->skills_project2 = optional($this->user->UserProject)->skills_project2;
        $this->project_url2 = optional($this->user->UserProject)->project_url2;
        $this->project_name3 = optional($this->user->UserProject)->project_name3;
        $this->project_description3 = optional($this->user->UserProject)->project_description3;
        $this->skills_project3 = optional($this->user->UserProject)->skills_project3;
        $this->project_url3 = optional($this->user->UserProject)->project_url3;
    }
    public function render()
    {
        return view('livewire.edit-user-profile');
    }
    public function showPersonal()
    {
        $this->resetSections();
        $this->personal = true;
    }
    public function showAddress()
    {
        $this->resetSections();
        $this->Address = true;
    }
    public function toggleCurrentlyWorking()
    {
        $this->currently_working = true;
    }
    public function showEducation()
    {
        $this->resetSections();
        $this->education = true;
    }
    public function showProject()
    {
        $this->resetSections();
        $this->project = true;
    }
    
    public function showWork()
    {
        $this->resetSections();
        $this->work = true;
    }
    public function showCv()
    {
        $this->resetSections();
        $this->resume = true;
    }

    public function showSkills()
    {
        $this->resetSections();
        $this->skills = true;
    }

    private function resetSections()
    {
        $this->personal = false;
        $this->Address = false;
        $this->education = false;
        $this->project = false;
        $this->resume = false;
        $this->work = false;
        $this->skills = false;
    }
    
    public function updatePhoto()
    {
        // العثور على المستخدم الحالي
        $user = UserProfile::where('user_id',Auth::user()->id)->first();
        $user_per = $user->userPersonal;

        if ($this->photo) {
            // حذف الصورة القديمة إذا كانت موجودة
            if (!empty($user_per->img) && Storage::disk('public')->exists($user_per->img)) {
                Storage::disk('public')->delete($user_per->img);
            }

            // تخزين الصورة الجديدة
            $path = $this->photo->store('img_user', 'public');

            // تحديث معلومات المستخدم
            $user_per->img = $path;
            $user_per->save();
            $this->isPhotoUpdated = false;
        }
    }

    public function del_photo(){
        $user = UserProfile::where('user_id',Auth::user()->id)->first();
        $user_per = $user->userPersonal;
        if (!empty($user_per->img) && Storage::disk('public')->exists($user_per->img)) {
            Storage::disk('public')->delete($user_per->img);
        }
        $user_per->update([
            'img' => null,
        ]);
    }

    public function personaldata(){
        $this->validate([
            'first_name' => 'required|string|max:100',
            'middle_name' => 'required|string|max:100',
            'email' => [
                'required',
                'email',
                Rule::unique('users', 'email')->ignore(Auth::user()->id),
            ],
            'last_name' => 'required|string|max:100',
            'age' => 'required|integer|min:17|max:50',
            'job_title' => 'required|string|max:255',
            'year_experience' => 'nullable',
            'phone' => 'required|string|digits:11', 
            'birth_day' => 'required',
        ]);
    }


    public function savepersonal(){
        $this->personaldata();
        $user = UserProfile::where('user_id',Auth::user()->id)->first();
        $currentEmail = Auth::user()->email;
        if($this->email && $this->email !== $currentEmail){
            User::where('id', Auth::user()->id)->update([
                'email' => $this->email,
            ]);
        }
        UserPersonal::where('id', $user->userPersonal->id)->update([
            'first_name' => $this->first_name,
            'middle_name' => $this->middle_name,
            'last_name' => $this->last_name,
            'age' => $this->age,
            'job_title' => $this->job_title,
            'year_experience' => $this->year_experience,
            'phone' => $this->phone,
            'birth_day' => $this->birth_day,
        ]);
        session()->flash('message', 'update personal profile success');
    }

    public function education_data(){
        $this->validate([
            'college' => 'required|string|max:100',
            'major' => 'required|string|max:100',
            'start_date_month_university' => 'required',
            'start_date_year_university' => 'required',
        ]);
    }
    public function save_education(){
        $this->education_data ();
        $user = UserProfile::where('user_id',Auth::user()->id)->first();
        $data = [
            'college' => $this->college,
            'major' => $this->major,
            'start_date_month_university' => $this->start_date_month_university,
            'start_date_year_university' => $this->start_date_year_university,
        ];
        if($this->university_year){
            $data['university_year'] = $this->university_year;
        }
        if($this->currently_university){
            $data['university_year'] = null;
            $data['end_date_month_university'] = $this->end_date_month_university;
            $data['end_date_year_university'] = $this->end_date_year_university;
        } 
        UserEducationInformation::where('id', $user->UserEducationInformation->id)->update($data);
        session()->flash('message', 'update address success');
    }

    public function addressdata(){
        $this->validate([
            'address' => 'required|string|max:255',
            'city' => 'required|string|max:100',
            'state' => 'required|string|max:100',
            'zip' => 'required|string|max:10',
        ]);
        
    }
    
    public function save_address(){
        $this->addressdata();
        $user = UserProfile::where('user_id',Auth::user()->id)->first();
        UserAddress::where('id', $user->UserAddress->id)->update([
            'address' => $this->address,
            'city' => $this->city,
            'state' => $this->state,
            'zip' => $this->zip,
        ]);
        session()->flash('message', 'update address success');
    }

    public function projectdata(){
        $this->validate([
            'project_name' => 'required|string|max:150',
            'project_description' => 'required|string|max:500',
            'skills_project' => 'required|string|max:200',
            'project_url' => 'nullable|string|url|max:200',
        ]);
        
    }
    
    public function save_project(){
        $this->projectdata();
        $user = UserProfile::where('user_id',Auth::user()->id)->first();
        UserProject::where('id', $user->UserProject->id)->update([
            'project_name' => $this->project_name,
            'project_description' => $this->project_description,
            'skills_project' => $this->skills_project,
            'project_url' => $this->project_url,
        ]);
        session()->flash('message', 'update Project success');
    }
    public function projectdata2(){
        $this->validate([
            'project_name2' => 'required|string|max:150',
            'project_description2' => 'required|string|max:500',
            'skills_project2' => 'required|string|max:200',
            'project_url2' => 'nullable|string|url|max:200',
        ]);
        
    }
    
    public function save_project2(){
        $this->projectdata2();
        $user = UserProfile::where('user_id',Auth::user()->id)->first();
        UserProject::where('id', $user->UserProject->id)->update([
            'project_name2' => $this->project_name2,
            'project_description2' => $this->project_description2,
            'skills_project2' => $this->skills_project2,
            'project_url2' => $this->project_url2,
        ]);
        session()->flash('message2', 'update Project success');
    }
    public function projectdata3(){
        $this->validate([
            'project_name3' => 'required|string|max:150',
            'project_description3' => 'required|string|max:500',
            'skills_project3' => 'required|string|max:200',
            'project_url3' => 'nullable|string|url|max:200',
        ]);
        
    }
    
    public function save_project3(){
        $this->projectdata3();
        $user = UserProfile::where('user_id',Auth::user()->id)->first();
        UserProject::where('id', $user->UserProject->id)->update([
            'project_name3' => $this->project_name3,
            'project_description3' => $this->project_description3,
            'skills_project3' => $this->skills_project3,
            'project_url3' => $this->project_url3,
        ]);
        session()->flash('message3', 'update Project success');
    }



    public function work_expertise_data(){
        $this->validate([
            'company_name1' => 'required|string|max:255',
            'job_title1' => 'required|string|max:100',
            'job_description1' => 'required|string|max:400',
        ]);
    }
    
    public function save_work_expertise(){
        $this->work_expertise_data();
        $user = UserProfile::where('user_id',Auth::user()->id)->first();
        $data = [
            'company_name1' => $this->company_name1,
            'job_title1' => $this->job_title1,
            'start_date_month1' => $this->start_date_month1,
            'start_date_year1' => $this->start_date_year1,
        ];
        if($this->currently_working || $this->end_date_month1 !== null && $this->end_date_year1 !== null){
            $data['end_date_month1'] = $this->end_date_month1;
            $data['end_date_year1'] = $this->end_date_year1;
            $data['currently_working'] = null;
        }
        UserWorkExperience::where('id', $user->UserWorkExperience->id)->update($data);
        session()->flash('message', 'update work expertise success');
    }

    public function work_expertise_data2(){
        $this->validate([
            'company_name2' => 'required|string|max:255',
            'job_title2' => 'required|string|max:100',
            'job_description2' => 'required|string|max:400',
        ]);
    }
    
    public function save_expertise2(){
        $this->work_expertise_data2();
        $user = UserProfile::where('user_id',Auth::user()->id)->first();
        $datee = [
            'company_name2' => $this->company_name2,
            'job_title2' => $this->job_title2,
            'job_description2' => $this->job_description2,
            'start_date_month2' => $this->start_date_month2,
            'start_date_year2' => $this->start_date_year2,
            'end_date_month2' => $this->end_date_month2,
            'end_date_year2' => $this->end_date_year2,
        ];
        UserWorkExperience2::findorfail($user->user_work_experience2_id)->update($datee);
        session()->flash('message2', 'update work expertise success');
    }
    public function work_expertise_data3(){
        $this->validate([
            'company_name3' => 'required|string|max:255',
            'job_title3' => 'required|string|max:100',
            'job_description3' => 'required|string|max:400',
        ]);
    }
    
    public function save_expertise3(){
        $this->work_expertise_data3();
        $user = UserProfile::where('user_id',Auth::user()->id)->first();
        $data = [
            'company_name3' => $this->company_name3,
            'job_title3' => $this->job_title3,
            'job_description3' => $this->job_description3,
            'start_date_month3' => $this->start_date_month3,
            'start_date_year3' => $this->start_date_year3,
            'end_date_month3' => $this->end_date_month3,
            'end_date_year3' => $this->end_date_year3,
        ];
        UserWorkExperience2::findorfail($user->user_work_experience2_id)->update($data);
        session()->flash('message3', 'update work expertise success');
    }



    public function del_cv(){
            $user = UserProfile::where('user_id',Auth::user()->id)->first();
            $userSkill = UserSkill::where('id', $user->UserSkill->id)->first();
            $cvPath = $userSkill->cv;
            if (!empty($cvPath) && Storage::disk('public')->exists($cvPath)) {
                Storage::disk('public')->delete($cvPath);
            }
            $userSkill->update([
                'cv' => null,
            ]);

            session()->flash('message2', 'delete cv success');

    }

    public function cv_date(){
        $this->validate([
            'cv' => 'required|file',
        ]);
    }
    public function save_resume(){
        $this->cv_date();
        $user = UserProfile::where('user_id',Auth::user()->id)->first();
        $cv = UserSkill::where('id', $user->UserSkill->id);
        $path_cv = $this->cv->store('cv_files', 'public');
        $cv->update([
            'cv' => $path_cv,
        ]);
        session()->flash('message1', 'add cv success');
    }

    
    public function skills_data(){
        $this->validate([
            'skills' => 'required',
        ]);
    }

    public function save_skills(){
        $this->skills_data();
        $user = UserProfile::where('user_id',Auth::user()->id)->first();
        $cv = UserSkill::where('id', $user->UserSkill->id);
        
        $cv->update([
            'skills' => $this->skill,
        ]);
        session()->flash('message', 'add cv success');
    }
}
