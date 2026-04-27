<!DOCTYPE html>
<html class="dark" lang="en">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <title>Login - DEV↑UP</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;900&display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet"/>
    <style>
        .material-symbols-outlined {
            font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
        }
    </style>
    <script id="tailwind-config">
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    "colors": {
                        "inverse-on-surface": "#303038",
                        "on-secondary": "#313030",
                        "inverse-surface": "#e4e1ed",
                        "tertiary-fixed": "#ffdcc5",
                        "on-secondary-fixed-variant": "#474646",
                        "tertiary": "#ffb783",
                        "on-background": "#e4e1ed",
                        "on-surface": "#e4e1ed",
                        "on-primary": "#1000a9",
                        "primary": "#c0c1ff",
                        "primary-fixed-dim": "#c0c1ff",
                        "on-primary-fixed-variant": "#2f2ebe",
                        "on-error-container": "#ffdad6",
                        "on-primary-container": "#0d0096",
                        "error": "#ffb4ab",
                        "surface-container-low": "#1b1b23",
                        "surface": "#13131b",
                        "outline-variant": "#464554",
                        "on-primary-fixed": "#07006c",
                        "on-tertiary-fixed": "#301400",
                        "on-tertiary-container": "#452000",
                        "outline": "#908fa0",
                        "surface-tint": "#c0c1ff",
                        "surface-bright": "#393841",
                        "error-container": "#93000a",
                        "surface-container-highest": "#34343d",
                        "surface-dim": "#13131b",
                        "inverse-primary": "#494bd6",
                        "background": "#13131b",
                        "on-surface-variant": "#c7c4d7",
                        "surface-container": "#1f1f27",
                        "secondary-fixed": "#e5e2e1",
                        "tertiary-fixed-dim": "#ffb783",
                        "secondary-container": "#4a4949",
                        "primary-fixed": "#e1e0ff",
                        "on-secondary-container": "#bab8b7",
                        "on-tertiary": "#4f2500",
                        "on-error": "#690005",
                        "tertiary-container": "#d97721",
                        "secondary-fixed-dim": "#c8c6c5",
                        "secondary": "#c8c6c5",
                        "surface-variant": "#34343d",
                        "on-secondary-fixed": "#1c1b1b",
                        "surface-container-high": "#292932",
                        "primary-container": "#8083ff",
                        "on-tertiary-fixed-variant": "#703700",
                        "surface-container-lowest": "#0d0d15"
                    },
                    "borderRadius": {
                        "DEFAULT": "0.125rem",
                        "lg": "0.25rem",
                        "xl": "0.5rem",
                        "full": "0.75rem"
                    },
                    "spacing": {
                        "stack-lg": "64px",
                        "container-max": "640px",
                        "stack-sm": "16px",
                        "gutter": "24px",
                        "unit": "4px",
                        "stack-md": "32px"
                    },
                    "fontFamily": {
                        "body-sm": ["Inter"],
                        "label": ["Inter"],
                        "h1": ["Inter"],
                        "body-lg": ["Inter"],
                        "h2": ["Inter"],
                        "body-md": ["Inter"]
                    },
                    "fontSize": {
                        "body-sm": ["14px", {"lineHeight": "1.5", "fontWeight": "400"}],
                        "label": ["12px", {"lineHeight": "1", "letterSpacing": "0.05em", "fontWeight": "500"}],
                        "h1": ["32px", {"lineHeight": "1.2", "letterSpacing": "-0.02em", "fontWeight": "600"}],
                        "body-lg": ["18px", {"lineHeight": "1.6", "fontWeight": "400"}],
                        "h2": ["24px", {"lineHeight": "1.3", "letterSpacing": "-0.01em", "fontWeight": "600"}],
                        "body-md": ["16px", {"lineHeight": "1.6", "fontWeight": "400"}]
                    }
                },
            },
        }
    </script>
    <style>
        body {
            min-height: max(884px, 100dvh);
        }
    </style>
</head>
<body class="bg-black text-on-surface font-body-md antialiased selection:bg-primary selection:text-on-primary">
<!-- TopAppBar Fragment (Suppressing Nav for Login) -->
<header class="fixed top-0 w-full z-50 border-b border-white/10 bg-black">
    <div class="flex justify-between items-center h-16 px-6 max-w-[640px] mx-auto w-full">
        <div class="flex items-center gap-2">
            <span class="material-symbols-outlined text-indigo-500" data-icon="terminal">terminal</span>
            <span class="text-indigo-500 font-black tracking-tighter text-xl">DEV↑UP</span>
        </div>
        <div class="font-inter antialiased uppercase tracking-widest text-xs text-neutral-500">
            System Access
        </div>
    </div>
</header>

<!-- Main Content -->
<main class="min-h-screen flex flex-col items-center justify-center px-gutter pt-16">
    <div class="w-full max-w-[640px] flex flex-col">
        <!-- Session Status -->
        @if (session('status'))
            <div class="w-full bg-green-500/20 border border-green-500/30 rounded-lg p-4 mb-6 text-green-400 text-sm">
                {{ session('status') }}
            </div>
        @endif

        <!-- Hero Branding Section -->
        <div class="mb-stack-lg text-center">
            <h1 class="font-h1 text-h1 text-on-surface mb-unit">Login to your account</h1>
            <p class="font-body-md text-body-md text-on-surface-variant">Access your developer dashboard and projects.</p>
        </div>

        <!-- Transactional Form -->
        <form method="POST" action="{{ route('login') }}" class="space-y-stack-md">
            @csrf

            <!-- Email Address -->
            <div class="flex flex-col">
                <label class="font-label text-label uppercase text-on-surface-variant mb-2" for="email">Email Address</label>
                <input 
                    class="w-full bg-[#121212] border border-white/10 rounded px-4 py-3 text-on-surface focus:outline-none focus:ring-1 focus:ring-primary-container focus:border-primary-container transition-all placeholder:text-neutral-700" 
                    id="email" 
                    name="email" 
                    type="email" 
                    value="{{ old('email') }}"
                    placeholder="name@company.com"
                    required
                    autocomplete="email"
                    autofocus>
                
                @if ($errors->has('email'))
                    <div class="mt-2 text-error text-sm">
                        {{ $errors->first('email') }}
                    </div>
                @endif
            </div>

            <!-- Password -->
            <div class="flex flex-col">
                <div class="flex justify-between items-end mb-2">
                    <label class="font-label text-label uppercase text-on-surface-variant" for="password">Password</label>
                    @if (Route::has('password.request'))
                        <a class="font-label text-label uppercase text-primary hover:text-primary-container transition-colors" href="{{ route('password.request') }}">
                            Forgot?
                        </a>
                    @endif
                </div>
                <input 
                    class="w-full bg-[#121212] border border-white/10 rounded px-4 py-3 text-on-surface focus:outline-none focus:ring-1 focus:ring-primary-container focus:border-primary-container transition-all placeholder:text-neutral-700" 
                    id="password" 
                    name="password" 
                    type="password" 
                    placeholder="•••••••"
                    required
                    autocomplete="current-password">
                
                @if ($errors->has('password'))
                    <div class="mt-2 text-error text-sm">
                        {{ $errors->first('password') }}
                    </div>
                @endif
            </div>

            <!-- Remember Me -->
            <div class="flex items-center">
                <input 
                    class="bg-[#121212] border border-white/10 rounded text-primary focus:ring-1 focus:ring-primary-container" 
                    id="remember_me" 
                    name="remember" 
                    type="checkbox">
                <label class="ml-2 text-sm text-on-surface-variant" for="remember_me">Remember me</label>
            </div>

            <div class="pt-unit">
                <button class="w-full bg-primary-container text-on-primary-container font-label py-4 rounded hover:bg-opacity-90 active:scale-[0.98] transition-all flex justify-center items-center gap-2" type="submit">
                    <span>Login</span>
                    <span class="material-symbols-outlined text-sm" data-icon="login">login</span>
                </button>
            </div>
        </form>

        <!-- Social/Secondary Actions -->
        <div class="mt-stack-md flex flex-col items-center gap-stack-sm">
            <div class="w-full flex items-center gap-4">
                <div class="h-[1px] flex-1 bg-white/5"></div>
                <span class="font-label text-[10px] text-neutral-600 uppercase">Or continue with</span>
                <div class="h-[1px] flex-1 bg-white/5"></div>
            </div>
            <div class="w-full grid grid-cols-2 gap-4">
                <button class="flex items-center justify-center gap-2 border border-white/5 bg-[#121212] py-3 rounded font-label text-on-surface hover:bg-white/5 transition-colors">
                    <span class="material-symbols-outlined text-[18px]" data-icon="terminal">terminal</span>
                    <span>Github</span>
                </button>
                <button class="flex items-center justify-center gap-2 border border-white/5 bg-[#121212] py-3 rounded font-label text-on-surface hover:bg-white/5 transition-colors">
                    <span class="material-symbols-outlined text-[18px]" data-icon="cloud">cloud</span>
                    <span>Google</span>
                </button>
            </div>
            @if (Route::has('register'))
                <p class="mt-stack-sm font-body-sm text-body-sm text-neutral-500">
                    Don't have an account? 
                    <a class="text-primary hover:underline underline-offset-4" href="{{ route('register') }}">Sign up for free</a>
                </p>
            @endif
        </div>

        <!-- Aesthetic Footer Detail -->
        <div class="mt-stack-lg flex justify-center opacity-30">
            <div class="w-24 h-24 overflow-hidden rounded-full border border-white/10 flex items-center justify-center relative">
                <div class="absolute inset-0 bg-gradient-to-tr from-primary/20 to-transparent"></div>
                <span class="material-symbols-outlined text-4xl text-on-surface" data-icon="security">security</span>
            </div>
        </div>
    </div>
</main>

<!-- Visual Layering Element (Subtle Background Detail) -->
<div class="fixed top-0 left-1/2 -translate-x-1/2 w-[640px] h-screen -z-10 pointer-events-none opacity-20">
    <div class="absolute top-0 w-full h-1/2 bg-gradient-to-b from-indigo-500/10 to-transparent"></div>
</div>
</body>
</html>
                <input id="email" 
                       class="input" 
                       type="email" 
                       name="email" 
                       value="{{ old('email') }}" 
                       required 
                       autofocus 
                       autocomplete="username"
                       placeholder="Enter your email">
                
                @if ($errors->has('email'))
                    <div class="form-error">
                        {{ $errors->first('email') }}
                    </div>
                @endif
            </div>

            <!-- Password -->
            <div class="form-group">
                <label for="password" class="form-label">Password</label>
                <input id="password" 
                       class="input" 
                       type="password" 
                       name="password" 
                       required 
                       autocomplete="current-password"
                       placeholder="Enter your password">
                
                @if ($errors->has('password'))
                    <div class="form-error">
                        {{ $errors->first('password') }}
                    </div>
                @endif
            </div>

            <!-- Remember Me -->
            <div class="mb-6">
                <label for="remember_me" class="flex items-center gap-3 cursor-pointer">
                    <input id="remember_me" 
                           type="checkbox" 
                           name="remember"
                           class="w-4 h-4 text-primary rounded focus:ring-primary">
                    <span class="text-sm text-gray-600">Remember me</span>
                </label>
            </div>

            <!-- Submit Button -->
            <button type="submit" class="btn btn-primary w-full mb-4">
                Log in
            </button>

            <!-- Forgot Password Link -->
            @if (Route::has('password.request'))
                <div class="text-center">
                    <a href="{{ route('password.request') }}" 
                       class="text-sm text-gray-600 hover:text-gray-900 transition-colors">
                        Forgot your password?
                    </a>
                </div>
            @endif
        </form>

        <!-- Register Link -->
        <div class="text-center mt-8 pt-6 border-t border-gray-200">
            <p class="text-sm text-gray-600">
                Don't have an account? 
                <a href="{{ route('register') }}" class="text-primary hover:text-primary-dark font-medium transition-colors">
                    Sign up
                </a>
            </p>
        </div>
    </div>
</div>
