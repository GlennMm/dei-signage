<?php
// app/Http/Controllers/HomeController.php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\Portfolio;
use App\Models\Testimonial;
use App\Models\Client;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $data = [
            'services' => Service::active()->featured()->orderBy('sort_order')->take(6)->get(),
            'portfolio' => Portfolio::active()->featured()->orderBy('sort_order')->take(6)->get(),
            'testimonials' => Testimonial::active()->featured()->orderBy('sort_order')->take(3)->get(),
            'clients' => Client::active()->featured()->orderBy('sort_order')->take(8)->get(),
        ];

        return view('home', $data);
    }
}