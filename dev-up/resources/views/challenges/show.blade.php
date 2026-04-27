<x-app-layout>
    <div class="container py-20">
        <!-- Header -->
        <div class="flex justify-between items-start mb-12">
            <div class="flex-1">
                <div class="flex items-center gap-4 mb-4">
                    <h1 class="text-4xl font-bold text-gray-900">{{ $challenge->title }}</h1>
                    <span class="challenge-difficulty difficulty-{{ $challenge->difficulty }}">
                        {{ $challenge->difficulty }}
                    </span>
                </div>
                <div class="flex items-center gap-6 text-gray-600">
                    <div class="flex items-center gap-2">
                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" class="text-gray-400">
                            <path d="M10 2C6.13401 2 3 5.13401 3 9C3 12.866 6.13401 16 10 16C13.866 16 17 12.866 17 9C17 5.13401 13.866 2 10 2ZM10 4C12.2091 4 14 5.79086 14 8C14 10.2091 12.2091 12 10 12C7.79086 12 6 10.2091 6 8C6 5.79086 7.79086 4 10 4Z" fill="currentColor"/>
                            <path d="M10 6V9L12 11" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>
                        </svg>
                        <span>{{ $challenge->points }} points</span>
                    </div>
                </div>
            </div>
            
            <div>
                @if(!$userChallenge)
                    <form action="{{ route('challenges.start', $challenge->id) }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-primary btn-lg">
                            <svg width="20" height="20" viewBox="0 0 20 20" fill="none">
                                <path d="M6 4L14 10L6 16V4Z" fill="currentColor"/>
                            </svg>
                            Start Challenge
                        </button>
                    </form>
                @else
                    <span class="inline-flex items-center px-4 py-2 rounded-full text-sm font-medium
                        {{ $userChallenge->status === 'en_cours' ? 'bg-yellow-100 text-yellow-800' : 
                           ($userChallenge->status === 'termine' ? 'bg-green-100 text-green-800' : 
                           'bg-red-100 text-red-800') }}">
                        {{ $userChallenge->status === 'en_cours' ? 'In Progress' : 
                           ($userChallenge->status === 'termine' ? 'Completed' : 'Abandoned') }}
                    </span>
                @endif
            </div>
        </div>

        <!-- Challenge Content -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- Main Content -->
            <div class="lg:col-span-2 space-y-8">
                <!-- Description -->
                <div class="card p-8">
                    <h2 class="text-2xl font-semibold text-gray-900 mb-6">Challenge Description</h2>
                    <div class="prose prose-gray max-w-none">
                        <p class="text-gray-700 leading-relaxed">{{ $challenge->description }}</p>
                    </div>
                </div>

                <!-- Requirements -->
                <div class="card p-8">
                    <h2 class="text-2xl font-semibold text-gray-900 mb-6">Requirements</h2>
                    <div class="space-y-4">
                        <div class="flex items-start gap-3">
                            <svg width="20" height="20" viewBox="0 0 20 20" fill="none" class="text-green-500 mt-0.5">
                                <path d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" fill="currentColor"/>
                            </svg>
                            <span class="text-gray-700">Complete the challenge according to the specifications</span>
                        </div>
                        <div class="flex items-start gap-3">
                            <svg width="20" height="20" viewBox="0 0 20 20" fill="none" class="text-green-500 mt-0.5">
                                <path d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" fill="currentColor"/>
                            </svg>
                            <span class="text-gray-700">Submit your solution for review</span>
                        </div>
                        <div class="flex items-start gap-3">
                            <svg width="20" height="20" viewBox="0 0 20 20" fill="none" class="text-green-500 mt-0.5">
                                <path d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" fill="currentColor"/>
                            </svg>
                            <span class="text-gray-700">Earn points upon successful completion</span>
                        </div>
                    </div>
                </div>

                <!-- Submit Solution -->
                @if($userChallenge && $userChallenge->status === 'en_cours')
                    <div class="card p-8">
                        <h2 class="text-2xl font-semibold text-gray-900 mb-6">Submit Solution</h2>
                        <form action="{{ route('challenges.submit', $challenge->id) }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="solution" class="form-label">Your Solution</label>
                                <textarea id="solution" 
                                          name="solution" 
                                          rows="6" 
                                          required
                                          class="input"
                                          placeholder="Enter your solution here..."></textarea>
                            </div>
                            <div class="flex gap-4">
                                <button type="submit" class="btn btn-primary">
                                    Submit Solution
                                </button>
                                <a href="{{ route('challenges.index') }}" class="btn btn-secondary">
                                    Cancel
                                </a>
                            </div>
                        </form>
                    </div>
                @endif
            </div>

            <!-- Sidebar -->
            <div class="space-y-8">
                <!-- Challenge Info -->
                <div class="card p-6">
                    <h3 class="text-lg font-semibold text-gray-900 mb-4">Challenge Info</h3>
                    <div class="space-y-4">
                        <div>
                            <div class="text-sm text-gray-500 mb-1">Difficulty</div>
                            <div class="flex items-center gap-2">
                                <span class="challenge-difficulty difficulty-{{ $challenge->difficulty }}">
                                    {{ $challenge->difficulty }}
                                </span>
                            </div>
                        </div>
                        <div>
                            <div class="text-sm text-gray-500 mb-1">Points</div>
                            <div class="text-lg font-semibold text-gray-900">{{ $challenge->points }} pts</div>
                        </div>
                        <div>
                            <div class="text-sm text-gray-500 mb-1">Estimated Time</div>
                            <div class="text-gray-900">
                                {{ $challenge->difficulty === 'facile' ? '15-30 min' : 
                                   ($challenge->difficulty === 'moyen' ? '30-60 min' : '60-90 min') }}
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Progress -->
                @if($userChallenge)
                    <div class="card p-6">
                        <h3 class="text-lg font-semibold text-gray-900 mb-4">Your Progress</h3>
                        <div class="space-y-4">
                            <div>
                                <div class="text-sm text-gray-500 mb-1">Status</div>
                                <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium
                                    {{ $userChallenge->status === 'en_cours' ? 'bg-yellow-100 text-yellow-800' : 
                                       ($userChallenge->status === 'termine' ? 'bg-green-100 text-green-800' : 
                                       'bg-red-100 text-red-800') }}">
                                    {{ $userChallenge->status === 'en_cours' ? 'In Progress' : 
                                       ($userChallenge->status === 'termine' ? 'Completed' : 'Abandoned') }}
                                </span>
                            </div>
                            @if($userChallenge->completed_at)
                                <div>
                                    <div class="text-sm text-gray-500 mb-1">Completed</div>
                                    <div class="text-gray-900">{{ $userChallenge->completed_at->format('M j, Y') }}</div>
                                </div>
                            @endif
                        </div>
                    </div>
                @endif

                <!-- Actions -->
                <div class="card p-6">
                    <h3 class="text-lg font-semibold text-gray-900 mb-4">Actions</h3>
                    <div class="space-y-3">
                        <a href="{{ route('challenges.index') }}" class="btn btn-secondary w-full">
                            Back to Challenges
                        </a>
                        @if($userChallenge && $userChallenge->status === 'en_cours')
                            <form action="{{ route('challenges.abandon', $challenge->id) }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-ghost w-full text-red-600 hover:text-red-700"
                                        onclick="return confirm('Are you sure you want to abandon this challenge?')">
                                    Abandon Challenge
                                </button>
                            </form>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
