<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Company;
use App\Models\Technology;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CompanyController extends Controller
{
    public function index()
    {
        $companies = Company::with('category')->get();
        return view('companies.index', compact('companies'));
    }

    public function create()
    {
        $categories = Category::all();
        $technologies = Technology::all();
        return view('companies.create', compact('categories', 'technologies'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'logo' => 'required|file|mimes:jpg,png,jpeg|max:2048',
            'category_id' => 'required|exists:categories,id',
            'technologies' => 'nullable|array',
            'technologies.*' => 'exists:technologies,id',
        ]);

        $logoPath = null;
        if ($request->hasFile('logo')) {
            $logoPath = $request->file('logo')->store('logos', 'public');
        }

        $company = Company::create([
            'name' => $request->name,
            'logo' => $logoPath,
            'category_id' => $request->category_id,
            'website_url' => $request->website_url,
            'hh_url' => $request->hh_url,
            'linkedin_url' => $request->linkedin_url,
        ]);

        $company->technologies()->sync($request->technologies);

        return redirect()->route('companies.index')->with('success', 'Company created successfully.');
    }

    public function edit(Company $company)
    {
        $categories = Category::all();
        $technologies = Technology::all();
        return view('companies.edit', compact('company', 'categories', 'technologies'));
    }

    public function update(Request $request, Company $company)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'logo' => 'nullable|file|mimes:jpg,png,jpeg|max:2048',
            'category_id' => 'required|exists:categories,id',
            'technologies' => 'nullable|array',
            'technologies.*' => 'exists:technologies,id',
        ]);

        $logoPath = $company->logo;
        if ($request->hasFile('logo')) {
            if ($company->logo) {
                Storage::disk('public')->delete($company->logo);
            }
            $logoPath = $request->file('logo')->store('logos', 'public');
        }

        $company->update([
            'name' => $request->name,
            'logo' => $logoPath,
            'category_id' => $request->category_id,
            'website_url' => $request->website_url,
            'hh_url' => $request->hh_url,
            'linkedin_url' => $request->linkedin_url,
        ]);

        $company->technologies()->sync($request->technologies);

        return redirect()->route('companies.index')->with('success', 'Company updated successfully.');
    }

    public function destroy(Company $company)
    {
        $company->delete();
        return redirect()->route('companies.index');
    }
}
