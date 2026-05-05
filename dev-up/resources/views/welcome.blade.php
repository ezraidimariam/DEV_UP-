<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>DEV↑UP - Level Up Your Development Skills</title>
    
    <!-- Simple Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet">
    
    <!-- Simple Styles -->
    <style>
        body {
            font-family: 'Inter', sans-serif;
            background: linear-gradient(135deg, #1a1a2e 0%, #16213e 100%);
            color: #ffffff;
            margin: 0;
            padding: 0;
            min-height: 100vh;
        }
        
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }
        
        .card {
            background: rgba(255, 255, 255, 0.08);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 12px;
            padding: 24px;
            margin: 20px 0;
        }
        
        .btn {
            background: #667eea;
            color: white;
            border: none;
            border-radius: 8px;
            padding: 12px 24px;
            font-weight: 500;
            cursor: pointer;
            text-decoration: none;
            display: inline-block;
            transition: background-color 0.2s ease;
        }
        
        .btn:hover {
            background: #5a67d8;
        }
        
        .nav {
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 8px;
            padding: 16px;
            margin: 20px 0;
        }
        
        .nav a {
            color: #ffffff;
            text-decoration: none;
            margin: 0 16px;
            transition: color 0.2s ease;
        }
        
        .nav a:hover {
            color: #667eea;
        }
        
        .hero {
            text-align: center;
            padding: 80px 0;
        }
        
        .hero h1 {
            font-size: 3rem;
            margin-bottom: 20px;
            font-weight: 600;
        }
        
        .hero p {
            font-size: 1.2rem;
            margin-bottom: 40px;
            color: #a0aec0;
        }
        
        .features {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 20px;
            margin: 40px 0;
        }
        
        .feature-card {
            background: rgba(255, 255, 255, 0.08);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 12px;
            padding: 24px;
            text-align: center;
        }
        
        .feature-card h3 {
            color: #667eea;
            margin-bottom: 16px;
        }
        
        .feature-card p {
            color: #a0aec0;
            line-height: 1.6;
        }
        
        .hero-text {
            font-size: clamp(2.5rem, 8vw, 5rem);
            line-height: 1.1;
            font-weight: 900;
        }
        
        .scroll-indicator {
            animation: bounce 2s infinite;
        }
        
        @keyframes bounce {
            0%, 20%, 50%, 80%, 100% { transform: translateY(0); }
            40% { transform: translateY(-10px); }
            60% { transform: translateY(-5px); }
        }
    </style>
</head>
<body>
        <!-- Navigation -->
<nav class="nav">
    <div class="container">
        <div style="display: flex; justify-content: space-between; align-items: center;">
            <!-- Logo -->
            <div style="display: flex; align-items: center; gap: 12px;">
                <div style="width: 40px; height: 40px; background: #667eea; border-radius: 8px; display: flex; align-items: center; justify-content: center;">
                    <i class="ri-code-s-slash-line" style="color: white; font-size: 20px;"></i>
                </div>
                <h1 style="font-size: 24px; font-weight: 600; color: #667eea;">DEV↑UP</h1>
            </div>

            <!-- Navigation Links -->
            <div style="display: flex; align-items: center; gap: 24px;">
                @guest
                    <a href="{{ route('login') }}">Login</a>
                    <a href="{{ route('register') }}">Register</a>
                @else
                    <a href="{{ route('dashboard') }}">Dashboard</a>
                    <a href="{{ route('challenges.index') }}">Challenges</a>
                    <a href="{{ route('focus-sessions.index') }}">Focus Sessions</a>
                    <a href="{{ route('profile.edit') }}">Profile</a>
                @endguest
            </div>

            <!-- Auth Buttons -->
            <div style="display: flex; align-items: center; gap: 16px;">
                @auth
                    <a href="{{ url('/dashboard') }}" class="btn">Dashboard</a>
                @else
                    @if (Route::has('login'))
                        <a href="{{ route('login') }}" class="btn">Log in</a>
                    @endif
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="glow-button px-6 py-2 rounded-lg text-white font-medium">
                            Sign Up
                        </a>
                    @endif
                @endauth
            </div>

            <!-- Mobile Menu Button -->
            <button class="md:hidden text-white">
                <i class="ri-menu-line text-2xl"></i>
            </button>
        </div>
    </div>
</nav>


<!-- Hero Section -->
<section class="hero">
    <div class="container">
        <div>
            <!-- Hero Title -->
            <h1 class="hero-text">
                Master Code.<br>
                Build Faster.<br>
                Level Up.
            </h1>

            <!-- Hero Description -->
            <p>
                Join thousands of developers improving their skills through focused coding sessions, 
                real-world challenges, and a supportive community.
            </p>

            <!-- Hero CTA Buttons -->
            <div style="display: flex; gap: 16px; justify-content: center; flex-wrap: wrap;">
                @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="btn" style="font-size: 18px; padding: 16px 32px;">
                        <i class="ri-rocket-line" style="margin-right: 8px;"></i>
                        Start Your Journey
                    </a>
                @endif
                <a href="#features" class="btn" style="background: rgba(255, 255, 255, 0.1); font-size: 18px; padding: 16px 32px;">
                    Learn More
                </a>
            </div>

            <!-- Stats -->
            <div style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 32px; max-width: 600px; margin: 60px auto 0;">
                <div style="text-align: center;">
                    <div style="font-size: 32px; font-weight: bold; color: #667eea; margin-bottom: 8px;">10K+</div>
                    <div style="color: #a0aec0; font-size: 14px;">Active Developers</div>
                </div>
                <div style="text-align: center;">
                    <div style="font-size: 32px; font-weight: bold; color: #667eea; margin-bottom: 8px;">500+</div>
                    <div style="color: #a0aec0; font-size: 14px;">Coding Challenges</div>
                </div>
                <div style="text-align: center;">
                    <div style="font-size: 32px; font-weight: bold; color: #667eea; margin-bottom: 8px;">50K+</div>
                    <div style="color: #a0aec0; font-size: 14px;">Focus Hours</div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Features Section -->
<section id="features" style="padding: 80px 0;">
    <div class="container">
        <div style="text-align: center; margin-bottom: 60px;">
            <h2 style="font-size: 36px; font-weight: 600; color: #667eea; margin-bottom: 16px;">Powerful Features</h2>
            <p style="font-size: 18px; color: #a0aec0; max-width: 600px; margin: 0 auto;">
                Everything you need to take your development skills to the next level
            </p>
        </div>

        <div class="features">
            <!-- Feature 1 -->
            <div class="feature-card">
                <div style="width: 64px; height: 64px; background: #667eea; border-radius: 12px; display: flex; align-items: center; justify-content: center; margin: 0 auto 24px;">
                    <i class="ri-timer-line" style="color: white; font-size: 24px;"></i>
                </div>
                <h3>Focus Sessions</h3>
                <p>
                    Track your coding time with Pomodoro-style focus sessions designed to maximize productivity and prevent burnout.
                </p>
            </div>

            <!-- Feature 2 -->
            <div class="feature-card">
                <div style="width: 64px; height: 64px; background: #764ba2; border-radius: 12px; display: flex; align-items: center; justify-content: center; margin: 0 auto 24px;">
                    <i class="ri-code-line" style="color: white; font-size: 24px;"></i>
                </div>
                <h3>Coding Challenges</h3>
                <p>
                    Test your skills with real-world coding challenges across different languages and difficulty levels.
                </p>
            </div>

            <!-- Feature 3 -->
            <div class="feature-card">
                <div style="width: 64px; height: 64px; background: #27ae60; border-radius: 12px; display: flex; align-items: center; justify-content: center; margin: 0 auto 24px;">
                    <i class="ri-line-chart-line" style="color: white; font-size: 24px;"></i>
                </div>
                <h3>Progress Tracking</h3>
                <p>
                    Monitor your improvement with detailed analytics and insights about your coding patterns and performance.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section style="padding: 80px 0;">
    <div class="container">
        <div class="card" style="text-align: center; max-width: 800px; margin: 0 auto;">
            <h2 style="font-size: 36px; font-weight: 600; color: #667eea; margin-bottom: 16px;">Ready to Level Up?</h2>
            <p style="font-size: 18px; color: #a0aec0; margin-bottom: 32px;">
                Join thousands of developers who are already improving their skills with DEV↑UP
            </p>
            @if (Route::has('register'))
                <a href="{{ route('register') }}" class="btn" style="font-size: 18px; padding: 16px 32px;">
                    <i class="ri-user-add-line" style="margin-right: 8px;"></i>
                    Get Started Free
                </a>
            @endif
        </div>
    </div>
</section>

                    <!-- Footer -->
<footer style="padding: 48px 0; border-top: 1px solid rgba(255, 255, 255, 0.1);">
    <div class="container">
        <div style="display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap;">
            <div style="display: flex; align-items: center; gap: 12px; margin-bottom: 16px;">
                <div style="width: 32px; height: 32px; background: #667eea; border-radius: 6px; display: flex; align-items: center; justify-content: center;">
                    <i class="ri-code-s-slash-line" style="color: white; font-size: 14px;"></i>
                </div>
                <h3 style="font-size: 18px; font-weight: 600; color: #667eea;">DEV↑UP</h3>
            </div>
            <div style="color: #a0aec0; font-size: 14px;">
                © 2024 DEV↑UP. Level up your development skills.
            </div>
            <div style="display: flex; gap: 16px;">
                <a href="#" style="color: #a0aec0;">
                    <i class="ri-github-fill" style="font-size: 18px;"></i>
                </a>
                <a href="#" style="color: #a0aec0;">
                    <i class="ri-twitter-fill" style="font-size: 18px;"></i>
                </a>
                <a href="#" style="color: #a0aec0;">
                    <i class="ri-linkedin-fill" style="font-size: 18px;"></i>
                </a>
            </div>
        </div>
    </div>
</footer>

</body>
</html>
                            
