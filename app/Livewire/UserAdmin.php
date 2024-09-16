<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\UserProfile;
use Livewire\WithPagination;

class UserAdmin extends Component
{
    use WithPagination;
    public function render()
    {
        $users = UserProfile::paginate(7);
        return view('livewire.user-admin',compact('users'));
    }
}
