<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use App\Http\Requests\CompanyRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Contracts\View\Factory;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Storage;

class CompanyController extends Controller
{
    public function companies(): View|Factory|Application
    {
        $companies = Company::with('category')->where('status', 'active')->paginate(10); // Paginated result

        return view(view: 'admin.companies', data: compact('companies'));
    }

    public function companyRequests(CompanyRequest $request): RedirectResponse
    {
        $logoPath = $this->uploadLogo($request);

        Company::create([
            'name' => $request->name,
            'logo' => $logoPath,
            'category_id' => $request->category_id,
            'website_url' => $request->website_url,
            'hh_url' => $request->hh_url,
            'linkedin_url' => $request->linkedin_url,
        ]);

        return redirect()->back()->with('success', 'Korxona qo’shish so’rovingiz muvaffaqiyatli qabul qilindi!');
    }

    public function inactive(Request $request): View|Factory|Application
    {
        $companies = Company::with('category')
            ->where('status', 'inactive')
            ->paginate(10);

        return view('companies.inactive', compact('companies'));
    }

    public function activate(Company $company): RedirectResponse
    {
        $company->update(['status' => 'active']);

        return redirect()->route('companies.inactive')->with('success', 'Company activated successfully!');
    }

    public function index(Request $request): View|Factory|Application
    {
        $search = $request->input('search');
        $companies = Company::with('category')
            ->when($search, function ($query) use ($search) {
                return $query->where('name', 'like', "%{$search}%");
            })
            ->where('status', 'active')
            ->paginate(10);

        return view('companies.index', compact('companies'));
    }

    public function create(): View|Factory|Application
    {
        $categories = Category::all();

        return view('companies.create', compact('categories'));
    }

    public function store(CompanyRequest $request): RedirectResponse
    {
        $logoPath = $this->uploadLogo($request);

        Company::create([
            'name' => $request->name,
            'logo' => $logoPath,
            'category_id' => $request->category_id,
            'website_url' => $request->website_url,
            'hh_url' => $request->hh_url,
            'linkedin_url' => $request->linkedin_url,
        ]);

        return redirect()->route('companies.index')->with('success', 'Company created successfully.');
    }

    public function edit(Company $company): View|Factory|Application
    {
        $categories = Category::all();

        return view('companies.edit', compact('company', 'categories'));
    }

    public function update(CompanyRequest $request, Company $company): RedirectResponse
    {
        $logoPath = $company->logo;
        if ($request->hasFile('logo')) {
            if ($company->logo) {
                Storage::disk('public')->delete($company->logo);
            }
            $logoPath = $this->uploadLogo($request);
        }

        $company->update([
            'name' => $request->name,
            'logo' => $logoPath,
            'category_id' => $request->category_id,
            'website_url' => $request->website_url,
            'hh_url' => $request->hh_url,
            'linkedin_url' => $request->linkedin_url,
        ]);

        return redirect()->route('companies.index')->with('success', 'Company updated successfully.');
    }

    public function destroy(Company $company): RedirectResponse
    {
        if ($company->logo) {
            Storage::disk('public')->delete($company->logo);
        }
        $company->delete();

        return redirect()->route('companies.index');
    }

    private function uploadLogo(Request $request): false|string|null
    {
        if ($request->hasFile('logo')) {
            return $request->file('logo')->store('logos', 'public');
        }

        return null;
    }
}
