<?php

namespace App\Livewire;

use Livewire\Component;

class Project3 extends Component
{
    public $showProjectForm3 = false;
    public function render()
    {
        return view('livewire.project3');
    }
    public function add_project3(){
        $this->showProjectForm3 = true;
    }
    public function del_project3(){
        $this->showProjectForm3 = false;
    }

}
