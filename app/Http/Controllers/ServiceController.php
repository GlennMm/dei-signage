<?php
// app/Http/Controllers/ServiceController.php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\FAQ;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index()
    {
        $data = [
            'services' => Service::active()->orderBy('sort_order')->get(),
            'faqs' => FAQ::active()->where('category', 'services')->orderBy('sort_order')->get(),
        ];

        return view('services', $data);
    }

    public function show(Service $service)
    {
        if (!$service->is_active) {
            abort(404);
        }

        $related_services = Service::active()
            ->where('id', '!=', $service->id)
            ->where('category', $service->category)
            ->orderBy('sort_order')
            ->take(3)
            ->get();

        return view('services.show', compact('service', 'related_services'));
    }
}