<x-app-layout>
    <div class="container py-20">
        <!-- Header -->
        <div class="mb-12">
            <h1 class="text-4xl font-bold text-gray-900 mb-4">Profile Settings</h1>
            <p class="text-lg text-gray-600">Manage your account settings and preferences.</p>
        </div>

        <div class="max-w-4xl mx-auto space-y-8">
            <!-- Profile Information -->
            <div class="card p-8">
                <h2 class="text-2xl font-semibold text-gray-900 mb-6">Profile Information</h2>
                <div class="max-w-xl">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <!-- Password -->
            <div class="card p-8">
                <h2 class="text-2xl font-semibold text-gray-900 mb-6">Update Password</h2>
                <div class="max-w-xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <!-- Delete Account -->
            <div class="card p-8">
                <h2 class="text-2xl font-semibold text-gray-900 mb-6">Delete Account</h2>
                <div class="max-w-xl">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
