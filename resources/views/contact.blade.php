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
        font-size: 1.5rem;
        margin-right: 1.5rem;
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
        font-size: 1.2rem;
        text-decoration: none;
        transition: background-color 0.3s;
    }

    .social-link:hover {
        background-color: var(--accent);
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
                        <div class="contact-icon">📞</div>
                        <div class="contact-text">
                            <h4>Phone</h4>
                            <a href="tel:08644283278">08644283278</a>
                            <a href="tel:+263777372623">+263 777 372 623</a>
                        </div>
                    </div>
                    
                    <div class="contact-card">
                        <div class="contact-icon">✉️</div>
                        <div class="contact-text">
                            <h4>Email</h4>
                            <a href="mailto:{{ $contact_info['email'] }}">{{ $contact_info['email'] }}</a>
                        </div>
                    </div>
                    
                    <div class="contact-card">
                        <div class="contact-icon">📍</div>
                        <div class="contact-text">
                            <h4>Location</h4>
                            <p>{{ $contact_info['address'] }}</p>
                        </div>
                    </div>
                    
                    <div class="contact-card">
                        <div class="contact-icon">🌐</div>
                        <div class="contact-text">
                            <h4>Website</h4>
                            <a href="https://{{ $contact_info['website'] }}" target="_blank">{{ $contact_info['website'] }}</a>
                        </div>
                    </div>
                    
                    <div class="social-links">
                        <a href="#" class="social-link">FB</a>
                        <a href="https://www.instagram.com/deepend_investments_prints/" class="social-link">IG</a>
                        <a href="#" class="social-link">TW</a>
                        <a href="#" class="social-link">LI</a>
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