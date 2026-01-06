<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Service;

class DashboardController extends Controller
{
    public function index()
    {
        $totalOrders   = Order::count();
        $totalServices = Service::count();
        $ordersSelesai = Order::where('status', 'selesai')->count();
        
        $totalPendapatan = Order::where('status', 'selesai')
            ->join('services', 'orders.service_id', '=', 'services.id')
            ->sum('services.harga');

        $recentOrders = Order::with('service')
            ->orderBy('created_at', 'asc')
            ->take(5)
            ->get();

        return view('dashboard', compact(
            'totalOrders',
            'totalServices',
            'ordersSelesai',
            'totalPendapatan',
            'recentOrders'
        ));
    }
}
