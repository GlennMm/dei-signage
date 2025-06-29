
@extends('layouts.app')

@section('title', $portfolio->title . ' - Portfolio - DEI Signage & Branding')
@section('description', $portfolio->short_description ?? Str::limit($portfolio->description, 160))

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

    .project-hero {
        display: grid;
        grid-template-columns: 2fr 1fr;
        gap: 4rem;
        margin-bottom: 4rem;
    }

    .project-gallery {
        position: relative;
    }

    .main-image {
        width: 100%;
        height: 500px;
        object-fit: cover;
        border-radius: 8px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
    }

    .project-category {
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

    .thumbnail-gallery {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 1rem;
        margin-top: 1rem;
    }

    .thumbnail {
        height: 100px;
        object-fit: cover;
        border-radius: 4px;
        cursor: pointer;
        transition: opacity 0.3s;
    }

    .thumbnail:hover {
        opacity: 0.7;
    }

    .project-info {
        background-color: white;
        padding: 2rem;
        border-radius: 8px;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        height: fit-content;
    }

    .project-info h1 {
        font-size: 2rem;
        color: var(--primary);
        margin-bottom: 1rem;
    }

    .project-meta {
        margin-bottom: 2rem;
    }

    .meta-item {
        display: flex;
        margin-bottom: 1rem;
        padding-bottom: 1rem;
        border-bottom: 1px solid #eee;
    }

    .meta-item:last-child {
        border-bottom: none;
        margin-bottom: 0;
        padding-bottom: 0;
    }

    .meta-label {
        flex: 0 0 100px;
        font-weight: 600;
        color: var(--primary);
        font-size: 0.9rem;
    }

    .meta-value {
        flex: 1;
        color: #555;
        font-size: 0.9rem;
    }

    .services-provided {
        margin-bottom: 2rem;
    }

    .services-title {
        font-size: 1.2rem;
        color: var(--primary);
        margin-bottom: 1rem;
        font-weight: 600;
    }

    .service-tag {
        display: inline-block;
        background-color: var(--light);
        color: var(--primary);
        padding: 0.3rem 0.8rem;
        border-radius: 15px;
        font-size: 0.8rem;
        margin: 0.2rem 0.2rem 0.2rem 0;
        font-weight: 500;
    }

    .project-cta {
        margin-top: 2rem;
    }

    .btn {
        display: block;
        width: 100%;
        padding: 1rem;
        background-color: var(--primary);
        color: white;
        text-decoration: none;
        border-radius: 4px;
        font-weight: bold;
        text-align: center;
        transition: background-color 0.3s;
        margin-bottom: 1rem;
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

    /* Project Details */
    .project-details {
        margin-bottom: 4rem;
    }

    .project-description {
        font-size: 1.1rem;
        color: #555;
        line-height: 1.8;
        margin-bottom: 2rem;
    }

    .detail-section {
        background-color: white;
        padding: 2rem;
        border-radius: 8px;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        margin-bottom: 2rem;
    }

    .detail-title {
        font-size: 1.5rem;
        color: var(--primary);
        margin-bottom: 1rem;
        font-weight: 600;
    }

    /* Related Projects */
    .related-projects {
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

    @media (max-width: 992px) {
        .project-hero {
            grid-template-columns: 1fr;
            gap: 2rem;
        }

        .thumbnail-gallery {
            grid-template-columns: repeat(3, 1fr);
        }
    }

    @media (max-width: 768px) {
        .page-banner h1 {
            font-size: 2.2rem;
        }

        .project-info h1 {
            font-size: 1.5rem;
        }

        .thumbnail-gallery {
            grid-template-columns: repeat(2, 1fr);
        }
    }
</style>
@endsection

@section('content')
    <!-- Page Banner -->
    <section class="page-banner">
        <div class="container">
            <h1>{{ $portfolio->title }}</h1>
            <div class="breadcrumb">
                <a href="{{ route('home') }}">Home</a>
                <span>/</span>
                <a href="{{ route('portfolio') }}">Portfolio</a>
                <span>/</span>
                <span class="active">{{ $portfolio->title }}</span>
            </div>
        </div>
    </section>

    <!-- Project Hero -->
    <section class="section">
        <div class="container">
            <div class="project-hero">
                <div class="project-gallery">
                    @if($portfolio->featured_image)
                        <img src="{{ asset('storage/' . $portfolio->featured_image) }}" alt="{{ $portfolio->title }}" class="main-image" id="mainImage">
                    @else
                        <img src="/api/placeholder/800/500" alt="{{ $portfolio->title }}" class="main-image" id="mainImage">
                    @endif
                    <div class="project-category">{{ ucfirst(str_replace('_', ' ', $portfolio->category)) }}</div>

                    @if($portfolio->images && count($portfolio->images) > 0)
                    <div class="thumbnail-gallery">
                        @if($portfolio->featured_image)
                            <img src="{{ asset('storage/' . $portfolio->featured_image) }}" alt="{{ $portfolio->title }}" class="thumbnail" onclick="changeMainImage(this.src)">
                        @endif
                        @foreach($portfolio->images as $image)
                            <img src="{{ asset('storage/' . $image) }}" alt="{{ $portfolio->title }}" class="thumbnail" onclick="changeMainImage(this.src)">
                        @endforeach
                    </div>
                    @endif
                </div>

                <div class="project-info">
                    <h1>{{ $portfolio->title }}</h1>

                    <div class="project-meta">
                        @if($portfolio->client_name)
                        <div class="meta-item">
                            <div class="meta-label">Client:</div>
                            <div class="meta-value">{{ $portfolio->client_name }}</div>
                        </div>
                        @endif

                        @if($portfolio->project_location)
                        <div class="meta-item">
                            <div class="meta-label">Location:</div>
                            <div class="meta-value">{{ $portfolio->project_location }}</div>
                        </div>
                        @endif

                        @if($portfolio->completion_date)
                        <div class="meta-item">
                            <div class="meta-label">Completed:</div>
                            <div class="meta-value">{{ $portfolio->completion_date->format('F Y') }}</div>
                        </div>
                        @endif

                        <div class="meta-item">
                            <div class="meta-label">Category:</div>
                            <div class="meta-value">{{ ucfirst(str_replace('_', ' ', $portfolio->category)) }}</div>
                        </div>
                    </div>

                    @if($portfolio->services_provided && count($portfolio->services_provided) > 0)
                    <div class="services-provided">
                        <h3 class="services-title">Services Provided</h3>
                        @foreach($portfolio->services_provided as $service)
                            <span class="service-tag">{{ is_array($service) ? $service['service'] : $service }}</span>
                        @endforeach
                    </div>
                    @endif

                    <div class="project-cta">
                        <a href="{{ route('contact') }}" class="btn">Start Your Project</a>
                        <a href="{{ route('portfolio') }}" class="btn btn-outline">View More Projects</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Project Details -->
    <section class="section project-details">
        <div class="container">
            <div class="detail-section">
                <h2 class="detail-title">Project Overview</h2>
                <div class="project-description">
                    {!! $portfolio->description !!}
                </div>
            </div>
        </div>
    </section>

    <!-- Related Projects -->
    @if($related_projects->count() > 0)
    <section class="related-projects">
        <div class="container">
            <div class="section-title">
                <h2>Related Projects</h2>
                <p>Similar projects in the {{ ucfirst(str_replace('_', ' ', $portfolio->category)) }} category</p>
            </div>

            <div class="related-grid">
                @foreach($related_projects as $related)
                <div class="related-card">
                    @if($related->featured_image)
                        <img src="{{ asset('storage/' . $related->featured_image) }}" alt="{{ $related->title }}" class="related-img">
                    @else
                        <img src="/api/placeholder/400/200" alt="{{ $related->title }}" class="related-img">
                    @endif
                    <div class="related-content">
                        <h3 class="related-title">{{ $related->title }}</h3>
                        <p class="related-description">{{ $related->short_description ?? Str::limit($related->description, 100) }}</p>
                        <a href="{{ route('portfolio.show', $related) }}" class="related-link">View Project →</a>
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
function changeMainImage(src) {
    document.getElementById('mainImage').src = src;
}
</script>
@endpush