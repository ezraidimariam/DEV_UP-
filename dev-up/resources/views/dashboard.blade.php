<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DEV↑UP - Dashboard</title>
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
        
        .progress-bar {
            background: rgba(255, 255, 255, 0.1);
            border-radius: 9999px;
            overflow: hidden;
        }
        
        .progress-fill {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            height: 100%;
            transition: width 0.5s ease;
        }
    </style>
</head>
<body>
    <!-- Floating Background Shapes -->
    <div class="floating-shapes">
        <div class="shape shape-1"></div>
        <div class="shape shape-2"></div>
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
                    <a href="{{ route('dashboard') }}" class="nav-item px-4 py-2 rounded-xl text-white hover:text-purple-300 transition-all">
                        <i class="ri-dashboard-line mr-2"></i>
                        Dashboard
                    </a>
                    <a href="{{ route('challenges.index') }}" class="nav-item px-4 py-2 rounded-xl text-gray-300 hover:text-white transition-all">
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
            <!-- Welcome Section -->
            <div class="glass-card rounded-2xl p-8 mb-8">
                <div class="flex items-center justify-between">
                    <div>
                        <h1 class="text-3xl font-bold text-white mb-2">
                            Welcome back, <span class="gradient-text">{{ Auth::user()->name }}</span>
                        </h1>
                        <p class="text-gray-400">Continue your learning journey and stay focused.</p>
                    </div>
                    <div class="text-right">
                        <div class="text-sm text-gray-500 mb-1">Current Streak</div>
                        <div class="text-2xl font-bold gradient-text">7 days</div>
                    </div>
                </div>
            </div>

            <!-- Stats Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                <div class="glass-card rounded-2xl p-6">
                    <div class="flex items-center justify-between mb-4">
                        <div class="w-12 h-12 rounded-xl bg-gradient-to-br from-purple-500 to-indigo-600 flex items-center justify-center">
                            <i class="ri-star-line text-white text-xl"></i>
                        </div>
                        <div class="text-xs text-gray-500 mono-font">TOTAL</div>
                    </div>
                    <div class="text-3xl font-bold text-white mb-1">{{ $totalPoints ?? 0 }}</div>
                    <div class="text-sm text-gray-400">Total Points</div>
                </div>

                <div class="glass-card rounded-2xl p-6">
                    <div class="flex items-center justify-between mb-4">
                        <div class="w-12 h-12 rounded-xl bg-gradient-to-br from-green-500 to-emerald-600 flex items-center justify-center">
                            <i class="ri-medal-line text-white text-xl"></i>
                        </div>
                        <div class="text-xs text-gray-500 mono-font">LEVEL</div>
                    </div>
                    <div class="text-3xl font-bold text-white mb-1">{{ $currentLevel ?? 1 }}</div>
                    <div class="text-sm text-gray-400">Current Level</div>
                </div>

                <div class="glass-card rounded-2xl p-6">
                    <div class="flex items-center justify-between mb-4">
                        <div class="w-12 h-12 rounded-xl bg-gradient-to-br from-blue-500 to-cyan-600 flex items-center justify-center">
                            <i class="ri-trophy-line text-white text-xl"></i>
                        </div>
                        <div class="text-xs text-gray-500 mono-font">COMPLETED</div>
                    </div>
                    <div class="text-3xl font-bold text-white mb-1">{{ $completedChallenges ?? 0 }}</div>
                    <div class="text-sm text-gray-400">Completed Challenges</div>
                </div>

                <div class="glass-card rounded-2xl p-6">
                    <div class="flex items-center justify-between mb-4">
                        <div class="w-12 h-12 rounded-xl bg-gradient-to-br from-orange-500 to-red-600 flex items-center justify-center">
                            <i class="ri-time-line text-white text-xl"></i>
                        </div>
                        <div class="text-xs text-gray-500 mono-font">SESSIONS</div>
                    </div>
                    <div class="text-3xl font-bold text-white mb-1">{{ $totalSessions ?? 0 }}</div>
                    <div class="text-sm text-gray-400">Focus Sessions</div>
                </div>
            </div>

            <!-- Progress Section -->
            <div class="glass-card rounded-2xl p-8 mb-8">
                <div class="flex items-center justify-between mb-6">
                    <h2 class="text-xl font-semibold text-white">Level Progress</h2>
                    <div class="text-sm text-gray-400">{{ $totalPoints ?? 0 }}/100 points to next level</div>
                </div>
                <div class="progress-bar h-4 rounded-full">
                    <div class="progress-fill rounded-full" style="width: {{ min(($totalPoints ?? 0) % 100, 100) }}%;"></div>
                </div>
            </div>

            <!-- Main Content Grid -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                <!-- Recent Challenges -->
                <div class="glass-card rounded-2xl p-8">
                    <div class="flex items-center justify-between mb-6">
                        <h2 class="text-xl font-semibold text-white">Recent Challenges</h2>
                        <a href="{{ route('challenges.index') }}" class="text-purple-400 hover:text-purple-300 transition-colors">
                            View All <i class="ri-arrow-right-line ml-1"></i>
                        </a>
                    </div>
                    @if(isset($recentChallenges) && $recentChallenges->count() > 0)
                        <div class="space-y-4">
                            @foreach($recentChallenges as $challenge)
                                <div class="flex items-center justify-between p-4 bg-white/5 rounded-xl hover:bg-white/10 transition-all cursor-pointer">
                                    <div>
                                        <h3 class="font-medium text-white">{{ $challenge->title }}</h3>
                                        <p class="text-sm text-gray-400">{{ $challenge->difficulty }}</p>
                                    </div>
                                    <div class="text-purple-400">
                                        <i class="ri-arrow-right-line"></i>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <div class="text-center py-8">
                            <i class="ri-trophy-line text-4xl text-gray-600 mb-4"></i>
                            <p class="text-gray-400">No challenges yet. Start your first challenge!</p>
                        </div>
                    @endif
                </div>

                <!-- Recent Focus Sessions -->
                <div class="glass-card rounded-2xl p-8">
                    <div class="flex items-center justify-between mb-6">
                        <h2 class="text-xl font-semibold text-white">Recent Focus Sessions</h2>
                        <a href="{{ route('focus-sessions.index') }}" class="text-purple-400 hover:text-purple-300 transition-colors">
                            View All <i class="ri-arrow-right-line ml-1"></i>
                        </a>
                    </div>
                    @if(isset($recentSessions) && $recentSessions->count() > 0)
                        <div class="space-y-4">
                            @foreach($recentSessions as $session)
                                <div class="flex items-center justify-between p-4 bg-white/5 rounded-xl hover:bg-white/10 transition-all">
                                    <div>
                                        <h3 class="font-medium text-white">{{ $session->title ?? 'Focus Session' }}</h3>
                                        <p class="text-sm text-gray-400">{{ $session->duration ?? '25 min' }}</p>
                                    </div>
                                    <div class="text-green-400">
                                        <i class="ri-check-line"></i>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <div class="text-center py-8">
                            <i class="ri-time-line text-4xl text-gray-600 mb-4"></i>
                            <p class="text-gray-400">No focus sessions yet. Start your first session!</p>
                        </div>
                    @endif
                </div>
            </div>

            <!-- Quick Actions -->
            <div class="glass-card rounded-2xl p-8">
                <h2 class="text-xl font-semibold text-white mb-6">Quick Actions</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <a href="{{ route('challenges.index') }}" class="glow-button p-6 rounded-xl text-white text-center">
                        <i class="ri-trophy-line text-2xl mb-2"></i>
                        <div class="font-medium">Browse Challenges</div>
                        <div class="text-sm text-gray-300">Test your skills</div>
                    </a>
                    <a href="{{ route('focus-sessions.create') }}" class="nav-item p-6 rounded-xl text-white text-center hover:bg-white/10">
                        <i class="ri-time-line text-2xl mb-2"></i>
                        <div class="font-medium">Start Focus Session</div>
                        <div class="text-sm text-gray-300">Deep work mode</div>
                    </a>
                </div>
            </div>
        </div>
    </main>
</body>
</html>
