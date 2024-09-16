<?php

namespace App\Livewire;

use Carbon\Carbon;
use App\Models\Section;
use Livewire\Component;
use App\Models\Position;
use App\Models\Question;
use App\Models\HrAccount;
use App\Models\QuestionOption;
use App\Http\Requests\make_job;
use Illuminate\Support\Facades\Auth;

class CreateJob extends Component
{
    public $step = 1;
    public $showurl = false;
    public $hr, $url,$url_radio, $job_title, $experience_years,
     $company_about, $job_description, $job_requirements, 
    $section_id, $employees_number, $salary, $currency, $employment_type;
    public $section, $salary_period; 
    public $job_id, $Position;
    public $questions = [];
    public $question_types = [];
    public $options = [];

    public $sectionNames = [
        'Job Information',
        'Job form',
        'Review & Submit',
    ];

    public $experienceOptions = [
        '0-1' => '0-1 years',
        '1-3' => '1-3 years',
        '3-5' => '3-5 years',
        '5-10' => '5-10 years',
        '10+' => '10+ years'
    ];


    public function mount()
    {
        $this->hr = HrAccount::where('user_id', Auth::user()->id)->first();
        $this->questions = ['']; // بدءًا بسؤال فارغ
        $this->question_types = ['text']; // تحديد النوع الافتراضي كسؤال نصي
        $this->options = [[]]; // بدءًا بخيارات فارغة
    }
    

    public function goToNextStep()
    {
        $this->validateStep();
        $this->step++;
    }
    
    public function goToPreviousStep(){
        if ($this->step > 1) {
            $this->step--;
        }
    }
    public function render()
    {
        $sections = Section::all();
        
        $section_name = null;
    
        if (is_numeric($this->section_id)) {
            // محاولة العثور على الـ Section بالـ ID المحدد
            $section_name = Section::find($this->section_id);
                $this->section = $section_name;
        }
    
        // تمرير جميع المتغيرات اللازمة إلى العرض
        return view('livewire.create-job', compact('sections', 'section_name'));
    }

    public function save(){
        // $this->validateStep();
        $hrAccount = HrAccount::where('user_id',Auth::user()->id)->first();
        if (!$hrAccount) {
            session()->flash('error', 'HR account does not exist.');
            return;
        }
        $data = [
            'hr_id' =>  $hrAccount->id,
            "job_title" => $this->job_title, 
            "experience_years" => $this->experience_years, 
            "company_about" => $this->company_about, 
            "job_description" => $this->job_description, 
            "job_requirements" => $this->job_requirements, 
            "section_id" => $this->section_id, 
            "number_of_employees" => $this->employees_number, 
            "employment_type" => $this->employment_type, 
            "salary_period" => $this->salary_period, 
            "salary" => $this->salary . ' ' .$this->currency, 
            "is_expired" => 0,
        ];

        if ($this->url_radio === 'yes') {
            $data["url"] = $this->url;
        }
        $this->Position = $data;

        $this->Position = Position::create($data);

        if ($this->url_radio !== 'yes'){

            foreach ($this->questions as $index => $questionText) {
                $question = Question::create([
                    'job_id' => $this->Position->id,
                    'question_text' => $questionText,
                    'question_type' => $this->question_types[$index],
                ]);

                // إذا كان السؤال من نوع الاختيار من متعدد، يمكن إضافة خيارات هنا
                if ($this->question_types[$index] === 'multiple_choice') {
                    foreach ($this->options[$index] as $option_text) {
                        QuestionOption::create([
                            'question_id' => $question->id,
                            'option_text' => $option_text,
                        ]);
                    }
                }
            }
        }
            session()->flash('message', 'create job success');
            return redirect()->route('home');
    }

    public function addQuestion()
    {
        $this->questions[] = '';
        $this->question_types[] = 'text';
        $this->options[] = [];
    }

    public function addOption($index)
    {
        $this->options[$index][] = '';
    }
    public function removeOption($index, $optionIndex)
    {
        unset($this->options[$index][$optionIndex]);
        $this->options[$index] = array_values($this->options[$index]);
    }

    public function removeQuestion($index)
    {
        unset($this->questions[$index]);
        unset($this->question_types[$index]);
        $this->questions = array_values($this->questions);
        $this->question_types = array_values($this->question_types);
    }

    private function validateStep()
    {
        if ($this->step == 1) {
            $this->validate([
                'job_title' => 'required|max:200',
                'experience_years' => 'required',
                'company_about' => 'required|max:600|string',
                'job_description' => 'required|max:600|string',
                'employment_type' => 'required',
                'url_radio' => 'required',
                'job_requirements' => 'required|string|max:600',
                'section_id' => 'required',
                'employees_number' => 'required|string',
                'currency' => 'required',
                'salary' => 'required|numeric',
                'salary_period' => 'required',
                'url' => 'nullable',
            ]);
        } elseif($this->step == 2 &&  $this->url_radio !== 'yes'){
            $this->validate([
            'questions.*' => 'required|string',
            'question_types.*' => 'required|in:text,multiple_choice',
            ]);
        }
    }
}
