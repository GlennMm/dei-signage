
<header>
    <div class="container">
        <div class="header-content">
            <a href="{{ route('home') }}" class="logo">
                <img src="{{ asset('images/logo.png') }}" alt="DEI - Deepend Investments" class="logo-img">
            </a>
            <nav>
                <ul>
                    <li><a href="{{ route('home') }}" class="{{ request()->routeIs('home') ? 'active' : '' }}">Home</a></li>
                    <li><a href="{{ route('about') }}" class="{{ request()->routeIs('about') ? 'active' : '' }}">About</a></li>
                    <li><a href="{{ route('services') }}" class="{{ request()->routeIs('services*') ? 'active' : '' }}">Services</a></li>
                    <li><a href="{{ route('portfolio') }}" class="{{ request()->routeIs('portfolio*') ? 'active' : '' }}">Portfolio</a></li>
                    <li><a href="{{ route('clients') }}" class="{{ request()->routeIs('clients*') ? 'active' : '' }}">Clients</a></li>
                    <li><a href="{{ route('contact') }}" class="{{ request()->routeIs('contact') ? 'active' : 'contact-btn' }}">Contact Us</a></li>
                </ul>
            </nav>
        </div>
    </div>
</header>