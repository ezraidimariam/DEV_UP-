<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DEV↑UP - My Challenges</title>
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
        
        .status-completed {
            background: linear-gradient(135deg, #10b981, #059669);
            color: white;
        }
        
        .status-in-progress {
            background: linear-gradient(135deg, #f59e0b, #d97706);
            color: white;
        }
        
        .status-abandoned {
            background: linear-gradient(135deg, #dc2626, #7f1d1d);
            color: white;
        }
    </style>
</head>
<body class="bg-black text-on-surface font-body-md antialiased selection:bg-primary selection:text-on-primary">
<!-- Navigation -->
<header class="fixed top-0 w-full z-50 border-b border-white/10 bg-black">
    <div class="flex justify-between items-center h-16 px-6 max-w-[640px] mx-auto w-full">
        <div class="flex items-center gap-2">
            <span class="material-symbols-outlined text-indigo-500" data-icon="terminal">terminal</span>
            <span class="text-indigo-500 font-black tracking-tighter text-xl">DEV↑UP</span>
        </div>
        <div class="flex items-center gap-4">
            <a href="{{ route('dashboard') }}" class="text-on-surface-variant hover:text-on-surface transition-colors">
    </div>

    <!-- Navigation Header -->
    <nav class="fixed top-0 left-0 right-0 z-50 glass-card border-b border-white/10">
        <div class="max-w-7xl mx-auto px-6 py-4">
            <div class="flex items-center justify-between">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 rounded-xl bg-gradient-to-br from-purple-500 to-indigo-600 flex items-center justify-center">
                        <i class="ri-code-s-slash-line text-white text-lg"></i>
                                   class="flex-1 border border-white/10 bg-surface-container text-on-surface font-label py-3 rounded text-center hover:bg-white/5 transition-colors">
                                    View Solution
                                </a>
                                <button class="flex-1 border border-white/10 bg-surface-container text-on-surface font-label py-3 rounded hover:bg-white/5 transition-colors">
                                    Try Again
                                </button>
                            </div>
                        @else
                            <div class="flex gap-3">
                                <a href="{{ route('challenges.show', $userChallenge->challenge->id) }}" 
                                   class="flex-1 bg-primary-container text-on-primary-container font-label py-3 rounded text-center hover:bg-opacity-90 transition-colors">
                                    Restart
                                </a>
                                <button class="flex-1 border border-white/10 bg-surface-container text-on-surface font-label py-3 rounded hover:bg-white/5 transition-colors">
                                    View Details
                                </button>
                            </div>
                        @endif
                    </div>
                @endforeach
            </div>
        @else
            <!-- Empty State -->
            <div class="text-center py-stack-lg">
                <div class="w-20 h-20 bg-surface-container rounded-full flex items-center justify-center mx-auto mb-4">
                    <span class="material-symbols-outlined text-3xl text-on-surface-variant">code_off</span>
                </div>
                <h3 class="font-h2 text-h2 text-on-surface mb-2">No challenges yet</h3>
                <p class="font-body-md text-body-md text-on-surface-variant mb-6">
                    Start your journey by exploring available challenges.
                </p>
                <a href="{{ route('challenges.index') }}" 
                   class="inline-flex items-center gap-2 bg-primary-container text-on-primary-container font-label py-3 px-6 rounded hover:bg-opacity-90 transition-colors">
                    <span>Browse Challenges</span>
                    <span class="material-symbols-outlined text-sm">arrow_forward</span>
                </a>
            </div>
        @endif
    </div>
</main>

<!-- Visual Layering Element -->
<div class="fixed top-0 left-1/2 -translate-x-1/2 w-[640px] h-screen -z-10 pointer-events-none opacity-20">
    <div class="absolute top-0 w-full h-1/2 bg-gradient-to-b from-indigo-500/10 to-transparent"></div>
</div>
</body>
</html>
                                        </svg>
                                        {{ $userChallenge->challenge->difficulty }}
                                    </div>
                                    
                                    @if($userChallenge->completed_at)
                                        <div class="flex items-center text-sm text-gray-600">
                                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                            </svg>
                                            Terminé le {{ $userChallenge->completed_at->format('d/m/Y') }}
                                        </div>
                                    @endif
                                </div>
                                
                                <p class="text-gray-600 text-sm mb-4">
                                    {{ Str::limit($userChallenge->challenge->description, 80) }}
                                </p>
                            </div>
                            
                            <div class="bg-gray-50 px-6 py-3">
                                <a href="{{ route('challenges.show', $userChallenge->challenge->id) }}" 
                                   class="text-sm font-medium text-blue-600 hover:text-blue-900">
                                    Voir les détails →
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- Pagination -->
                <div class="mt-8">
                    {{ $userChallenges->links() }}
                </div>
            @else
                <div class="text-center py-12">
                    <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                    </svg>
                    <h3 class="mt-2 text-sm font-medium text-gray-900">Aucun challenge</h3>
                    <p class="mt-1 text-sm text-gray-500">Vous n'avez pas encore commencé de challenge.</p>
                    <div class="mt-6">
                        <a href="{{ route('challenges.index') }}" 
                           class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                            Découvrir les challenges
                        </a>
                    </div>
                </div>
            @endif
        </div>
    </div>
</x-app-layout>
