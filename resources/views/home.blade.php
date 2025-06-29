
@extends('layouts.app')

@section('title', 'Home - DEI Signage & Branding')
@section('description', 'DEI Signage & Branding offers exclusive green media solutions in Zimbabwe. Professional signage, branding, and printing services.')

@section('styles')
<style>
    /* Hero Section */
    .hero {
        height: 85vh;
        background: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)), url('/api/placeholder/1200/800') center/cover;
        color: white;
        display: flex;
        align-items: center;
        text-align: center;
    }
    
    .hero-content {
        max-width: 800px;
        margin: 0 auto;
    }
    
    .hero h1 {
        font-size: 3rem;
        margin-bottom: 1rem;
    }
    
    .hero p {
        font-size: 1.2rem;
        margin-bottom: 2rem;
    }
    
    .hero-buttons {
        display: flex;
        justify-content: center;
        gap: 1rem;
    }
    
    .btn-outline {
        border: 2px solid white;
        color: white;
    }
    
    .btn-outline:hover {
        background-color: white;
        color: var(--primary);
    }

    /* Add this new class for non-hero sections */
    .btn-outline-dark {
        border: 2px solid var(--primary);
        color: var(--primary);
        background-color: transparent;
    }

    .btn-outline-dark:hover {
        background-color: var(--primary);
        color: white;
    }

    /* Services Grid */
    .services-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 2rem;
    }
    
    .service-card {
        background-color: white;
        border-radius: 8px;
        overflow: hidden;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s;
    }
    
    .service-card:hover {
        transform: translateY(-10px);
    }
    
    .service-img {
        height: 200px;
        width: 100%;
        object-fit: cover;
    }
    
    .service-content {
        padding: 1.5rem;
    }
    
    .service-content h3 {
        font-size: 1.5rem;
        margin-bottom: 1rem;
        color: var(--primary);
    }
    
    .service-content p {
        margin-bottom: 1.5rem;
        color: #666;
    }

    /* Portfolio Grid */
    .portfolio-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 1.5rem;
    }
    
    .portfolio-item {
        position: relative;
        overflow: hidden;
        border-radius: 8px;
        height: 250px;
    }
    
    .portfolio-img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.5s;
    }
    
    .portfolio-overlay {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 121, 107, 0.8);
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        opacity: 0;
        transition: opacity 0.5s;
        padding: 1rem;
        text-align: center;
    }
    
    .portfolio-item:hover .portfolio-overlay {
        opacity: 1;
    }
    
    .portfolio-item:hover .portfolio-img {
        transform: scale(1.1);
    }
    
    .portfolio-overlay h3 {
        color: white;
        margin-bottom: 0.5rem;
        font-size: 1.5rem;
    }
    
    .portfolio-overlay p {
        color: #eee;
    }

    /* Testimonials */
    .testimonials {
        background-color: var(--primary);
        color: white;
    }
    
    .testimonials .section-title h2 {
        color: white;
    }
    
    .testimonials .section-title p {
        color: #eee;
    }
    
    .testimonials-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 2rem;
    }
    
    .testimonial-card {
        background-color: rgba(255, 255, 255, 0.1);
        padding: 2rem;
        border-radius: 8px;
        position: relative;
    }
    
    .quote-icon {
        position: absolute;
        top: -15px;
        left: 20px;
        font-size: 4rem;
        color: var(--accent);
        opacity: 0.3;
    }
    
    .testimonial-content {
        margin-bottom: 1.5rem;
        font-style: italic;
    }
    
    .client-info {
        display: flex;
        align-items: center;
    }
    
    .client-photo {
        width: 50px;
        height: 50px;
        border-radius: 50%;
        object-fit: cover;
        margin-right: 1rem;
    }
    
    .client-details h4 {
        font-size: 1.1rem;
        margin-bottom: 0.3rem;
    }
    
    .client-details p {
        font-size: 0.9rem;
        color: #eee;
    }

    /* CTA Section */
    .cta {
        background: linear-gradient(rgba(0, 0, 0, 0.8), rgba(0, 0, 0, 0.8)), url('/api/placeholder/1200/600') center/cover;
        color: white;
        text-align: center;
    }
    
    .cta h2 {
        font-size: 2.5rem;
        margin-bottom: 1.5rem;
    }
    
    .cta p {
        max-width: 700px;
        margin: 0 auto 2rem;
        font-size: 1.1rem;
    }

    /* Responsive Design */
    @media (max-width: 768px) {
        .hero {
            height: auto;
            padding: 5rem 0;
        }
        
        .hero h1 {
            font-size: 2.2rem;
        }
        
        .hero-buttons {
            flex-direction: column;
            align-items: center;
        }
        
        .btn {
            width: 100%;
            margin-bottom: 0.8rem;
            text-align: center;
        }
    }
</style>
@endsection

@section('content')
    <!-- Hero Section -->
    <section class="hero">
        <div class="container">
            <div class="hero-content">
                <h1>Your Green Media Solutions Partner</h1>
                <p>We offer an exclusive experience in signage, branding, and printing services that make your business stand out.</p>
                <div class="hero-buttons">
                    <a href="{{ route('services') }}" class="btn btn-primary">Our Services</a>
                    <a href="{{ route('contact') }}" class="btn btn-outline-dark">Get In Touch</a>
                </div>
            </div>
        </div>
    </section>
    
    <!-- Services Section -->
    <section class="section">
        <div class="container">
            <div class="section-title">
                <h2>Our Services</h2>
                <p>We provide a wide range of high-quality signage and branding solutions for your business</p>
            </div>
            
            <div class="services-grid">
                @foreach($services as $service)
                    <div class="service-card">
                        @if($service->image)
                            <img src="{{ asset('storage/' . $service->image) }}" alt="{{ $service->title }}" class="service-img">
                        @else
                            <img src="/api/placeholder/400/200" alt="{{ $service->title }}" class="service-img">
                        @endif
                        <div class="service-content">
                            <h3>{{ $service->title }}</h3>
                            <p>{{ $service->short_description ?? Str::limit($service->description, 100) }}</p>
                            <a href="{{ route('services.show', $service) }}" class="btn btn-primary">Learn More</a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    
    <!-- Portfolio Section -->
    <section class="section" style="background-color: var(--light);">
        <div class="container">
            <div class="section-title">
                <h2>Featured Projects</h2>
                <p>Take a look at some of our recent work that showcases our expertise and craftsmanship</p>
            </div>
            
            <div class="portfolio-grid">
                @foreach($portfolio as $project)
                    <div class="portfolio-item">
                        @if($project->featured_image)
                            <img src="{{ asset('storage/' . $project->featured_image) }}" alt="{{ $project->title }}" class="portfolio-img">
                        @else
                            <img src="/api/placeholder/400/400" alt="{{ $project->title }}" class="portfolio-img">
                        @endif
                        <div class="portfolio-overlay">
                            <span style="color: var(--accent); font-weight: 500;">{{ ucfirst($project->category) }}</span>
                            <h3>{{ $project->title }}</h3>
                            <p>{{ $project->short_description ?? Str::limit($project->description, 60) }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
            
            <div style="text-align: center; margin-top: 3rem;">
                <a href="{{ route('portfolio') }}" class="btn btn-primary">View All Projects</a>
            </div>
        </div>
    </section>
    
    <!-- Testimonials Section -->
    @if($testimonials->count() > 0)
    <section class="section testimonials">
        <div class="container">
            <div class="section-title">
                <h2>What Our Clients Say</h2>
                <p>We pride ourselves on delivering exceptional service and quality that exceeds expectations</p>
            </div>
            
            <div class="testimonials-grid">
                @foreach($testimonials as $testimonial)
                    <div class="testimonial-card">
                        <div class="quote-icon">"</div>
                        <div class="testimonial-content">
                            <p>{{ $testimonial->content }}</p>
                        </div>
                        <div class="client-info">
                            @if($testimonial->client_photo)
                                <img src="{{ asset('storage/' . $testimonial->client_photo) }}" alt="{{ $testimonial->client_name }}" class="client-photo">
                            @else
                                <img src="/api/placeholder/50/50" alt="{{ $testimonial->client_name }}" class="client-photo">
                            @endif
                            <div class="client-details">
                                <h4>{{ $testimonial->client_name }}</h4>
                                @if($testimonial->client_position || $testimonial->client_company)
                                    <p>
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
    
    <!-- CTA Section -->
    <section class="section cta">
        <div class="container">
            <h2>Ready to Transform Your Brand Presence?</h2>
            <p>Contact us today to discuss your signage and branding needs. We'll help you create a visual identity that makes your business stand out.</p>
            <a href="{{ route('contact') }}" class="btn btn-secondary">Get a Free Consultation</a>
        </div>
    </section>
@endsection