<?php

namespace App\Http\Controllers\Job;

use App\Http\Controllers\Controller;
use App\Models\Company;
use Illuminate\Http\Request;
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
        return view('auth.companyregister');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validated = $request->validate([
            'email' => 'required|email|unique:companies,email',
            'name' => 'required',
            'password' => 'required|confirmed|min:6',
            'website' => 'nullable', // If website is optional
            'logo' => 'nullable|image|mimes:jpg,png,jpeg,gif,svg|max:2048', // Allow null values
        ]);

        $logoPath = null;  // Default value if no logo is provided

// Check if the logo is uploaded
        if ($request->hasFile('logo')) {
            // Store the logo in the 'public/logos' directory
            $logoPath = $request->file('logo')->store('logos', 'public');  // Store in 'storage/app/public/logos'
        }


        // Create the new student
        Company::create([
            'email' => $validated['email'],
            'name' => $validated['name'],
            'password' => Hash::make($validated['password']), // Hash the password
            'website' => $validated['website'],
            'logo' => $logoPath,
        ]);
        // Redirect or show success message
        return redirect()->route('company.dashboard')->with('success', 'Registration successful.');
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
