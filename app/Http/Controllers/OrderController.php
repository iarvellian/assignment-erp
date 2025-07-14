<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Client; // Import Client model
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf; // Import PDF facade

class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:Superadmin,Admin,User')->only(['index', 'show', 'generatePdf']);
        $this->middleware('role:Superadmin,Admin')->except(['index', 'show', 'generatePdf']);
    }

    public function index()
    {
        $orders = Order::with('client')->orderBy('order_date', 'desc')->get();
        return view('orders.index', compact('orders'));
    }

    public function create()
    {
        $clients = Client::orderBy('client_name')->get();
        return view('orders.create', compact('clients'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'client_id' => 'required|uuid|exists:clients,id_client',
            'item_name' => 'required|string|max:255',
            'item_price' => 'required|numeric|min:0',
            'order_date' => 'required|date',
        ]);

        Order::create($request->all());
        return redirect()->route('orders.index')->with('success', 'Order created successfully!');
    }

    public function show(Order $order)
    {
        $order->load('client');
        return view('orders.show', compact('order'));
    }

    public function edit(Order $order)
    {
        $clients = Client::orderBy('client_name')->get();
        return view('orders.edit', compact('order', 'clients'));
    }

    public function update(Request $request, Order $order)
    {
        $request->validate([
            'client_id' => 'required|uuid|exists:clients,id_client',
            'item_name' => 'required|string|max:255',
            'item_price' => 'required|numeric|min:0',
            'order_date' => 'required|date',
        ]);

        $order->update($request->all());
        return redirect()->route('orders.index')->with('success', 'Order updated successfully!');
    }

    public function destroy(Order $order)
    {
        $order->delete();
        return redirect()->route('orders.index')->with('success', 'Order deleted successfully!');
    }

    public function generatePdf(Request $request, Order $order = null)
    {
        if ($order && $order->exists) {
            $order->load('client');
            $data = ['order' => $order];
            $pdf = Pdf::loadView('orders.pdf_template_single', $data);
            return $pdf->download('order_' . $order->id_order . '.pdf');
        } else {
            $orders = Order::with('client')->orderBy('order_date', 'desc')->get();
            $data = ['orders' => $orders];
            $pdf = Pdf::loadView('orders.pdf_template_all', $data);
            return $pdf->download('all_orders_' . now()->format('Ymd_His') . '.pdf');
        }
    }
}
