<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DEV↑UP - Feedback History</title>
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
        
        .grade-badge {
            padding: 4px 12px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
        }
        
        .grade-pass {
            background: rgba(16, 185, 129, 0.2);
            color: #10b981;
            border: 1px solid #10b981;
        }
        
        .grade-fail {
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
            <h1 class="brand-font text-4xl font-bold gradient-text mb-2">Feedback History</h1>
            <p class="text-gray-400">View all feedback you've provided to students</p>
        </div>

        <!-- Feedback List -->
        <div class="glass-card rounded-2xl">
            @if($feedback->count() > 0)
                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead>
                            <tr class="border-b border-gray-700">
                                <th class="px-6 py-4 text-left text-xs font-medium text-gray-400 uppercase tracking-wider">Student</th>
                                <th class="px-6 py-4 text-left text-xs font-medium text-gray-400 uppercase tracking-wider">Challenge</th>
                                <th class="px-6 py-4 text-left text-xs font-medium text-gray-400 uppercase tracking-wider">Grade</th>
                                <th class="px-6 py-4 text-left text-xs font-medium text-gray-400 uppercase tracking-wider">Feedback</th>
                                <th class="px-6 py-4 text-left text-xs font-medium text-gray-400 uppercase tracking-wider">Date</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-700">
                            @foreach($feedback as $item)
                                <tr class="hover:bg-gray-800/50 transition-colors">
                                    <td class="px-6 py-4">
                                        <div class="flex items-center">
                                            <div class="w-8 h-8 rounded-full bg-gradient-to-br from-blue-500 to-purple-600 flex items-center justify-center mr-3">
                                                <span class="text-white text-sm font-semibold">{{ strtoupper(substr($item->submission->user->name, 0, 1)) }}</span>
                                            </div>
                                            <div class="text-sm font-medium text-white">{{ $item->submission->user->name }}</div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="text-sm font-medium text-white">{{ $item->submission->challenge->title }}</div>
                                        <div class="text-xs text-gray-400">{{ $item->submission->challenge->difficulty }}</div>
                                    </td>
                                    <td class="px-6 py-4">
                                        <span class="grade-badge {{ $item->note >= 10 ? 'grade-pass' : 'grade-fail' }}">
                                            {{ $item->note }}/20
                                        </span>
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="text-sm text-gray-300 max-w-xs truncate" title="{{ $item->commentaire }}">
                                            {{ $item->commentaire }}
                                        </div>
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="text-sm text-gray-300">{{ $item->created_at->format('M j, Y') }}</div>
                                        <div class="text-xs text-gray-500">{{ $item->created_at->diffForHumans() }}</div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                
                <!-- Pagination -->
                <div class="px-6 py-4 border-t border-gray-700">
                    {{ $feedback->links() }}
                </div>
            @else
                <div class="text-center py-12">
                    <i class="ri-message-3-line text-6xl text-gray-600 mb-4"></i>
                    <h3 class="text-xl font-semibold text-white mb-2">No Feedback Yet</h3>
                    <p class="text-gray-400">You haven't provided any feedback to students yet.</p>
                    <a href="{{ route('formateur.submissions') }}" class="glow-button inline-block mt-4">
                        <i class="ri-file-list-3-line mr-2"></i>Review Submissions
                    </a>
                </div>
            @endif
        </div>
    </main>
</body>
</html>
