<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Company::query();

        // Search functionality
        if ($request->has('search') && $request->search) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('name_company', 'like', "%{$search}%")
                  ->orWhere('phone_company', 'like', "%{$search}%")
                  ->orWhere('address_company', 'like', "%{$search}%");
            });
        }

        $companies = $query->paginate(10);

        return view('companies.index', compact('companies'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('companies.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name_company' => 'required|string|max:255',
            'address_company' => 'required|string',
            'phone_company' => 'nullable|string|max:20',
        ]);

        Company::create($request->all());

        return redirect()->route('companies.index')
                         ->with('success', 'Company created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Company $company)
    {
        return view('companies.show', compact('company'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Company $company)
    {
        return view('companies.edit', compact('company'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Company $company)
    {
        $request->validate([
            'name_company' => 'required|string|max:255',
            'address_company' => 'required|string',
            'phone_company' => 'nullable|string|max:20',
        ]);

        $company->update($request->all());

        return redirect()->route('companies.index')
                         ->with('success', 'Company updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Company $company)
    {
        $company->delete();

        return redirect()->route('companies.index')
                         ->with('success', 'Company deleted successfully.');
    }
}
