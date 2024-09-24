<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    //
    public function index($id)
    {
        $student = Student::findOrFail($id);
        return view('student.profile',compact('student'));
    }
    public function store(Request $request)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'full_name' => 'required|string|max:255',
            'username' => 'required|string|max:255',
            'email' => 'required|email',
            'profile_photo' => 'nullable|image|max:2048',
            'password' => 'nullable|string|min:8|confirmed', // Validation for password
            'gender' => 'nullable|in:male,female,other', // Assuming gender has specific values
            'city' => 'nullable|string|max:255',
            'state' => 'nullable|string|max:255',
            'contact_number' => 'nullable|digits:10',
        ]);

        if ($request->filled('password')) {
            $validatedData['password'] = Hash::make($request->password);
        }

        if ($request->hasFile('profile_photo')) {
            $validatedData['profile_photo'] = $request->file('profile_photo')->store('profile_photos', 'public');
        }
        $student = Student::findOrFail($request->student_id);
        $student->update($validatedData);

        return redirect()->route('student.dashboard', $student->id)
            ->with('success', 'Student information updated successfully.');
    }
}
