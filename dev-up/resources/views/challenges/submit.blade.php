<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DEV↑UP - Submit Solution</title>
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
        
        .test-result-success {
            background: rgba(34, 197, 94, 0.1);
            border: 1px solid rgba(34, 197, 94, 0.2);
            color: #4ade80;
        }
        
        .test-result-error {
            background: rgba(239, 68, 68, 0.1);
            border: 1px solid rgba(239, 68, 68, 0.2);
            color: #f87171;
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
                        <h1 class="text-3xl font-bold text-white mb-2">Submit Solution</h1>
                        <p class="text-gray-400">Submit your solution and test it against challenge requirements.</p>
                    </div>
                    <div class="flex items-center gap-4">
                        <div class="text-sm text-gray-500">Challenge:</div>
                        <div class="text-lg font-medium text-white">{{ $challenge->title ?? 'Challenge Name' }}</div>
                    </div>
                </div>
            </div>

            <!-- Submit Form -->
            <form method="POST" action="{{ route('challenges.submit', $challenge->id) }}" class="space-y-8">
                @csrf

                <!-- Code Editor Section -->
                <div class="glass-card rounded-2xl p-8">
                    <h2 class="text-xl font-semibold text-white mb-6">
                        <i class="ri-code-line mr-2"></i>
                        Your Solution
                    </h2>
                    <div class="flex justify-between items-center mb-4">
                        <label class="text-sm font-medium text-gray-300">Programming Language</label>
                        <div class="flex items-center gap-2">
                            <select name="language" class="bg-white/5 border border-white/10 rounded-xl px-4 py-2 text-white text-sm focus:outline-none focus:ring-2 focus:ring-purple-500">
                                <option value="php">PHP</option>
                                <option value="javascript">JavaScript</option>
                                <option value="python">Python</option>
                                <option value="java">Java</option>
                                <option value="cpp">C++</option>
                            </select>
                        </div>
                    </div>
                    <div class="code-editor rounded-xl overflow-hidden">
                        <div class="flex">
                            <div class="line-numbers px-4 py-4 text-gray-500 text-sm">
                                1<br>2<br>3<br>4<br>5<br>6<br>7<br>8<br>9<br>10
                            </div>
                            <div class="flex-1 p-4">
                                <textarea 
                                    name="solution"
                                    class="w-full bg-transparent text-white outline-none resize-none font-mono text-sm"
                                    rows="15"
                                    placeholder="// Write your solution code here..."
                                    required
                                >{{ old('solution') }}</textarea>
                            </div>
                        </div>
                    </div>
                    @if ($errors->has('solution'))
                        <div class="test-result-error rounded-lg p-3 mt-4 text-sm">
                            {{ $errors->first('solution') }}
                        </div>
                    @endif
                </div>

                <!-- Additional Notes -->
                <div class="glass-card rounded-2xl p-8">
                    <h2 class="text-xl font-semibold text-white mb-6">
                        <i class="ri-file-text-line mr-2"></i>
                        Additional Notes (Optional)
                    </h2>
                    <textarea 
                        name="notes"
                        class="w-full bg-white/5 border border-white/10 rounded-xl p-4 text-white outline-none resize-none text-sm focus:ring-2 focus:ring-purple-500 focus:border-transparent"
                        rows="4"
                        placeholder="Any additional notes about your solution..."
                    >{{ old('notes') }}</textarea>
                </div>

                <!-- Actions -->
                <div class="flex gap-4">
                    <button type="submit" class="glow-button flex-1 px-8 py-4 rounded-xl text-white font-semibold">
                        <span class="relative z-10 flex items-center justify-center gap-2">
                            <i class="ri-send-plane-line text-xl"></i>
                            Submit Solution
                        </span>
                    </button>
                    <button type="button" onclick="window.history.back()" class="nav-item flex-1 px-8 py-4 rounded-xl text-gray-300 font-medium hover:text-white hover:bg-white/10">
                        <i class="ri-arrow-left-line mr-2"></i>
                        Back to Challenge
                    </button>
                </div>
            </form>

            <!-- Guidelines -->
            <div class="glass-card rounded-2xl p-8 mt-8">
                <h2 class="text-xl font-semibold text-white mb-6">
                    <i class="ri-information-line mr-2"></i>
                    Submission Guidelines
                </h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="space-y-4">
                        <div class="flex items-start gap-3">
                            <div class="w-8 h-8 rounded-lg bg-green-500/20 flex items-center justify-center flex-shrink-0">
                                <i class="ri-check-line text-green-400 text-sm"></i>
                            </div>
                            <div>
                                <h3 class="text-white font-medium mb-1">Code Quality</h3>
                                <p class="text-gray-400 text-sm">Ensure your code is properly formatted and follows best practices</p>
                            </div>
                        </div>
                        <div class="flex items-start gap-3">
                            <div class="w-8 h-8 rounded-lg bg-blue-500/20 flex items-center justify-center flex-shrink-0">
                                <i class="ri-bug-line text-blue-400 text-sm"></i>
                            </div>
                            <div>
                                <h3 class="text-white font-medium mb-1">Testing</h3>
                                <p class="text-gray-400 text-sm">Test your solution thoroughly before submitting</p>
                            </div>
                        </div>
                    </div>
                    <div class="space-y-4">
                        <div class="flex items-start gap-3">
                            <div class="w-8 h-8 rounded-lg bg-purple-500/20 flex items-center justify-center flex-shrink-0">
                                <i class="ri-message-3-line text-purple-400 text-sm"></i>
                            </div>
                            <div>
                                <h3 class="text-white font-medium mb-1">Documentation</h3>
                                <p class="text-gray-400 text-sm">Include comments where necessary to explain complex logic</p>
                            </div>
                        </div>
                        <div class="flex items-start gap-3">
                            <div class="w-8 h-8 rounded-lg bg-orange-500/20 flex items-center justify-center flex-shrink-0">
                                <i class="ri-shield-check-line text-orange-400 text-sm"></i>
                            </div>
                            <div>
                                <h3 class="text-white font-medium mb-1">Edge Cases</h3>
                                <p class="text-gray-400 text-sm">Make sure your solution handles all edge cases properly</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>
</html>
