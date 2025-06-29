
@extends('layouts.app')

@section('title', 'Our Services - DEI Signage & Branding')
@section('description', 'Comprehensive signage and branding services including 2D signs on Dibond, 3D illuminated signs, gate signs, and exhibition materials.')

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

    .services-intro {
        max-width: 800px;
        margin: 0 auto 4rem;
        text-align: center;
    }

    .services-intro p {
        font-size: 1.2rem;
        margin-bottom: 1.5rem;
        color: #555;
    }

    /* Service Detail */
    .service-detail {
        margin-bottom: 6rem;
    }

    .service-detail:last-child {
        margin-bottom: 0;
    }

    .service-row {
        display: flex;
        flex-wrap: wrap;
        align-items: center;
        gap: 3rem;
    }

    .service-reverse {
        flex-direction: row-reverse;
    }

    .service-image, .service-content {
        flex: 1 1 400px;
    }

    .service-image img {
        width: 100%;
        height: auto;
        border-radius: 8px;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
    }

    .service-content h3 {
        font-size: 2rem;
        color: var(--primary);
        margin-bottom: 1.5rem;
    }

    .service-content p {
        font-size: 1.1rem;
        color: #555;
        margin-bottom: 1.5rem;
    }

    .service-highlights {
        margin-bottom: 2rem;
    }

    .highlight-item {
        display: flex;
        align-items: flex-start;
        margin-bottom: 1rem;
    }

    .highlight-icon {
        flex: 0 0 30px;
        width: 30px;
        height: 30px;
        background-color: var(--accent);
        color: var(--dark);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1rem;
        margin-right: 1rem;
        margin-top: 0.2rem;
    }

    .highlight-text p {
        margin: 0;
        font-size: 1rem;
    }

    .service-cta {
        background-color: var(--primary);
        color: white;
        padding: 1rem 2rem;
        border-radius: 4px;
        text-decoration: none;
        font-weight: bold;
        display: inline-block;
        transition: background-color 0.3s;
    }

    .service-cta:hover {
        background-color: #005a4f;
    }

    /* Process Section */
    .bg-light {
        background-color: var(--light);
    }

    .process-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 2rem;
    }

    .process-card {
        background-color: white;
        border-radius: 8px;
        overflow: hidden;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        text-align: center;
        padding: 2rem;
    }

    .process-number {
        width: 60px;
        height: 60px;
        background-color: var(--primary);
        color: white;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.5rem;
        font-weight: bold;
        margin: 0 auto 1.5rem;
    }

    .process-card h3 {
        font-size: 1.5rem;
        margin-bottom: 1rem;
        color: var(--primary);
    }

    .process-card p {
        color: #666;
    }

    /* FAQ Section */
    .faq-container {
        max-width: 800px;
        margin: 0 auto;
    }

    .faq-item {
        background-color: white;
        border-radius: 8px;
        overflow: hidden;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        margin-bottom: 1.5rem;
    }

    .faq-question {
        padding: 1.5rem;
        cursor: pointer;
        position: relative;
        font-weight: bold;
        font-size: 1.1rem;
        color: var(--primary);
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .faq-question::after {
        content: '+';
        font-size: 1.5rem;
    }

    .faq-answer {
        padding: 0 1.5rem 1.5rem;
        color: #555;
        display: none;
    }

    @media (max-width: 768px) {
        .page-banner h1 {
            font-size: 2.2rem;
        }

        .service-row {
            flex-direction: column;
        }

        .service-reverse {
            flex-direction: column;
        }

        .service-content h3 {
            font-size: 1.8rem;
        }
    }
</style>
@endsection

@section('content')
    <!-- Page Banner -->
    <section class="page-banner">
        <div class="container">
            <h1>Our Services</h1>
            <div class="breadcrumb">
                <a href="{{ route('home') }}">Home</a>
                <span>/</span>
                <a href="#" class="active">Services</a>
            </div>
        </div>
    </section>
    
    <!-- Services Intro -->
    <section class="section">
        <div class="container">
            <div class="services-intro">
                <h2>Comprehensive Signage & Branding Solutions</h2>
                <p>At DEI Signage & Branding, we offer a wide range of premium signage, branding, and printing services designed to help your business make a lasting impression. Our commitment to quality, innovation, and sustainability sets us apart in delivering visual communication solutions that truly stand out.</p>
                <p>Explore our services below and discover how we can transform your brand's visual presence.</p>
            </div>
            
            @foreach($services as $index => $service)
            <!-- Service Detail -->
            <div id="{{ $service->slug }}" class="service-detail">
                <div class="service-row {{ $index % 2 == 1 ? 'service-reverse' : '' }}">
                    <div class="service-image">
                        @if($service->image)
                            <img src="{{ asset('storage/' . $service->image) }}" alt="{{ $service->title }}">
                        @else
                            <img src="/api/placeholder/600/400" alt="{{ $service->title }}">
                        @endif
                    </div>
                    <div class="service-content">
                        <h3>{{ $service->title }}</h3>
                        <p>{!! $service->description !!}</p>
                        
                        @if($service->features && count($service->features) > 0)
                        <div class="service-highlights">
                            @foreach($service->features as $feature)
                            <div class="highlight-item">
                                <div class="highlight-icon">✓</div>
                                <div class="highlight-text">
                                    <p>{{ $feature['feature'] ?? $feature }}</p>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        @endif
                        
                        <a href="{{ route('contact') }}" class="service-cta">Request a Quote</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </section>
    
    <!-- Our Process -->
    <section class="section bg-light">
        <div class="container">
            <div class="section-title">
                <h2>Our Process</h2>
                <p>How we bring your signage and branding projects to life</p>
            </div>
            
            <div class="process-grid">
                <div class="process-card">
                    <div class="process-number">1</div>
                    <h3>Consultation</h3>
                    <p>We begin with a detailed discussion of your requirements, goals, and brand identity to understand your vision and expectations.</p>
                </div>
                
                <div class="process-card">
                    <div class="process-number">2</div>
                    <h3>Design</h3>
                    <p>Our creative team develops custom designs based on your requirements, providing visual concepts for your approval.</p>
                </div>
                
                <div class="process-card">
                    <div class="process-number">3</div>
                    <h3>Production</h3>
                    <p>Once the design is approved, we move to production using high-quality materials and state-of-the-art equipment.</p>
                </div>
                
                <div class="process-card">
                    <div class="process-number">4</div>
                    <h3>Installation</h3>
                    <p>Our professional team handles the installation of your signage, ensuring proper placement and secure mounting.</p>
                </div>
            </div>
        </div>
    </section>
    
    <!-- FAQ Section -->
    @if($faqs->count() > 0)
    <section class="section">
        <div class="container">
            <div class="section-title">
                <h2>Frequently Asked Questions</h2>
                <p>Answers to common questions about our services</p>
            </div>
            
            <div class="faq-container">
                @foreach($faqs as $faq)
                <div class="faq-item">
                    <div class="faq-question" onclick="toggleFaq(this)">{{ $faq->question }}</div>
                    <div class="faq-answer">
                        {!! $faq->answer !!}
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    @endif
@endsection

@push('scripts')
<script>
function toggleFaq(element) {
    const answer = element.nextElementSibling;
    const isOpen = answer.style.display === 'block';
    
    // Close all FAQs
    document.querySelectorAll('.faq-answer').forEach(item => {
        item.style.display = 'none';
    });
    document.querySelectorAll('.faq-question').forEach(item => {
        item.style.backgroundColor = '';
    });
    
    // Toggle current FAQ
    if (!isOpen) {
        answer.style.display = 'block';
        element.style.backgroundColor = '#f0f0f0';
    }
}
</script>
@endpush