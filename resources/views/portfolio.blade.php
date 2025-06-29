
@extends('layouts.app')

@section('title', 'Portfolio - DEI Signage & Branding')
@section('description', 'Explore our diverse portfolio of signage and branding projects. See our expertise in 3D illuminated signs, gate signs, office branding and more.')

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

    .portfolio-intro {
        max-width: 800px;
        margin: 0 auto 4rem;
        text-align: center;
    }

    .portfolio-intro p {
        font-size: 1.2rem;
        margin-bottom: 1.5rem;
        color: #555;
    }

    /* Featured Project */
    .featured-project {
        background-color: white;
        border-radius: 8px;
        overflow: hidden;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        margin-bottom: 4rem;
    }

    .featured-header {
        background-color: var(--primary);
        color: white;
        padding: 1rem 2rem;
        font-size: 1.2rem;
        display: flex;
        align-items: center;
    }

    .featured-star {
        font-size: 1.5rem;
        margin-right: 0.5rem;
    }

    .featured-content {
        display: grid;
        grid-template-columns: 1fr 1fr;
    }

    .featured-img {
        height: 100%;
        width: 100%;
        object-fit: cover;
    }

    .featured-text {
        padding: 3rem;
    }

    .featured-category {
        color: var(--primary);
        font-weight: 500;
        margin-bottom: 0.5rem;
    }

    .featured-title {
        font-size: 2rem;
        margin-bottom: 1.5rem;
        color: var(--dark);
    }

    .featured-desc {
        color: #555;
        margin-bottom: 1.5rem;
        font-size: 1.1rem;
    }

    .featured-details {
        margin-bottom: 2rem;
    }

    .detail-item {
        display: flex;
        margin-bottom: 0.8rem;
    }

    .detail-label {
        flex: 0 0 120px;
        font-weight: 500;
        color: var(--primary);
    }

    .detail-value {
        color: #555;
    }

    .featured-btn {
        display: inline-block;
        background-color: var(--primary);
        color: white;
        padding: 0.8rem 2rem;
        border-radius: 4px;
        text-decoration: none;
        font-weight: 500;
        transition: background-color 0.3s;
    }

    .featured-btn:hover {
        background-color: #005a4f;
    }

    /* Portfolio Filter */
    .portfolio-filter {
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

    /* Portfolio Grid */
    .portfolio-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(350px, 1fr));
        gap: 2rem;
    }

    /* Portfolio Grid */
    .portfolio-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(350px, 1fr));
        gap: 2rem;
    }

    .portfolio-item {
        border-radius: 8px;
        overflow: hidden;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        background-color: white;
    }

    .portfolio-img {
        height: 250px;
        width: 100%;
        object-fit: cover;
    }

    .portfolio-content {
        padding: 1.5rem;
    }

    .portfolio-category {
        color: var(--primary);
        font-weight: 500;
        margin-bottom: 0.5rem;
        font-size: 0.9rem;
    }

    .portfolio-title {
        font-size: 1.5rem;
        margin-bottom: 1rem;
        color: var(--dark);
    }

    .portfolio-desc {
        color: #666;
        margin-bottom: 1.5rem;
    }

    .portfolio-link {
        display: inline-flex;
        align-items: center;
        color: var(--primary);
        font-weight: 500;
        text-decoration: none;
        transition: color 0.3s;
    }

    .portfolio-link:hover {
        color: var(--accent);
    }

    .portfolio-link-icon {
        margin-left: 0.5rem;
        font-size: 1.2rem;
    }

    @media (max-width: 992px) {
        .featured-content {
            grid-template-columns: 1fr;
        }
        
        .featured-img {
            height: 300px;
        }
    }
    
    @media (max-width: 768px) {
        .page-banner h1 {
            font-size: 2.2rem;
        }
        
        .portfolio-grid {
            grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
        }
    }
</style>
@endsection

@section('content')
    <!-- Page Banner -->
    <section class="page-banner">
        <div class="container">
            <h1>Our Portfolio</h1>
            <div class="breadcrumb">
                <a href="{{ route('home') }}">Home</a>
                <span>/</span>
                <a href="#" class="active">Portfolio</a>
            </div>
        </div>
    </section>
    
    <!-- Portfolio Section -->
    <section class="section">
        <div class="container">
            <div class="portfolio-intro">
                <h2>Our Recent Projects</h2>
                <p>Explore our diverse collection of signage and branding projects that showcase our expertise, creativity, and commitment to excellence. Each project reflects our dedication to delivering impactful visual solutions that help our clients stand out.</p>
            </div>
            
            <!-- Featured Project -->
            @if($featured_project)
            <div class="featured-project">
                <div class="featured-header">
                    <span class="featured-star">★</span> Featured Project
                </div>
                <div class="featured-content">
                    @if($featured_project->featured_image)
                        <img src="{{ asset('storage/' . $featured_project->featured_image) }}" alt="{{ $featured_project->title }}" class="featured-img">
                    @else
                        <img src="/api/placeholder/600/600" alt="{{ $featured_project->title }}" class="featured-img">
                    @endif
                    <div class="featured-text">
                        <p class="featured-category">{{ ucfirst(str_replace('_', ' ', $featured_project->category)) }}</p>
                        <h3 class="featured-title">{{ $featured_project->title }}</h3>
                        <p class="featured-desc">{{ $featured_project->description }}</p>
                        <div class="featured-details">
                            @if($featured_project->client_name)
                            <div class="detail-item">
                                <div class="detail-label">Client:</div>
                                <div class="detail-value">{{ $featured_project->client_name }}</div>
                            </div>
                            @endif
                            @if($featured_project->services_provided && count($featured_project->services_provided) > 0)
                            <div class="detail-item">
                                <div class="detail-label">Services:</div>
                                <div class="detail-value">
                                    @foreach($featured_project->services_provided as $service)
                                        {{ is_array($service) ? $service['service'] : $service }}{{ !$loop->last ? ', ' : '' }}
                                    @endforeach
                                </div>
                            </div>
                            @endif
                            @if($featured_project->project_location)
                            <div class="detail-item">
                                <div class="detail-label">Location:</div>
                                <div class="detail-value">{{ $featured_project->project_location }}</div>
                            </div>
                            @endif
                            @if($featured_project->completion_date)
                            <div class="detail-item">
                                <div class="detail-label">Completion:</div>
                                <div class="detail-value">{{ $featured_project->completion_date->format('F Y') }}</div>
                            </div>
                            @endif
                        </div>
                        <a href="{{ route('portfolio.show', $featured_project) }}" class="featured-btn">View Project Details</a>
                    </div>
                </div>
            </div>
            @endif
            
            <!-- Portfolio Filter -->
            @if(count($categories) > 0)
            <div class="portfolio-filter">
                <a href="{{ route('portfolio') }}" class="filter-btn {{ !request('category') ? 'active' : '' }}">All</a>
                @foreach($categories as $category)
                    <a href="{{ route('portfolio', ['category' => $category]) }}" 
                       class="filter-btn {{ request('category') == $category ? 'active' : '' }}">
                        {{ ucfirst(str_replace('_', ' ', $category)) }}
                    </a>
                @endforeach
            </div>
            @endif
            
            <!-- Portfolio Grid -->
            <div class="portfolio-grid">
                @forelse($portfolio as $project)
                    <div class="portfolio-item">
                        @if($project->featured_image)
                            <img src="{{ asset('storage/' . $project->featured_image) }}" alt="{{ $project->title }}" class="portfolio-img">
                        @else
                            <img src="/api/placeholder/400/250" alt="{{ $project->title }}" class="portfolio-img">
                        @endif
                        <div class="portfolio-content">
                            <p class="portfolio-category">{{ ucfirst(str_replace('_', ' ', $project->category)) }}</p>
                            <h3 class="portfolio-title">{{ $project->title }}</h3>
                            <p class="portfolio-desc">{{ $project->short_description ?? Str::limit($project->description, 100) }}</p>
                            <a href="{{ route('portfolio.show', $project) }}" class="portfolio-link">
                                View Project <span class="portfolio-link-icon">→</span>
                            </a>
                        </div>
                    </div>
                @empty
                    <div style="grid-column: 1 / -1; text-align: center; padding: 3rem;">
                        <p>No projects found for the selected category.</p>
                        <a href="{{ route('portfolio') }}" class="btn btn-primary" style="margin-top: 1rem;">View All Projects</a>
                    </div>
                @endforelse
            </div>
        </div>
    </section>
@endsection