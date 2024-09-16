<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\HrAccount;
use Illuminate\Support\Facades\Auth;

class EditProfileHr extends Component
{
    public $hr;
    public $isEditing = false;

    public $first_name;
    public $last_name;
    public $business_email;
    public $company_name;
    public $phone;
    public $company_location;

    public function mount($hr)
    {
        $this->hr = $hr;
        $this->first_name = $hr->first_name;
        $this->last_name = $hr->last_name;
        $this->company_name = $hr->company_name;
        $this->business_email = $hr->business_email;
        $this->phone = $hr->phone;
        $this->company_location = $hr->company_location;
    }

    public function editform()
    {
        $this->isEditing = true;
    }

    public function save()
    {
        $this->validate([
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'business_email' => 'required|email',
            'phone' => 'required|string',
            'company_location' => 'required|string',
        ]);

        HrAccount::findorfail(Auth::user()->hrAccount->id)->update([
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'business_email' => $this->business_email,
            'company_name' => $this->company_name,
            'phone' => $this->phone,
            'company_location' => $this->company_location,
        ]);
        return redirect()->route('view_profile_hr');
    }

    public function render()
    {
        return view('livewire.edit-profile-hr');
    }
}
