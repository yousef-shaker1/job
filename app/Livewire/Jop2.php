<?php

namespace App\Livewire;

use Livewire\Component;

class Jop2 extends Component
{
    public $showJobForm2 = false;
    public $type_jop2 = '';
    public $company_name2 = '';
    public $Job_summary2 = '';
    public $start_date_month2 = '';
    public $start_date_year2 = '';
    public $end_date_month2 = '';
    public $end_date_year2 = '';
    public function render()
    {
        return view('livewire.jop2');
    }

    public function add_job2(){
        $this->showJobForm2 = true;
    }

    public function del_jop2()
{
    $this->showJobForm2 = false;
    // إعادة تعيين القيم
    $this->type_jop2 = '';
    $this->company_name2 = '';
    $this->Job_summary2 = '';
    $this->start_date_month2 = '';
    $this->start_date_year2 = '';
    $this->end_date_month2 = '';
    $this->end_date_year2 = '';
}

}
