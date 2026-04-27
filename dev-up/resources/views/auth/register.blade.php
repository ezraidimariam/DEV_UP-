<div class="auth-container">
    <div class="auth-card">
        <!-- Logo -->
        <div class="auth-logo">
            DEV↑UP
        </div>

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Name -->
            <div class="form-group">
                <label for="name" class="form-label">Name</label>
                <input id="name" 
                       class="input" 
                       type="text" 
                       name="name" 
                       value="{{ old('name') }}" 
                       required 
                       autofocus 
                       autocomplete="name"
                       placeholder="Enter your full name">
                
                @if ($errors->has('name'))
                    <div class="form-error">
                        {{ $errors->first('name') }}
                    </div>
                @endif
            </div>

            <!-- Email Address -->
            <div class="form-group">
                <label for="email" class="form-label">Email</label>
                <input id="email" 
                       class="input" 
                       type="email" 
                       name="email" 
                       value="{{ old('email') }}" 
                       required 
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
                       autocomplete="new-password"
                       placeholder="Create a password">
                
                @if ($errors->has('password'))
                    <div class="form-error">
                        {{ $errors->first('password') }}
                    </div>
                @endif
            </div>

            <!-- Confirm Password -->
            <div class="form-group">
                <label for="password_confirmation" class="form-label">Confirm Password</label>
                <input id="password_confirmation" 
                       class="input" 
                       type="password" 
                       name="password_confirmation" 
                       required 
                       autocomplete="new-password"
                       placeholder="Confirm your password">
                
                @if ($errors->has('password_confirmation'))
                    <div class="form-error">
                        {{ $errors->first('password_confirmation') }}
                    </div>
                @endif
            </div>

            <!-- Submit Button -->
            <button type="submit" class="btn btn-primary w-full mb-4">
                Sign up
            </button>

            <!-- Login Link -->
            <div class="text-center">
                <a href="{{ route('login') }}" class="text-sm text-gray-600 hover:text-gray-900 transition-colors">
                    Already have an account? Log in
                </a>
            </div>
        </form>
    </div>
</div>
