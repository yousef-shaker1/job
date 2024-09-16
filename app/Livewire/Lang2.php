<?php

namespace App\Livewire;

use Livewire\Component;

class Lang2 extends Component
{
    public $showLangForm = false;
    public function render()
    {
        return view('livewire.lang2');
    }

    public function add_lang2(){
        $this->showLangForm = true;
    }

    public function del_lang2(){
        $this->showLangForm = false;
    }
}
