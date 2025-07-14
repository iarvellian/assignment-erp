@extends('layouts.app')

@section('content')
<div class="container mx-auto p-4 sm:p-6 lg:p-8 flex items-center justify-center">
    <div class="bg-white p-8 rounded-lg shadow-xl w-full max-w-md">
        <h1 class="text-2xl font-extrabold mb-6 text-gray-900 text-center">Client Details: <span class="text-indigo-600">{{ $client->client_name }}</span></h1>

        <div class="space-y-4">
            <div>
                <p class="text-gray-700 text-sm font-semibold mb-1">Client Name:</p>
                <p class="text-gray-900 text-lg bg-gray-50 p-2 rounded-md">{{ $client->client_name }}</p>
            </div>
            <div>
                <p class="block text-gray-700 text-sm font-semibold mb-1">Address:</p>
                <p class="text-gray-900 text-lg bg-gray-50 p-2 rounded-md">{{ $client->client_address ?? 'N/A' }}</p>
            </div>
            <div>
                <p class="block text-gray-700 text-sm font-semibold mb-1">Contract Start Date:</p>
                <p class="text-gray-900 text-lg bg-gray-50 p-2 rounded-md">{{ $client->contract_start_date ? $client->contract_start_date->format('d M Y') : 'N/A' }}</p>
            </div>
            <div>
                <p class="block text-gray-700 text-sm font-semibold mb-1">Contract End Date:</p>
                <p class="text-gray-900 text-lg bg-gray-50 p-2 rounded-md">{{ $client->contract_end_date ? $client->contract_end_date->format('d M Y') : 'N/A' }}</p>
            </div>
            <div>
                <p class="block text-gray-700 text-sm font-semibold mb-1">Created At:</p>
                <p class="text-gray-900 text-lg bg-gray-50 p-2 rounded-md">{{ $client->created_at->format('d M Y H:i') }}</p>
            </div>
            <div>
                <p class="block text-gray-700 text-sm font-semibold mb-1">Last Updated At:</p>
                <p class="text-gray-900 text-lg bg-gray-50 p-2 rounded-md">{{ $client->updated_at->format('d M Y H:i') }}</p>
            </div>
        </div>

        <div class="flex items-center justify-between mt-8">
            <a href="{{ route('clients.index') }}" class="inline-block align-baseline font-semibold text-sm text-gray-600 hover:text-gray-900 hover:underline transition duration-150 ease-in-out">
                Back to Clients List
            </a>
            @if (Auth::check() && (Auth::user()->role->role_name == 'Superadmin' || Auth::user()->role->role_name == 'Admin'))
                <a href="{{ route('clients.edit', $client->id_client) }}" class="inline-flex items-center px-6 py-3 border border-transparent text-base font-medium rounded-lg shadow-sm text-white bg-yellow-600 hover:bg-yellow-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-yellow-500 transition duration-300 ease-in-out">
                    <svg class="-ml-1 mr-3 h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z" />
                        <path fill-rule="evenodd" d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z" clip-rule="evenodd" />
                    </svg>
                    Edit Client
                </a>
            @endif
        </div>
    </div>
</div>
@endsection
