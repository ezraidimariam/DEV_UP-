<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>DEV↑UP - Level Up Your Development Skills</title>
    
    <!-- Premium Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=JetBrains+Mono:wght@400;500;600&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet">
    
    <!-- Premium Styles -->
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Inter', sans-serif;
            background: #0a0a0a;
            color: #ffffff;
            overflow-x: hidden;
        }
        
        .brand-font {
            font-family: 'Space Grotesk', sans-serif;
        }
        
        .mono-font {
            font-family: 'JetBrains Mono', monospace;
        }
        
        .gradient-text {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
        
        .glass-card {
            background: rgba(255, 255, 255, 0.03);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.1);
            box-shadow: 
                0 8px 32px rgba(0, 0, 0, 0.3),
                0 4px 16px rgba(0, 0, 0, 0.2),
                inset 0 1px 0 rgba(255, 255, 255, 0.1);
        }
        
        .glow-button {
            position: relative;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border: none;
            transition: all 0.3s ease;
            overflow: hidden;
        }
        
        .glow-button::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
            transition: left 0.5s;
        }
        
        .glow-button:hover::before {
            left: 100%;
        }
        
        .glow-button:hover {
            transform: translateY(-2px);
            box-shadow: 
                0 10px 40px rgba(102, 126, 234, 0.4),
                0 6px 20px rgba(102, 126, 234, 0.3);
        }
        
        .floating-shapes {
            position: fixed;
            width: 100%;
            height: 100%;
            overflow: hidden;
            z-index: -1;
        }
        
        .shape {
            position: absolute;
            border-radius: 50%;
            filter: blur(25px);
            opacity: 0.2;
        }
        
        .shape-1 {
            width: 300px;
            height: 300px;
            background: linear-gradient(135deg, #667eea, #764ba2);
            top: -150px;
            right: -150px;
            animation: float 10s ease-in-out infinite;
        }
        
        .shape-2 {
            width: 200px;
            height: 200px;
            background: linear-gradient(135deg, #f093fb, #f5576c);
            bottom: -100px;
            left: -100px;
            animation: float 15s ease-in-out infinite reverse;
        }
        
        @keyframes float {
            0%, 100% { transform: translateY(0px) rotate(0deg); }
            50% { transform: translateY(-15px) rotate(90deg); }
        }
        
        .nav-item {
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(255, 255, 255, 0.1);
            transition: all 0.3s ease;
        }
        
        .nav-item:hover {
            background: rgba(255, 255, 255, 0.1);
            transform: translateY(-2px);
            box-shadow: 0 4px 16px rgba(0, 0, 0, 0.2);
        }
        
        .feature-card {
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(255, 255, 255, 0.1);
            transition: all 0.3s ease;
        }
        
        .feature-card:hover {
            background: rgba(255, 255, 255, 0.1);
            transform: translateY(-4px);
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.2);
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
<nav class="fixed top-0 w-full z-50 glass-card border-b border-gray-800">
    <div class="container mx-auto px-6 py-4">
        <div class="flex items-center justify-between">
            <!-- Logo -->
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 rounded-xl bg-gradient-to-br from-purple-500 to-indigo-600 flex items-center justify-center">
                    <i class="ri-code-s-slash-line text-white text-xl"></i>
                </div>
                <h1 class="brand-font text-2xl font-black gradient-text">DEV↑UP</h1>
            </div>

            <!-- Navigation Links -->
            <div class="hidden md:flex items-center gap-8">
                <a href="#features" class="text-gray-300 hover:text-white transition-colors">Features</a>
                <a href="#challenges" class="text-gray-300 hover:text-white transition-colors">Challenges</a>
                <a href="#focus" class="text-gray-300 hover:text-white transition-colors">Focus Sessions</a>
                <a href="#about" class="text-gray-300 hover:text-white transition-colors">About</a>
            </div>

            <!-- Auth Buttons -->
            <div class="flex items-center gap-4">
                @auth
                    <a href="{{ url('/dashboard') }}" class="text-gray-300 hover:text-white transition-colors">
                        Dashboard
                    </a>
                @else
                    @if (Route::has('login'))
                        <a href="{{ route('login') }}" class="text-gray-300 hover:text-white transition-colors">
                            Log in
                        </a>
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

<!-- Floating Background Shapes -->
<div class="floating-shapes">
    <div class="shape shape-1"></div>
    <div class="shape shape-2"></div>
</div>

<!-- Hero Section -->
<section class="min-h-screen flex items-center justify-center relative pt-20">
    <div class="container mx-auto px-6 text-center">
        <div class="max-w-4xl mx-auto">
            <!-- Hero Badge -->
            <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full glass-card mb-8">
                <i class="ri-sparkling-line text-yellow-400"></i>
                <span class="text-sm text-gray-300">Level up your development skills</span>
            </div>

            <!-- Hero Title -->
            <h1 class="hero-text brand-font gradient-text mb-6">
                Master Code.<br>
                Build Faster.<br>
                Level Up.
            </h1>

            <!-- Hero Description -->
            <p class="text-xl text-gray-400 mb-12 max-w-2xl mx-auto">
                Join thousands of developers improving their skills through focused coding sessions, 
                real-world challenges, and a supportive community.
            </p>

            <!-- Hero CTA Buttons -->
            <div class="flex flex-col sm:flex-row gap-4 justify-center mb-16">
                @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="glow-button px-8 py-4 rounded-xl text-white font-semibold text-lg">
                        <span class="relative z-10 flex items-center justify-center gap-2">
                            <i class="ri-rocket-line text-xl"></i>
                            Start Your Journey
                        </span>
                    </a>
                @endif
                <a href="#features" class="glass-card px-8 py-4 rounded-xl text-white font-semibold text-lg hover:bg-white/10 transition-all">
                    Learn More
                </a>
            </div>

            <!-- Stats -->
            <div class="grid grid-cols-3 gap-8 max-w-2xl mx-auto">
                <div class="text-center">
                    <div class="text-3xl font-bold gradient-text mb-2">10K+</div>
                    <div class="text-gray-400 text-sm">Active Developers</div>
                </div>
                <div class="text-center">
                    <div class="text-3xl font-bold gradient-text mb-2">500+</div>
                    <div class="text-gray-400 text-sm">Coding Challenges</div>
                </div>
                <div class="text-center">
                    <div class="text-3xl font-bold gradient-text mb-2">50K+</div>
                    <div class="text-gray-400 text-sm">Focus Hours</div>
                </div>
            </div>
        </div>
    </div>

    <!-- Scroll Indicator -->
    <div class="absolute bottom-8 left-1/2 transform -translate-x-1/2 scroll-indicator">
        <i class="ri-arrow-down-line text-2xl text-gray-500"></i>
    </div>
</section>

<!-- Features Section -->
<section id="features" class="py-20 relative">
    <div class="container mx-auto px-6">
        <div class="text-center mb-16">
            <h2 class="text-4xl font-bold gradient-text mb-4">Powerful Features</h2>
            <p class="text-xl text-gray-400 max-w-2xl mx-auto">
                Everything you need to take your development skills to the next level
            </p>
        </div>

        <div class="grid md:grid-cols-3 gap-8">
            <!-- Feature 1 -->
            <div class="feature-card glass-card rounded-2xl p-8 text-center">
                <div class="w-16 h-16 rounded-xl bg-gradient-to-br from-blue-500 to-cyan-600 flex items-center justify-center mx-auto mb-6">
                    <i class="ri-timer-line text-white text-2xl"></i>
                </div>
                <h3 class="text-xl font-semibold mb-4">Focus Sessions</h3>
                <p class="text-gray-400">
                    Track your coding time with Pomodoro-style focus sessions designed to maximize productivity and prevent burnout.
                </p>
            </div>

            <!-- Feature 2 -->
            <div class="feature-card glass-card rounded-2xl p-8 text-center">
                <div class="w-16 h-16 rounded-xl bg-gradient-to-br from-purple-500 to-pink-600 flex items-center justify-center mx-auto mb-6">
                    <i class="ri-code-line text-white text-2xl"></i>
                </div>
                <h3 class="text-xl font-semibold mb-4">Coding Challenges</h3>
                <p class="text-gray-400">
                    Test your skills with real-world coding challenges across different languages and difficulty levels.
                </p>
            </div>

            <!-- Feature 3 -->
            <div class="feature-card glass-card rounded-2xl p-8 text-center">
                <div class="w-16 h-16 rounded-xl bg-gradient-to-br from-green-500 to-emerald-600 flex items-center justify-center mx-auto mb-6">
                    <i class="ri-line-chart-line text-white text-2xl"></i>
                </div>
                <h3 class="text-xl font-semibold mb-4">Progress Tracking</h3>
                <p class="text-gray-400">
                    Monitor your improvement with detailed analytics and insights about your coding patterns and performance.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="py-20 relative">
    <div class="container mx-auto px-6">
        <div class="glass-card rounded-3xl p-12 text-center max-w-4xl mx-auto">
            <h2 class="text-4xl font-bold gradient-text mb-4">Ready to Level Up?</h2>
            <p class="text-xl text-gray-400 mb-8">
                Join thousands of developers who are already improving their skills with DEV↑UP
            </p>
            @if (Route::has('register'))
                <a href="{{ route('register') }}" class="glow-button px-8 py-4 rounded-xl text-white font-semibold text-lg inline-block">
                    <span class="relative z-10 flex items-center justify-center gap-2">
                        <i class="ri-user-add-line text-xl"></i>
                        Get Started Free
                    </span>
                </a>
            @endif
        </div>
    </div>
</section>

                    <!-- Footer -->
<footer class="py-12 border-t border-gray-800">
    <div class="container mx-auto px-6">
        <div class="flex flex-col md:flex-row justify-between items-center">
            <div class="flex items-center gap-3 mb-4 md:mb-0">
                <div class="w-8 h-8 rounded-lg bg-gradient-to-br from-purple-500 to-indigo-600 flex items-center justify-center">
                    <i class="ri-code-s-slash-line text-white text-sm"></i>
                </div>
                <h3 class="brand-font text-lg font-black gradient-text">DEV↑UP</h3>
            </div>
            <div class="text-gray-400 text-sm">
                © 2024 DEV↑UP. Level up your development skills.
            </div>
            <div class="flex gap-4 mt-4 md:mt-0">
                <a href="#" class="text-gray-400 hover:text-white transition-colors">
                    <i class="ri-github-fill text-xl"></i>
                </a>
                <a href="#" class="text-gray-400 hover:text-white transition-colors">
                    <i class="ri-twitter-fill text-xl"></i>
                </a>
                <a href="#" class="text-gray-400 hover:text-white transition-colors">
                    <i class="ri-linkedin-fill text-xl"></i>
                </a>
            </div>
        </div>
    </div>
</footer>

</body>
</html>
                            
