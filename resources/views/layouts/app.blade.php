<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ERP System</title>
    @vite('resources/css/app.css')
</head>
<body class="font-sans antialiased bg-gray-100 text-gray-900 min-h-screen flex flex-col">
    {{-- Navigation Bar --}}
    <nav class="bg-white shadow-sm py-4">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex justify-between items-center">
            {{-- Logo/Brand Link --}}
            <div class="flex items-center">
                <a href="{{ route('dashboard') }}" class="text-2xl font-bold text-gray-800 mr-8 hover:text-indigo-600 transition duration-150 ease-in-out">
                    ERP System
                </a>
                {{-- Main Navigation Links (Desktop) --}}
                <div class="hidden md:flex space-x-6">
                    @auth {{-- Only show these links if a user is logged in --}}
                        <a href="{{ route('dashboard') }}" class="text-gray-600 hover:text-gray-900 px-3 py-2 rounded-md text-sm font-medium transition duration-150 ease-in-out">Dashboard</a>
                        {{-- Only Superadmin can see Role Management --}}
                        @if (Auth::check() && Auth::user()->role->role_name == 'Superadmin')
                            <a href="{{ route('roles.index') }}" class="text-gray-600 hover:text-gray-900 px-3 py-2 rounded-md text-sm font-medium transition duration-150 ease-in-out">Roles</a>
                            <a href="{{ route('users.index') }}" class="text-gray-600 hover:text-gray-900 px-3 py-2 rounded-md text-sm font-medium transition duration-150 ease-in-out">Users</a>
                        @endif
                        <a href="{{ route('clients.index') }}" class="text-gray-600 hover:text-gray-900 px-3 py-2 rounded-md text-sm font-medium transition duration-150 ease-in-out">Clients</a>
                        <a href="{{ route('orders.index') }}" class="text-gray-600 hover:text-gray-900 px-3 py-2 rounded-md text-sm font-medium transition duration-150 ease-in-out">Orders</a>
                    @endauth
                </div>
            </div>

            {{-- User Info and Logout (Desktop) --}}
            <div class="hidden md:flex items-center">
                @auth
                    <span class="text-gray-700 text-sm font-medium mr-4">Welcome, <span class="font-semibold">{{ Auth::user()->username }}</span></span>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="bg-red-500 hover:bg-red-600 text-white font-bold py-1.5 px-3 rounded-lg text-sm transition duration-300 ease-in-out shadow-sm">
                            Logout
                        </button>
                    </form>
                @else
                    {{-- Show login/register links if not authenticated --}}
                    <a href="{{ route('login') }}" class="text-gray-600 hover:text-gray-900 px-3 py-2 rounded-md text-sm font-medium">Login</a>
                    <a href="{{ route('register') }}" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-1.5 px-3 rounded-lg text-sm transition duration-300 ease-in-out shadow-sm">Register</a>
                @endauth
            </div>

            {{-- Mobile Menu Button (Hamburger) --}}
            <div class="md:hidden flex items-center">
                <button id="mobile-menu-button" class="text-gray-500 hover:text-gray-700 focus:outline-none focus:text-gray-700">
                    <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                </button>
            </div>
        </div>

        {{-- Mobile Menu (Hidden by default) --}}
        <div id="mobile-menu" class="hidden md:hidden px-2 pt-2 pb-3 space-y-1 sm:px-3">
            @auth
                <a href="{{ route('dashboard') }}" class="text-gray-600 hover:bg-gray-50 hover:text-gray-900 block px-3 py-2 rounded-md text-base font-medium">Dashboard</a>
                @if (Auth::check() && Auth::user()->role->role_name == 'Superadmin')
                    <a href="{{ route('roles.index') }}" class="text-gray-600 hover:bg-gray-50 hover:text-gray-900 block px-3 py-2 rounded-md text-base font-medium">Roles</a>
                @endif
                <a href="{{ route('clients.index') }}" class="text-gray-600 hover:bg-gray-50 hover:text-gray-900 block px-3 py-2 rounded-md text-base font-medium">Clients</a>
                <a href="{{ route('orders.index') }}" class="text-gray-600 hover:bg-gray-50 hover:text-gray-900 block px-3 py-2 rounded-md text-base font-medium">Orders</a>
                <div class="border-t border-gray-200 pt-4">
                    <div class="px-3 text-gray-700 text-sm font-medium">Logged in as: <span class="font-semibold">{{ Auth::user()->username }}</span></div>
                    <form action="{{ route('logout') }}" method="POST" class="mt-2">
                        @csrf
                        <button type="submit" class="block w-full text-left bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-3 rounded-lg text-sm transition duration-300 ease-in-out">
                            Logout
                        </button>
                    </form>
                </div>
            @else
                <a href="{{ route('login') }}" class="text-gray-600 hover:bg-gray-50 hover:text-gray-900 block px-3 py-2 rounded-md text-base font-medium">Login</a>
                <a href="{{ route('register') }}" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-3 rounded-lg text-base block text-center transition duration-300 ease-in-out">Register</a>
            @endauth
        </div>
    </nav>

    {{-- Main Content Area --}}
    <main class="flex-grow py-6">
        @yield('content')
    </main>

    {{-- Simple Footer --}}
    <footer class="bg-white shadow-sm py-4 mt-auto">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center text-gray-500 text-sm">
            &copy; {{ date('Y') }} ERP System. All rights reserved.
        </div>
    </footer>

    {{-- JavaScript for Mobile Menu Toggle --}}
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const mobileMenuButton = document.getElementById('mobile-menu-button');
            const mobileMenu = document.getElementById('mobile-menu');

            if (mobileMenuButton && mobileMenu) {
                mobileMenuButton.addEventListener('click', function () {
                    mobileMenu.classList.toggle('hidden');
                });
            }
        });
    </script>
    @vite('resources/js/app.js')
</body>
</html>
