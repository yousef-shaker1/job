<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\UserProfile as user;
use Illuminate\Support\Facades\Auth;

class UserProfile extends Component
{

    public $id;
    public $user;
    public $personal = true;
    public $educ = false;
    public $skills = false;
    public $projects = false;
    public $work = false;

    public function mount($id = null)
    {
        if (user::where('user_id', Auth::user()->id)->exists()) {
            $this->user = user::where('user_id', Auth::id())->first();
        } else {
            // إذا كان المستخدم مسجل دخول، استرجاع بيانات المستخدم الحالي
            $this->id = $id;
            $this->user = user::where('user_id', $id)->first();
            // dd($id);
        }
    }

    public function render()
    {
        return view('livewire.user-profile');
    }

    public function showPersonal()
    {
        $this->resetSections();
        $this->personal = true;
    }

    public function showProject()
    {
        $this->resetSections();
        $this->projects = true;
    }

    public function showEducation()
    {
        $this->resetSections();
        $this->educ = true;
    }

    public function showSkills()
    {
        $this->resetSections();
        $this->skills = true;
    }

    public function showWork()
    {
        $this->resetSections();
        $this->work = true;
    }

    private function resetSections()
    {
        $this->personal = false;
        $this->educ = false;
        $this->projects = false;
        $this->skills = false;
        $this->work = false;
    }
}
