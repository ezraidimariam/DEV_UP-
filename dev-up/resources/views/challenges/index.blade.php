<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DEV↑UP - Challenges</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=JetBrains+Mono:wght@400;500;600&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet">
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
            filter: blur(40px);
            opacity: 0.3;
        }
        
        .shape-1 {
            width: 300px;
            height: 300px;
            background: linear-gradient(135deg, #667eea, #764ba2);
            top: -150px;
            right: -150px;
            animation: float 6s ease-in-out infinite;
        }
        
        .shape-2 {
            width: 200px;
            height: 200px;
            background: linear-gradient(135deg, #f093fb, #f5576c);
            bottom: -100px;
            left: -100px;
            animation: float 8s ease-in-out infinite reverse;
        }
        
        .shape-3 {
            width: 150px;
            height: 150px;
            background: linear-gradient(135deg, #4facfe, #00f2fe);
            top: 50%;
            left: -75px;
            animation: float 10s ease-in-out infinite;
        }
        
        @keyframes float {
            0%, 100% { transform: translateY(0px) rotate(0deg); }
            50% { transform: translateY(-20px) rotate(180deg); }
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
        
        .challenge-card {
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(255, 255, 255, 0.1);
            transition: all 0.3s ease;
        }
        
        .challenge-card:hover {
            background: rgba(255, 255, 255, 0.1);
            transform: translateY(-4px);
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.2);
        }
        
        .difficulty-easy {
            background: linear-gradient(135deg, #10b981, #059669);
            color: white;
        }
        
        .difficulty-medium {
            background: linear-gradient(135deg, #f59e0b, #d97706);
            color: white;
        }
        
        .difficulty-hard {
            background: linear-gradient(135deg, #dc2626, #7f1d1d);
            color: white;
        }
    </style>
</head>
<body>
    <!-- Floating Background Shapes -->
    <div class="floating-shapes">
        <div class="shape shape-1"></div>
        <div class="shape shape-2"></div>
        <div class="shape shape-3"></div>
    </div>

    <!-- Navigation Header -->
    <nav class="fixed top-0 left-0 right-0 z-50 glass-card border-b border-white/10">
        <div class="max-w-7xl mx-auto px-6 py-4">
            <div class="flex items-center justify-between">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 rounded-xl bg-gradient-to-br from-purple-500 to-indigo-600 flex items-center justify-center">
                        <i class="ri-code-s-slash-line text-white text-lg"></i>
                    </div>
                    <h1 class="brand-font text-2xl font-black gradient-text">DEV↑UP</h1>
                </div>
                
                <div class="flex items-center gap-6">
                    <a href="{{ route('dashboard') }}" class="nav-item px-4 py-2 rounded-xl text-gray-300 hover:text-white transition-all">
                        <i class="ri-dashboard-line mr-2"></i>
                        Dashboard
                    </a>
                    <a href="{{ route('challenges.index') }}" class="nav-item px-4 py-2 rounded-xl text-white hover:text-purple-300 transition-all">
                        <i class="ri-trophy-line mr-2"></i>
                        Challenges
                    </a>
                    <a href="{{ route('focus-sessions.index') }}" class="nav-item px-4 py-2 rounded-xl text-gray-300 hover:text-white transition-all">
                        <i class="ri-time-line mr-2"></i>
                        Focus
                    </a>
                    <a href="{{ route('profile.edit') }}" class="nav-item px-4 py-2 rounded-xl text-gray-300 hover:text-white transition-all">
                        <i class="ri-user-line mr-2"></i>
                        Profile
                    </a>
                    <form method="POST" action="{{ route('logout') }}" class="inline">
                        @csrf
                        <button type="submit" class="nav-item px-4 py-2 rounded-xl text-red-400 hover:text-red-300 transition-all">
                            <i class="ri-logout-box-r-line mr-2"></i>
                            Logout
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="pt-24 px-6 pb-12">
        <div class="max-w-7xl mx-auto">
            <!-- Header Section -->
            <div class="glass-card rounded-2xl p-8 mb-8">
                <div class="flex items-center justify-between">
                    <div>
                        <h1 class="text-3xl font-bold text-white mb-2">Challenges</h1>
                        <p class="text-gray-400">Test your skills and earn points by completing programming challenges.</p>
                    </div>
                    <div class="flex items-center gap-4">
                        <div class="text-sm text-gray-500">Total Challenges:</div>
                        <div class="text-2xl font-bold gradient-text">{{ $challenges->count() ?? 0 }}</div>
                    </div>
                </div>
            </div>

            <!-- Filter Tabs -->
            <div class="glass-card rounded-2xl p-6 mb-8">
                <div class="flex gap-4">
                    <button class="nav-item px-6 py-3 rounded-xl text-white">
                        <i class="ri-apps-line mr-2"></i>
                        All Challenges
                    </button>
                    <button class="nav-item px-6 py-3 rounded-xl text-gray-300 hover:text-white transition-all">
                        <i class="ri-user-star-line mr-2"></i>
                        My Challenges
                    </button>
                    <button class="nav-item px-6 py-3 rounded-xl text-gray-300 hover:text-white transition-all">
                        <i class="ri-filter-line mr-2"></i>
                        Filter
                    </button>
                </div>
            </div>

            <!-- Search Bar -->
            <div class="glass-card rounded-2xl p-6 mb-8">
                <div class="relative">
                    <i class="ri-search-line absolute left-4 top-1/2 transform -translate-y-1/2 text-gray-500"></i>
                    <input 
                        type="text" 
                        placeholder="Search challenges..." 
                        class="w-full pl-12 pr-4 py-4 rounded-xl bg-white/5 border border-white/10 text-white placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent">
                </div>
            </div>

            <!-- Challenges Grid -->
            @if($challenges->count() > 0)
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach($challenges as $challenge)
                        <div class="challenge-card rounded-2xl p-6 cursor-pointer">
                            <div class="flex justify-between items-start mb-4">
                                <h3 class="text-xl font-semibold text-white mb-2">{{ $challenge->title }}</h3>
                                <span class="difficulty-{{ $challenge->difficulty ?? 'easy' }} px-3 py-1 rounded-full text-xs font-medium">
                                    {{ $challenge->difficulty ?? 'Easy' }}
                                </span>
                            </div>
                            
                            <p class="text-gray-400 mb-6 line-clamp-3">
                                {{ $challenge->description ?? 'Complete this programming challenge to test your skills and earn points.' }}
                            </p>
                            
                            <div class="flex justify-between items-center">
                                <div class="flex items-center gap-4">
                                    <div class="flex items-center gap-2">
                                        <i class="ri-star-line text-yellow-400"></i>
                                        <span class="text-white font-medium">{{ $challenge->points ?? 100 }}</span>
                                    </div>
                                    <span class="text-gray-400 text-sm">points</span>
                                </div>
                                <a href="{{ route('challenges.show', $challenge->id) }}" class="glow-button px-6 py-3 rounded-xl text-white font-medium">
                                    Start Challenge
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="glass-card rounded-2xl p-12 text-center">
                    <i class="ri-trophy-line text-6xl text-gray-600 mb-6"></i>
                    <h3 class="text-2xl font-semibold text-white mb-4">No Challenges Available</h3>
                    <p class="text-gray-400 mb-8">Check back later for new programming challenges to test your skills!</p>
                    <a href="{{ route('dashboard') }}" class="glow-button inline-flex px-8 py-4 rounded-xl text-white font-medium">
                        <i class="ri-dashboard-line mr-2"></i>
                        Back to Dashboard
                    </a>
                </div>
            @endif
        </div>
    </main>
</body>
</html>
</x-app-layout>
