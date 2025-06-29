
@extends('layouts.app')

@section('title', $client->name . ' - Our Clients - DEI Signage & Branding')
@section('description', $client->description ?? 'Learn about our partnership with ' . $client->name . ' and the signage solutions we provided.')

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

    .client-hero {
        display: grid;
        grid-template-columns: 1fr 2fr;
        gap: 4rem;
        align-items: center;
        margin-bottom: 4rem;
    }

    .client-logo-section {
        text-align: center;
        background-color: white;
        padding: 3rem;
        border-radius: 8px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
    }

    .client-logo {
        max-width: 100%;
        max-height: 200px;
        object-fit: contain;
        margin-bottom: 1.5rem;
    }

    .client-industry {
        display: inline-block;
        background-color: var(--primary);
        color: white;
        padding: 0.5rem 1.5rem;
        border-radius: 25px;
        font-size: 0.9rem;
        font-weight: 500;
        margin-bottom: 1rem;
    }

    .client-website {
        display: block;
        color: var(--primary);
        text-decoration: none;
        font-weight: 500;
        transition: color 0.3s;
    }

    .client-website:hover {
        color: var(--accent);
    }

    .client-info h1 {
        font-size: 2.5rem;
        color: var(--primary);
        margin-bottom: 1rem;
    }

    .client-description {
        font-size: 1.2rem;
        color: #555;
        margin-bottom: 2rem;
        line-height: 1.7;
    }

    .partnership-info {
        background-color: var(--light);
        padding: 1.5rem;
        border-radius: 8px;
        margin-bottom: 2rem;
    }

    .partnership-title {
        font-size: 1.2rem;
        color: var(--primary);
        margin-bottom: 1rem;
        font-weight: 600;
    }

    .partnership-details {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
        gap: 1rem;
    }

    .detail-item {
        text-align: center;
    }

    .detail-value {
        font-size: 1.5rem;
        font-weight: bold;
        color: var(--primary);
        margin-bottom: 0.3rem;
    }

    .detail-label {
        font-size: 0.9rem;
        color: #666;
    }

    .services-section {
        margin-bottom: 4rem;
    }

    .services-title {
        font-size: 1.5rem;
        color: var(--primary);
        margin-bottom: 1.5rem;
        font-weight: 600;
    }

    .services-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 1rem;
    }

    .service-card {
        background-color: white;
        padding: 1.5rem;
        border-radius: 8px;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        text-align: center;
        transition: transform 0.3s;
    }

    .service-card:hover {
        transform: translateY(-5px);
    }

    .service-icon {
        width: 60px;
        height: 60px;
        background-color: var(--primary);
        color: white;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.5rem;
        margin: 0 auto 1rem;
    }

    .service-name {
        font-size: 1.1rem;
        color: var(--primary);
        font-weight: 500;
    }

    /* Case Study Section */
    .case-study {
        background-color: white;
        padding: 3rem;
        border-radius: 8px;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        margin-bottom: 4rem;
    }

    .case-study-title {
        font-size: 2rem;
        color: var(--primary);
        margin-bottom: 2rem;
        text-align: center;
    }

    .case-study-content {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 3rem;
        align-items: start;
    }

    .challenge-solution {
        background-color: var(--light);
        padding: 2rem;
        border-radius: 8px;
    }

    .cs-title {
        font-size: 1.3rem;
        color: var(--primary);
        margin-bottom: 1rem;
        font-weight: 600;
    }

    .cs-content {
        color: #555;
        line-height: 1.6;
    }

    /* Results Section */
    .results-section {
        background-color: var(--primary);
        color: white;
        padding: 4rem 0;
        text-align: center;
    }

    .results-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 2rem;
        margin-top: 2rem;
    }

    .result-item {
        background-color: rgba(255, 255, 255, 0.1);
        padding: 2rem;
        border-radius: 8px;
    }

    .result-number {
        font-size: 2.5rem;
        font-weight: bold;
        color: var(--accent);
        margin-bottom: 0.5rem;
    }

    .result-label {
        font-size: 1rem;
        opacity: 0.9;
    }

    /* Related Clients */
    .related-clients {
        background-color: var(--light);
        padding: 4rem 0;
    }

    .related-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 2rem;
    }

    .related-card {
        background-color: white;
        border-radius: 8px;
        overflow: hidden;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s;
    }

    .related-card:hover {
        transform: translateY(-5px);
    }

    .related-logo-container {
        height: 150px;
        background-color: #f8f9fa;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 1rem;
    }

    .related-logo {
        max-width: 100%;
        max-height: 100%;
        object-fit: contain;
    }

    .related-content {
        padding: 1.5rem;
    }

    .related-name {
        font-size: 1.3rem;
        margin-bottom: 0.5rem;
        color: var(--primary);
        font-weight: 600;
    }

    .related-industry {
        color: #666;
        margin-bottom: 1rem;
        font-size: 0.9rem;
        padding: 0.3rem 0.8rem;
        background-color: #f0f0f0;
        border-radius: 15px;
        display: inline-block;
    }

    .related-link {
        color: var(--primary);
        font-weight: 500;
        text-decoration: none;
        transition: color 0.3s;
    }

    .related-link:hover {
        color: var(--accent);
    }

    .cta-section {
        text-align: center;
        margin: 4rem 0;
    }

    .btn {
        display: inline-block;
        padding: 1rem 2rem;
        background-color: var(--primary);
        color: white;
        text-decoration: none;
        border-radius: 4px;
        font-weight: bold;
        transition: background-color 0.3s;
        margin: 0 0.5rem;
    }

    .btn:hover {
        background-color: #005a4f;
    }

    .btn-outline {
        background-color: transparent;
        border: 2px solid var(--primary);
        color: var(--primary);
    }

    .btn-outline:hover {
        background-color: var(--primary);
        color: white;
    }

    @media (max-width: 992px) {
        .client-hero {
            grid-template-columns: 1fr;
            gap: 2rem;
        }

        .case-study-content {
            grid-template-columns: 1fr;
            gap: 2rem;
        }
    }

    @media (max-width: 768px) {
        .page-banner h1 {
            font-size: 2.2rem;
        }

        .client-info h1 {
            font-size: 2rem;
        }

        .case-study {
            padding: 2rem;
        }

        .partnership-details {
            grid-template-columns: 1fr;
        }
    }
</style>
@endsection

@section('content')
    <!-- Page Banner -->
    <section class="page-banner">
        <div class="container">
            <h1>{{ $client->name }}</h1>
            <div class="breadcrumb">
                <a href="{{ route('home') }}">Home</a>
                <span>/</span>
                <a href="{{ route('clients') }}">Clients</a>
                <span>/</span>
                <span class="active">{{ $client->name }}</span>
            </div>
        </div>
    </section>

    <!-- Client Hero -->
    <section class="section">
        <div class="container">
            <div class="client-hero">
                <div class="client-logo-section">
                    @if($client->logo)
                        <img src="{{ asset('storage/' . $client->logo) }}" alt="{{ $client->name }}" class="client-logo">
                    @else
                        <div style="font-size: 2rem; font-weight: bold; color: var(--primary); margin-bottom: 1.5rem;">{{ $client->name }}</div>
                    @endif
                    <div class="client-industry">{{ ucfirst(str_replace('_', ' ', $client->industry)) }}</div>
                    @if($client->website)
                        <a href="{{ $client->website }}" target="_blank" class="client-website">Visit Website →</a>
                    @endif
                </div>

                <div class="client-info">
                    <h1>{{ $client->name }}</h1>
                    @if($client->description)
                        <div class="client-description">
                            {{ $client->description }}
                        </div>
                    @endif

                    <div class="partnership-info">
                        <h3 class="partnership-title">Partnership Overview</h3>
                        <div class="partnership-details">
                            @if($client->partnership_date)
                            <div class="detail-item">
                                <div class="detail-value">{{ $client->partnership_date->diffInYears() }}+</div>
                                <div class="detail-label">Years Partnership</div>
                            </div>
                            @endif
                            @if($client->services_provided)
                            <div class="detail-item">
                                <div class="detail-value">{{ count($client->services_provided) }}</div>
                                <div class="detail-label">Services Provided</div>
                            </div>
                            @endif
                            <div class="detail-item">
                                <div class="detail-value">{{ ucfirst(str_replace('_', ' ', $client->industry)) }}</div>
                                <div class="detail-label">Industry</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Services Provided -->
    @if($client->services_provided && count($client->services_provided) > 0)
    <section class="section services-section">
        <div class="container">
            <h2 class="services-title">Services We Provided</h2>
            <div class="services-grid">
                @foreach($client->services_provided as $service)
                <div class="service-card">
                    <div class="service-icon">
                        @if(str_contains(strtolower(is_array($service) ? $service['service'] : $service), 'illuminated'))
                            💡
                        @elseif(str_contains(strtolower(is_array($service) ? $service['service'] : $service), 'gate'))
                            🚪
                        @elseif(str_contains(strtolower(is_array($service) ? $service['service'] : $service), 'office'))
                            🏢
                        @elseif(str_contains(strtolower(is_array($service) ? $service['service'] : $service), 'branding'))
                            🎨
                        @else
                            📋
                        @endif
                    </div>
                    <div class="service-name">{{ is_array($service) ? $service['service'] : $service }}</div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    @endif

    <!-- Case Study -->
    <section class="section">
        <div class="container">
            <div class="case-study">
                <h2 class="case-study-title">Partnership Success Story</h2>
                <div class="case-study-content">
                    <div class="challenge-solution">
                        <h3 class="cs-title">The Challenge</h3>
                        <div class="cs-content">
                            <p>{{ $client->name }} needed a comprehensive signage solution that would reflect their brand identity while meeting the specific requirements of the {{ ucfirst(str_replace('_', ' ', $client->industry)) }} industry.</p>
                            <p>The project required careful planning to ensure minimal disruption to their daily operations while delivering high-quality results within tight deadlines.</p>
                        </div>
                    </div>
                    
                    <div class="challenge-solution">
                        <h3 class="cs-title">Our Solution</h3>
                        <div class="cs-content">
                            <p>We developed a customized approach that included detailed consultation, innovative design solutions, and professional installation services.</p>
                            <p>Our team worked closely with {{ $client->name }}'s stakeholders to ensure every aspect of the project aligned with their vision and operational needs.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Results -->
    <section class="results-section">
        <div class="container">
            <h2 style="font-size: 2.5rem; margin-bottom: 1rem;">Project Results</h2>
            <p style="font-size: 1.2rem; opacity: 0.9;">Measurable impact and client satisfaction</p>
            
            <div class="results-grid">
                <div class="result-item">
                    <div class="result-number">100%</div>
                    <div class="result-label">Client Satisfaction</div>
                </div>
                <div class="result-item">
                    <div class="result-number">{{ $client->partnership_date ? $client->partnership_date->diffInMonths() + 1 : '24' }}</div>
                    <div class="result-label">Months Partnership</div>
                </div>
                <div class="result-item">
                    <div class="result-number">{{ $client->services_provided ? count($client->services_provided) : '5' }}</div>
                    <div class="result-label">Services Delivered</div>
                </div>
                <div class="result-item">
                    <div class="result-number">24/7</div>
                    <div class="result-label">Ongoing Support</div>
                </div>
            </div>
        </div>
    </section>

    <!-- Call to Action -->
    <section class="section cta-section">
        <div class="container">
            <h2 style="font-size: 2rem; color: var(--primary); margin-bottom: 1rem;">Ready to Start Your Project?</h2>
            <p style="font-size: 1.1rem; color: #666; margin-bottom: 2rem;">Join {{ $client->name }} and our other satisfied clients in transforming your brand presence.</p>
            <a href="{{ route('contact') }}" class="btn">Get Started Today</a>
            <a href="{{ route('portfolio') }}" class="btn btn-outline">View Our Work</a>
        </div>
    </section>

    <!-- Related Clients -->
    @if($related_clients->count() > 0)
    <section class="related-clients">
        <div class="container">
            <div class="section-title">
                <h2>Other {{ ucfirst(str_replace('_', ' ', $client->industry)) }} Clients</h2>
                <p>Companies in similar industries that trust our services</p>
            </div>

            <div class="related-grid">
                @foreach($related_clients as $related)
                <div class="related-card">
                    <div class="related-logo-container">
                        @if($related->logo)
                            <img src="{{ asset('storage/' . $related->logo) }}" alt="{{ $related->name }}" class="related-logo">
                        @else
                            <div style="font-size: 1.2rem; font-weight: bold; color: var(--primary);">{{ $related->name }}</div>
                        @endif
                    </div>
                    <div class="related-content">
                        <h3 class="related-name">{{ $related->name }}</h3>
                        <span class="related-industry">{{ ucfirst(str_replace('_', ' ', $related->industry)) }}</span>
                        <p style="color: #666; margin-bottom: 1rem; font-size: 0.9rem;">
                            @if($related->partnership_date)
                                Partner since {{ $related->partnership_date->format('Y') }}
                            @endif
                        </p>
                        <a href="{{ route('clients.show', $related) }}" class="related-link">View Case Study →</a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    @endif
@endsection