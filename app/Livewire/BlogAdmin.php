<?php

namespace App\Livewire;

use App\Models\blog;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class BlogAdmin extends Component
{
    use WithPagination;
    use WithFileUploads;
    public $title, $img,$id, $body;

    public function render()
    {
        $blogs = blog::paginate(6);
        return view('livewire.blog-admin', compact('blogs'));
    }

    public function rules(){
        return [
            'img' => 'required|image',
            'title' => 'required|max:50',
            'body' => 'required|max:600|min:20',
        ];
    }
    public function updateRules(){
        return [
            'img' => 'nullable',
            'title' => 'nullable|max:50',
            'body' => 'nullable|max:600|min:20',
        ];
    }

    
    public function updated($fields){
        return $this->validateOnly($fields);
    }

    public function saveBlog(){
        $validateData = $this->validate();
        $path = $this->img->store('blogs', 'public');

        blog::create([
            'img' => $path,
            'title' => $validateData['title'],
            'body' => $validateData['body'],
        ]);
        session()->flash('message', 'create blog success');
        $this->resetInput();
        $this->dispatch('close-modal');
    }

    public function editBlog(int $id){
        $blog = blog::findorfail($id);
        if($blog){
            $this->id = $blog->id;
            $this->img = $blog->img;
            $this->title = $blog->title;
            $this->body = $blog->body;
        }
    }
    public function deleteBlog(int $id){
        $blog = blog::findorfail($id);
        if($blog){
            $this->id = $blog->id;
            $this->title = $blog->title;
        }
    }



    public function updateBlog(){
        $validationDate = $this->validate($this->updateRules());
        $blog = blog::findorfail($this->id);
        if ($this->img instanceof UploadedFile) {
            if(!empty($this->img) && Storage::disk('public')->exists($blog->img)){
                Storage::disk('public')->delete($blog->img);
            }
            $path = $this->img->store('blogs', 'public');
            $blog->img = $path;
        }
        $blog->title = $validationDate['title'];
        $blog->body = $validationDate['body'];
        $blog->save();
        session()->flash('message', 'blog updated Successfully');
        $this->resetInput();
        $this->dispatch('close-modal');
    }

    public function destroyBlog(){
        $blog = blog::findorfail($this->id);
        if(!empty($this->img) && Storage::disk('public')->exists($blog->img)){
            Storage::disk('public')->delete($blog->img);
        }
        $blog->delete();
        session()->flash('delete', 'blog updated Successfully');
        $this->resetInput();
        $this->dispatch('close-modal');
    }


    public function CloseModal(){
        return $this->resetInput();
    }
    
    public function resetInput(){
        $this->img = '';
        $this->title = '';
        $this->body = '';
    }

}
