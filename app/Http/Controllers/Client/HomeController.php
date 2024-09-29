<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $products = Product::where('is_featured', 2)
            ->where('category_id', 3)
            ->limit(6)
            ->get();


        return view('clients.home', [
            'products' => $products
        ]);
    }
}