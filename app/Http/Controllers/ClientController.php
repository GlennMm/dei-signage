<?php
// app/Http/Controllers/ClientController.php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index(Request $request)
    {
        $query = Client::active()->orderBy('sort_order');

        // Filter by industry if provided
        if ($request->has('industry') && $request->industry) {
            $query->where('industry', $request->industry);
        }

        $data = [
            'clients' => $query->get(),
            'featured_clients' => Client::active()->featured()->take(6)->get(),
            'testimonials' => Testimonial::active()->take(3)->get(),
            'industries' => Client::active()
                ->select('industry')
                ->distinct()
                ->pluck('industry')
                ->toArray(),
            'stats' => [
                'total_clients' => Client::active()->count(),
                'industries_served' => Client::active()->distinct('industry')->count(),
                'years_experience' => now()->year - 2015, // Since 2015
            ],
        ];

        return view('clients', $data);
    }

    public function show(Client $client)
    {
        if (!$client->is_active) {
            abort(404);
        }

        $related_clients = Client::active()
            ->where('id', '!=', $client->id)
            ->where('industry', $client->industry)
            ->take(3)
            ->get();

        return view('clients.show', compact('client', 'related_clients'));
    }
}