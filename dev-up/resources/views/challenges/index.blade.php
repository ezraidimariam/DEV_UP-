<x-app-layout>
    <div class="container py-20">
        <!-- Header -->
        <div class="mb-12">
            <h1 class="text-4xl font-bold text-gray-900 mb-4">Challenges</h1>
            <p class="text-lg text-gray-600">Test your skills and earn points by completing programming challenges.</p>
        </div>

        <!-- Filter Tabs -->
        <div class="mb-8 border-b border-gray-200">
            <div class="flex gap-8">
                <a href="{{ route('challenges.index') }}" 
                   class="nav-link active">
                    All Challenges
                </a>
                <a href="{{ route('challenges.my') }}" 
                   class="nav-link">
                    My Challenges
                </a>
            </div>
        </div>

        <!-- Challenges Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($challenges as $challenge)
                <div class="challenge-card card-interactive">
                    <div class="flex justify-between items-start mb-4">
                        <h3 class="text-lg font-semibold text-gray-900 mb-0">{{ $challenge->title }}</h3>
                        <span class="challenge-difficulty difficulty-{{ $challenge->difficulty }}">
                            {{ $challenge->difficulty }}
                        </span>
                    </div>
                    
                    <p class="text-gray-600 mb-6">
                        {{ Str::limit($challenge->description, 120) }}
                    </p>
                    
                    <div class="flex justify-between items-center mb-6">
                        <div class="flex items-center gap-2">
                            <svg width="16" height="16" viewBox="0 0 16 16" fill="none" class="text-gray-400">
                                <path d="M8 1C4.13401 1 1 4.13401 1 8C1 11.866 4.13401 15 8 15C11.866 15 15 11.866 15 8C15 4.13401 11.866 1 8 1ZM8 3C10.2091 3 12 4.79086 12 7C12 9.20914 10.2091 11 8 11C5.79086 11 4 9.20914 4 7C4 4.79086 5.79086 3 8 3Z" fill="currentColor"/>
                                <path d="M8 5V8L10 10" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>
                            </svg>
                            <span class="text-gray-600">{{ $challenge->points }} pts</span>
                        </div>
                    </div>
                    
                    <div>
                        <a href="{{ route('challenges.show', $challenge->id) }}" class="btn btn-primary w-full">
                            View Challenge
                        </a>
                    </div>
                </div>
            @endforeach
        </div>

        @if($challenges->count() === 0)
            <div class="text-center py-20">
                <h3 class="text-2xl font-semibold text-gray-900 mb-4">No challenges available</h3>
                <p class="text-gray-600">Check back later for new programming challenges.</p>
            </div>
        @endif
    </div>
</x-app-layout>
