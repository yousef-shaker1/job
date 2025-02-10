<?php

namespace App\Livewire;

use App\Models\Section;
use Livewire\Component;
use App\Models\love_job;
use App\Models\Position;
use App\Models\UserProfile;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;

class JobsAll extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $section_id;
    public $job_types = [];
    public $experience_years = [];
    public $company_location = '';
    public $sections = [];
    public $salaryFrom;
    public $salaryTo;
    public $job_name;
    public $country;

    protected $listeners = ['salaryRangeUpdated'];

    public function mount()
    {
        $this->sections = Section::select('id', 'name')->get();
        $this->job_name = $this->job_name ?? '';
        $this->company_location = $this->country ?? '';
        $this->section_id = is_numeric($this->section_id) ? (int) $this->section_id : '';
        $this->job_types = [];
        $this->experience_years = [];
        $this->salaryTo = null;
        $this->salaryFrom = null;
    }

    public function save()
    {
        $this->render();
    }

    public function render()
    {
        $query = Position::query()
            ->join('hr_accounts', 'positions.hr_id', '=', 'hr_accounts.id')
            ->select('positions.*', 'hr_accounts.company_location')
            ->where('is_expired', 0);

        if (!empty($this->section_id)) {
            $query->where('positions.section_id', $this->section_id);
        }

        if (!empty($this->company_location)) {
            $query->where('hr_accounts.company_location', 'LIKE', '%' . $this->company_location . '%');
        } elseif (!empty($this->country)) {
            $query->where('hr_accounts.company_location', 'LIKE', "%{$this->country}%");
        }

        if (!empty($this->job_name)) {
            $query->where('positions.job_title', 'LIKE', "%{$this->job_name}%");
        }

        if (!is_null($this->salaryFrom) && !is_null($this->salaryTo)) {
            $query->whereBetween('positions.salary', [$this->salaryFrom, $this->salaryTo]);
        }

        if (!empty($this->job_types)) {
            $query->whereIn('positions.employment_type', $this->job_types);
        }

        if (!empty($this->experience_years)) {
            $query->whereIn('positions.experience_years', $this->experience_years);
        }

        $jobs = $query->paginate(8);

        $love_jobs = [];
        if (Auth::check()) {
            $love_jobs = love_job::where('user_id', Auth::id())
                ->whereIn('job_id', $jobs->pluck('id')->toArray())
                ->pluck('job_id')
                ->toArray();
        }

        $check_user = Auth::check() ? UserProfile::where('user_id', Auth::user()->id)->exists() : false;

        return view('livewire.jobs-all', [
            'jobs' => $jobs,
            'love_jobs' => $love_jobs,
            'check_user' => $check_user,
        ]);
    }
}
