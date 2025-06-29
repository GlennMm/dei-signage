
@extends('layouts.app')

@section('title', 'Our Clients - DEI Signage & Branding')
@section('description', 'Discover the companies and organizations that trust DEI Signage & Branding for their visual communication needs across various industries.')

@section('styles')
<style>
    .page-banner {
        background: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)), url('/api/placeholder/1200/300') center/cover;
        height: 300px;
        display: flex;
        align-items: center;
        justify-content: center;
        text-align: center;
        color: white;
    }

    .page-banner h1 {
        font-size: 3rem;
        margin-bottom: 1rem;
    }

    .breadcrumb {
        display: flex;
        justify-content: center;
    }

    .breadcrumb a {
        color: #ccc;
        text-decoration: none;
        transition: color 0.3s;
    }

    .breadcrumb a:hover {
        color: var(--accent);
    }

    .breadcrumb span {
        margin: 0 10px;
        color: #ccc;
    }

    .breadcrumb .active {
        color: var(--accent);
    }

    .clients-intro {
        max-width: 800px;
        margin: 0 auto 4rem;
        text-align: center;
    }

    .clients-intro p {
        font-size: 1.2rem;
        margin-bottom: 1.5rem;
        color: #555;
    }

    /* Stats Section */
    .stats-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 2rem;
        margin-bottom: 4rem;
    }

    .stat-card {
        background-color: white;
        padding: 2rem;
        border-radius: 8px;
        text-align: center;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
    }

    .stat-number {
        font-size: 3rem;
        font-weight: bold;
        color: var(--primary);
        margin-bottom: 0.5rem;
    }

    .stat-label {
        font-size: 1.1rem;
        color: #666;
    }

    /* Client Filter */
    .client-filter {
        display: flex;
        justify-content: center;
        flex-wrap: wrap;
        margin-bottom: 3rem;
    }

    .filter-btn {
        background-color: white;
        color: var(--primary);
        border: 2px solid var(--primary);
        padding: 0.5rem 1.5rem;
        margin: 0 0.5rem 1rem;
        border-radius: 30px;
        font-weight: 500;
        cursor: pointer;
        transition: all 0.3s;
        text-decoration: none;
    }

    .filter-btn.active, .filter-btn:hover {
        background-color: var(--primary);
        color: white;
    }

    /* Clients Grid */
    .clients-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
        gap: 2rem;
    }

    .client-card {
        background-color: white;
        border-radius: 8px;
        overflow: hidden;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s;
    }

    .client-card:hover {
        transform: translateY(-5px);
    }

    .client-logo-container {
        height: 150px;
        background-color: #f8f9fa;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 1rem;
    }

    .client-logo {
        max-width: 100%;
        max-height: 100%;
        object-fit: contain;
    }

    .client-content {
        padding: 1.5rem;
    }

    .client-name {
        font-size: 1.4rem;
        margin-bottom: 0.5rem;
        color: var(--primary);
        font-weight: 600;
    }

    .client-industry {
        color: #666;
        margin-bottom: 1rem;
        font-size: 0.9rem;
        padding: 0.3rem 0.8rem;
        background-color: #f0f0f0;
        border-radius: 15px;
        display: inline-block;
    }

    .client-description {
        color: #555;
        margin-bottom: 1.5rem;
        font-size: 0.95rem;
    }

    .client-services {
        margin-bottom: 1rem;
    }

    .service-tag {
        display: inline-block;
        background-color: var(--light);
        color: var(--primary);
        padding: 0.2rem 0.6rem;
        border-radius: 10px;
        font-size: 0.8rem;
        margin: 0.2rem 0.2rem 0.2rem 0;
    }

    .client-partnership {
        font-size: 0.9rem;
        color: #666;
        text-align: right;
    }

    /* Featured Clients */
    .featured-clients {
        background-color: var(--light);
        padding: 3rem 0;
        margin-bottom: 3rem;
        border-radius: 8px;
    }

    .featured-logos {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
        gap: 2rem;
        align-items: center;
    }

    .featured-logo {
        height: 80px;
        background-color: white;
        border-radius: 8px;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 1rem;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
    }

    .featured-logo img {
        max-width: 100%;
        max-height: 100%;
        object-fit: contain;
        opacity: 0.7;
        transition: opacity 0.3s;
    }

    .featured-logo:hover img {
        opacity: 1;
    }

    @media (max-width: 768px) {
        .page-banner h1 {
            font-size: 2.2rem;
        }
        
        .clients-grid {
            grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
        }

        .stats-grid {
            grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
        }

        .stat-number {
            font-size: 2.5rem;
        }
    }
</style>
@endsection

@section('content')
    <!-- Page Banner -->
    <section class="page-banner">
        <div class="container">
            <h1>Our Clients</h1>
            <div class="breadcrumb">
                <a href="{{ route('home') }}">Home</a>
                <span>/</span>
                <a href="#" class="active">Clients</a>
            </div>
        </div>
    </section>
    
    <!-- Clients Section -->
    <section class="section">
        <div class="container">
            <div class="clients-intro">
                <h2>Companies That Trust Us</h2>
                <p>We're proud to work with leading organizations across Zimbabwe and beyond. Our diverse portfolio of clients spans multiple industries, from finance and hospitality to healthcare and technology.</p>
                <p>Each partnership represents our commitment to delivering exceptional signage and branding solutions that drive results.</p>
            </div>
            
            <!-- Stats Section -->
            <div class="stats-grid">
                <div class="stat-card">
                    <div class="stat-number">{{ $stats['total_clients'] }}+</div>
                    <div class="stat-label">Happy Clients</div>
                </div>
                <div class="stat-card">
                    <div class="stat-number">{{ $stats['industries_served'] }}+</div>
                    <div class="stat-label">Industries Served</div>
                </div>
                <div class="stat-card">
                    <div class="stat-number">{{ $stats['years_experience'] }}+</div>
                    <div class="stat-label">Years Experience</div>
                </div>
            </div>

            <!-- Featured Clients -->
            @if($featured_clients->count() > 0)
            <div class="featured-clients">
                <div class="section-title">
                    <h3>Featured Clients</h3>
                    <p>Some of our valued long-term partnerships</p>
                </div>
                <div class="featured-logos">
                    @foreach($featured_clients as $client)
                    <div class="featured-logo">
                        @if($client->logo)
                            <img src="{{ asset('storage/' . $client->logo) }}" alt="{{ $client->name }}">
                        @else
                            <div style="font-weight: bold; color: var(--primary);">{{ $client->name }}</div>
                        @endif
                    </div>
                    @endforeach
                </div>
            </div>
            @endif
            
            <!-- Client Filter -->
            @if(count($industries) > 0)
            <div class="client-filter">
                <a href="{{ route('clients') }}" class="filter-btn {{ !request('industry') ? 'active' : '' }}">All Industries</a>
                @foreach($industries as $industry)
                    <a href="{{ route('clients', ['industry' => $industry]) }}" 
                       class="filter-btn {{ request('industry') == $industry ? 'active' : '' }}">
                        {{ ucfirst(str_replace('_', ' ', $industry)) }}
                    </a>
                @endforeach
            </div>
            @endif
            
            <!-- Clients Grid -->
            <div class="clients-grid">
                @forelse($clients as $client)
                    <div class="client-card">
                        <div class="client-logo-container">
                            @if($client->logo)
                                <img src="{{ asset('storage/' . $client->logo) }}" alt="{{ $client->name }}" class="client-logo">
                            @else
                                <div style="font-size: 1.5rem; font-weight: bold; color: var(--primary);">{{ $client->name }}</div>
                            @endif
                        </div>
                        <div class="client-content">
                            <h3 class="client-name">{{ $client->name }}</h3>
                            <span class="client-industry">{{ ucfirst(str_replace('_', ' ', $client->industry)) }}</span>
                            
                            @if($client->description)
                                <p class="client-description">{{ Str::limit($client->description, 120) }}</p>
                            @endif
                            
                            @if($client->services_provided && count($client->services_provided) > 0)
                                <div class="client-services">
                                    @foreach($client->services_provided as $service)
                                        <span class="service-tag">{{ is_array($service) ? $service['service'] : $service }}</span>
                                    @endforeach
                                </div>
                            @endif
                            
                            @if($client->partnership_date)
                                <div class="client-partnership">
                                    Partner since {{ $client->partnership_date->format('Y') }}
                                </div>
                            @endif
                        </div>
                    </div>
                @empty
                    <div style="grid-column: 1 / -1; text-align: center; padding: 3rem;">
                        <p>No clients found for the selected industry.</p>
                        <a href="{{ route('clients') }}" class="btn btn-primary" style="margin-top: 1rem;">View All Clients</a>
                    </div>
                @endforelse
            </div>
        </div>
    </section>

    <!-- Testimonials Section -->
    @if($testimonials->count() > 0)
    <section class="section" style="background-color: var(--primary); color: white;">
        <div class="container">
            <div class="section-title">
                <h2 style="color: white;">What Our Clients Say</h2>
                <p style="color: #eee;">Hear directly from the companies we've had the privilege to work with</p>
            </div>
            
            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 2rem;">
                @foreach($testimonials as $testimonial)
                    <div style="background-color: rgba(255, 255, 255, 0.1); padding: 2rem; border-radius: 8px; position: relative;">
                        <div style="position: absolute; top: -15px; left: 20px; font-size: 4rem; color: var(--accent); opacity: 0.3;">"</div>
                        <div style="margin-bottom: 1.5rem; font-style: italic;">
                            <p>{{ $testimonial->content }}</p>
                        </div>
                        <div style="display: flex; align-items: center;">
                            @if($testimonial->client_photo)
                                <img src="{{ asset('storage/' . $testimonial->client_photo) }}" alt="{{ $testimonial->client_name }}" 
                                     style="width: 50px; height: 50px; border-radius: 50%; object-fit: cover; margin-right: 1rem;">
                            @else
                                <div style="width: 50px; height: 50px; border-radius: 50%; background-color: rgba(255,255,255,0.2); display: flex; align-items: center; justify-content: center; margin-right: 1rem; font-weight: bold;">
                                    {{ substr($testimonial->client_name, 0, 1) }}
                                </div>
                            @endif
                            <div>
                                <h4 style="font-size: 1.1rem; margin-bottom: 0.3rem;">{{ $testimonial->client_name }}</h4>
                                @if($testimonial->client_position || $testimonial->client_company)
                                    <p style="font-size: 0.9rem; color: #eee;">
                                        @if($testimonial->client_position)
                                            {{ $testimonial->client_position }}
                                        @endif
                                        @if($testimonial->client_position && $testimonial->client_company)
                                            , 
                                        @endif
                                        @if($testimonial->client_company)
                                            {{ $testimonial->client_company }}
                                        @endif
                                    </p>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    @endif
@endsection