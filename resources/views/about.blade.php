
@extends('layouts.app')

@section('title', 'About Us - DEI Signage & Branding')
@section('description', 'Learn about DEI Signage & Branding - our vision, mission, core values, and the passionate team behind our green media solutions.')

@section('styles')
<style>
    /* Page Banner */
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

    .about-intro {
        max-width: 800px;
        margin: 0 auto 4rem;
        text-align: center;
    }

    .about-intro p {
        font-size: 1.2rem;
        margin-bottom: 1.5rem;
        color: #555;
    }

    .about-content {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 3rem;
        margin-bottom: 4rem;
    }
    
    .about-card {
        background-color: white;
        border-radius: 8px;
        overflow: hidden;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        padding: 2.5rem;
        text-align: center;
    }
    
    .about-card h3 {
        color: var(--primary);
        margin-bottom: 1.5rem;
        font-size: 1.8rem;
    }
    
    .about-card-icon {
        font-size: 3.5rem;
        color: var(--accent);
        margin-bottom: 2rem;
    }
    
    .about-card p {
        color: #666;
        font-size: 1.1rem;
        line-height: 1.7;
    }

    .about-values {
        max-width: 800px;
        margin: 0 auto;
        padding: 3rem;
        background-color: #f9f9f9;
        border-radius: 10px;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
    }

    .values-title {
        text-align: center;
        margin-bottom: 2rem;
        color: var(--primary);
        font-size: 2rem;
    }

    .value-item {
        display: flex;
        margin-bottom: 2rem;
        align-items: flex-start;
    }

    .value-icon {
        flex: 0 0 60px;
        width: 60px;
        height: 60px;
        background-color: var(--primary);
        color: white;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.8rem;
        margin-right: 1.5rem;
    }

    .value-text {
        flex: 1;
    }

    .value-text h4 {
        font-size: 1.4rem;
        margin-bottom: 0.5rem;
        color: var(--primary);
    }

    .value-text p {
        color: #666;
        font-size: 1.1rem;
    }

    /* Team Section */
    .bg-light {
        background-color: var(--light);
    }

    .team-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 2rem;
    }

    .team-member {
        background-color: white;
        border-radius: 8px;
        overflow: hidden;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        text-align: center;
    }

    .team-photo {
        width: 100%;
        height: 300px;
        object-fit: cover;
    }

    .team-info {
        padding: 1.5rem;
    }

    .team-info h3 {
        font-size: 1.5rem;
        margin-bottom: 0.5rem;
        color: var(--primary);
    }

    .team-position {
        font-size: 1rem;
        color: #666;
        margin-bottom: 1rem;
        font-style: italic;
    }

    .team-bio {
        margin-bottom: 1.5rem;
        color: #555;
    }

    .team-social {
        display: flex;
        justify-content: center;
        gap: 1rem;
    }

    .social-link {
        width: 35px;
        height: 35px;
        background-color: var(--primary);
        color: white;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        text-decoration: none;
        transition: background-color 0.3s;
    }

    .social-link:hover {
        background-color: var(--accent);
    }

    /* History Timeline */
    .timeline {
        position: relative;
        max-width: 800px;
        margin: 0 auto;
        padding: 2rem 0;
    }

    .timeline::after {
        content: '';
        position: absolute;
        width: 3px;
        background-color: var(--primary);
        top: 0;
        bottom: 0;
        left: 50%;
        margin-left: -1.5px;
    }

    .timeline-item {
        padding: 10px 40px;
        position: relative;
        width: 50%;
        box-sizing: border-box;
    }

    .timeline-item::after {
        content: '';
        position: absolute;
        width: 20px;
        height: 20px;
        background-color: white;
        border: 4px solid var(--accent);
        top: 15px;
        border-radius: 50%;
        z-index: 1;
    }

    .timeline-left {
        left: 0;
    }

    .timeline-right {
        left: 50%;
    }

    .timeline-left::after {
        right: -10px;
    }

    .timeline-right::after {
        left: -10px;
    }

    .timeline-content {
        padding: 1.5rem;
        background-color: white;
        border-radius: 8px;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
    }

    .timeline-year {
        font-size: 1.2rem;
        font-weight: bold;
        color: var(--primary);
        margin-bottom: 0.5rem;
    }

    .timeline-title {
        font-size: 1.4rem;
        margin-bottom: 0.8rem;
        color: var(--dark);
    }

    .timeline-text {
        color: #666;
    }

    @media (max-width: 768px) {
        .page-banner h1 {
            font-size: 2.2rem;
        }

        .timeline::after {
            left: 20px;
        }

        .timeline-item {
            width: 100%;
            padding-left: 50px;
            padding-right: 0;
        }

        .timeline-left::after, .timeline-right::after {
            left: 10px;
        }

        .timeline-right {
            left: 0;
        }
    }
</style>
@endsection

@section('content')
    <!-- Page Banner -->
    <section class="page-banner">
        <div class="container">
            <h1>About Us</h1>
            <div class="breadcrumb">
                <a href="{{ route('home') }}">Home</a>
                <span>/</span>
                <a href="#" class="active">About Us</a>
            </div>
        </div>
    </section>
    
    <!-- About Section -->
    <section class="section">
        <div class="container">
            <div class="about-intro">
                <h2>Welcome to DEI Signage & Branding</h2>
                <p>We are a leading provider of premium signage and branding solutions in Zimbabwe. With a passion for craftsmanship and innovative design, we help businesses and individuals make a lasting impression through high-quality visual communication.</p>
                <p>Our team of experienced professionals is dedicated to delivering exceptional products that exceed expectations and transform spaces.</p>
            </div>
            
            <div class="about-content">
                <div class="about-card">
                    <div class="about-card-icon">🔍</div>
                    <h3>Our Vision</h3>
                    <p>To offer an exclusive experience in green media solutions that empower businesses with impactful visual communications and contribute positively to environmental sustainability.</p>
                </div>
                
                <div class="about-card">
                    <div class="about-card-icon">🎯</div>
                    <h3>Our Mission</h3>
                    <p>To provide high-quality, innovative signage and branding solutions that help our clients effectively communicate their identity, enhance their visibility, and achieve their marketing objectives.</p>
                </div>
                
                <div class="about-card">
                    <div class="about-card-icon">⭐</div>
                    <h3>Our Objectives</h3>
                    <p>By 2025, we aim to:<br>
                    - Maintain a management culture that is action-oriented and flexible<br>
                    - Strengthen our position as your digital marketing partner<br>
                    - Enhance the company's corporate social responsibility initiatives</p>
                </div>
            </div>

            @if($core_values->count() > 0)
            <div class="about-values">
                <h3 class="values-title">Our Core Values</h3>
                
                @foreach($core_values as $value)
                <div class="value-item">
                    <div class="value-icon">{{ $value->icon ?? substr($value->title, 0, 1) }}</div>
                    <div class="value-text">
                        <h4>{{ $value->title }}</h4>
                        <p>{{ $value->description }}</p>
                    </div>
                </div>
                @endforeach
            </div>
            @endif
        </div>
    </section>
    
    <!-- Team Section -->
    @if($team_members->count() > 0)
    <section class="section bg-light">
        <div class="container">
            <div class="section-title">
                <h2>Meet Our Team</h2>
                <p>Our talented professionals bring creativity, expertise, and passion to every project</p>
            </div>
            
            <div class="team-grid">
                @foreach($team_members as $member)
                <div class="team-member">
                    @if($member->photo)
                        <img src="{{ asset('storage/' . $member->photo) }}" alt="{{ $member->name }}" class="team-photo">
                    @else
                        <img src="/api/placeholder/300/300" alt="{{ $member->name }}" class="team-photo">
                    @endif
                    <div class="team-info">
                        <h3>{{ $member->name }}</h3>
                        <p class="team-position">{{ $member->position }}</p>
                        @if($member->bio)
                            <p class="team-bio">{{ $member->bio }}</p>
                        @endif
                        @if($member->social_links)
                            <div class="team-social">
                                @foreach($member->social_links as $link)
                                    <a href="{{ $link['url'] }}" class="social-link" target="_blank">
                                        {{ strtoupper(substr($link['platform'], 0, 2)) }}
                                    </a>
                                @endforeach
                            </div>
                        @endif
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    @endif
    
    <!-- Company History -->
    @if($timeline->count() > 0)
    <section class="section">
        <div class="container">
            <div class="section-title">
                <h2>Our Journey</h2>
                <p>The story of DEI Signage & Branding's growth and evolution</p>
            </div>
            
            <div class="timeline">
                @foreach($timeline as $index => $event)
                <div class="timeline-item {{ $index % 2 == 0 ? 'timeline-left' : 'timeline-right' }}">
                    <div class="timeline-content">
                        <div class="timeline-year">{{ $event->year }}</div>
                        <h3 class="timeline-title">{{ $event->title }}</h3>
                        <p class="timeline-text">{{ $event->description }}</p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    @endif
@endsection