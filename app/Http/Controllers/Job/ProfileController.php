<?php

namespace App\Http\Controllers\Job;

use App\Http\Controllers\Controller;
use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    //
    public function index($id)
    {
        $company = Company::findOrFail($id);
        return view('company.profile',compact('company'));
    }
    public function store(Request $request)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'website' => 'required|url',
            'email' => 'required|email',
            'logo' => 'nullable|image|max:2048',
            'password' => 'nullable|string|min:8|confirmed', // Validation for password
            'linkedin_url' => 'nullable|url',
            'updated_at' => now(),
        ]);

        if ($request->filled('password')) {
            $validatedData['password'] = Hash::make($request->password);
        }

        if ($request->hasFile('logo')) {
            $validatedData['logo'] = $request->file('logo')->store('logos', 'public');
        }
        $company = Company::findOrFail($request->company_id);
        $company->update($validatedData);

        return redirect()->route('company.dashboard', $company->id)
            ->with('success', 'Company information updated successfully.');
    }
}
