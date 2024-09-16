<?php

namespace App\Livewire;

use App\Models\Section;
use Livewire\Component;
use App\Models\HrAccount;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class MultiFormHr extends Component
{
    use WithFileUploads;
    public $step = 1;
    public $img, $company_name, $first_name, $last_name, $business_email, $business_password, $section_id, $phone, $company_location, $section_name;

    public function render()
    {
        $sections = Section::all();
        return view('livewire.multi-form-hr', compact('sections'));
    }
    public function goToNextStep()
    {
        $this->validateStep();
        if(!empty($this->section_id)){
        $this->section_name = Section::findorfail($this->section_id);
        }
        $this->step++; 
    }

    public function goToPreviousStep(){
        $this->step--;
    }

    public function save()
    {
        $this->validateStep();
        $img_user = null; 
        if ($this->img) {
            $img_user = $this->img->store('company_logo', 'public');
        }
        HrAccount::create([
            'user_id' => Auth::user()->id,
            'img' => $img_user ,
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'company_name' => $this->company_name,
            'business_email' => $this->business_email,
            'business_password' => Hash::make($this->business_password),
            'section_id' => $this->section_id,
            'phone' => $this->phone,
            'company_location' => $this->company_location,
        ]);
        session()->flash('message','create profile hr susscess');
        return redirect()->route('home');
    }

    private function validateStep()
    {
        if ($this->step == 1) {
            $this->validate([
                'img' => 'nullable|image|max:1024',
                'company_name' => 'required|string|max:150',
                'first_name' => 'required|string|max:100',
                'last_name' => 'required|string|max:100',
                'business_email' => 'required|email|unique:hr_accounts,business_email',
                'business_password' => 'required|min:5|max:20',
                'section_id' => 'required',
                'phone' => 'required|string',
                'company_location' => 'required|string|max:150',
            ]);
    }
}
}
