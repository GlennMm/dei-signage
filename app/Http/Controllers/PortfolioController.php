<?php
// app/Http/Controllers/PortfolioController.php

namespace App\Http\Controllers;

use App\Models\Portfolio;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class PortfolioController extends Controller
{
    public function index(Request $request)
    {
        $query = Portfolio::active()->orderBy('sort_order');

        // Filter by category if provided
        if ($request->has('category') && $request->category) {
            $query->where('category', $request->category);
        }

        $data = [
            'portfolio' => $query->get(),
            'featured_project' => Portfolio::active()->featured()->first(),
            'testimonials' => Testimonial::active()->featured()->take(3)->get(),
            'categories' => Portfolio::active()
                ->select('category')
                ->distinct()
                ->pluck('category')
                ->toArray(),
        ];

        return view('portfolio', $data);
    }

    public function show(Portfolio $portfolio)
    {
        if (!$portfolio->is_active) {
            abort(404);
        }

        $related_projects = Portfolio::active()
            ->where('id', '!=', $portfolio->id)
            ->where('category', $portfolio->category)
            ->orderBy('sort_order')
            ->take(3)
            ->get();

        return view('portfolio.show', compact('portfolio', 'related_projects'));
    }
}