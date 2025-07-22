<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:400,500,600&display=swap" rel="stylesheet" />
    
    <!-- Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased bg-gray-50">
    <div class="flex h-screen">
        <!-- Sidebar -->
        <div class="w-64 bg-white shadow-lg">
            <!-- Logo -->
            <div class="flex items-center justify-center h-16 px-4 bg-gray-900">
                <span class="text-white font-bold text-lg">Gentle Baby</span>
            </div>
            
            <!-- Navigation Menu -->
            <nav class="mt-8">
                <div class="px-4 space-y-2">
                    <!-- Beranda -->
                    <a href="{{ route('dashboard') }}" 
                       class="flex items-center px-4 py-3 text-gray-700 bg-gray-100 rounded-lg hover:bg-gray-200 transition-colors duration-200 {{ request()->routeIs('dashboard') ? 'bg-gray-200 text-gray-900' : '' }}">
                        <i class="fas fa-th-large mr-3"></i>
                        <span>Beranda</span>
                    </a>
                    
                    <!-- Data Produk -->
                    <a href="{{ route('products.index') }}" 
                       class="flex items-center px-4 py-3 text-gray-700 rounded-lg hover:bg-gray-200 transition-colors duration-200 {{ request()->routeIs('products.*') ? 'bg-gray-200 text-gray-900' : '' }}">
                        <i class="fas fa-box mr-3"></i>
                        <span>Data Produk</span>
                    </a>
                    
                    <!-- Data Transaksi -->
                    <a href="{{ route('transactions.index') }}" 
                       class="flex items-center px-4 py-3 text-gray-700 rounded-lg hover:bg-gray-200 transition-colors duration-200 {{ request()->routeIs('transactions.*') ? 'bg-gray-200 text-gray-900' : '' }}">
                        <i class="fas fa-exchange-alt mr-3"></i>
                        <span>Data Transaksi</span>
                    </a>
                    
                    <!-- Pemesanan Produk -->
                    <a href="{{ route('orders.index') }}" 
                       class="flex items-center px-4 py-3 text-gray-700 rounded-lg hover:bg-gray-200 transition-colors duration-200 {{ request()->routeIs('orders.*') ? 'bg-gray-200 text-gray-900' : '' }}">
                        <i class="fas fa-clipboard-list mr-3"></i>
                        <span>Pemesanan Produk</span>
                    </a>
                    
                    <!-- Data Perusahaan -->
                    <a href="{{ route('companies.index') }}" 
                       class="flex items-center px-4 py-3 text-gray-700 rounded-lg hover:bg-gray-200 transition-colors duration-200 {{ request()->routeIs('companies.*') ? 'bg-gray-200 text-gray-900' : '' }}">
                        <i class="fas fa-building mr-3"></i>
                        <span>Data Perusahaan</span>
                    </a>
                    
                    <!-- Data Admin -->
                    <a href="{{ route('admins.index') }}" 
                       class="flex items-center px-4 py-3 text-gray-700 rounded-lg hover:bg-gray-200 transition-colors duration-200 {{ request()->routeIs('admins.*') ? 'bg-gray-200 text-gray-900' : '' }}">
                        <i class="fas fa-users-cog mr-3"></i>
                        <span>Data Admin</span>
                    </a>
                    
                    <!-- Data Invoice -->
                    <a href="{{ route('invoices.index') }}" 
                       class="flex items-center px-4 py-3 text-gray-700 rounded-lg hover:bg-gray-200 transition-colors duration-200 {{ request()->routeIs('invoices.*') ? 'bg-gray-200 text-gray-900' : '' }}">
                        <i class="fas fa-file-invoice mr-3"></i>
                        <span>Data Invoice</span>
                    </a>
                </div>
            </nav>
        </div>

        <!-- Main Content -->
        <div class="flex-1 flex flex-col overflow-hidden">
            <!-- Top Header -->
            <header class="bg-white shadow-sm border-b border-gray-200">
                <div class="flex items-center justify-between px-6 py-4">
                    <div class="flex items-center space-x-4">
                        <button class="lg:hidden">
                            <i class="fas fa-bars text-gray-600"></i>
                        </button>
                        <h1 class="text-xl font-semibold text-gray-800">Gentle Baby</h1>
                    </div>
                    
                    <div class="flex items-center space-x-4">
                        <!-- User Profile Dropdown -->
                        <div class="relative" x-data="{ open: false }">
                            <button @click="open = !open" 
                                    class="flex items-center space-x-2 text-gray-700 hover:text-gray-900 focus:outline-none">
                                <span>{{ Auth::user()->name ?? 'Farid Angga' }}</span>
                                <i class="fas fa-user-circle text-xl"></i>
                                <i class="fas fa-chevron-down text-sm"></i>
                            </button>
                            
                            <div x-show="open" 
                                 @click.away="open = false"
                                 x-transition:enter="transition ease-out duration-100"
                                 x-transition:enter-start="transform opacity-0 scale-95"
                                 x-transition:enter-end="transform opacity-100 scale-100"
                                 x-transition:leave="transition ease-in duration-75"
                                 x-transition:leave-start="transform opacity-100 scale-100"
                                 x-transition:leave-end="transform opacity-0 scale-95"
                                 class="absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg py-1 z-50">
                                <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Profile</a>
                                <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Settings</a>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" 
                                            class="block w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                        Logout
                                    </button>
                                </form>
                            </div>
                        </div>
                        
                        <!-- Theme Toggle -->
                        <button class="p-2 text-gray-600 hover:text-gray-900">
                            <i class="fas fa-sun"></i>
                        </button>
                    </div>
                </div>
            </header>

            <!-- Page Content -->
            <main class="flex-1 overflow-y-auto bg-gray-50">
                <!-- Success/Error Messages -->
                @if(session('success'))
                    <div class="mx-6 mt-6 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                        <div class="flex items-center">
                            <i class="fas fa-check-circle mr-2"></i>
                            <span class="block sm:inline">{{ session('success') }}</span>
                        </div>
                        <span class="absolute top-0 bottom-0 right-0 px-4 py-3 cursor-pointer" onclick="this.parentElement.style.display='none'">
                            <i class="fas fa-times"></i>
                        </span>
                    </div>
                @endif

                @if(session('error'))
                    <div class="mx-6 mt-6 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                        <div class="flex items-center">
                            <i class="fas fa-exclamation-circle mr-2"></i>
                            <span class="block sm:inline">{{ session('error') }}</span>
                        </div>
                        <span class="absolute top-0 bottom-0 right-0 px-4 py-3 cursor-pointer" onclick="this.parentElement.style.display='none'">
                            <i class="fas fa-times"></i>
                        </span>
                    </div>
                @endif

                {{ $slot }}
            </main>
        </div>
    </div>

    <script src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
</body>
</html>
