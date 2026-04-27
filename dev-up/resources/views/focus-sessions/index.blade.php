<x-app-layout>
    <div class="container py-20">
        <!-- Header -->
        <div class="flex justify-between items-center mb-12">
            <div>
                <h1 class="text-4xl font-bold text-gray-900 mb-4">Focus Sessions</h1>
                <p class="text-lg text-gray-600">Track your focus sessions and improve your productivity.</p>
            </div>
            <a href="{{ route('focus-sessions.create') }}" class="btn btn-primary btn-lg">
                <svg width="20" height="20" viewBox="0 0 20 20" fill="none">
                    <path d="M10 3v14M3 10h14" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                </svg>
                New Session
            </a>
        </div>

        <!-- Sessions Grid -->
        @if($sessions->count() > 0)
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($sessions as $session)
                    <div class="card card-interactive p-6">
                        <div class="flex justify-between items-start mb-4">
                            <div>
                                <h3 class="text-lg font-semibold text-gray-900 mb-2">
                                    {{ $session->focus_duration }} min Focus
                                </h3>
                                <p class="text-sm text-gray-600">
                                    {{ $session->date_session->format('M j, Y • g:i A') }}
                                </p>
                            </div>
                            <div class="text-right">
                                <div class="text-2xl font-bold text-gray-900">{{ $session->focus_duration }}</div>
                                <div class="text-xs text-gray-500">minutes</div>
                            </div>
                        </div>
                        
                        <div class="flex items-center justify-between mb-4">
                            <div class="flex items-center gap-4 text-sm text-gray-600">
                                <div class="flex items-center gap-1">
                                    <svg width="16" height="16" viewBox="0 0 16 16" fill="none" class="text-gray-400">
                                        <circle cx="8" cy="8" r="6" stroke="currentColor" stroke-width="1.5" fill="none"/>
                                        <path d="M8 5v3l2 2" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>
                                    </svg>
                                    <span>{{ $session->focus_duration }} min</span>
                                </div>
                                <div class="flex items-center gap-1">
                                    <svg width="16" height="16" viewBox="0 0 16 16" fill="none" class="text-gray-400">
                                        <rect x="3" y="6" width="10" height="4" rx="1" stroke="currentColor" stroke-width="1.5" fill="none"/>
                                    </svg>
                                    <span>{{ $session->break_duration }} min</span>
                                </div>
                            </div>
                        </div>
                        
                        <div class="flex items-center justify-between">
                            <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium
                                {{ $session->is_completed 
                                    ? 'bg-green-100 text-green-800' 
                                    : 'bg-yellow-100 text-yellow-800' }}">
                                {{ $session->is_completed ? 'Completed' : 'In Progress' }}
                            </span>
                            
                            <div class="flex gap-2">
                                @if(!$session->is_completed)
                                    <a href="{{ route('focus-sessions.timer', $session->id) }}" 
                                       class="btn btn-primary btn-sm">
                                        Resume
                                    </a>
                                @endif
                                <a href="{{ route('focus-sessions.timer', $session->id) }}" 
                                   class="btn btn-ghost btn-sm">
                                    View
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="text-center py-20">
                <div class="mb-8">
                    <svg width="64" height="64" viewBox="0 0 64 64" fill="none" class="mx-auto text-gray-300">
                        <circle cx="32" cy="32" r="24" stroke="currentColor" stroke-width="2" fill="none"/>
                        <path d="M32 20v12l8 8" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                    </svg>
                </div>
                <h3 class="text-2xl font-semibold text-gray-900 mb-4">No focus sessions yet</h3>
                <p class="text-gray-600 mb-8">Start your first focus session to build better concentration habits.</p>
                <a href="{{ route('focus-sessions.create') }}" class="btn btn-primary btn-lg">
                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none">
                        <path d="M10 3v14M3 10h14" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                    </svg>
                    Start First Session
                </a>
            </div>
        @endif
    </div>
</x-app-layout>
