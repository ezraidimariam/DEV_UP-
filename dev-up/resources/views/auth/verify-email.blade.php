<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DEV↑UP - Verify Email</title>
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
        <div class="shape shape-3"></div>
    </div>

    <!-- Main Container -->
    <div class="relative z-10 w-full max-w-md px-6">
        <!-- Logo Section -->
        <div class="text-center mb-8">
            <div class="inline-flex items-center gap-2 mb-6">
                <div class="w-12 h-12 rounded-xl bg-gradient-to-br from-blue-500 to-cyan-600 flex items-center justify-center">
                    <i class="ri-mail-check-line text-white text-xl"></i>
                </div>
                <h1 class="brand-font text-3xl font-black gradient-text">DEV↑UP</h1>
            </div>
            <p class="text-gray-400 text-sm">Please check your email and verify your account.</p>
        </div>

        <!-- Email Verification Form -->
        <div class="glass-card rounded-2xl p-8 mb-6">
            <!-- Session Status Messages -->
            @if (session('status') == 'verification-link-sent')
                <div class="success-message rounded-lg p-4 mb-6 text-sm">
                    A new verification link has been sent to your email address.
                </div>
            @endif

            <!-- Action Buttons -->
            <div class="space-y-4">
                <form method="POST" action="{{ route('verification.send') }}">
                    @csrf
                    <button type="submit" class="glow-button w-full py-4 rounded-xl text-white font-semibold text-lg">
                        <span class="relative z-10 flex items-center justify-center gap-2">
                            <i class="ri-mail-send-line text-xl"></i>
                            Resend Verification Email
                        </span>
                    </button>
                </form>

                @if (Route::has('logout'))
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="w-full border border-white/10 bg-gray-800/50 text-gray-300 font-medium py-4 rounded-xl hover:bg-gray-800 transition-all">
                            <span class="relative z-10 flex items-center justify-center gap-2">
                                <i class="ri-logout-box-r-line text-xl"></i>
                                Log Out
                            </span>
                        </button>
                    </form>
                @endif
            </div>
        </div>

        <!-- Instructions -->
        <div class="glass-card rounded-2xl p-6 mb-6">
            <div class="space-y-4">
                <div class="flex items-start gap-3">
                    <div class="w-8 h-8 rounded-full bg-blue-500/20 flex items-center justify-center flex-shrink-0">
                        <span class="text-blue-400 text-sm font-medium">1</span>
                    </div>
                    <div>
                        <h3 class="text-white font-medium mb-1">Check your email</h3>
                        <p class="text-gray-400 text-sm">Look for a verification email from DEV↑UP</p>
                    </div>
                </div>
                
                <div class="flex items-start gap-3">
                    <div class="w-8 h-8 rounded-full bg-purple-500/20 flex items-center justify-center flex-shrink-0">
                        <span class="text-purple-400 text-sm font-medium">2</span>
                    </div>
                    <div>
                        <h3 class="text-white font-medium mb-1">Click the link</h3>
                        <p class="text-gray-400 text-sm">Click the verification link in the email</p>
                    </div>
                </div>
                
                <div class="flex items-start gap-3">
                    <div class="w-8 h-8 rounded-full bg-green-500/20 flex items-center justify-center flex-shrink-0">
                        <span class="text-green-400 text-sm font-medium">3</span>
                    </div>
                    <div>
                        <h3 class="text-white font-medium mb-1">Start coding</h3>
                        <p class="text-gray-400 text-sm">Return here to access your dashboard</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Back to Login -->
        <div class="text-center mt-8">
            <p class="text-gray-400 text-sm">
                Already verified? 
                @if (Route::has('login'))
                    <a href="{{ route('login') }}" class="text-purple-400 hover:text-purple-300 font-medium transition-colors">
                        Back to login
                    </a>
                @endif
            </p>
        </div>

        <!-- Footer Branding -->
        <div class="text-center mt-12">
            <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-gray-900/50 border border-gray-800">
                <i class="ri-shield-check-line text-green-400"></i>
                <span class="text-xs text-gray-500 mono-font">SECURE VERIFICATION</span>
            </div>
        </div>
    </div>
</body>
