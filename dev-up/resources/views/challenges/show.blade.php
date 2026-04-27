<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DEV↑UP - {{ $challenge->title ?? 'Challenge' }}</title>
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
        
        .code-editor {
            background: #1a1a1a;
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 12px;
            font-family: 'JetBrains Mono', monospace;
        }
        
        .line-numbers {
            background: rgba(255, 255, 255, 0.02);
            border-right: 1px solid rgba(255, 255, 255, 0.1);
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
                <div class="flex justify-between items-start">
                    <div class="flex-1">
                        <div class="flex items-center gap-4 mb-4">
                            <h1 class="text-3xl font-bold text-white">{{ $challenge->title ?? 'Challenge Title' }}</h1>
                            <span class="difficulty-{{ $challenge->difficulty ?? 'easy' }} px-3 py-1 rounded-full text-xs font-medium">
                                {{ $challenge->difficulty ?? 'Easy' }}
                            </span>
                        </div>
                        <div class="flex items-center gap-6">
                            <div class="flex items-center gap-2">
                                <i class="ri-star-line text-yellow-400"></i>
                                <span class="text-white font-medium">{{ $challenge->points ?? 100 }}</span>
                                <span class="text-gray-400 text-sm">points</span>
                            </div>
                        </div>
                    </div>
                    
                    <div>
                        @if(!isset($userChallenge) || !$userChallenge)
                            <form action="{{ route('challenges.start', $challenge->id) }}" method="POST">
                                @csrf
                                <button type="submit" class="glow-button px-8 py-4 rounded-xl text-white font-semibold">
                                    <i class="ri-play-line mr-2"></i>
                                    Start Challenge
                                </button>
                            </form>
                        @else
                            <span class="inline-flex items-center px-6 py-3 rounded-full text-sm font-medium
                                {{ $userChallenge->status === 'en_cours' ? 'bg-yellow-500/20 text-yellow-400 border border-yellow-500/30' : 
                                   ($userChallenge->status === 'termine' ? 'bg-green-500/20 text-green-400 border border-green-500/30' : 
                                   'bg-red-500/20 text-red-400 border border-red-500/30') }}">
                                <i class="ri-time-line mr-2"></i>
                                {{ $userChallenge->status === 'en_cours' ? 'In Progress' : 
                                   ($userChallenge->status === 'termine' ? 'Completed' : 'Abandoned') }}
                            </span>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Challenge Content -->
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                <!-- Main Content -->
                <div class="lg:col-span-2 space-y-8">
                    <!-- Description -->
                    <div class="glass-card rounded-2xl p-8">
                        <h2 class="text-xl font-semibold text-white mb-6">
                            <i class="ri-file-text-line mr-2"></i>
                            Description
                        </h2>
                        <div class="text-gray-300 leading-relaxed">
                            <p>{{ $challenge->description ?? 'Complete this programming challenge to test your skills and earn points.' }}</p>
                        </div>
                    </div>

                    <!-- Code Editor -->
                    <div class="glass-card rounded-2xl p-8">
                        <h2 class="text-xl font-semibold text-white mb-6">
                            <i class="ri-code-line mr-2"></i>
                            Code Editor
                        </h2>
                        <div class="code-editor rounded-xl overflow-hidden">
                            <div class="flex">
                                <div class="line-numbers px-4 py-4 text-gray-500 text-sm">
                                    1<br>2<br>3<br>4<br>5<br>6<br>7<br>8<br>9<br>10
                                </div>
                                <div class="flex-1 p-4">
                                    <textarea 
                                        class="w-full bg-transparent text-white outline-none resize-none font-mono text-sm"
                                        rows="10"
                                        placeholder="// Write your code here..."
                                    ></textarea>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Test Cases -->
                    <div class="glass-card rounded-2xl p-8">
                        <h2 class="text-xl font-semibold text-white mb-6">
                            <i class="ri-bug-line mr-2"></i>
                            Test Cases
                        </h2>
                        <div class="space-y-4">
                            <div class="bg-white/5 rounded-xl p-4">
                                <div class="flex items-center justify-between mb-2">
                                    <span class="text-sm font-medium text-gray-400">Test Case 1</span>
                                    <span class="text-xs px-2 py-1 bg-green-500/20 text-green-400 rounded">Pass</span>
                                </div>
                                <div class="font-mono text-sm text-gray-300">
                                    Input: [1, 2, 3]<br>
                                    Expected: [1, 4, 9]
                                </div>
                            </div>
                            <div class="bg-white/5 rounded-xl p-4">
                                <div class="flex items-center justify-between mb-2">
                                    <span class="text-sm font-medium text-gray-400">Test Case 2</span>
                                    <span class="text-xs px-2 py-1 bg-yellow-500/20 text-yellow-400 rounded">Pending</span>
                                </div>
                                <div class="font-mono text-sm text-gray-300">
                                    Input: [0, -1, 2]<br>
                                    Expected: [0, 1, 4]
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Sidebar -->
                <div class="space-y-8">
                    <!-- Challenge Info -->
                    <div class="glass-card rounded-2xl p-6">
                        <h3 class="text-lg font-semibold text-white mb-4">
                            <i class="ri-information-line mr-2"></i>
                            Challenge Info
                        </h3>
                        <div class="space-y-3">
                            <div class="flex justify-between">
                                <span class="text-gray-400">Difficulty</span>
                                <span class="difficulty-{{ $challenge->difficulty ?? 'easy' }} px-2 py-1 rounded text-xs font-medium">
                                    {{ $challenge->difficulty ?? 'Easy' }}
                                </span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-400">Points</span>
                                <span class="text-white font-medium">{{ $challenge->points ?? 100 }}</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-400">Time Limit</span>
                                <span class="text-white font-medium">30 min</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-400">Attempts</span>
                                <span class="text-white font-medium">3</span>
                            </div>
                        </div>
                    </div>

                    <!-- Actions -->
                    <div class="glass-card rounded-2xl p-6">
                        <h3 class="text-lg font-semibold text-white mb-4">
                            <i class="ri-tools-line mr-2"></i>
                            Actions
                        </h3>
                        <div class="space-y-3">
                            <button class="glow-button w-full py-3 rounded-xl text-white font-medium">
                                <i class="ri-run-line mr-2"></i>
                                Run Code
                            </button>
                            <button class="nav-item w-full py-3 rounded-xl text-white font-medium hover:bg-white/10">
                                <i class="ri-send-plane-line mr-2"></i>
                                Submit Solution
                            </button>
                            <button class="nav-item w-full py-3 rounded-xl text-gray-300 font-medium hover:text-white hover:bg-white/10">
                                <i class="ri-refresh-line mr-2"></i>
                                Reset Code
                            </button>
                        </div>
                    </div>

                    <!-- Progress -->
                    @if(isset($userChallenge) && $userChallenge)
                        <div class="glass-card rounded-2xl p-6">
                            <h3 class="text-lg font-semibold text-white mb-4">
                                <i class="ri-bar-chart-line mr-2"></i>
                                Your Progress
                            </h3>
                            <div class="space-y-3">
                                <div>
                                    <div class="flex justify-between mb-2">
                                        <span class="text-gray-400">Status</span>
                                        <span class="text-white font-medium">
                                            {{ $userChallenge->status === 'en_cours' ? 'In Progress' : 
                                               ($userChallenge->status === 'termine' ? 'Completed' : 'Abandoned') }}
                                        </span>
                                    </div>
                                </div>
                                <div>
                                    <div class="flex justify-between mb-2">
                                        <span class="text-gray-400">Score</span>
                                        <span class="text-white font-medium">{{ $userChallenge->score ?? 0 }}/{{ $challenge->points ?? 100 }}</span>
                                    </div>
                                    <div class="w-full bg-white/10 rounded-full h-2">
                                        <div class="bg-gradient-to-r from-purple-500 to-indigo-600 h-2 rounded-full" style="width: {{ ($userChallenge->score ?? 0) / ($challenge->points ?? 100) * 100 }}%"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </main>
</body>
</html>
                <div class="card p-8">
                    <h2 class="text-2xl font-semibold text-gray-900 mb-6">Challenge Description</h2>
                    <div class="prose prose-gray max-w-none">
                        <p class="text-gray-700 leading-relaxed">{{ $challenge->description }}</p>
                    </div>
                </div>

                <!-- Requirements -->
                <div class="card p-8">
                    <h2 class="text-2xl font-semibold text-gray-900 mb-6">Requirements</h2>
                    <div class="space-y-4">
                        <div class="flex items-start gap-3">
                            <svg width="20" height="20" viewBox="0 0 20 20" fill="none" class="text-green-500 mt-0.5">
                                <path d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" fill="currentColor"/>
                            </svg>
                            <span class="text-gray-700">Complete the challenge according to the specifications</span>
                        </div>
                        <div class="flex items-start gap-3">
                            <svg width="20" height="20" viewBox="0 0 20 20" fill="none" class="text-green-500 mt-0.5">
                                <path d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" fill="currentColor"/>
                            </svg>
                            <span class="text-gray-700">Submit your solution for review</span>
                        </div>
                        <div class="flex items-start gap-3">
                            <svg width="20" height="20" viewBox="0 0 20 20" fill="none" class="text-green-500 mt-0.5">
                                <path d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" fill="currentColor"/>
                            </svg>
                            <span class="text-gray-700">Earn points upon successful completion</span>
                        </div>
                    </div>
                </div>

                <!-- Submit Solution -->
                @if($userChallenge && $userChallenge->status === 'en_cours')
                    <div class="card p-8">
                        <h2 class="text-2xl font-semibold text-gray-900 mb-6">Submit Solution</h2>
                        <form action="{{ route('challenges.submit', $challenge->id) }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="solution" class="form-label">Your Solution</label>
                                <textarea id="solution" 
                                          name="solution" 
                                          rows="6" 
                                          required
                                          class="input"
                                          placeholder="Enter your solution here..."></textarea>
                            </div>
                            <div class="flex gap-4">
                                <button type="submit" class="btn btn-primary">
                                    Submit Solution
                                </button>
                                <a href="{{ route('challenges.index') }}" class="btn btn-secondary">
                                    Cancel
                                </a>
                            </div>
                        </form>
                    </div>
                @endif
            </div>

            <!-- Sidebar -->
            <div class="space-y-8">
                <!-- Challenge Info -->
                <div class="card p-6">
                    <h3 class="text-lg font-semibold text-gray-900 mb-4">Challenge Info</h3>
                    <div class="space-y-4">
                        <div>
                            <div class="text-sm text-gray-500 mb-1">Difficulty</div>
                            <div class="flex items-center gap-2">
                                <span class="challenge-difficulty difficulty-{{ $challenge->difficulty }}">
                                    {{ $challenge->difficulty }}
                                </span>
                            </div>
                        </div>
                        <div>
                            <div class="text-sm text-gray-500 mb-1">Points</div>
                            <div class="text-lg font-semibold text-gray-900">{{ $challenge->points }} pts</div>
                        </div>
                        <div>
                            <div class="text-sm text-gray-500 mb-1">Estimated Time</div>
                            <div class="text-gray-900">
                                {{ $challenge->difficulty === 'facile' ? '15-30 min' : 
                                   ($challenge->difficulty === 'moyen' ? '30-60 min' : '60-90 min') }}
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Progress -->
                @if($userChallenge)
                    <div class="card p-6">
                        <h3 class="text-lg font-semibold text-gray-900 mb-4">Your Progress</h3>
                        <div class="space-y-4">
                            <div>
                                <div class="text-sm text-gray-500 mb-1">Status</div>
                                <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium
                                    {{ $userChallenge->status === 'en_cours' ? 'bg-yellow-100 text-yellow-800' : 
                                       ($userChallenge->status === 'termine' ? 'bg-green-100 text-green-800' : 
                                       'bg-red-100 text-red-800') }}">
                                    {{ $userChallenge->status === 'en_cours' ? 'In Progress' : 
                                       ($userChallenge->status === 'termine' ? 'Completed' : 'Abandoned') }}
                                </span>
                            </div>
                            @if($userChallenge->completed_at)
                                <div>
                                    <div class="text-sm text-gray-500 mb-1">Completed</div>
                                    <div class="text-gray-900">{{ $userChallenge->completed_at->format('M j, Y') }}</div>
                                </div>
                            @endif
                        </div>
                    </div>
                @endif

                <!-- Actions -->
                <div class="card p-6">
                    <h3 class="text-lg font-semibold text-gray-900 mb-4">Actions</h3>
                    <div class="space-y-3">
                        <a href="{{ route('challenges.index') }}" class="btn btn-secondary w-full">
                            Back to Challenges
                        </a>
                        @if($userChallenge && $userChallenge->status === 'en_cours')
                            <form action="{{ route('challenges.abandon', $challenge->id) }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-ghost w-full text-red-600 hover:text-red-700"
                                        onclick="return confirm('Are you sure you want to abandon this challenge?')">
                                    Abandon Challenge
                                </button>
                            </form>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
