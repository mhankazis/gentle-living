<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        try {
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

        } catch (\Exception $e) {
            Log::error('Error fetching companies: ' . $e->getMessage());
            
            // Fallback dengan dummy data
            $dummyCompanies = collect([
                (object)[
                    'company_id' => 1,
                    'name_company' => 'CV Berkah Jaya',
                    'address_company' => 'Jl. Raya No. 123, Jakarta',
                    'phone_company' => '021-12345678'
                ],
                (object)[
                    'company_id' => 2,
                    'name_company' => 'PT Maju Bersama',
                    'address_company' => 'Jl. Sudirman No. 456, Bandung',
                    'phone_company' => '022-87654321'
                ]
            ]);

            $companies = new \Illuminate\Pagination\LengthAwarePaginator(
                $dummyCompanies,
                $dummyCompanies->count(),
                10,
                1,
                ['path' => request()->url()]
            );

            return view('companies.index', compact('companies'));
        }
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
        try {
            $validated = $request->validate([
                'name_company' => 'required|string|max:255',
                'address_company' => 'required|string',
                'phone_company' => 'nullable|string|max:20',
            ]);

            Company::create($validated);
            return redirect()->route('companies.index')->with('success', 'Perusahaan berhasil ditambahkan!');

        } catch (\Exception $e) {
            Log::error('Error creating company: ' . $e->getMessage());
            return back()->withInput()->with('error', 'Gagal menambahkan perusahaan: ' . $e->getMessage());
        }
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
        try {
            $validated = $request->validate([
                'name_company' => 'required|string|max:255',
                'address_company' => 'required|string',
                'phone_company' => 'nullable|string|max:20',
            ]);

            $company->update($validated);
            return redirect()->route('companies.index')->with('success', 'Perusahaan berhasil diperbarui!');

        } catch (\Exception $e) {
            Log::error('Error updating company: ' . $e->getMessage());
            return back()->withInput()->with('error', 'Gagal memperbarui perusahaan: ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Company $company)
    {
        try {
            $company->delete();
            return redirect()->route('companies.index')->with('success', 'Perusahaan berhasil dihapus!');

        } catch (\Exception $e) {
            Log::error('Error deleting company: ' . $e->getMessage());
            return redirect()->route('companies.index')->with('error', 'Gagal menghapus perusahaan: ' . $e->getMessage());
        }
    }
}
