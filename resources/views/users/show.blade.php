@extends('layouts.app')

@section('content')
<div class="container mx-auto p-4 sm:p-6 lg:p-8 flex items-center justify-center">
    <div class="bg-white p-8 rounded-lg shadow-xl w-full max-w-md">
        <h1 class="text-2xl font-extrabold mb-6 text-gray-900 text-center">User Details: <span class="text-indigo-600">{{ $user->username }}</span></h1>

        <div class="space-y-4">
            <div>
                <p class="text-gray-700 text-sm font-semibold mb-1">User ID:</p>
                <p class="text-gray-900 text-lg bg-gray-50 p-2 rounded-md">{{ $user->id_user }}</p>
            </div>
            <div>
                <p class="block text-gray-700 text-sm font-semibold mb-1">Username:</p>
                <p class="text-gray-900 text-lg bg-gray-50 p-2 rounded-md">{{ $user->username }}</p>
            </div>
            <div>
                <p class="block text-gray-700 text-sm font-semibold mb-1">Role:</p>
                <p class="text-gray-900 text-lg bg-gray-50 p-2 rounded-md">
                    <span class="px-2 inline-flex text-sm leading-5 font-semibold rounded-full
                        @if($user->role->role_name == 'Superadmin') bg-purple-100 text-purple-800
                        @elseif($user->role->role_name == 'Admin') bg-blue-100 text-blue-800
                        @else bg-green-100 text-green-800 @endif">
                        {{ $user->role->role_name ?? 'N/A' }}
                    </span>
                </p>
            </div>
        </div>

        <div class="flex items-center justify-between mt-8">
            <a href="{{ route('users.index') }}" class="inline-block align-baseline font-semibold text-sm text-gray-600 hover:text-gray-900 hover:underline transition duration-150 ease-in-out">
                Back to Users List
            </a>
            <a href="{{ route('users.edit', $user->id_user) }}" class="inline-flex items-center px-6 py-3 border border-transparent text-base font-medium rounded-lg shadow-sm text-white bg-yellow-600 hover:bg-yellow-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-yellow-500 transition duration-300 ease-in-out">
                <svg class="-ml-1 mr-3 h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                    <path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z" />
                    <path fill-rule="evenodd" d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z" clip-rule="evenodd" />
                </svg>
                Edit User
            </a>
        </div>
    </div>
</div>
@endsection
