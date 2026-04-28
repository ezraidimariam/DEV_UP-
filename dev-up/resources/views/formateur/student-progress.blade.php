<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DEV↑UP - Student Progress</title>
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
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border: none;
            color: white;
            padding: 12px 24px;
            border-radius: 12px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 4px 16px rgba(102, 126, 234, 0.4);
        }
        
        .glow-button:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 24px rgba(102, 126, 234, 0.6);
        }
        
        .nav-link {
            transition: all 0.3s ease;
            position: relative;
        }
        
        .nav-link:hover {
            color: #667eea;
        }
        
        .nav-link.active {
            color: #667eea;
        }
        
        .nav-link.active::after {
            content: '';
            position: absolute;
            bottom: -2px;
            left: 0;
            right: 0;
            height: 2px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }
        
        .progress-bar {
            background: rgba(255, 255, 255, 0.1);
            border-radius: 10px;
            overflow: hidden;
        }
        
        .progress-fill {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            height: 100%;
            transition: width 0.3s ease;
        }
        
        .status-badge {
            padding: 4px 12px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
        }
        
        .status-completed {
            background: rgba(16, 185, 129, 0.2);
            color: #10b981;
            border: 1px solid #10b981;
        }
        
        .status-in-progress {
            background: rgba(251, 146, 60, 0.2);
            color: #fb923c;
            border: 1px solid #fb923c;
        }
        
        .status-abandoned {
            background: rgba(239, 68, 68, 0.2);
            color: #ef4444;
            border: 1px solid #ef4444;
        }
        
        .floating-shapes {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            pointer-events: none;
            z-index: -1;
        }
        
        .shape {
            position: absolute;
            border-radius: 50%;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            opacity: 0.1;
            animation: float 20s infinite ease-in-out;
        }
        
        .shape-1 {
            width: 200px;
            height: 200px;
            top: 10%;
            left: 5%;
            animation-delay: 0s;
        }
        
        .shape-2 {
            width: 150px;
            height: 150px;
            top: 60%;
            right: 10%;
            animation-delay: 5s;
        }
        
        .shape-3 {
            width: 100px;
            height: 100px;
            bottom: 20%;
            left: 50%;
            animation-delay: 10s;
        }
        
        @keyframes float {
            0%, 100% { transform: translateY(0px) rotate(0deg); }
            33% { transform: translateY(-20px) rotate(120deg); }
            66% { transform: translateY(20px) rotate(240deg); }
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

    <!-- Navigation -->
    <nav class="glass-card sticky top-0 z-50 border-b border-gray-800">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                <div class="flex items-center">
                    <h1 class="brand-font text-2xl font-bold gradient-text">DEV↑UP</h1>
                    <span class="ml-3 text-sm text-gray-400">Formateur</span>
                </div>
                
                <div class="hidden md:flex items-center space-x-8">
                    <a href="{{ route('formateur.dashboard') }}" class="nav-link text-white hover:text-gray-300">
                        <i class="ri-dashboard-line mr-2"></i>Dashboard
                    </a>
                    <a href="{{ route('formateur.submissions') }}" class="nav-link text-white hover:text-gray-300">
                        <i class="ri-file-list-3-line mr-2"></i>Submissions
                    </a>
                    <a href="{{ route('formateur.students') }}" class="nav-link active text-white hover:text-gray-300">
                        <i class="ri-group-line mr-2"></i>Students
                    </a>
                    <a href="{{ route('formateur.analytics') }}" class="nav-link text-white hover:text-gray-300">
                        <i class="ri-bar-chart-line mr-2"></i>Analytics
                    </a>
                </div>
                
                <div class="flex items-center space-x-4">
                    <a href="{{ route('profile.edit') }}" class="text-white hover:text-gray-300">
                        <i class="ri-user-line text-xl"></i>
                    </a>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="text-white hover:text-gray-300">
                            <i class="ri-logout-box-line text-xl"></i>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <!-- Header -->
        <div class="mb-8">
            <div class="flex items-center justify-between">
                <div>
                    <h1 class="brand-font text-4xl font-bold gradient-text mb-2">{{ $student->name }}'s Progress</h1>
                    <p class="text-gray-400">Detailed progress tracking and performance analysis</p>
                </div>
                <a href="{{ route('formateur.students') }}" class="text-gray-400 hover:text-white">
                    <i class="ri-arrow-left-line mr-2"></i>Back to Students
                </a>
            </div>
        </div>

        <!-- Student Overview -->
        <div class="grid grid-cols-1 lg:grid-cols-4 gap-6 mb-8">
            <div class="glass-card rounded-2xl p-6">
                <div class="flex items-center justify-between mb-4">
                    <div class="w-12 h-12 rounded-full bg-gradient-to-br from-blue-500 to-purple-600 flex items-center justify-center">
                        <span class="text-white font-bold text-lg">{{ strtoupper(substr($student->name, 0, 1)) }}</span>
                    </div>
                    <span class="text-sm text-gray-400">Level {{ $student->level }}</span>
                </div>
                <h3 class="text-xl font-bold text-white mb-2">{{ $student->name }}</h3>
                <p class="text-gray-400 text-sm">{{ $student->email }}</p>
            </div>

            <div class="glass-card rounded-2xl p-6">
                <div class="flex items-center justify-between mb-4">
                    <div class="w-12 h-12 rounded-xl bg-gradient-to-br from-yellow-500 to-orange-600 flex items-center justify-center">
                        <i class="ri-star-line text-white text-xl"></i>
                    </div>
                    <span class="text-xs text-yellow-400 mono-font">Total</span>
                </div>
                <h3 class="text-2xl font-bold text-white mb-1">{{ $progress['points_actuels'] }}</h3>
                <p class="text-gray-400 text-sm">Points Earned</p>
            </div>

            <div class="glass-card rounded-2xl p-6">
                <div class="flex items-center justify-between mb-4">
                    <div class="w-12 h-12 rounded-xl bg-gradient-to-br from-green-500 to-green-600 flex items-center justify-center">
                        <i class="ri-trophy-line text-white text-xl"></i>
                    </div>
                    <span class="text-xs text-green-400 mono-font">Completed</span>
                </div>
                <h3 class="text-2xl font-bold text-white mb-1">{{ $progress['challenges_termine'] }}</h3>
                <p class="text-gray-400 text-sm">Challenges</p>
            </div>

            <div class="glass-card rounded-2xl p-6">
                <div class="flex items-center justify-between mb-4">
                    <div class="w-12 h-12 rounded-xl bg-gradient-to-br from-purple-500 to-purple-600 flex items-center justify-center">
                        <i class="ri-time-line text-white text-xl"></i>
                    </div>
                    <span class="text-xs text-purple-400 mono-font">Completed</span>
                </div>
                <h3 class="text-2xl font-bold text-white mb-1">{{ $progress['sessions_terminees'] }}</h3>
                <p class="text-gray-400 text-sm">Focus Sessions</p>
            </div>
        </div>

        <!-- Progress Details -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
            <!-- Challenges Progress -->
            <div class="glass-card rounded-2xl p-6">
                <h2 class="text-xl font-semibold text-white mb-6">Challenge Progress</h2>
                
                @if($student->userChallenges->count() > 0)
                    <div class="space-y-4">
                        @foreach($student->userChallenges as $userChallenge)
                            <div class="border border-gray-700 rounded-xl p-4">
                                <div class="flex items-center justify-between mb-2">
                                    <h3 class="font-semibold text-white">{{ $userChallenge->challenge->title }}</h3>
                                    <span class="status-badge 
                                        @if($userChallenge->status === 'termine') status-completed
                                        @elseif($userChallenge->status === 'en_cours') status-in-progress
                                        @else status-abandoned @endif">
                                        {{ ucfirst($userChallenge->status) }}
                                    </span>
                                </div>
                                <div class="flex items-center justify-between text-sm">
                                    <span class="text-gray-400">{{ $userChallenge->challenge->difficulty }}</span>
                                    <span class="text-blue-400">{{ $userChallenge->challenge->points }} pts</span>
                                </div>
                                @if($userChallenge->completed_at)
                                    <p class="text-xs text-gray-500 mt-2">Completed: {{ $userChallenge->completed_at->format('M j, Y') }}</p>
                                @endif
                            </div>
                        @endforeach
                    </div>
                @else
                    <div class="text-center py-8">
                        <i class="ri-trophy-line text-4xl text-gray-600 mb-4"></i>
                        <p class="text-gray-400">No challenges started yet</p>
                    </div>
                @endif
            </div>

            <!-- Focus Sessions -->
            <div class="glass-card rounded-2xl p-6">
                <h2 class="text-xl font-semibold text-white mb-6">Focus Sessions</h2>
                
                @if($student->focusSessions->count() > 0)
                    <div class="space-y-4">
                        @foreach($student->focusSessions->take(10) as $session)
                            <div class="border border-gray-700 rounded-xl p-4">
                                <div class="flex items-center justify-between mb-2">
                                    <h3 class="font-semibold text-white">{{ $session->title ?? 'Focus Session' }}</h3>
                                    <span class="status-badge 
                                        @if($session->is_completed) status-completed
                                        @else status-in-progress @endif">
                                        {{ $session->is_completed ? 'Completed' : 'In Progress' }}
                                    </span>
                                </div>
                                <div class="flex items-center justify-between text-sm">
                                    <span class="text-gray-400">{{ $session->duration ?? 'N/A' }} minutes</span>
                                    <span class="text-gray-500">{{ $session->date_session->format('M j, Y') }}</span>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <div class="text-center py-8">
                        <i class="ri-time-line text-4xl text-gray-600 mb-4"></i>
                        <p class="text-gray-400">No focus sessions recorded yet</p>
                    </div>
                @endif
            </div>
        </div>

        <!-- Badges -->
        @if($student->badges->count() > 0)
            <div class="glass-card rounded-2xl p-6 mt-8">
                <h2 class="text-xl font-semibold text-white mb-6">Earned Badges</h2>
                <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-6 gap-4">
                    @foreach($student->badges as $badge)
                        <div class="text-center">
                            <div class="w-16 h-16 rounded-full bg-gradient-to-br from-yellow-500 to-orange-600 flex items-center justify-center mx-auto mb-2">
                                <i class="ri-medal-line text-white text-2xl"></i>
                            </div>
                            <h4 class="text-sm font-semibold text-white">{{ $badge->name }}</h4>
                            <p class="text-xs text-gray-400">{{ $badge->points_requis }} pts</p>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif
    </main>
</body>
</html>
