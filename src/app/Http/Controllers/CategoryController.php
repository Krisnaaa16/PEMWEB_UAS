<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::withCount('activeEquipments')
            ->where('is_active', true)
            ->orderBy('name')
            ->get();

        return view('categories.index', compact('categories'));
    }

    public function show(Category $category, Request $request)
    {
        if (!$category->is_active) {
            abort(404);
        }

        $query = $category->hikingEquipments()
            ->with('category')
            ->active();

        // Search within category
        if ($request->filled('search')) {
            $query->where(function ($q) use ($request) {
                $q->where('name', 'like', '%' . $request->search . '%')
                  ->orWhere('description', 'like', '%' . $request->search . '%')
                  ->orWhere('brand', 'like', '%' . $request->search . '%');
            });
        }

        // Price range filter
        if ($request->filled('min_price')) {
            $query->where('price_per_day', '>=', $request->min_price);
        }
        if ($request->filled('max_price')) {
            $query->where('price_per_day', '<=', $request->max_price);
        }

        // Condition filter
        if ($request->filled('condition')) {
            $query->where('condition', $request->condition);
        }

        // Availability filter
        if ($request->boolean('available_only')) {
            $query->available();
        }

        // Sorting
        switch ($request->get('sort', 'name_asc')) {
            case 'name_desc':
                $query->orderBy('name', 'desc');
                break;
            case 'price_asc':
                $query->orderBy('price_per_day', 'asc');
                break;
            case 'price_desc':
                $query->orderBy('price_per_day', 'desc');
                break;
            case 'newest':
                $query->orderBy('created_at', 'desc');
                break;
            default: // name_asc
                $query->orderBy('name', 'asc');
                break;
        }

        $equipments = $query->paginate(12)->withQueryString();

        return view('categories.show', compact('category', 'equipments'));
    }
}
