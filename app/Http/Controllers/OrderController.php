<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Service;
use App\Models\Customer;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::with('service')->get();
        return view('orders.index', compact('orders'));
    }

    public function create()
{
    $services = Service::all();
    return view('orders.create', compact('services'));
}

    public function store(Request $request)
{
    $request->validate([
        'customer_name' => 'required',
        'service_id' => 'required',
        'tanggal_pesan' => 'required|date',
        'status' => 'required'
    ]);

    Order::create([
        'customer_name' => $request->customer_name,
        'service_id' => $request->service_id,
        'tanggal_pesan' => $request->tanggal_pesan,
        'status' => $request->status
    ]);

    return redirect()->route('orders.index')
        ->with('success', 'Pesanan berhasil ditambahkan');
}

    public function edit($id)
    {
        $order = Order::findOrFail($id);
        return view('orders.edit', compact('order'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'status' => 'required'
        ]);

        $order = Order::findOrFail($id);
        $order->update([
            'status' => $request->status
        ]);

        return redirect()->route('orders.index')
            ->with('success', 'Status pesanan diperbarui');
    }

    public function destroy($id)
    {
        Order::destroy($id);

        return redirect()->route('orders.index')
            ->with('success', 'Pesanan berhasil dihapus');
    }

        public function resi($id)
    {
        $order = Order::findOrFail($id);
        return view('orders.resi', compact('order'));
    }

        public function laporan()
    {
        $orders = Order::all();
        $total = $orders->count();
        return view('orders.laporan', compact('orders','total'));
    }
}