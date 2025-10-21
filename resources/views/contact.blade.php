@extends('layouts.app')

@section('title', 'Contact Us - DEI Signage & Branding')
@section('description', 'Get in touch with DEI Signage & Branding. Contact us for quotes, consultations, or any questions about our signage and branding services.')

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

    .contact-intro {
        max-width: 800px;
        margin: 0 auto 4rem;
        text-align: center;
    }

    .contact-intro p {
        font-size: 1.2rem;
        margin-bottom: 1.5rem;
        color: #555;
    }

    .contact-container {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 3rem;
    }

    /* Contact Info */
    .contact-info h3 {
        font-size: 1.8rem;
        color: var(--primary);
        margin-bottom: 2rem;
        position: relative;
        padding-bottom: 1rem;
    }

    .contact-info h3::after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 0;
        width: 50px;
        height: 3px;
        background-color: var(--accent);
    }

    .contact-card {
        display: flex;
        margin-bottom: 2rem;
    }

    .contact-icon {
        flex: 0 0 60px;
        width: 60px;
        height: 60px;
        background-color: var(--primary);
        color: white;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-right: 1.5rem;
        transition: all 0.3s ease;
        border: 3px solid transparent;
    }
    
    .contact-card:hover .contact-icon {
        background-color: var(--accent);
        color: var(--dark);
        transform: scale(1.1);
        border-color: var(--accent);
        box-shadow: 0 5px 15px rgba(255, 183, 0, 0.3);
    }
    
    .contact-icon svg {
        transition: transform 0.3s ease;
    }
    
    .contact-card:hover .contact-icon svg {
        transform: scale(1.1);
    }

    .contact-text {
        flex: 1;
    }

    .contact-text h4 {
        font-size: 1.3rem;
        color: var(--dark);
        margin-bottom: 0.5rem;
    }

    .contact-text p, .contact-text a {
        color: #555;
        font-size: 1.1rem;
        margin-bottom: 0.5rem;
        text-decoration: none;
        transition: color 0.3s;
        display: block;
    }

    .contact-text a:hover {
        color: var(--primary);
    }

    .social-links {
        display: flex;
        gap: 1rem;
        margin-top: 2rem;
    }

    .social-link {
        width: 45px;
        height: 45px;
        background-color: var(--primary);
        color: white;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        text-decoration: none;
        transition: all 0.3s ease;
        border: 2px solid transparent;
    }

    .social-link:hover {
        background-color: var(--accent);
        color: var(--dark);
        transform: translateY(-3px);
        box-shadow: 0 5px 15px rgba(255, 183, 0, 0.3);
        border-color: var(--accent);
    }
    
    .social-link svg {
        transition: transform 0.3s ease;
    }
    
    .social-link:hover svg {
        transform: scale(1.1);
    }

    /* Working Hours */
    .working-hours {
        margin-top: 2.5rem;
    }

    .hours-title {
        font-size: 1.3rem;
        color: var(--primary);
        margin-bottom: 1rem;
        font-weight: 500;
    }

    .hours-list {
        list-style: none;
    }

    .hours-item {
        display: flex;
        justify-content: space-between;
        padding: 0.8rem 0;
        border-bottom: 1px solid #eee;
    }

    .hours-item:last-child {
        border-bottom: none;
    }

    .day {
        font-weight: 500;
        color: var(--dark);
    }

    .time {
        color: #555;
    }

    /* Contact Form */
    .contact-form {
        background-color: white;
        padding: 2.5rem;
        border-radius: 8px;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
    }

    .contact-form h3 {
        font-size: 1.8rem;
        color: var(--primary);
        margin-bottom: 2rem;
        position: relative;
        padding-bottom: 1rem;
    }

    .contact-form h3::after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 0;
        width: 50px;
        height: 3px;
        background-color: var(--accent);
    }

    .form-group {
        margin-bottom: 1.5rem;
    }

    .form-label {
        display: block;
        margin-bottom: 0.5rem;
        font-weight: 500;
        color: var(--dark);
    }

    .form-control {
        width: 100%;
        padding: 0.8rem 1rem;
        border: 1px solid #ddd;
        border-radius: 4px;
        font-size: 1rem;
        transition: border-color 0.3s;
    }

    .form-control:focus {
        outline: none;
        border-color: var(--primary);
    }

    textarea.form-control {
        height: 150px;
        resize: vertical;
    }

    .form-row {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 1.5rem;
    }

    .btn-submit {
        background-color: var(--primary);
        color: white;
        padding: 1rem 2rem;
        border: none;
        border-radius: 4px;
        font-size: 1rem;
        font-weight: 500;
        cursor: pointer;
        transition: background-color 0.3s;
    }

    .btn-submit:hover {
        background-color: #005a4f;
    }

    /* FAQ Section */
    .bg-light {
        background-color: var(--light);
    }

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

    @media (max-width: 992px) {
        .contact-container {
            grid-template-columns: 1fr;
        }

        .contact-info {
            order: 2;
        }

        .contact-form {
            order: 1;
            margin-bottom: 3rem;
        }
    }
    
    @media (max-width: 768px) {
        .page-banner h1 {
            font-size: 2.2rem;
        }

        .form-row {
            grid-template-columns: 1fr;
            gap: 0;
        }
    }
</style>
@endsection

@section('content')
    <!-- Page Banner -->
    <section class="page-banner">
        <div class="container">
            <h1>Contact Us</h1>
            <div class="breadcrumb">
                <a href="{{ route('home') }}">Home</a>
                <span>/</span>
                <a href="#" class="active">Contact</a>
            </div>
        </div>
    </section>
    
    <!-- Contact Section -->
    <section class="section">
        <div class="container">
            <div class="contact-intro">
                <h2>Get In Touch With Us</h2>
                <p>We're here to answer any questions you have about our services. Reach out to us and we'll respond as soon as we can.</p>
            </div>
            
            <div class="contact-container">
                <div class="contact-info">
                    <h3>Contact Information</h3>
                    
                    <div class="contact-card">
                        <div class="contact-icon">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor">
                                <path d="M6.62 10.79c1.44 2.83 3.76 5.14 6.59 6.59l2.2-2.2c.27-.27.67-.36 1.02-.24 1.12.37 2.33.57 3.57.57.55 0 1 .45 1 1V20c0 .55-.45 1-1 1-9.39 0-17-7.61-17-17 0-.55.45-1 1-1h3.5c.55 0 1 .45 1 1 0 1.25.2 2.45.57 3.57.11.35.03.74-.25 1.02l-2.2 2.2z"/>
                            </svg>
                        </div>
                        <div class="contact-text">
                            <h4>Phone</h4>
                            <a href="tel:+263777372623">+263 777 372 623</a>
                        </div>
                    </div>
                    
                    <div class="contact-card">
                        <div class="contact-icon">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor">
                                <path d="M20 4H4c-1.1 0-1.99.9-1.99 2L2 18c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4l-8 5-8-5V6l8 5 8-5v2z"/>
                            </svg>
                        </div>
                        <div class="contact-text">
                            <h4>Email</h4>
                            <a href="mailto:{{ $contact_info['email'] }}">{{ $contact_info['email'] }}</a>
                        </div>
                    </div>
                    
                    <div class="contact-card">
                        <div class="contact-icon">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor">
                                <path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z"/>
                            </svg>
                        </div>
                        <div class="contact-text">
                            <h4>Location</h4>
                            <p>{{ $contact_info['address'] }}</p>
                        </div>
                    </div>
                    
                    <div class="contact-card">
                        <div class="contact-icon">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor">
                                <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"/>
                            </svg>
                        </div>
                        <div class="contact-text">
                            <h4>Website</h4>
                            <a href="https://{{ $contact_info['website'] }}" target="_blank">{{ $contact_info['website'] }}</a>
                        </div>
                    </div>
                    
                    <div class="social-links">
                        <a href="https://facebook.com/deibrandingandsignage" class="social-link" target="_blank" rel="noopener" title="Follow us on Facebook">
                            <svg width="22" height="22" viewBox="0 0 24 24" fill="currentColor">
                                <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
                            </svg>
                        </a>
                        <a href="https://www.instagram.com/deepend_investments_prints/" class="social-link" target="_blank" rel="noopener" title="Follow us on Instagram">
                            <svg width="22" height="22" viewBox="0 0 24 24" fill="currentColor">
                                <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/>
                            </svg>
                        </a>
                        <a href="https://twitter.com/deibrandingandsignage" class="social-link" target="_blank" rel="noopener" title="Follow us on Twitter">
                            <svg width="22" height="22" viewBox="0 0 24 24" fill="currentColor">
                                <path d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z"/>
                            </svg>
                        </a>
                        <a href="https://linkedin.com/company/dei-branding-signage" class="social-link" target="_blank" rel="noopener" title="Connect with us on LinkedIn">
                            <svg width="22" height="22" viewBox="0 0 24 24" fill="currentColor">
                                <path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/>
                            </svg>
                        </a>
                    </div>
                    
                    <div class="working-hours">
                        <h4 class="hours-title">Our Working Hours</h4>
                        <ul class="hours-list">
                            <li class="hours-item">
                                <span class="day">Monday - Friday</span>
                                <span class="time">8:00 AM - 5:00 PM</span>
                            </li>
                            <li class="hours-item">
                                <span class="day">Saturday</span>
                                <span class="time">9:00 AM - 1:00 PM</span>
                            </li>
                            <li class="hours-item">
                                <span class="day">Sunday</span>
                                <span class="time">Closed</span>
                            </li>
                        </ul>
                    </div>
                </div>
                
                <div class="contact-form">
                    <h3>Send Us a Message</h3>
                    <form method="POST" action="{{ route('contact.store') }}">
                        @csrf
                        <div class="form-row">
                            <div class="form-group">
                                <label for="name" class="form-label">Full Name *</label>
                                <input type="text" id="name" name="name" class="form-control" value="{{ old('name') }}" required>
                            </div>
                            
                            <div class="form-group">
                                <label for="email" class="form-label">Email Address *</label>
                                <input type="email" id="email" name="email" class="form-control" value="{{ old('email') }}" required>
                            </div>
                        </div>
                        
                        <div class="form-row">
                            <div class="form-group">
                                <label for="phone" class="form-label">Phone Number</label>
                                <input type="tel" id="phone" name="phone" class="form-control" value="{{ old('phone') }}">
                            </div>
                            
                            <div class="form-group">
                                <label for="subject" class="form-label">Subject *</label>
                                <input type="text" id="subject" name="subject" class="form-control" value="{{ old('subject') }}" required>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="service" class="form-label">Service of Interest</label>
                            <select id="service" name="service_interest" class="form-control">
                                <option value="" selected disabled>Select a service</option>
                                <option value="2D Signs" {{ old('service_interest') == '2D Signs' ? 'selected' : '' }}>2D Signs on Dibond</option>
                                <option value="3D Illuminated Signs" {{ old('service_interest') == '3D Illuminated Signs' ? 'selected' : '' }}>3D Illuminated Signs</option>
                                <option value="Gate Signs" {{ old('service_interest') == 'Gate Signs' ? 'selected' : '' }}>Customized Gate Signs</option>
                                <option value="Informative Signs" {{ old('service_interest') == 'Informative Signs' ? 'selected' : '' }}>Informative Signs</option>
                                <option value="Desk Branding" {{ old('service_interest') == 'Desk Branding' ? 'selected' : '' }}>Desk Branding</option>
                                <option value="Exhibition Materials" {{ old('service_interest') == 'Exhibition Materials' ? 'selected' : '' }}>Exhibition Materials</option>
                                <option value="Other" {{ old('service_interest') == 'Other' ? 'selected' : '' }}>Other Services</option>
                            </select>
                        </div>
                        
                        <div class="form-group">
                            <label for="message" class="form-label">Your Message *</label>
                            <textarea id="message" name="message" class="form-control" required>{{ old('message') }}</textarea>
                        </div>
                        
                        <button type="submit" class="btn-submit">Send Message</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
    
    <!-- FAQ Section -->
    @if($faqs->count() > 0)
    <section class="section bg-light">
        <div class="container">
            <div class="section-title">
                <h2>Frequently Asked Questions</h2>
                <p>Answers to common questions about our services and process</p>
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