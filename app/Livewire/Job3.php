<?php

namespace App\Livewire;

use Livewire\Component;

class Job3 extends Component
{
    public $showJobForm3 = false;
    public $type_jop3 = '';
    public $company_name3 = '';
    public $Job_summary3 = '';
    public $start_date_month3 = '';
    public $start_date_year3 = '';
    public $end_date_month3 = '';
    public $end_date_year3 = '';
    public function render()
    {
        return view('livewire.job3');
    }

    public function add_job3(){
        $this->showJobForm3 = true;
    }

    public function del_jop3()
{
    $this->showJobForm3 = false;
    // إعادة تعيين القيم
    $this->type_jop3 = '';
    $this->company_name3 = '';
    $this->Job_summary3 = '';
    $this->start_date_month3 = '';
    $this->start_date_year3 = '';
    $this->end_date_month3 = '';
    $this->end_date_year3 = '';
}

}
