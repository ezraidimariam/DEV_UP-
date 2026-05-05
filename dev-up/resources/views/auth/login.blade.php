<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DEV↑UP - Login</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
            background: linear-gradient(135deg, #1a1a2e 0%, #16213e 100%);
            color: #ffffff;
            margin: 0;
            padding: 0;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        
        .login-container {
            background: rgba(255, 255, 255, 0.08);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 12px;
            padding: 40px;
            width: 100%;
            max-width: 400px;
        }
        
        .logo {
            text-align: center;
            margin-bottom: 30px;
        }
        
        .logo-icon {
            width: 50px;
            height: 50px;
            background: #667eea;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 15px;
        }
        
        .logo-text {
            font-size: 24px;
            font-weight: 600;
            color: #667eea;
        }
        
        .form-group {
            margin-bottom: 20px;
        }
        
        .form-label {
            display: block;
            margin-bottom: 8px;
            color: #a0aec0;
            font-size: 14px;
        }
        
        .form-input {
            width: 100%;
            padding: 12px;
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 8px;
            color: #ffffff;
            font-size: 16px;
            transition: border-color 0.2s ease;
        }
        
        .form-input:focus {
            outline: none;
            border-color: #667eea;
        }
        
        .form-input::placeholder {
            color: #718096;
        }
        
        .btn {
            width: 100%;
            padding: 12px;
            background: #667eea;
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            font-weight: 500;
            cursor: pointer;
            transition: background-color 0.2s ease;
        }
        
        .btn:hover {
            background: #5a67d8;
        }
        
        .register-link {
            text-align: center;
            margin-top: 20px;
            color: #a0aec0;
        }
        
        .register-link a {
            color: #667eea;
            text-decoration: none;
        }
        
        .register-link a:hover {
            text-decoration: underline;
        }
        
        .error {
            color: #e53e3e;
            font-size: 14px;
            margin-bottom: 15px;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <!-- Logo -->
        <div class="logo">
            <div class="logo-icon">
                <i class="ri-code-s-slash-line" style="color: white; font-size: 24px;"></i>
            </div>
            <div class="logo-text">DEV↑UP</div>
        </div>

        <!-- Login Form -->
        <form method="POST" action="{{ route('login') }}" onsubmit="console.log('Form submitting...'); return true;">
            @csrf
            
            <!-- Error Messages -->
            @if ($errors->any())
                <div class="error">
                    @foreach ($errors->all() as $error)
                        {{ $error }}<br>
                    @endforeach
                </div>
            @endif

            @if (session('status'))
                <div class="error" style="color: #4ade80;">
                    {{ session('status') }}
                </div>
            @endif

            <!-- Email Field -->
            <div class="form-group">
                <label for="email" class="form-label">Email</label>
                <input 
                    id="email" 
                    type="email" 
                    name="email" 
                    value="{{ old('email') }}" 
                    required 
                    autofocus 
                    class="form-input"
                    placeholder="Enter your email"
                >
            </div>

            <!-- Password Field -->
            <div class="form-group">
                <label for="password" class="form-label">Password</label>
                <input 
                    id="password" 
                    type="password" 
                    name="password" 
                    required 
                    class="form-input"
                    placeholder="Enter your password"
                >
            </div>

            <!-- Remember Me -->
            <div style="display: flex; align-items: center; margin-bottom: 20px;">
                <input type="checkbox" name="remember" id="remember" style="margin-right: 8px;">
                <label for="remember" style="color: #a0aec0; font-size: 14px;">Remember me</label>
            </div>

            <!-- Submit Button -->
            <button type="submit" class="btn" style="cursor: pointer;" onclick="console.log('Button clicked!');">
                Sign In
            </button>
        </form>

        <!-- Register Link -->
        <div class="register-link">
            Don't have an account? <a href="{{ route('register') }}">Sign up</a>
        </div>
    </div>
</body>
</html>