<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DEV↑UP - Formateur Dashboard</title>
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
        
        .stat-card {
            transition: all 0.3s ease;
        }
        
        .stat-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 12px 40px rgba(102, 126, 234, 0.3);
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
                    <a href="{{ route('formateur.dashboard') }}" class="nav-link active text-white hover:text-gray-300">
                        <i class="ri-dashboard-line mr-2"></i>Dashboard
                    </a>
                    <a href="{{ route('formateur.submissions') }}" class="nav-link text-white hover:text-gray-300">
                        <i class="ri-file-list-3-line mr-2"></i>Submissions
                    </a>
                    <a href="{{ route('formateur.students') }}" class="nav-link text-white hover:text-gray-300">
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
            <h1 class="brand-font text-4xl font-bold gradient-text mb-2">Formateur Dashboard</h1>
            <p class="text-gray-400">Manage your students and review their progress</p>
        </div>

        <!-- Stats Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
            <div class="glass-card rounded-2xl p-6 stat-card">
                <div class="flex items-center justify-between mb-4">
                    <div class="w-12 h-12 rounded-xl bg-gradient-to-br from-blue-500 to-blue-600 flex items-center justify-center">
                        <i class="ri-group-line text-white text-xl"></i>
                    </div>
                    <span class="text-xs text-gray-400 mono-font">+12%</span>
                </div>
                <h3 class="text-2xl font-bold text-white mb-1">{{ $stats['total_students'] }}</h3>
                <p class="text-gray-400 text-sm">Total Students</p>
            </div>

            <div class="glass-card rounded-2xl p-6 stat-card">
                <div class="flex items-center justify-between mb-4">
                    <div class="w-12 h-12 rounded-xl bg-gradient-to-br from-orange-500 to-orange-600 flex items-center justify-center">
                        <i class="ri-time-line text-white text-xl"></i>
                    </div>
                    <span class="text-xs text-orange-400 mono-font">Pending</span>
                </div>
                <h3 class="text-2xl font-bold text-white mb-1">{{ $stats['pending_submissions'] }}</h3>
                <p class="text-gray-400 text-sm">Pending Reviews</p>
            </div>

            <div class="glass-card rounded-2xl p-6 stat-card">
                <div class="flex items-center justify-between mb-4">
                    <div class="w-12 h-12 rounded-xl bg-gradient-to-br from-green-500 to-green-600 flex items-center justify-center">
                        <i class="ri-trophy-line text-white text-xl"></i>
                    </div>
                    <span class="text-xs text-green-400 mono-font">+8%</span>
                </div>
                <h3 class="text-2xl font-bold text-white mb-1">{{ $stats['completed_challenges'] }}</h3>
                <p class="text-gray-400 text-sm">Completed Challenges</p>
            </div>

            <div class="glass-card rounded-2xl p-6 stat-card">
                <div class="flex items-center justify-between mb-4">
                    <div class="w-12 h-12 rounded-xl bg-gradient-to-br from-purple-500 to-purple-600 flex items-center justify-center">
                        <i class="ri-message-3-line text-white text-xl"></i>
                    </div>
                    <span class="text-xs text-purple-400 mono-font">+15%</span>
                </div>
                <h3 class="text-2xl font-bold text-white mb-1">{{ $stats['total_feedback_given'] }}</h3>
                <p class="text-gray-400 text-sm">Feedback Given</p>
            </div>
        </div>

        <!-- Recent Activity Grid -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
            <!-- Pending Submissions -->
            <div class="glass-card rounded-2xl p-6">
                <div class="flex items-center justify-between mb-6">
                    <h2 class="text-xl font-semibold text-white">Pending Submissions</h2>
                    <a href="{{ route('formateur.submissions') }}" class="text-blue-400 hover:text-blue-300 text-sm">
                        View All <i class="ri-arrow-right-line"></i>
                    </a>
                </div>
                
                @if($pendingSubmissions->count() > 0)
                    <div class="space-y-4">
                        @foreach($pendingSubmissions as $submission)
                            <div class="border border-gray-700 rounded-xl p-4 hover:border-blue-500 transition-colors">
                                <div class="flex items-start justify-between">
                                    <div class="flex-1">
                                        <h3 class="font-semibold text-white mb-1">{{ $submission->challenge->title }}</h3>
                                        <p class="text-sm text-gray-400 mb-2">by {{ $submission->user->name }}</p>
                                        <p class="text-xs text-gray-500">{{ $submission->created_at->diffForHumans() }}</p>
                                    </div>
                                    <a href="{{ route('formateur.review', $submission) }}" class="glow-button px-4 py-2 rounded-lg text-sm">
                                        Review
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <div class="text-center py-8">
                        <i class="ri-checkbox-circle-line text-4xl text-green-500 mb-4"></i>
                        <p class="text-gray-400">No pending submissions</p>
                    </div>
                @endif
            </div>

            <!-- Recent Feedback -->
            <div class="glass-card rounded-2xl p-6">
                <div class="flex items-center justify-between mb-6">
                    <h2 class="text-xl font-semibold text-white">Recent Feedback</h2>
                    <a href="{{ route('formateur.feedback') }}" class="text-blue-400 hover:text-blue-300 text-sm">
                        View All <i class="ri-arrow-right-line"></i>
                    </a>
                </div>
                
                @if($recentFeedback->count() > 0)
                    <div class="space-y-4">
                        @foreach($recentFeedback as $feedback)
                            <div class="border border-gray-700 rounded-xl p-4">
                                <div class="flex items-start justify-between mb-2">
                                    <h3 class="font-semibold text-white">{{ $feedback->submission->challenge->title }}</h3>
                                    <span class="text-sm font-semibold {{ $feedback->note >= 10 ? 'text-green-400' : 'text-red-400' }}">
                                        {{ $feedback->note }}/20
                                    </span>
                                </div>
                                <p class="text-sm text-gray-400 mb-2">Student: {{ $feedback->submission->user->name }}</p>
                                <p class="text-sm text-gray-300">{{ Str::limit($feedback->commentaire, 80) }}</p>
                            </div>
                        @endforeach
                    </div>
                @else
                    <div class="text-center py-8">
                        <i class="ri-message-3-line text-4xl text-gray-600 mb-4"></i>
                        <p class="text-gray-400">No feedback given yet</p>
                    </div>
                @endif
            </div>
        </div>

        <!-- Top Students -->
        <div class="glass-card rounded-2xl p-6 mt-8">
            <div class="flex items-center justify-between mb-6">
                <h2 class="text-xl font-semibold text-white">Top Performing Students</h2>
                <a href="{{ route('formateur.students') }}" class="text-blue-400 hover:text-blue-300 text-sm">
                    View All <i class="ri-arrow-right-line"></i>
                </a>
            </div>
            
            @if($studentProgress->count() > 0)
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                    @foreach($studentProgress as $student)
                        <div class="border border-gray-700 rounded-xl p-4 hover:border-blue-500 transition-colors">
                            <div class="flex items-center justify-between mb-3">
                                <h3 class="font-semibold text-white">{{ $student->name }}</h3>
                                <span class="text-sm text-gray-400">Level {{ $student->level }}</span>
                            </div>
                            <div class="space-y-2">
                                <div class="flex justify-between text-sm">
                                    <span class="text-gray-400">Challenges</span>
                                    <span class="text-white">{{ $student->user_challenges_count_where_status_termine }}</span>
                                </div>
                                <div class="flex justify-between text-sm">
                                    <span class="text-gray-400">Sessions</span>
                                    <span class="text-white">{{ $student->focus_sessions_count_where_is_completed_true }}</span>
                                </div>
                                <div class="flex justify-between text-sm">
                                    <span class="text-gray-400">Points</span>
                                    <span class="text-blue-400 font-semibold">{{ $student->points }}</span>
                                </div>
                            </div>
                            <a href="{{ route('formateur.student.progress', $student) }}" class="mt-3 text-blue-400 hover:text-blue-300 text-sm">
                                View Progress <i class="ri-arrow-right-line"></i>
                            </a>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="text-center py-8">
                    <i class="ri-group-line text-4xl text-gray-600 mb-4"></i>
                    <p class="text-gray-400">No students found</p>
                </div>
            @endif
        </div>
    </main>
</body>
</html>
