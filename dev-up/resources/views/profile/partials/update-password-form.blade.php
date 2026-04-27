<form method="post" action="{{ route('password.update') }}" class="space-y-6">
    @csrf
    @method('put')

    <!-- Current Password -->
    <div class="form-group">
        <label for="update_password_current_password" class="form-label">Current Password</label>
        <input id="update_password_current_password" 
               name="current_password" 
               type="password" 
               class="input" 
               autocomplete="current-password"
               placeholder="Enter current password">
        
        @if ($errors->updatePassword->has('current_password'))
            <div class="form-error">
                {{ $errors->updatePassword->first('current_password') }}
            </div>
        @endif
    </div>

    <!-- New Password -->
    <div class="form-group">
        <label for="update_password_password" class="form-label">New Password</label>
        <input id="update_password_password" 
               name="password" 
               type="password" 
               class="input" 
               autocomplete="new-password"
               placeholder="Enter new password">
        
        @if ($errors->updatePassword->has('password'))
            <div class="form-error">
                {{ $errors->updatePassword->first('password') }}
            </div>
        @endif
    </div>

    <!-- Confirm Password -->
    <div class="form-group">
        <label for="update_password_password_confirmation" class="form-label">Confirm Password</label>
        <input id="update_password_password_confirmation" 
               name="password_confirmation" 
               type="password" 
               class="input" 
               autocomplete="new-password"
               placeholder="Confirm new password">
        
        @if ($errors->updatePassword->has('password_confirmation'))
            <div class="form-error">
                {{ $errors->updatePassword->first('password_confirmation') }}
            </div>
        @endif
    </div>

    <!-- Submit Button -->
    <div class="flex gap-4">
        <button type="submit" class="btn btn-primary">
            Update Password
        </button>

        @if (session('status') === 'password-updated')
            <div class="flex items-center gap-2 text-sm text-green-600">
                <svg width="16" height="16" viewBox="0 0 16 16" fill="none">
                    <path d="M13.5 4.5L6 12L2.5 8.5" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
                Password updated successfully!
            </div>
        @endif
    </div>
</form>
