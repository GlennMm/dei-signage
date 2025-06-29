
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'DEI Signage & Branding - Professional Green Media Solutions')</title>
    <meta name="description" content="@yield('description', 'Professional signage, branding, and printing services in Zimbabwe. We offer exclusive green media solutions for businesses.')">
    
    <style>
        :root {
            --primary: #00796b;
            --secondary: #4caf50;
            --accent: #ffc107;
            --light: #f8f9fa;
            --dark: #212529;
            --text: #333;
        }
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        
        body {
            background-color: #f5f5f5;
            color: var(--text);
            line-height: 1.6;
        }
        
        /* Header Styles */
        header {
            background-color: var(--primary);
            color: white;
            padding: 1rem 0;
            position: sticky;
            top: 0;
            z-index: 100;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        
        .container {
            width: 90%;
            max-width: 1200px;
            margin: 0 auto;
        }
        
        .header-content {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        
        .logo {
            font-size: 1.8rem;
            font-weight: bold;
            display: flex;
            align-items: center;
            text-decoration: none;
            color: white;
        }
        
        .logo span {
            color: var(--accent);
        }
        
        nav ul {
            display: flex;
            list-style: none;
        }
        
        nav ul li {
            margin-left: 1.5rem;
        }
        
        nav ul li a {
            color: white;
            text-decoration: none;
            transition: color 0.3s;
            font-weight: 500;
        }
        
        nav ul li a:hover,
        nav ul li a.active {
            color: var(--accent);
        }
        
        .contact-btn {
            background-color: var(--accent);
            color: var(--dark);
            padding: 0.5rem 1rem;
            border-radius: 4px;
            font-weight: bold;
            transition: background-color 0.3s;
        }
        
        .contact-btn:hover {
            background-color: #e0a800;
            color: var(--dark);
        }

        /* Common Styles */
        .section {
            padding: 5rem 0;
        }
        
        .section-title {
            text-align: center;
            margin-bottom: 3rem;
        }
        
        .section-title h2 {
            font-size: 2.5rem;
            color: var(--primary);
            margin-bottom: 1rem;
        }
        
        .section-title p {
            max-width: 600px;
            margin: 0 auto;
            color: #666;
        }

        .btn {
            padding: 0.8rem 2rem;
            border-radius: 4px;
            font-weight: bold;
            text-decoration: none;
            transition: all 0.3s;
            display: inline-block;
        }
        
        .btn-primary {
            background-color: var(--primary);
            color: white;
        }
        
        .btn-primary:hover {
            background-color: #005a4f;
        }
        
        .btn-secondary {
            background-color: var(--accent);
            color: var(--dark);
        }
        
        .btn-secondary:hover {
            background-color: #e0a800;
        }

        /* Alert Messages */
        .alert {
            padding: 1rem;
            margin-bottom: 1rem;
            border-radius: 4px;
        }
        
        .alert-success {
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }
        
        .alert-error {
            background-color: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }

        /* Footer */
        footer {
            background-color: var(--dark);
            color: white;
            padding: 4rem 0 2rem;
        }
        
        .footer-content {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 2rem;
            margin-bottom: 3rem;
        }
        
        .footer-logo {
            font-size: 1.8rem;
            font-weight: bold;
            margin-bottom: 1rem;
        }
        
        .footer-logo span {
            color: var(--accent);
        }
        
        .footer-about p {
            margin-bottom: 1.5rem;
            color: #ccc;
        }
        
        .social-icons {
            display: flex;
            gap: 1rem;
        }
        
        .social-icon {
            width: 40px;
            height: 40px;
            background-color: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            transition: background-color 0.3s;
            text-decoration: none;
        }
        
        .social-icon:hover {
            background-color: var(--primary);
        }
        
        .footer-links h3, .footer-services h3, .footer-contact h3 {
            font-size: 1.3rem;
            margin-bottom: 1.5rem;
            position: relative;
            padding-bottom: 0.8rem;
        }
        
        .footer-links h3::after, .footer-services h3::after, .footer-contact h3::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 50px;
            height: 2px;
            background-color: var(--accent);
        }
        
        .footer-links ul, .footer-services ul {
            list-style: none;
        }
        
        .footer-links ul li, .footer-services ul li {
            margin-bottom: 0.8rem;
        }
        
        .footer-links ul li a, .footer-services ul li a {
            color: #ccc;
            text-decoration: none;
            transition: color 0.3s;
        }
        
        .footer-links ul li a:hover, .footer-services ul li a:hover {
            color: var(--accent);
        }
        
        .footer-contact p {
            color: #ccc;
            margin-bottom: 0.8rem;
            display: flex;
            align-items: center;
        }
        
        .footer-contact-icon {
            margin-right: 0.8rem;
            color: var(--accent);
        }
        
        .footer-bottom {
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            padding-top: 1.5rem;
            text-align: center;
            color: #ccc;
            font-size: 0.9rem;
        }
        
        /* Responsive Design */
        @media (max-width: 768px) {
            .header-content {
                flex-direction: column;
                padding: 1rem 0;
            }
            
            nav ul {
                margin-top: 1rem;
                flex-wrap: wrap;
                justify-content: center;
            }
            
            nav ul li {
                margin: 0.5rem;
            }
            
            .section-title h2 {
                font-size: 2rem;
            }
        }

        @yield('styles')
    </style>
    
    @stack('head')
</head>
<body>
    @include('partials.header')
    
    @if(session('success'))
        <div class="container">
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        </div>
    @endif

    @if(session('error'))
        <div class="container">
            <div class="alert alert-error">
                {{ session('error') }}
            </div>
        </div>
    @endif

    @if($errors->any())
        <div class="container">
            <div class="alert alert-error">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    @endif
    
    @yield('content')
    
    @include('partials.footer')
    
    @stack('scripts')
</body>
</html>