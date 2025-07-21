<?php

namespace App\Http\Controllers;

use App\Models\HikingEquipment;
use App\Models\Category;
use Illuminate\Http\Request;

class EquipmentController extends Controller
{
    public function index(Request $request)
    {
        $query = HikingEquipment::with('category')
            ->active();

        // Search
        if ($request->filled('search')) {
            $query->where(function ($q) use ($request) {
                $q->where('name', 'like', '%' . $request->search . '%')
                  ->orWhere('description', 'like', '%' . $request->search . '%')
                  ->orWhere('brand', 'like', '%' . $request->search . '%');
            });
        }

        // Category filter
        if ($request->filled('category')) {
            $query->where('category_id', $request->category);
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
        
        $categories = Category::where('is_active', true)
            ->orderBy('name')
            ->get();

        return view('equipments.index', compact('equipments', 'categories'));
    }

    public function show(HikingEquipment $equipment)
    {
        if (!$equipment->is_active) {
            abort(404);
        }

        $equipment->load('category');
        
        // Get related equipments from same category
        $relatedEquipments = HikingEquipment::with('category')
            ->where('category_id', $equipment->category_id)
            ->where('id', '!=', $equipment->id)
            ->active()
            ->take(5)
            ->get();

        return view('equipments.show', compact('equipment', 'relatedEquipments'));
    }
}
