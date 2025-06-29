
@extends('layouts.app')

@section('title', $service->title . ' - DEI Signage & Branding')
@section('description', $service->short_description ?? Str::limit($service->description, 160))

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

    .service-hero {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 3rem;
        align-items: center;
        margin-bottom: 4rem;
    }

    .service-image {
        position: relative;
        border-radius: 8px;
        overflow: hidden;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
    }

    .service-image img {
        width: 100%;
        height: 400px;
        object-fit: cover;
    }

    .service-category {
        position: absolute;
        top: 1rem;
        left: 1rem;
        background-color: var(--primary);
        color: white;
        padding: 0.5rem 1rem;
        border-radius: 20px;
        font-size: 0.9rem;
        font-weight: 500;
    }

    .service-info h1 {
        font-size: 2.5rem;
        color: var(--primary);
        margin-bottom: 1rem;
    }

    .service-description {
        font-size: 1.2rem;
        color: #555;
        margin-bottom: 2rem;
        line-height: 1.7;
    }

    .service-features {
        margin-bottom: 2rem;
    }

    .features-title {
        font-size: 1.4rem;
        color: var(--primary);
        margin-bottom: 1rem;
        font-weight: 600;
    }

    .feature-item {
        display: flex;
        align-items: center;
        margin-bottom: 0.8rem;
        padding: 0.5rem 0;
    }

    .feature-icon {
        flex: 0 0 30px;
        width: 30px;
        height: 30px;
        background-color: var(--accent);
        color: var(--dark);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 0.9rem;
        margin-right: 1rem;
        font-weight: bold;
    }

    .feature-text {
        font-size: 1.1rem;
        color: #555;
    }

    .service-cta {
        display: flex;
        gap: 1rem;
        margin-top: 2rem;
    }

    .btn {
        padding: 1rem 2rem;
        border-radius: 4px;
        font-weight: bold;
        text-decoration: none;
        transition: all 0.3s;
        text-align: center;
    }

    .btn-primary {
        background-color: var(--primary);
        color: white;
    }

    .btn-primary:hover {
        background-color: #005a4f;
    }

    .btn-outline {
        border: 2px solid var(--primary);
        color: var(--primary);
    }

    .btn-outline:hover {
        background-color: var(--primary);
        color: white;
    }

    /* Process Section */
    .process-section {
        background-color: var(--light);
        padding: 4rem 0;
        margin: 4rem 0;
    }

    .process-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 2rem;
    }

    .process-step {
        text-align: center;
        background-color: white;
        padding: 2rem;
        border-radius: 8px;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
    }

    .step-number {
        width: 50px;
        height: 50px;
        background-color: var(--primary);
        color: white;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.2rem;
        font-weight: bold;
        margin: 0 auto 1rem;
    }

    .step-title {
        font-size: 1.2rem;
        margin-bottom: 0.5rem;
        color: var(--primary);
        font-weight: 600;
    }

    .step-description {
        color: #666;
        font-size: 0.95rem;
    }

    /* Related Services */
    .related-services {
        margin-top: 4rem;
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

    .related-img {
        height: 200px;
        width: 100%;
        object-fit: cover;
    }

    .related-content {
        padding: 1.5rem;
    }

    .related-title {
        font-size: 1.3rem;
        margin-bottom: 0.5rem;
        color: var(--primary);
    }

    .related-description {
        color: #666;
        margin-bottom: 1rem;
        font-size: 0.95rem;
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

    @media (max-width: 768px) {
        .page-banner h1 {
            font-size: 2.2rem;
        }

        .service-hero {
            grid-template-columns: 1fr;
            gap: 2rem;
        }

        .service-info h1 {
            font-size: 2rem;
        }

        .service-cta {
            flex-direction: column;
        }
    }
</style>
@endsection

@section('content')
    <!-- Page Banner -->
    <section class="page-banner">
        <div class="container">
            <h1>{{ $service->title }}</h1>
            <div class="breadcrumb">
                <a href="{{ route('home') }}">Home</a>
                <span>/</span>
                <a href="{{ route('services') }}">Services</a>
                <span>/</span>
                <span class="active">{{ $service->title }}</span>
            </div>
        </div>
    </section>

    <!-- Service Details -->
    <section class="section">
        <div class="container">
            <div class="service-hero">
                <div class="service-image">
                    @if($service->image)
                        <img src="{{ asset('storage/' . $service->image) }}" alt="{{ $service->title }}">
                    @else
                        <img src="/api/placeholder/600/400" alt="{{ $service->title }}">
                    @endif
                    <div class="service-category">{{ ucfirst(str_replace('_', ' ', $service->category)) }}</div>
                </div>

                <div class="service-info">
                    <h1>{{ $service->title }}</h1>
                    <div class="service-description">
                        {!! $service->description !!}
                    </div>

                    @if($service->features && count($service->features) > 0)
                    <div class="service-features">
                        <h3 class="features-title">Key Features & Benefits</h3>
                        @foreach($service->features as $feature)
                        <div class="feature-item">
                            <div class="feature-icon">✓</div>
                            <div class="feature-text">{{ is_array($feature) ? $feature['feature'] : $feature }}</div>
                        </div>
                        @endforeach
                    </div>
                    @endif

                    <div class="service-cta">
                        <a href="{{ route('contact') }}" class="btn btn-primary">Get a Quote</a>
                        <a href="{{ route('contact') }}" class="btn btn-outline">Ask Questions</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Process Section -->
    <section class="process-section">
        <div class="container">
            <div class="section-title">
                <h2>How We Work</h2>
                <p>Our proven process ensures quality results every time</p>
            </div>

            <div class="process-grid">
                <div class="process-step">
                    <div class="step-number">1</div>
                    <h3 class="step-title">Consultation</h3>
                    <p class="step-description">We discuss your requirements and provide expert recommendations</p>
                </div>
                <div class="process-step">
                    <div class="step-number">2</div>
                    <h3 class="step-title">Design</h3>
                    <p class="step-description">Our team creates custom designs tailored to your brand</p>
                </div>
                <div class="process-step">
                    <div class="step-number">3</div>
                    <h3 class="step-title">Production</h3>
                    <p class="step-description">We manufacture your signage using premium materials</p>
                </div>
                <div class="process-step">
                    <div class="step-number">4</div>
                    <h3 class="step-title">Installation</h3>
                    <p class="step-description">Professional installation ensures perfect placement</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Related Services -->
    @if($related_services->count() > 0)
    <section class="section">
        <div class="container">
            <div class="related-services">
                <div class="section-title">
                    <h2>Related Services</h2>
                    <p>Other services you might be interested in</p>
                </div>

                <div class="related-grid">
                    @foreach($related_services as $related)
                    <div class="related-card">
                        @if($related->image)
                            <img src="{{ asset('storage/' . $related->image) }}" alt="{{ $related->title }}" class="related-img">
                        @else
                            <img src="/api/placeholder/400/200" alt="{{ $related->title }}" class="related-img">
                        @endif
                        <div class="related-content">
                            <h3 class="related-title">{{ $related->title }}</h3>
                            <p class="related-description">{{ $related->short_description ?? Str::limit($related->description, 100) }}</p>
                            <a href="{{ route('services.show', $related) }}" class="related-link">Learn More →</a>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    @endif
@endsection