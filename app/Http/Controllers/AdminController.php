<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        try {
            $query = User::with('company');

            // Search functionality
            if ($request->has('search') && $request->search) {
                $search = $request->search;
                $query->where(function($q) use ($search) {
                    $q->where('name', 'like', "%{$search}%")
                      ->orWhere('email', 'like', "%{$search}%")
                      ->orWhere('phone', 'like', "%{$search}%")
                      ->orWhereHas('company', function($companyQuery) use ($search) {
                          $companyQuery->where('name_company', 'like', "%{$search}%");
                      });
                });
            }

            $admins = $query->paginate(10);
            return view('admins.index', compact('admins'));

        } catch (\Exception $e) {
            Log::error('Error fetching admins: ' . $e->getMessage());
            
            // Fallback dengan dummy data
            $dummyAdmins = collect([
                (object)[
                    'user_id' => 1,
                    'id' => 1, // For backward compatibility with views
                    'name' => 'Admin Utama',
                    'email' => 'admin@gentlebaby.com',
                    'phone' => '081234567890',
                    'created_at' => now()
                ],
                (object)[
                    'user_id' => 2,
                    'id' => 2, // For backward compatibility with views
                    'name' => 'Kasir 1',
                    'email' => 'kasir1@gentlebaby.com',
                    'phone' => '081234567891',
                    'created_at' => now()
                ]
            ]);

            $admins = new \Illuminate\Pagination\LengthAwarePaginator(
                $dummyAdmins,
                $dummyAdmins->count(),
                10,
                1,
                ['path' => request()->url()]
            );

            return view('admins.index', compact('admins'));
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $companies = Company::all();
        return view('admins.create', compact('companies'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|email|unique:master_users,email',
                'password' => 'required|string|min:8|confirmed',
                'phone' => 'nullable|string|max:20',
                'company_id' => 'required|exists:master_companies,company_id',
            ]);

            $validated['password'] = Hash::make($validated['password']);

            User::create($validated);
            return redirect()->route('admins.index')->with('success', 'Admin berhasil ditambahkan!');

        } catch (\Exception $e) {
            Log::error('Error creating admin: ' . $e->getMessage());
            return back()->withInput()->with('error', 'Gagal menambahkan admin: ' . $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(User $admin)
    {
        return view('admins.show', compact('admin'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $admin)
    {
        $companies = Company::all();
        return view('admins.edit', compact('admin', 'companies'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $admin)
    {
        try {
            $rules = [
                'name' => 'required|string|max:255',
                'email' => 'required|email|unique:master_users,email,' . $admin->user_id . ',user_id',
                'phone' => 'nullable|string|max:20',
                'company_id' => 'required|exists:master_companies,company_id',
            ];

            // Only validate password if it's provided
            if ($request->filled('password')) {
                $rules['password'] = 'string|min:8|confirmed';
            }

            $validated = $request->validate($rules);

            // Hash password if provided
            if ($request->filled('password')) {
                $validated['password'] = Hash::make($validated['password']);
            } else {
                unset($validated['password']);
            }

            $admin->update($validated);
            return redirect()->route('admins.index')->with('success', 'Admin berhasil diperbarui!');

        } catch (\Exception $e) {
            Log::error('Error updating admin: ' . $e->getMessage());
            return back()->withInput()->with('error', 'Gagal memperbarui admin: ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $admin)
    {
        try {
// Prevent deleting the last admin
if (User::count() <= 1) {
    return redirect()->route('admins.index')->with('error', 'Tidak dapat menghapus admin terakhir!');
}
// Prevent deleting current user
if (Auth::check() && $admin->user_id === Auth::id()) {
    return redirect()->route('admins.index')->with('error', 'Tidak dapat menghapus akun sendiri!');
}

$admin->delete();
return redirect()->route('admins.index')->with('success', 'Admin berhasil dihapus!');

        } catch (\Exception $e) {
            Log::error('Error deleting admin: ' . $e->getMessage());
            return redirect()->route('admins.index')->with('error', 'Gagal menghapus admin: ' . $e->getMessage());
        }
    }
}
