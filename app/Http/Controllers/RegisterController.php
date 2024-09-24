<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Container\Attributes\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth as FacadesAuth;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $student = FacadesAuth::guard('student')->user();
        return view('auth.register',compact('student'));
    }

    /**
     * Store a newly created resource in storage.
     */
        public function store(Request $request)
        {
            //
            $validated = $request->validate([
                'email' => 'required|email|unique:students,email',
                'username' => 'required|unique:students,username',
                'password' => 'required|confirmed|min:6',
                'full_name' => 'required',
                'gender' => 'nullable',
                'city' => 'nullable|string',
                'state' => 'nullable|string',
                'contact_number' => 'required|string|max:15',
            ]);

            // Create the new student
            Student::create([
                'email' => $validated['email'],
                'username' => $validated['username'],
                'password' => Hash::make($validated['password']), // Hash the password
                'full_name' => $validated['full_name'],
                'gender' => $validated['gender'],
                'city' => $validated['city'],
                'state' => $validated['state'],
                'contact_number'=>$validated['contact_number'],
            ]);
            // dd($validated);
            // Redirect or show success message
            return redirect()->route('student.dashboard')->with('success', 'Registration successful.');
        }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
