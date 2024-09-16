<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\contact as save_form;
use App\Models\contact;

class ContactController extends Controller
{
    public function save_contact(save_form $request)
    {
        contact::create([
            'name' => $request->name,
            'email' => $request->email,
            'message' => $request->message,
        ]);
        session()->flash('message', 'send message success');
        return redirect()->back();
    }
}
