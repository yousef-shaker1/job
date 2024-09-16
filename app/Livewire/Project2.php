<?php

namespace App\Livewire;

use Livewire\Component;

class Project2 extends Component
{
    public $showProjectForm = false;

    public function render()
    {
        return view('livewire.project2');
    }
    public function add_project2(){
        $this->showProjectForm = true;
    }
    public function del_project2(){
        $this->showProjectForm = false;
    }
}
