<?php

namespace App\Livewire;

use App\Models\Section;
use Livewire\Component;
use App\Models\Position;
use Livewire\WithPagination;

class Internship extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $search;
    public $selectedSection = null;

    public function getSectionsProperty()
    {
        return Section::all();
    }
    
    public function show_all()
    {
        $this->selectedSection = null;
    }
    
    public function getInternshipsProperty()
    {
        if ($this->selectedSection) {
            return Position::where('section_id', $this->selectedSection)->where('job_title', 'like', "%{$this->search}%")->where('employment_type', 'training')->paginate(3);
        }
        return Position::where('employment_type', 'training')->where('job_title', 'like', "%{$this->search}%")->paginate(3);
    }
    public function render()
    {
        return view('livewire.internship', [
            'sections' => $this->sections,
            'internships' => $this->internships,
        ]);
    }
}
