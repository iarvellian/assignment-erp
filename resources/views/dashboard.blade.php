@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gray-100">
    {{-- Main Content Area --}}
    <main class="py-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            {{-- Success/Error Messages --}}
            @if (session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                    <span class="block sm:inline">{{ session('success') }}</span>
                </div>
            @endif

            @if (session('error'))
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                    <span class="block sm:inline">{{ session('error') }}</span>
                </div>
            @endif

            {{-- Dashboard Content Card --}}
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                <h2 class="text-3xl font-semibold text-gray-800 mb-6">Dashboard Overview</h2>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    {{-- Card 1: Roles & Users (Superadmin Only) --}}
                    @if (Auth::check() && Auth::user()->role->role_name == 'Superadmin')
                        <div class="bg-purple-50 p-6 rounded-lg shadow-md flex flex-col items-center justify-center text-center">
                            <svg class="w-16 h-16 text-purple-600 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H9m12-11a2 2 0 01-2 2H7a2 2 0 01-2-2V5a2 2 0 012-2h10a2 2 0 012 2v6zm-3 6h.01"></path></svg>
                            <h3 class="text-xl font-semibold text-purple-800 mb-2">Manage Roles</h3>
                            <p class="text-gray-700 mb-4">Create, update, and delete user roles.</p>
                            <a href="{{ route('roles.index') }}" class="bg-purple-600 hover:bg-purple-700 text-white font-bold py-2 px-4 rounded-lg shadow-md transition duration-300 ease-in-out">
                                Go to Roles
                            </a>
                        </div>
                        <div class="bg-yellow-50 p-6 rounded-lg shadow-md flex flex-col items-center justify-center text-center">
                            <svg class="w-16 h-16 text-yellow-600 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H9m12-11a2 2 0 01-2 2H7a2 2 0 01-2-2V5a2 2 0 012-2h10a2 2 0 012 2v6zm-3 6h.01"></path></svg>
                            <h3 class="text-xl font-semibold text-yellow-800 mb-2">Manage Users</h3>
                            <p class="text-gray-700 mb-4">Create, update, and delete user accounts and assign roles.</p>
                            <a href="{{ route('users.index') }}" class="bg-yellow-600 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded-lg shadow-md transition duration-300 ease-in-out">
                                Go to Users
                            </a>
                        </div>
                    @endif

                    {{-- Card 2: Clients --}}
                    <div class="bg-blue-50 p-6 rounded-lg shadow-md flex flex-col items-center justify-center text-center">
                        <svg class="w-16 h-16 text-blue-600 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h-5m-5 0h10a2 2 0 002-2V8a2 2 0 00-2-2h-2.5a1 1 0 01-.8-.4L10 3.2A1 1 0 009.2 3H7a2 2 0 00-2 2v13a2 2 0 002 2z"></path></svg>
                        <h3 class="text-xl font-semibold text-blue-800 mb-2">Manage Clients</h3>
                        <p class="text-gray-700 mb-4">View, add, edit, and delete client records.</p>
                        <a href="{{ route('clients.index') }}" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-lg shadow-md transition duration-300 ease-in-out">
                            Go to Clients
                        </a>
                    </div>

                    {{-- Card 3: Orders --}}
                    <div class="bg-green-50 p-6 rounded-lg shadow-md flex flex-col items-center justify-center text-center">
                        <svg class="w-16 h-16 text-green-600 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                        <h3 class="text-xl font-semibold text-green-800 mb-2">Manage Orders</h3>
                        <p class="text-gray-700 mb-4">Handle order details and generate reports.</p>
                        <a href="{{ route('orders.index') }}" class="bg-green-600 hover:bg-green-700 text-white font-bold py-2 px-4 rounded-lg shadow-md transition duration-300 ease-in-out">
                            Go to Orders
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </main>
</div>
@endsection
