<form method="post" action="{{ route('profile.update') }}" class="space-y-6">
    @csrf
    @method('patch')

    <!-- Name -->
    <div class="form-group">
        <label for="name" class="form-label">Name</label>
        <input id="name" 
               name="name" 
               type="text" 
               class="input" 
               value="{{ old('name', $user->name) }}" 
               required 
               autofocus 
               autocomplete="name"
               placeholder="Enter your name">
        
        @if ($errors->has('name'))
            <div class="form-error">
                {{ $errors->first('name') }}
            </div>
        @endif
    </div>

    <!-- Email -->
    <div class="form-group">
        <label for="email" class="form-label">Email</label>
        <input id="email" 
               name="email" 
               type="email" 
               class="input" 
               value="{{ old('email', $user->email) }}" 
               required 
               autocomplete="username"
               placeholder="Enter your email">
        
        @if ($errors->has('email'))
            <div class="form-error">
                {{ $errors->first('email') }}
            </div>
        @endif

        @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
            <div class="mt-4 p-4 bg-yellow-50 border border-yellow-200 rounded-lg">
                <p class="text-sm text-yellow-800 mb-2">
                    Your email address is unverified.
                </p>
                
                <form id="send-verification" method="post" action="{{ route('verification.send') }}" class="inline">
                    @csrf
                    <button type="submit" class="btn btn-ghost text-yellow-700 hover:text-yellow-800 text-sm">
                        Click here to re-send the verification email.
                    </button>
                </form>

                @if (session('status') === 'verification-link-sent')
                    <p class="mt-2 text-sm text-green-600">
                        A new verification link has been sent to your email address.
                    </p>
                @endif
            </div>
        @endif
    </div>

    <!-- Submit Button -->
    <div class="flex gap-4">
        <button type="submit" class="btn btn-primary">
            Save Changes
        </button>

        @if (session('status') === 'profile-updated')
            <div class="flex items-center gap-2 text-sm text-green-600">
                <svg width="16" height="16" viewBox="0 0 16 16" fill="none">
                    <path d="M13.5 4.5L6 12L2.5 8.5" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
                Saved successfully!
            </div>
        @endif
    </div>
</form>
