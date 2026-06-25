<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;

class HomeController extends Controller
{
    public function index()
    {
        $featuredProducts = Product::with('category')
            ->where('status', 'Activo')
            ->latest()
            ->take(8)
            ->get();

        $categories = Category::withCount('products')->where('status', 'Activo')->take(8)->get();

        return view('public.home', compact('featuredProducts', 'categories'));
    }

    public function about()
    {
        return view('public.about');
    }

    public function contact()
    {
        return view('public.contact');
    }
}
