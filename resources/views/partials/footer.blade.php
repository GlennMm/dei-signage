
<footer>
    <div class="container">
        <div class="footer-content">
            <div class="footer-about">
                <div class="footer-logo">DEI<span>Branding</span></div>
                <p>Professional signage, branding, and printing services with a commitment to quality, innovation, and environmental sustainability.</p>
                <div class="social-icons">
                    <a href="#" class="social-icon">FB</a>
                    <a href="https://www.instagram.com/deepend_investments_prints/" class="social-icon">IG</a>
                    <a href="#" class="social-icon">TW</a>
                    <a href="#" class="social-icon">LI</a>
                </div>
            </div>
            
            <div class="footer-links">
                <h3>Quick Links</h3>
                <ul>
                    <li><a href="{{ route('home') }}">Home</a></li>
                    <li><a href="{{ route('about') }}">About Us</a></li>
                    <li><a href="{{ route('services') }}">Services</a></li>
                    <li><a href="{{ route('portfolio') }}">Portfolio</a></li>
                    <li><a href="{{ route('clients') }}">Clients</a></li>
                    <li><a href="{{ route('contact') }}">Contact Us</a></li>
                </ul>
            </div>
            
            <div class="footer-services">
                <h3>Our Services</h3>
                <ul>
                    <li><a href="{{ route('services') }}#dibond">2D Signs on Dibond</a></li>
                    <li><a href="{{ route('services') }}#illuminated">3D Illuminated Signs</a></li>
                    <li><a href="{{ route('services') }}#gate">Customized Gate Signs</a></li>
                    <li><a href="{{ route('services') }}#desk">Desk Branding</a></li>
                    <li><a href="{{ route('services') }}#exhibition">Exhibition Materials</a></li>
                </ul>
            </div>
            
            <div class="footer-contact">
                <h3>Contact Us</h3>
                <p><span class="footer-contact-icon">📞</span> 08644283278 / +263 777 372 623</p>
                <p><span class="footer-contact-icon">✉️</span> deependprints@gmail.com</p>
                <p><span class="footer-contact-icon">📍</span> 4 Aberdeen Road, Avondale, Harare</p>
                <p><span class="footer-contact-icon">🌐</span> www.deibrandingandsignage.com</p>
            </div>
        </div>
        
        <div class="footer-bottom">
            <p>&copy; {{ date('Y') }} DEI Signage & Branding. All Rights Reserved.</p>
        </div>
    </div>
</footer>