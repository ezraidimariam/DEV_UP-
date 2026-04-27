<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DEV↑UP - Profile Settings</title>
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
        
        .danger-button {
            background: linear-gradient(135deg, #dc2626, #7f1d1d);
            border: none;
            transition: all 0.3s ease;
        }
        
        .danger-button:hover {
            transform: translateY(-2px);
            box-shadow: 
                0 10px 40px rgba(220, 38, 38, 0.4),
                0 6px 20px rgba(220, 38, 38, 0.3);
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
                    <a href="{{ route('focus-sessions.index') }}" class="nav-item px-4 py-2 rounded-xl text-gray-300 hover:text-white transition-all">
                        <i class="ri-time-line mr-2"></i>
                        Focus
                    </a>
                    <a href="{{ route('profile.edit') }}" class="nav-item px-4 py-2 rounded-xl text-white hover:text-purple-300 transition-all">
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
                        <h1 class="text-3xl font-bold text-white mb-2">Profile Settings</h1>
                        <p class="text-gray-400">Manage your account settings and preferences.</p>
                    </div>
                    <div class="w-16 h-16 rounded-2xl bg-gradient-to-br from-purple-500 to-indigo-600 flex items-center justify-center">
                        <i class="ri-user-settings-line text-white text-2xl"></i>
                    </div>
                </div>
            </div>

            <div class="space-y-8">
                <!-- Profile Information -->
                <div class="glass-card rounded-2xl p-8">
                    <h2 class="text-xl font-semibold text-white mb-6">
                        <i class="ri-user-line mr-2"></i>
                        Profile Information
                    </h2>
                    <div class="max-w-xl">
                        <form method="POST" action="{{ route('profile.update') }}" class="space-y-6">
                            @csrf
                            @method('PATCH')
                            
                            <!-- Name -->
                            <div>
                                <label for="name" class="block text-sm font-medium text-gray-300 mb-2">
                                    Name
                                </label>
                                <input type="text" 
                                       id="name"
                                       name="name" 
                                       value="{{ auth()->user()->name }}"
                                       required
                                       class="input-field w-full px-4 py-3 rounded-xl text-white outline-none transition-all"
                                       placeholder="Enter your name">
                                @if ($errors->has('name'))
                                    <div class="text-red-400 text-sm mt-2">{{ $errors->first('name') }}</div>
                                @endif
                            </div>

                            <!-- Email -->
                            <div>
                                <label for="email" class="block text-sm font-medium text-gray-300 mb-2">
                                    Email Address
                                </label>
                                <input type="email" 
                                       id="email"
                                       name="email" 
                                       value="{{ auth()->user()->email }}"
                                       required
                                       class="input-field w-full px-4 py-3 rounded-xl text-white outline-none transition-all"
                                       placeholder="Enter your email">
                                @if ($errors->has('email'))
                                    <div class="text-red-400 text-sm mt-2">{{ $errors->first('email') }}</div>
                                @endif
                            </div>

                            <!-- Bio -->
                            <div>
                                <label for="bio" class="block text-sm font-medium text-gray-300 mb-2">
                                    Bio
                                </label>
                                <textarea 
                                    id="bio"
                                    name="bio" 
                                    rows="4"
                                    class="input-field w-full px-4 py-3 rounded-xl text-white outline-none resize-none transition-all"
                                    placeholder="Tell us about yourself...">{{ auth()->user()->bio ?? '' }}</textarea>
                            </div>

                            <!-- Submit -->
                            <div class="flex gap-4">
                                <button type="submit" class="glow-button px-6 py-3 rounded-xl text-white font-medium">
                                    <i class="ri-save-line mr-2"></i>
                                    Save Changes
                                </button>
                                <a href="{{ route('profile.edit') }}" class="nav-item px-6 py-3 rounded-xl text-gray-300 font-medium hover:text-white hover:bg-white/10">
                                    Cancel
                                </a>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Password Update -->
                <div class="glass-card rounded-2xl p-8">
                    <h2 class="text-xl font-semibold text-white mb-6">
                        <i class="ri-lock-line mr-2"></i>
                        Update Password
                    </h2>
                    <div class="max-w-xl">
                        <form method="POST" action="{{ route('password.update') }}" class="space-y-6">
                            @csrf
                            
                            <!-- Current Password -->
                            <div>
                                <label for="current_password" class="block text-sm font-medium text-gray-300 mb-2">
                                    Current Password
                                </label>
                                <input type="password" 
                                       id="current_password"
                                       name="current_password" 
                                       required
                                       class="input-field w-full px-4 py-3 rounded-xl text-white outline-none transition-all"
                                       placeholder="Enter current password">
                                @if ($errors->has('current_password'))
                                    <div class="text-red-400 text-sm mt-2">{{ $errors->first('current_password') }}</div>
                                @endif
                            </div>

                            <!-- New Password -->
                            <div>
                                <label for="password" class="block text-sm font-medium text-gray-300 mb-2">
                                    New Password
                                </label>
                                <input type="password" 
                                       id="password"
                                       name="password" 
                                       required
                                       class="input-field w-full px-4 py-3 rounded-xl text-white outline-none transition-all"
                                       placeholder="Enter new password">
                                @if ($errors->has('password'))
                                    <div class="text-red-400 text-sm mt-2">{{ $errors->first('password') }}</div>
                                @endif
                            </div>

                            <!-- Confirm Password -->
                            <div>
                                <label for="password_confirmation" class="block text-sm font-medium text-gray-300 mb-2">
                                    Confirm New Password
                                </label>
                                <input type="password" 
                                       id="password_confirmation"
                                       name="password_confirmation" 
                                       required
                                       class="input-field w-full px-4 py-3 rounded-xl text-white outline-none transition-all"
                                       placeholder="Confirm new password">
                            </div>

                            <!-- Submit -->
                            <div class="flex gap-4">
                                <button type="submit" class="glow-button px-6 py-3 rounded-xl text-white font-medium">
                                    <i class="ri-lock-line mr-2"></i>
                                    Update Password
                                </button>
                                <a href="{{ route('profile.edit') }}" class="nav-item px-6 py-3 rounded-xl text-gray-300 font-medium hover:text-white hover:bg-white/10">
                                    Cancel
                                </a>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Delete Account -->
                <div class="glass-card rounded-2xl p-8 border-red-500/20">
                    <h2 class="text-xl font-semibold text-red-400 mb-6">
                        <i class="ri-delete-bin-line mr-2"></i>
                        Delete Account
                    </h2>
                    <div class="max-w-xl">
                        <div class="bg-red-500/10 rounded-xl p-4 mb-6">
                            <p class="text-red-300 text-sm mb-2">
                                <strong>Warning:</strong> This action cannot be undone. Deleting your account will permanently remove all your data including:
                            </p>
                            <ul class="text-red-400 text-sm mt-2 space-y-1">
                                <li>• All challenge progress and submissions</li>
                                <li>• Focus session history</li>
                                <li>• Profile information</li>
                                <li>• Account settings</li>
                            </ul>
                        </div>
                        
                        <form method="POST" action="{{ route('profile.destroy') }}" onsubmit="return confirm('Are you sure you want to delete your account? This action cannot be undone.');">
                            @csrf
                            @method('DELETE')
                            
                            <div class="flex gap-4">
                                <button type="submit" class="danger-button px-6 py-3 rounded-xl text-white font-medium">
                                    <i class="ri-delete-bin-line mr-2"></i>
                                    Delete Account
                                </button>
                                <a href="{{ route('profile.edit') }}" class="nav-item px-6 py-3 rounded-xl text-gray-300 font-medium hover:text-white hover:bg-white/10">
                                    Cancel
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>
</html>
