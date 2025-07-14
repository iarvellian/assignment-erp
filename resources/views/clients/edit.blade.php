@extends('layouts.app')

@section('content')
<div class="container mx-auto p-4 sm:p-6 lg:p-8 flex items-center justify-center">
    <div class="bg-white p-8 rounded-lg shadow-xl w-full max-w-md">
        <h1 class="text-2xl font-extrabold mb-6 text-gray-900 text-center">Edit Client: <span class="text-indigo-600">{{ $client->client_name }}</span></h1>

        @if ($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-lg relative mb-4" role="alert">
                <ul class="mt-3 list-disc list-inside text-sm text-red-600">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('clients.update', $client->id_client) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-5">
                <label for="client_name" class="block text-gray-700 text-sm font-semibold mb-2">Client Name:</label>
                <input type="text" name="client_name" id="client_name" class="appearance-none border border-gray-300 rounded-lg w-full py-2.5 px-4 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition duration-150 ease-in-out @error('client_name') border-red-500 @enderror" value="{{ old('client_name', $client->client_name) }}" required autofocus placeholder="e.g., PT. Maju Jaya">
                @error('client_name')
                    <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-5">
                <label for="client_address" class="block text-gray-700 text-sm font-semibold mb-2">Address:</label>
                <input type="text" name="client_address" id="client_address" class="appearance-none border border-gray-300 rounded-lg w-full py-2.5 px-4 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition duration-150 ease-in-out @error('client_address') border-red-500 @enderror" value="{{ old('client_address', $client->client_address) }}" placeholder="e.g., Jl. Sudirman No. 123">
                @error('client_address')
                    <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-5">
                <label for="contract_start_date" class="block text-gray-700 text-sm font-semibold mb-2">Contract Start Date:</label>
                <input type="date" name="contract_start_date" id="contract_start_date" class="appearance-none border border-gray-300 rounded-lg w-full py-2.5 px-4 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition duration-150 ease-in-out @error('contract_start_date') border-red-500 @enderror" value="{{ old('contract_start_date', $client->contract_start_date ? $client->contract_start_date->format('Y-m-d') : '') }}">
                @error('contract_start_date')
                    <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-6">
                <label for="contract_end_date" class="block text-gray-700 text-sm font-semibold mb-2">Contract End Date:</label>
                <input type="date" name="contract_end_date" id="contract_end_date" class="appearance-none border border-gray-300 rounded-lg w-full py-2.5 px-4 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition duration-150 ease-in-out @error('contract_end_date') border-red-500 @enderror" value="{{ old('contract_end_date', $client->contract_end_date ? $client->contract_end_date->format('Y-m-d') : '') }}">
                @error('contract_end_date')
                    <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
                @enderror
            </div>
            <div class="flex items-center justify-between mt-6">
                <button type="submit" class="inline-flex items-center px-6 py-3 border border-transparent text-base font-medium rounded-lg shadow-sm text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition duration-300 ease-in-out">
                    <svg class="-ml-1 mr-3 h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z" />
                        <path fill-rule="evenodd" d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z" clip-rule="evenodd" />
                    </svg>
                    Update Client
                </button>
                <a href="{{ route('clients.index') }}" class="inline-block align-baseline font-semibold text-sm text-gray-600 hover:text-gray-900 hover:underline transition duration-150 ease-in-out">
                    Cancel
                </a>
            </div>
        </form>
    </div>
</div>
@endsection
