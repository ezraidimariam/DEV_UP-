<x-app-layout>
    <div class="container py-20">
        <!-- Welcome Section -->
        <div class="mb-12">
            <h1 class="text-4xl font-bold text-gray-900 mb-4">Welcome back, {{ Auth::user()->name }}</h1>
            <p class="text-lg text-gray-600">Continue your learning journey and stay focused.</p>
        </div>

        <!-- Stats Grid -->
        <div class="stats-grid mb-16">
            <div class="stat-card">
                <div class="stat-value">{{ $totalPoints }}</div>
                <div class="stat-label">Total Points</div>
            </div>

            <div class="stat-card">
                <div class="stat-value">{{ $currentLevel }}</div>
                <div class="stat-label">Current Level</div>
            </div>

            <div class="stat-card">
                <div class="stat-value">{{ $completedChallenges }}</div>
                <div class="stat-label">Completed Challenges</div>
            </div>

            <div class="stat-card">
                <div class="stat-value">{{ $totalSessions }}</div>
                <div class="stat-label">Focus Sessions</div>
            </div>
        </div>

        <!-- Progress Section -->
        <div class="card mb-16 p-8">
            <h2 class="text-2xl font-semibold text-gray-900 mb-6">Level Progress</h2>
            <div class="mb-4">
                <div class="progress-bar">
                    <div class="progress-fill" style="width: {{ min(($totalPoints % 100), 100) }}%;"></div>
                </div>
            </div>
            <p class="text-gray-600">{{ $totalPoints % 100 }}/100 points to next level</p>
        </div>

        <!-- Main Content Grid -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 mb-12">
            <!-- Recent Challenges -->
            <div class="card p-8">
                <h2 class="text-2xl font-semibold text-gray-900 mb-6">Recent Challenges</h2>
                @if($recentChallenges->count() > 0)
                    <div class="flex flex-col gap-4">
                        @foreach($recentChallenges as $challenge)
                            <div class="challenge-card">
                                <h3 class="text-lg font-semibold text-gray-900 mb-3">{{ $challenge->title }}</h3>
                                <p class="text-gray-600 mb-4">{{ Str::limit($challenge->description, 120) }}</p>
                                <div class="flex justify-between items-center mb-4">
                                    <span class="challenge-difficulty difficulty-{{ $challenge->difficulty }}">
                                        {{ $challenge->difficulty }}
                                    </span>
                                    <span class="text-gray-600">{{ $challenge->points }} pts</span>
                                </div>
                                <div>
                                    <a href="{{ route('challenges.show', $challenge->id) }}" class="btn btn-primary">
                                        Start Challenge
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <p class="text-gray-500">No challenges available yet.</p>
                @endif
            </div>

            <!-- Active Challenges -->
            <div class="card p-8">
                <h2 class="text-2xl font-semibold text-gray-900 mb-6">Active Challenges</h2>
                @if($activeChallenges->count() > 0)
                    <div class="flex flex-col gap-4">
                        @foreach($activeChallenges as $userChallenge)
                            <div class="challenge-card">
                                <h3 class="text-lg font-semibold text-gray-900 mb-3">{{ $userChallenge->challenge->title }}</h3>
                                <p class="text-gray-600 mb-4">{{ Str::limit($userChallenge->challenge->description, 120) }}</p>
                                <div class="flex justify-between items-center mb-4">
                                    <span class="challenge-difficulty difficulty-{{ $userChallenge->challenge->difficulty }}">
                                        {{ $userChallenge->challenge->difficulty }}
                                    </span>
                                    <span class="text-gray-600">{{ $userChallenge->challenge->points }} pts</span>
                                </div>
                                <div>
                                    <a href="{{ route('challenges.submit', $userChallenge->challenge->id) }}" class="btn btn-primary">
                                        Submit Solution
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <p class="text-gray-500">No active challenges. Start a new challenge to begin!</p>
                @endif
            </div>
        </div>

        <!-- Recent Sessions -->
        <div class="card p-8 mb-12">
            <h2 class="text-2xl font-semibold text-gray-900 mb-6">Recent Focus Sessions</h2>
            @if($recentSessions->count() > 0)
                <div class="flex flex-col gap-4">
                    @foreach($recentSessions as $session)
                        <div class="card bg-gray-50 p-6">
                            <div class="flex justify-between items-center">
                                <div>
                                    <h3 class="text-lg font-semibold text-gray-900 mb-2">
                                        {{ $session->focus_duration }} min focus session
                                    </h3>
                                    <p class="text-gray-600">
                                        {{ $session->date_session->format('M j, Y') }} • 
                                        {{ $session->is_completed ? 'Completed' : 'In Progress' }}
                                    </p>
                                </div>
                                <div class="text-right">
                                    <div class="stat-value" style="font-size: 2rem;">{{ $session->focus_duration }}</div>
                                    <div class="stat-label text-sm">minutes</div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <p class="text-gray-500">No focus sessions yet. Start your first session to build focus!</p>
            @endif
        </div>

        <!-- Quick Actions -->
        <div class="text-center">
            <div class="flex justify-center gap-4">
                <a href="{{ route('challenges.index') }}" class="btn btn-primary btn-lg">
                    Browse Challenges
                </a>
                <a href="{{ route('focus-sessions.create') }}" class="btn btn-secondary btn-lg">
                    Start Focus Session
                </a>
            </div>
        </div>
    </div>
</x-app-layout>
