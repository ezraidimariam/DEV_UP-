<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DEV↑UP - Edit Challenge</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@400;500;600;700&display=swap" rel="stylesheet">
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
        
        .nav-item {
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(255, 255, 255, 0.1);
        }
        
        .form-input {
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(255, 255, 255, 0.1);
            color: white;
            padding: 12px 16px;
            border-radius: 8px;
            width: 100%;
        }
        
        .form-input:focus {
            outline: none;
            border-color: #667eea;
        }
        
        .btn-primary {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border: none;
            color: white;
            padding: 12px 24px;
            border-radius: 8px;
            font-weight: 500;
            cursor: pointer;
        }
        
        .btn-secondary {
            background: rgba(255, 255, 255, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.2);
            color: white;
            padding: 12px 24px;
            border-radius: 8px;
            font-weight: 500;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <!-- Navigation Header -->
    <nav class="fixed top-0 left-0 right-0 z-50 glass-card border-b border-white/10">
        <div class="max-w-7xl mx-auto px-6 py-4">
            <div class="flex items-center justify-between">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 rounded-xl bg-gradient-to-br from-red-500 to-pink-600 flex items-center justify-center">
                        <i class="ri-shield-check-line text-white text-lg"></i>
                    </div>
                    <h1 class="brand-font text-2xl font-black gradient-text">DEV↑UP Admin</h1>
                </div>
                
                <div class="flex items-center gap-6">
                    <a href="{{ route('admin.dashboard') }}" class="nav-item px-4 py-2 rounded-xl text-white">
                        <i class="ri-dashboard-line mr-2"></i>
                        Admin Dashboard
                    </a>
                    <a href="{{ route('admin.challenges') }}" class="nav-item px-4 py-2 rounded-xl text-white">
                        <i class="ri-trophy-line mr-2"></i>
                        Challenges
                    </a>
                    <a href="{{ route('formateur.dashboard') }}" class="nav-item px-4 py-2 rounded-xl text-gray-300">
                        <i class="ri-user-settings-line mr-2"></i>
                        Formateur Panel
                    </a>
                    <form method="POST" action="{{ route('logout') }}" class="inline">
                        @csrf
                        <button type="submit" class="nav-item px-4 py-2 rounded-xl text-red-400">
                            <i class="ri-logout-box-r-line mr-2"></i>
                            Logout
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="max-w-7xl mx-auto px-6 py-20">
        <!-- Header -->
        <div class="mb-8">
            <h1 class="brand-font text-4xl font-bold gradient-text mb-2">Edit Challenge</h1>
            <p class="text-gray-400">Update challenge information</p>
        </div>

        <!-- Form -->
        <div class="glass-card rounded-2xl p-8">
            <form method="POST" action="{{ route('admin.challenges.update', $challenge) }}">
                @csrf
                @method('PUT')
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Left Column -->
                    <div class="space-y-6">
                        <!-- Title -->
                        <div>
                            <label class="block text-white mb-2">Challenge Title</label>
                            <input type="text" name="title" value="{{ $challenge->title }}" required class="form-input" placeholder="Enter challenge title...">
                            @error('title')
                                <div class="text-red-400 text-sm mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Description -->
                        <div>
                            <label class="block text-white mb-2">Description</label>
                            <textarea name="description" rows="4" required class="form-input" placeholder="Describe the challenge...">{{ $challenge->description }}</textarea>
                            @error('description')
                                <div class="text-red-400 text-sm mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Category -->
                        <div>
                            <label class="block text-white mb-2">Category</label>
                            <select name="category" required class="form-input">
                                <option value="">Select category</option>
                                <option value="programming" @if($challenge->category == 'programming') selected @endif>Programming</option>
                                <option value="design" @if($challenge->category == 'design') selected @endif>Design</option>
                                <option value="database" @if($challenge->category == 'database') selected @endif>Database</option>
                                <option value="algorithms" @if($challenge->category == 'algorithms') selected @endif>Algorithms</option>
                                <option value="frontend" @if($challenge->category == 'frontend') selected @endif>Frontend</option>
                                <option value="backend" @if($challenge->category == 'backend') selected @endif>Backend</option>
                            </select>
                            @error('category')
                                <div class="text-red-400 text-sm mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Difficulty -->
                        <div>
                            <label class="block text-white mb-2">Difficulty</label>
                            <select name="difficulty" required class="form-input">
                                <option value="">Select difficulty</option>
                                <option value="easy" @if($challenge->difficulty == 'easy') selected @endif>Easy</option>
                                <option value="medium" @if($challenge->difficulty == 'medium') selected @endif>Medium</option>
                                <option value="hard" @if($challenge->difficulty == 'hard') selected @endif>Hard</option>
                            </select>
                            @error('difficulty')
                                <div class="text-red-400 text-sm mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <!-- Right Column -->
                    <div class="space-y-6">
                        <!-- Points -->
                        <div>
                            <label class="block text-white mb-2">Points</label>
                            <input type="number" name="points" value="{{ $challenge->points }}" required min="1" max="1000" class="form-input" placeholder="Award points">
                            @error('points')
                                <div class="text-red-400 text-sm mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Time Limit -->
                        <div>
                            <label class="block text-white mb-2">Time Limit (minutes)</label>
                            <input type="number" name="time_limit" value="{{ $challenge->time_limit }}" required min="5" max="480" class="form-input" placeholder="Time limit in minutes">
                            @error('time_limit')
                                <div class="text-red-400 text-sm mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Status -->
                        <div>
                            <label class="block text-white mb-2">Status</label>
                            <select name="status" required class="form-input">
                                <option value="active" @if($challenge->status == 'active') selected @endif>Active</option>
                                <option value="inactive" @if($challenge->status == 'inactive') selected @endif>Inactive</option>
                            </select>
                            @error('status')
                                <div class="text-red-400 text-sm mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Instructions -->
                        <div>
                            <label class="block text-white mb-2">Instructions</label>
                            <textarea name="instructions" rows="6" required class="form-input" placeholder="Detailed instructions for completing the challenge...">{{ $challenge->instructions }}</textarea>
                            @error('instructions')
                                <div class="text-red-400 text-sm mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                <!-- Form Actions -->
                <div class="flex justify-end gap-4 mt-8">
                    <a href="{{ route('admin.challenges') }}" class="btn-secondary">
                        Cancel
                    </a>
                    <button type="submit" class="btn-primary">
                        <i class="ri-save-line mr-2"></i>
                        Update Challenge
                    </button>
                </div>
            </form>
        </div>
    </main>
</body>
</html>
