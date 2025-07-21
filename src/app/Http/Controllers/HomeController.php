<?php

namespace App\Http\Controllers;

use App\Models\HikingEquipment;
use App\Models\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $featuredEquipments = HikingEquipment::with('category')
            ->featured()
            ->active()
            ->available()
            ->take(8)
            ->get();

        $categories = Category::withCount('activeEquipments')
            ->where('is_active', true)
            ->take(8)
            ->get();

        // Count statistics for the stats section
        $equipmentCount = HikingEquipment::active()->available()->count();
        $categoryCount = Category::where('is_active', true)->count();

        return view('home', compact('featuredEquipments', 'categories', 'equipmentCount', 'categoryCount'));
    }

    public function about()
    {
        return view('about');
    }

    public function contact()
    {
        return view('contact');
    }
}
