<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DEV↑UP - Register</title>
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
        
        .input-field {
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(255, 255, 255, 0.1);
            transition: all 0.3s ease;
        }
        
        .input-field:focus {
            background: rgba(255, 255, 255, 0.08);
            border-color: #667eea;
            box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
        }
        
        .floating-shapes {
            position: absolute;
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
        
        .social-button {
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(255, 255, 255, 0.1);
            transition: all 0.3s ease;
        }
        
        .social-button:hover {
            background: rgba(255, 255, 255, 0.1);
            transform: translateY(-2px);
            box-shadow: 0 4px 16px rgba(0, 0, 0, 0.2);
        }
        
        .error-message {
            background: rgba(239, 68, 68, 0.1);
            border: 1px solid rgba(239, 68, 68, 0.2);
            color: #f87171;
        }
        
        .success-message {
            background: rgba(34, 197, 94, 0.1);
            border: 1px solid rgba(34, 197, 94, 0.2);
            color: #4ade80;
        }
    </style>
</head>
<body class="min-h-screen flex items-center justify-center relative">
    <!-- Floating Background Shapes -->
    <div class="floating-shapes">
        <div class="shape shape-1"></div>
        <div class="shape shape-2"></div>
    </div>

    <!-- Main Container -->
    <div class="relative z-10 w-full max-w-md px-6">
        <!-- Logo Section -->
        <div class="text-center mb-8">
            <div class="inline-flex items-center gap-2 mb-6">
                <div class="w-12 h-12 rounded-xl bg-gradient-to-br from-purple-500 to-indigo-600 flex items-center justify-center">
                    <i class="ri-user-add-line text-white text-xl"></i>
                </div>
                <h1 class="brand-font text-3xl font-black gradient-text">DEV↑UP</h1>
            </div>
            <p class="text-gray-400 text-sm">Join thousands of developers improving their skills.</p>
        </div>

        <!-- Register Form -->
        <div class="glass-card rounded-2xl p-8 mb-6">
            <!-- Session Status Messages -->
            @if (session('status'))
                <div class="success-message rounded-lg p-4 mb-6 text-sm">
                    {{ session('status') }}
                </div>
            @endif

            <form method="POST" action="{{ route('register') }}" class="space-y-5">
                @csrf

                <!-- Name Field -->
                <div class="space-y-2">
                    <label for="name" class="text-sm font-medium text-gray-300">Full Name</label>
                    <div class="relative">
                        <i class="ri-user-line absolute left-4 top-1/2 transform -translate-y-1/2 text-gray-500"></i>
                        <input 
                            id="name" 
                            name="name" 
                            type="text" 
                            value="{{ old('name') }}"
                            placeholder="John Doe"
                            required
                            autocomplete="name"
                            autofocus
                            class="input-field w-full pl-12 pr-4 py-4 rounded-xl text-white placeholder-gray-500 outline-none">
                    </div>
                    @if ($errors->has('name'))
                        <div class="error-message rounded-lg p-3 mt-2 text-sm">
                            {{ $errors->first('name') }}
                        </div>
                    @endif
                </div>

                <!-- Email Field -->
                <div class="space-y-2">
                    <label for="email" class="text-sm font-medium text-gray-300">Email Address</label>
                    <div class="relative">
                        <i class="ri-mail-line absolute left-4 top-1/2 transform -translate-y-1/2 text-gray-500"></i>
                        <input 
                            id="email" 
                            name="email" 
                            type="email" 
                            value="{{ old('email') }}"
                            placeholder="you@example.com"
                            required
                            autocomplete="email"
                            class="input-field w-full pl-12 pr-4 py-4 rounded-xl text-white placeholder-gray-500 outline-none">
                    </div>
                    @if ($errors->has('email'))
                        <div class="error-message rounded-lg p-3 mt-2 text-sm">
                            {{ $errors->first('email') }}
                        </div>
                    @endif
                </div>

                <!-- Password Field -->
                <div class="space-y-2">
                    <label for="password" class="text-sm font-medium text-gray-300">Password</label>
                    <div class="relative">
                        <i class="ri-lock-line absolute left-4 top-1/2 transform -translate-y-1/2 text-gray-500"></i>
                        <input 
                            id="password" 
                            name="password" 
                            type="password" 
                            placeholder="•••••••"
                            required
                            autocomplete="new-password"
                            class="input-field w-full pl-12 pr-4 py-4 rounded-xl text-white placeholder-gray-500 outline-none">
                    </div>
                    @if ($errors->has('password'))
                        <div class="error-message rounded-lg p-3 mt-2 text-sm">
                            {{ $errors->first('password') }}
                        </div>
                    @endif
                </div>

                <!-- Confirm Password Field -->
                <div class="space-y-2">
                    <label for="password_confirmation" class="text-sm font-medium text-gray-300">Confirm Password</label>
                    <div class="relative">
                        <i class="ri-lock-2-line absolute left-4 top-1/2 transform -translate-y-1/2 text-gray-500"></i>
                        <input 
                            id="password_confirmation" 
                            name="password_confirmation" 
                            type="password" 
                            placeholder="•••••••"
                            required
                            autocomplete="new-password"
                            class="input-field w-full pl-12 pr-4 py-4 rounded-xl text-white placeholder-gray-500 outline-none">
                    </div>
                    @if ($errors->has('password_confirmation'))
                        <div class="error-message rounded-lg p-3 mt-2 text-sm">
                            {{ $errors->first('password_confirmation') }}
                        </div>
                    @endif
                </div>

                <!-- Terms Checkbox -->
                <div class="flex items-start">
                    <input 
                        id="terms" 
                        name="terms" 
                        type="checkbox" 
                        class="w-4 h-4 rounded bg-gray-800 border-gray-600 text-purple-600 focus:ring-purple-500 focus:ring-2 mt-1">
                    <label for="terms" class="ml-3 text-sm text-gray-400">
                        I agree to the <a href="#" class="text-purple-400 hover:text-purple-300">Terms of Service</a> and <a href="#" class="text-purple-400 hover:text-purple-300">Privacy Policy</a>
                    </label>
                </div>

                <!-- Submit Button -->
                <button type="submit" class="glow-button w-full py-4 rounded-xl text-white font-semibold text-lg">
                    <span class="relative z-10 flex items-center justify-center gap-2">
                        <i class="ri-user-add-line text-xl"></i>
                        Create Account
                    </span>
                </button>
            </form>
        </div>

        <!-- Social Sign Up -->
        <div class="space-y-4">
            <div class="flex items-center gap-4">
                <div class="flex-1 h-px bg-gray-800"></div>
                <span class="text-xs text-gray-500 uppercase tracking-wider">Or sign up with</span>
                <div class="flex-1 h-px bg-gray-800"></div>
            </div>
            
            <div class="grid grid-cols-2 gap-3">
                <button class="social-button rounded-xl py-3 flex items-center justify-center gap-2 text-gray-300 hover:text-white transition-all">
                    <i class="ri-github-fill text-xl"></i>
                    <span class="text-sm font-medium">GitHub</span>
                </button>
                <button class="social-button rounded-xl py-3 flex items-center justify-center gap-2 text-gray-300 hover:text-white transition-all">
                    <i class="ri-google-fill text-xl"></i>
                    <span class="text-sm font-medium">Google</span>
                </button>
            </div>
        </div>

        <!-- Sign In Link -->
        <div class="text-center mt-8">
            <p class="text-gray-400 text-sm">
                Already have an account? 
                @if (Route::has('login'))
                    <a href="{{ route('login') }}" class="text-purple-400 hover:text-purple-300 font-medium transition-colors">
                        Sign in
                    </a>
                @endif
            </p>
        </div>

        <!-- Footer Branding -->
        <div class="text-center mt-12">
            <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-gray-900/50 border border-gray-800">
                <i class="ri-shield-check-line text-green-400"></i>
                <span class="text-xs text-gray-500 mono-font">SECURE REGISTRATION</span>
            </div>
        </div>
    </div>
</body>
</html>
