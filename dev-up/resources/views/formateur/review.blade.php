<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DEV↑UP - Review Submission</title>
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
        
        .glow-button:disabled {
            opacity: 0.5;
            cursor: not-allowed;
            transform: none;
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
        
        .code-block {
            background: #1a1a1a;
            border: 1px solid #333;
            border-radius: 8px;
            padding: 16px;
            font-family: 'JetBrains Mono', monospace;
            font-size: 14px;
            line-height: 1.5;
            overflow-x: auto;
        }
        
        .grade-input {
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(255, 255, 255, 0.1);
            color: white;
            padding: 8px 12px;
            border-radius: 8px;
            transition: all 0.3s ease;
        }
        
        .grade-input:focus {
            outline: none;
            border-color: #667eea;
            box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
        }
        
        .feedback-textarea {
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(255, 255, 255, 0.1);
            color: white;
            padding: 12px;
            border-radius: 8px;
            resize: vertical;
            min-height: 120px;
            transition: all 0.3s ease;
        }
        
        .feedback-textarea:focus {
            outline: none;
            border-color: #667eea;
            box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
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
                    <a href="{{ route('formateur.submissions') }}" class="nav-link active text-white hover:text-gray-300">
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
            <div class="flex items-center justify-between">
                <div>
                    <h1 class="brand-font text-4xl font-bold gradient-text mb-2">Review Submission</h1>
                    <p class="text-gray-400">Grade and provide feedback on student work</p>
                </div>
                <a href="{{ route('formateur.submissions') }}" class="text-gray-400 hover:text-white">
                    <i class="ri-arrow-left-line mr-2"></i>Back to Submissions
                </a>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- Submission Details -->
            <div class="lg:col-span-2 space-y-6">
                <!-- Student & Challenge Info -->
                <div class="glass-card rounded-2xl p-6">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <h3 class="text-sm font-medium text-gray-400 mb-2">Student</h3>
                            <div class="flex items-center">
                                <div class="w-10 h-10 rounded-full bg-gradient-to-br from-blue-500 to-purple-600 flex items-center justify-center mr-3">
                                    <span class="text-white font-semibold">{{ strtoupper(substr($submission->user->name, 0, 1)) }}</span>
                                </div>
                                <div>
                                    <div class="font-semibold text-white">{{ $submission->user->name }}</div>
                                    <div class="text-sm text-gray-400">Level {{ $submission->user->level }} • {{ $submission->user->points }} points</div>
                                </div>
                            </div>
                        </div>
                        <div>
                            <h3 class="text-sm font-medium text-gray-400 mb-2">Challenge</h3>
                            <div>
                                <div class="font-semibold text-white">{{ $submission->challenge->title }}</div>
                                <div class="text-sm text-gray-400">{{ $submission->challenge->difficulty }} • {{ $submission->challenge->points }} points</div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Submission Content -->
                <div class="glass-card rounded-2xl p-6">
                    <h3 class="text-lg font-semibold text-white mb-4">Submission</h3>
                    
                    @if($submission->content)
                        <div class="mb-4">
                            <h4 class="text-sm font-medium text-gray-400 mb-2">Description</h4>
                            <p class="text-gray-300">{{ $submission->content }}</p>
                        </div>
                    @endif
                    
                    @if($submission->code)
                        <div>
                            <h4 class="text-sm font-medium text-gray-400 mb-2">Code Solution</h4>
                            <div class="code-block">
                                <pre>{{ $submission->code }}</pre>
                            </div>
                        </div>
                    @endif
                    
                    <div class="mt-4 text-sm text-gray-500">
                        Submitted: {{ $submission->created_at->format('M j, Y g:i A') }}
                    </div>
                </div>
            </div>

            <!-- Grading Panel -->
            <div class="space-y-6">
                <!-- Feedback Form -->
                <div class="glass-card rounded-2xl p-6">
                    <h3 class="text-lg font-semibold text-white mb-4">Grade & Feedback</h3>
                    
                    <form method="POST" action="{{ route('formateur.feedback.submit', $submission) }}">
                        @csrf
                        
                        <!-- Grade Input -->
                        <div class="mb-4">
                            <label for="note" class="block text-sm font-medium text-gray-400 mb-2">
                                Grade (0-20)
                            </label>
                            <input 
                                type="number" 
                                id="note" 
                                name="note" 
                                min="0" 
                                max="20" 
                                required
                                class="grade-input w-full"
                                placeholder="Enter grade..."
                            >
                            <p class="text-xs text-gray-500 mt-1">10+ points = Pass • <10 points = Fail</p>
                        </div>

                        <!-- Feedback Textarea -->
                        <div class="mb-6">
                            <label for="commentaire" class="block text-sm font-medium text-gray-400 mb-2">
                                Feedback Comments
                            </label>
                            <textarea 
                                id="commentaire" 
                                name="commentaire" 
                                required
                                class="feedback-textarea w-full"
                                placeholder="Provide detailed feedback on the student's work..."
                            ></textarea>
                        </div>

                        <!-- Submit Buttons -->
                        <div class="space-y-3">
                            <button type="submit" class="glow-button w-full">
                                <i class="ri-send-plane-line mr-2"></i>Submit Feedback
                            </button>
                            
                            <div class="grid grid-cols-2 gap-3">
                                <button type="button" onclick="setGrade(20)" class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-lg transition-colors">
                                    <i class="ri-check-line mr-1"></i>Pass (20)
                                </button>
                                <button type="button" onclick="setGrade(5)" class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded-lg transition-colors">
                                    <i class="ri-close-line mr-1"></i>Fail (5)
                                </button>
                            </div>
                        </div>
                    </form>
                </div>

                <!-- Quick Actions -->
                <div class="glass-card rounded-2xl p-6">
                    <h3 class="text-lg font-semibold text-white mb-4">Quick Actions</h3>
                    <div class="space-y-3">
                        <button onclick="addTemplate('excellent')" class="w-full text-left px-4 py-3 rounded-lg bg-gray-800 hover:bg-gray-700 transition-colors">
                            <div class="font-medium text-white">Excellent Work</div>
                            <div class="text-xs text-gray-400">Perfect solution, well done!</div>
                        </button>
                        <button onclick="addTemplate('good')" class="w-full text-left px-4 py-3 rounded-lg bg-gray-800 hover:bg-gray-700 transition-colors">
                            <div class="font-medium text-white">Good Effort</div>
                            <div class="text-xs text-gray-400">Nice approach, minor improvements needed</div>
                        </button>
                        <button onclick="addTemplate('resubmit')" class="w-full text-left px-4 py-3 rounded-lg bg-gray-800 hover:bg-gray-700 transition-colors">
                            <div class="font-medium text-white">Needs Revision</div>
                            <div class="text-xs text-gray-400">Please review and resubmit</div>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <script>
        function setGrade(grade) {
            document.getElementById('note').value = grade;
        }

        function addTemplate(type) {
            const textarea = document.getElementById('commentaire');
            const templates = {
                excellent: "Excellent work! Your solution demonstrates a thorough understanding of the concepts. The code is clean, efficient, and well-structured. Keep up the great work!",
                good: "Good effort! Your approach is solid and the solution works correctly. Consider optimizing for readability and adding comments for better documentation. Overall, nice job!",
                resubmit: "Your submission shows effort but needs some revisions. Please review the requirements and consider the feedback provided. Focus on [specific areas]. You're on the right track - try again!"
            };
            
            textarea.value = templates[type];
        }
    </script>
</body>
</html>
