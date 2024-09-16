<?php

namespace App\Livewire;

use App\Models\Section;
use Livewire\Component;
use Livewire\WithPagination;

class SectionJob extends Component
{
    use WithPagination;
    public $id;
    public $name;
    public function render()
    {
        $sections = Section::paginate(7);
        return view('livewire.section-job', compact('sections'));
    }

    public function rules (){
        return [
            'name' => 'required',
        ];
    }

    public function updated($fields){
        $this->validateOnly($fields);
    }

    public function editSection(int $id)
    {
        $section = Section::find($id);
        if ($section) {
            $this->name = $section->name;
            $this->id = $section->id;
        } else {
            // إذا لم يتم العثور على القسم، يمكنك عرض رسالة خطأ أو اتخاذ إجراء آخر
            session()->flash('error', 'Section not found.');
        }
    }
    
    public function deleteSection(int $id)
    {
        $section = section::find($id);
        if($section){
            $this->name = $section->name;
            $this->id = $section->id;
        } else {
            return redirect()->back();
        }
    }

    
    public function saveSection(){
        $validateData = $this->validate();
        $this->validate();
        Section::create([
            'name' => $validateData['name'],
        ]);
        session()->flash('message', 'section created Successfully');
        $this->resetInput();
        $this->dispatch('close-modal');
    }

    public function updateStudent()
    {
        $validator = $this->validate();
        $section = Section::find($this->id)->update([
            'name' => $validator['name'],
        ]);
            
        session()->flash('message', 'section updated Successfully');
        $this->resetInput();
        $this->dispatch('close-modal');
    }

    public function destroyStudent(){
        $section = section::find($this->id)->delete();
        
        session()->flash('message', 'section updated Successfully');
        $this->resetInput();
        $this->dispatch('close-modal');
    }


    public function closeModal()
    {
        $this->resetInput();
    }

    public function resetInput()
    {
        $this->name = '';
        $this->id = '';
    }
}
