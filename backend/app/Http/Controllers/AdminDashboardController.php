<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $totalProducts = Product::count();
        $totalStock = Product::sum('stock');
        $outOfStockProducts = Product::where('stock', 0)->count();

        return view('admin.dashboard', compact('totalProducts', 'totalStock', 'outOfStockProducts'));
    }
}