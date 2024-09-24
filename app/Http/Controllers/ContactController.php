<?php

namespace App\Http\Controllers;

use App\Mail\ContactMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function submit(Request $request)
    {
        // dd('hii');
        // Validate the form data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:contact,email',
            'message' => 'required|string',
            'subject'=>'required'
        ]);
        \DB::table('contact')->insert([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'subject' => $validatedData['subject'],
            'message' => $validatedData['message'],
            'created_at' => now(),
            'updated_at' => now()
        ]);



        Mail::to('sonibalmukund27@gmail.com')->send(new ContactMail($validatedData));

        return back()->with('success', 'Your message has been sent!');
    }

    public function index(){
        return view('components.contact');
    }
}
