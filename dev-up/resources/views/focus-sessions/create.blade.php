<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DEV↑UP - Create Focus Session</title>
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
        
        .preset-card {
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(255, 255, 255, 0.1);
            transition: all 0.3s ease;
            cursor: pointer;
        }
        
        .preset-card:hover {
            background: rgba(255, 255, 255, 0.1);
            transform: translateY(-2px);
            box-shadow: 0 4px 16px rgba(0, 0, 0, 0.2);
        }
        
        .preset-card.selected {
            background: rgba(102, 126, 234, 0.2);
            border-color: rgba(102, 126, 234, 0.5);
        }
        
        .input-field {
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(255, 255, 255, 0.1);
            transition: all 0.3s ease;
        }
        
        .input-field:focus {
            background: rgba(255, 255, 255, 0.08);
            border-color: rgba(102, 126, 234, 0.5);
            box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
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
                    <a href="{{ route('challenges.index') }}" class="nav-item px-4 py-2 rounded-xl text-gray-300 hover:text-white transition-all">
                        <i class="ri-trophy-line mr-2"></i>
                        Challenges
                    </a>
                    <a href="{{ route('focus-sessions.index') }}" class="nav-item px-4 py-2 rounded-xl text-white hover:text-purple-300 transition-all">
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
        <div class="max-w-4xl mx-auto">
            <!-- Header Section -->
            <div class="glass-card rounded-2xl p-8 mb-8">
                <div class="flex items-center justify-between">
                    <div>
                        <h1 class="text-3xl font-bold text-white mb-2">Create Focus Session</h1>
                        <p class="text-gray-400">Set up your focus session to maximize productivity and maintain concentration.</p>
                    </div>
                    <div class="w-16 h-16 rounded-2xl bg-gradient-to-br from-blue-500 to-cyan-600 flex items-center justify-center">
                        <i class="ri-time-line text-white text-2xl"></i>
                    </div>
                </div>
            </div>

            <!-- Create Form -->
            <form action="{{ route('focus-sessions.store') }}" method="POST" class="space-y-8">
                @csrf

                <!-- Quick Presets -->
                <div class="glass-card rounded-2xl p-8">
                    <h2 class="text-xl font-semibold text-white mb-6">
                        <i class="ri-flashlight-line mr-2"></i>
                        Quick Presets
                    </h2>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                        <div class="preset-card rounded-xl p-4" onclick="setPreset(25, 5)">
                            <div class="flex items-center justify-between mb-2">
                                <h3 class="font-medium text-white">Pomodoro</h3>
                                <i class="ri-timer-line text-purple-400"></i>
                            </div>
                            <p class="text-gray-400 text-sm mb-2">Classic 25-minute focus</p>
                            <div class="flex items-center gap-4 text-xs text-gray-500">
                                <span>25 min focus</span>
                                <span>5 min break</span>
                            </div>
                        </div>
                        
                        <div class="preset-card rounded-xl p-4" onclick="setPreset(50, 10)">
                            <div class="flex items-center justify-between mb-2">
                                <h3 class="font-medium text-white">Deep Work</h3>
                                <i class="ri-focus-3-line text-blue-400"></i>
                            </div>
                            <p class="text-gray-400 text-sm mb-2">Extended focus period</p>
                            <div class="flex items-center gap-4 text-xs text-gray-500">
                                <span>50 min focus</span>
                                <span>10 min break</span>
                            </div>
                        </div>
                        
                        <div class="preset-card rounded-xl p-4" onclick="setPreset(15, 3)">
                            <div class="flex items-center justify-between mb-2">
                                <h3 class="font-medium text-white">Quick Sprint</h3>
                                <i class="ri-speed-line text-green-400"></i>
                            </div>
                            <p class="text-gray-400 text-sm mb-2">Short intense focus</p>
                            <div class="flex items-center gap-4 text-xs text-gray-500">
                                <span>15 min focus</span>
                                <span>3 min break</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Session Settings -->
                <div class="glass-card rounded-2xl p-8">
                    <h2 class="text-xl font-semibold text-white mb-6">
                        <i class="ri-settings-3-line mr-2"></i>
                        Session Settings
                    </h2>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Focus Duration -->
                        <div>
                            <label for="focus_duration" class="block text-sm font-medium text-gray-300 mb-2">
                                Focus Duration (minutes)
                            </label>
                            <input type="number" 
                                   name="focus_duration" 
                                   id="focus_duration" 
                                   value="25"
                                   min="1" 
                                   max="120"
                                   required
                                   class="input-field w-full px-4 py-3 rounded-xl text-white outline-none transition-all"
                                   placeholder="Enter focus duration">
                            <p class="text-sm text-gray-500 mt-2">
                                Concentration time (1-120 minutes). Recommended: 25 minutes.
                            </p>
                        </div>

                        <!-- Break Duration -->
                        <div>
                            <label for="break_duration" class="block text-sm font-medium text-gray-300 mb-2">
                                Break Duration (minutes)
                            </label>
                            <input type="number" 
                                   name="break_duration" 
                                   id="break_duration" 
                                   value="5"
                                   min="1" 
                                   max="30"
                                   required
                                   class="input-field w-full px-4 py-3 rounded-xl text-white outline-none transition-all"
                                   placeholder="Enter break duration">
                            <p class="text-sm text-gray-500 mt-2">
                                Break time between sessions (1-30 minutes). Recommended: 5 minutes.
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Session Goals -->
                <div class="glass-card rounded-2xl p-8">
                    <h2 class="text-xl font-semibold text-white mb-6">
                        <i class="ri-target-line mr-2"></i>
                        Session Goals
                    </h2>
                    
                    <div>
                        <label for="goals" class="block text-sm font-medium text-gray-300 mb-2">
                            What do you want to accomplish?
                        </label>
                        <textarea 
                            name="goals"
                            id="goals"
                            rows="4"
                            class="input-field w-full px-4 py-3 rounded-xl text-white outline-none resize-none transition-all"
                            placeholder="e.g., Complete the authentication module, Review pull requests, Write documentation..."
                        ></textarea>
                        <p class="text-sm text-gray-500 mt-2">
                            Setting clear goals helps maintain focus and track progress.
                        </p>
                    </div>
                </div>

                <!-- Actions -->
                <div class="flex gap-4">
                    <button type="submit" class="glow-button flex-1 px-8 py-4 rounded-xl text-white font-semibold">
                        <span class="relative z-10 flex items-center justify-center gap-2">
                            <i class="ri-play-line text-xl"></i>
                            Start Session
                        </span>
                    </button>
                    <a href="{{ route('focus-sessions.index') }}" class="nav-item flex-1 px-8 py-4 rounded-xl text-gray-300 font-medium hover:text-white hover:bg-white/10 text-center">
                        <i class="ri-arrow-left-line mr-2"></i>
                        Back to Sessions
                    </a>
                </div>
            </form>
        </div>
    </main>

    <script>
        function setPreset(focusDuration, breakDuration) {
            document.getElementById('focus_duration').value = focusDuration;
            document.getElementById('break_duration').value = breakDuration;
            
            // Update selected preset visual
            document.querySelectorAll('.preset-card').forEach(card => {
                card.classList.remove('selected');
            });
            event.currentTarget.classList.add('selected');
        }
    </script>
</body>
</html>
                        <label class="form-label">Quick Presets</label>
                        <div class="grid grid-cols-3 gap-3">
                            <button type="button" 
                                    onclick="setPreset(25, 5)"
                                    class="btn btn-secondary text-sm">
                                <div class="font-medium">Pomodoro</div>
                                <div class="text-xs text-gray-500">25/5 min</div>
                            </button>
                            <button type="button" 
                                    onclick="setPreset(50, 10)"
                                    class="btn btn-secondary text-sm">
                                <div class="font-medium">Extended</div>
                                <div class="text-xs text-gray-500">50/10 min</div>
                            </button>
                            <button type="button" 
                                    onclick="setPreset(90, 15)"
                                    class="btn btn-secondary text-sm">
                                <div class="font-medium">Deep Work</div>
                                <div class="text-xs text-gray-500">90/15 min</div>
                            </button>
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <div class="flex gap-4">
                        <button type="submit" class="btn btn-primary flex-1">
                            <svg width="20" height="20" viewBox="0 0 20 20" fill="none">
                                <path d="M10 3v14M3 10h14" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                            </svg>
                            Start Session
                        </button>
                        <a href="{{ route('focus-sessions.index') }}" class="btn btn-secondary">
                            Cancel
                        </a>
                    </div>
                </form>
            </div>

            <!-- Tips -->
            <div class="card mt-8 p-6 bg-gray-50">
                <h3 class="text-lg font-semibold text-gray-900 mb-4">Focus Tips</h3>
                <ul class="space-y-3 text-gray-600">
                    <li class="flex items-start gap-3">
                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" class="text-green-500 mt-0.5">
                            <path d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" fill="currentColor"/>
                        </svg>
                        <span>Eliminate distractions before starting your session</span>
                    </li>
                    <li class="flex items-start gap-3">
                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" class="text-green-500 mt-0.5">
                            <path d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" fill="currentColor"/>
                        </svg>
                        <span>Take short breaks to maintain productivity</span>
                    </li>
                    <li class="flex items-start gap-3">
                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" class="text-green-500 mt-0.5">
                            <path d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" fill="currentColor"/>
                        </svg>
                        <span>Stay hydrated and comfortable during focus time</span>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <script>
        function setPreset(focus, breakTime) {
            document.getElementById('focus_duration').value = focus;
            document.getElementById('break_duration').value = breakTime;
        }
    </script>
</x-app-layout>
