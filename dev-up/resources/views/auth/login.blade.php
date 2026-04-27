<div class="auth-container">
    <div class="auth-card">
        <!-- Logo -->
        <div class="auth-logo">
            DEV↑UP
        </div>

        <!-- Session Status -->
        @if (session('status'))
            <div class="p-4 mb-6 bg-green-50 border border-green-200 rounded-lg text-green-800 text-sm">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email Address -->
            <div class="form-group">
                <label for="email" class="form-label">Email</label>
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
