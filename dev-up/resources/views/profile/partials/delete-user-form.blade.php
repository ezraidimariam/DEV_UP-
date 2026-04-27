<div class="space-y-6">
    <div class="bg-red-50 border border-red-200 rounded-lg p-6">
        <div class="flex items-start gap-3">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" class="text-red-500 mt-0.5">
                <path d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
            <div>
                <h3 class="text-lg font-semibold text-red-900 mb-2">Delete Account</h3>
                <p class="text-red-700 text-sm">
                    Once your account is deleted, all of its resources and data will be permanently deleted. 
                    Before deleting your account, please download any data or information that you wish to retain.
                </p>
            </div>
        </div>
    </div>

    <button 
        type="button"
        onclick="document.getElementById('deleteModal').classList.remove('hidden')"
        class="btn btn-ghost text-red-600 hover:text-red-700 hover:bg-red-50">
        <svg width="20" height="20" viewBox="0 0 20 20" fill="none">
            <path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z" fill="currentColor"/>
            <path d="M4 5a2 2 0 012-2 1 1 0 000 2H6a2 2 0 00-2 2v6a2 2 0 002 2h8a2 2 0 002-2V7a2 2 0 00-2-2h-1a1 1 0 100-2 2 2 0 012 2v8a2 2 0 01-2 2H6a2 2 0 01-2-2V5z" fill="currentColor"/>
        </svg>
        Delete Account
    </button>

    <!-- Delete Modal -->
    <div id="deleteModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 hidden flex items-center justify-center z-50">
        <div class="bg-white rounded-lg shadow-xl max-w-md w-full mx-4">
            <form method="post" action="{{ route('profile.destroy') }}" class="p-6">
                @csrf
                @method('delete')

                <div class="mb-6">
                    <h3 class="text-lg font-semibold text-gray-900 mb-2">
                        Are you sure you want to delete your account?
                    </h3>
                    <p class="text-sm text-gray-600">
                        Once your account is deleted, all of its resources and data will be permanently deleted. 
                        Please enter your password to confirm you would like to permanently delete your account.
                    </p>
                </div>

                <div class="mb-6">
                    <label for="delete_password" class="form-label">Password</label>
                    <input id="delete_password"
                           name="password"
                           type="password"
                           class="input"
                           placeholder="Enter your password">
                    
                    @if ($errors->userDeletion->has('password'))
                        <div class="form-error">
                            {{ $errors->userDeletion->first('password') }}
                        </div>
                    @endif
                </div>

                <div class="flex gap-3 justify-end">
                    <button type="button" 
                            onclick="document.getElementById('deleteModal').classList.add('hidden')"
                            class="btn btn-secondary">
                        Cancel
                    </button>
                    <button type="submit" class="btn btn-danger">
                        Delete Account
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
