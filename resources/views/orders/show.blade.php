@extends('layouts.app')

@section('content')
<div class="container mx-auto p-4 sm:p-6 lg:p-8 flex items-center justify-center">
    <div class="bg-white p-8 rounded-lg shadow-xl w-full max-w-md">
        <h1 class="text-2xl font-extrabold mb-6 text-gray-900 text-center">Order Details: <span class="text-indigo-600">#{{ $order->id_order }}</span></h1>

        <div class="space-y-4">
            <div>
                <p class="text-gray-700 text-sm font-semibold mb-1">Client Name:</p>
                <p class="text-gray-900 text-lg bg-gray-50 p-2 rounded-md">{{ $order->client->client_name ?? 'N/A' }}</p>
            </div>
            <div>
                <p class="block text-gray-700 text-sm font-semibold mb-1">Item Name:</p>
                <p class="text-gray-900 text-lg bg-gray-50 p-2 rounded-md">{{ $order->item_name }}</p>
            </div>
            <div>
                <p class="block text-gray-700 text-sm font-semibold mb-1">Price:</p>
                <p class="text-gray-900 text-lg bg-gray-50 p-2 rounded-md">Rp {{ number_format($order->item_price, 2, ',', '.') }}</p>
            </div>
            <div>
                <p class="block text-gray-700 text-sm font-semibold mb-1">Order Date:</p>
                <p class="text-gray-900 text-lg bg-gray-50 p-2 rounded-md">{{ $order->order_date->format('d M Y H:i') }}</p>
            </div>
            <div>
                <p class="block text-gray-700 text-sm font-semibold mb-1">Created At:</p>
                <p class="text-gray-900 text-lg bg-gray-50 p-2 rounded-md">{{ $order->created_at->format('d M Y H:i') }}</p>
            </div>
            <div>
                <p class="block text-gray-700 text-sm font-semibold mb-1">Last Updated At:</p>
                <p class="text-gray-900 text-lg bg-gray-50 p-2 rounded-md">{{ $order->updated_at->format('d M Y H:i') }}</p>
            </div>
        </div>

        <div class="flex items-center justify-between mt-8">
            <a href="{{ route('orders.index') }}" class="inline-block align-baseline font-semibold text-sm text-gray-600 hover:text-gray-900 hover:underline transition duration-150 ease-in-out">
                Back to Orders List
            </a>
            <a href="{{ route('orders.pdf.single', $order->id_order) }}" class="inline-flex items-center px-6 py-3 border border-transparent text-base font-medium rounded-lg shadow-sm text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 transition duration-300 ease-in-out">
                <svg class="-ml-1 mr-3 h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                    <path fill-rule="evenodd" d="M15.586 3.586a2 2 0 00-2.828 0L9 7.172V4a1 1 0 00-1-1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V7.414a2 2 0 00-.586-1.414zM10 11a1 1 0 01-1 1H6a1 1 0 110-2h3a1 1 0 011 1z" clip-rule="evenodd" />
                </svg>
                Generate PDF
            </a>
        </div>
    </div>
</div>
@endsection
