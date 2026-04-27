<!DOCTYPE html>
<html class="dark" lang="en">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <title>My Challenges - DEV↑UP</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;900&display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet"/>
    <style>
        .material-symbols-outlined {
            font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
        }
    </style>
    <script id="tailwind-config">
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    "colors": {
                        "inverse-on-surface": "#303038",
                        "on-secondary": "#313030",
                        "inverse-surface": "#e4e1ed",
                        "tertiary-fixed": "#ffdcc5",
                        "on-secondary-fixed-variant": "#474646",
                        "tertiary": "#ffb783",
                        "on-background": "#e4e1ed",
                        "on-surface": "#e4e1ed",
                        "on-primary": "#1000a9",
                        "primary": "#c0c1ff",
                        "primary-fixed-dim": "#c0c1ff",
                        "on-primary-fixed-variant": "#2f2ebe",
                        "on-error-container": "#ffdad6",
                        "on-primary-container": "#0d0096",
                        "error": "#ffb4ab",
                        "surface-container-low": "#1b1b23",
                        "surface": "#13131b",
                        "outline-variant": "#464554",
                        "on-primary-fixed": "#07006c",
                        "on-tertiary-fixed": "#301400",
                        "on-tertiary-container": "#452000",
                        "outline": "#908fa0",
                        "surface-tint": "#c0c1ff",
                        "surface-bright": "#393841",
                        "error-container": "#93000a",
                        "surface-container-highest": "#34343d",
                        "surface-dim": "#13131b",
                        "inverse-primary": "#494bd6",
                        "background": "#13131b",
                        "on-surface-variant": "#c7c4d7",
                        "surface-container": "#1f1f27",
                        "secondary-fixed": "#e5e2e1",
                        "tertiary-fixed-dim": "#ffb783",
                        "secondary-container": "#4a4949",
                        "primary-fixed": "#e1e0ff",
                        "on-secondary-container": "#bab8b7",
                        "on-tertiary": "#4f2500",
                        "on-error": "#690005",
                        "tertiary-container": "#d97721",
                        "secondary-fixed-dim": "#c8c6c5",
                        "secondary": "#c8c6c5",
                        "surface-variant": "#34343d",
                        "on-secondary-fixed": "#1c1b1b",
                        "surface-container-high": "#292932",
                        "primary-container": "#8083ff",
                        "on-tertiary-fixed-variant": "#703700",
                        "surface-container-lowest": "#0d0d15"
                    },
                    "borderRadius": {
                        "DEFAULT": "0.125rem",
                        "lg": "0.25rem",
                        "xl": "0.5rem",
                        "full": "0.75rem"
                    },
                    "spacing": {
                        "stack-lg": "64px",
                        "container-max": "640px",
                        "stack-sm": "16px",
                        "gutter": "24px",
                        "unit": "4px",
                        "stack-md": "32px"
                    },
                    "fontFamily": {
                        "body-sm": ["Inter"],
                        "label": ["Inter"],
                        "h1": ["Inter"],
                        "body-lg": ["Inter"],
                        "h2": ["Inter"],
                        "body-md": ["Inter"]
                    },
                    "fontSize": {
                        "body-sm": ["14px", {"lineHeight": "1.5", "fontWeight": "400"}],
                        "label": ["12px", {"lineHeight": "1", "letterSpacing": "0.05em", "fontWeight": "500"}],
                        "h1": ["32px", {"lineHeight": "1.2", "letterSpacing": "-0.02em", "fontWeight": "600"}],
                        "body-lg": ["18px", {"lineHeight": "1.6", "fontWeight": "400"}],
                        "h2": ["24px", {"lineHeight": "1.3", "letterSpacing": "-0.01em", "fontWeight": "600"}],
                        "body-md": ["16px", {"lineHeight": "1.6", "fontWeight": "400"}]
                    }
                },
            },
        }
    </script>
    <style>
        body {
            min-height: max(884px, 100dvh);
        }
    </style>
</head>
<body class="bg-black text-on-surface font-body-md antialiased selection:bg-primary selection:text-on-primary">
<!-- Navigation -->
<header class="fixed top-0 w-full z-50 border-b border-white/10 bg-black">
    <div class="flex justify-between items-center h-16 px-6 max-w-[640px] mx-auto w-full">
        <div class="flex items-center gap-2">
            <span class="material-symbols-outlined text-indigo-500" data-icon="terminal">terminal</span>
            <span class="text-indigo-500 font-black tracking-tighter text-xl">DEV↑UP</span>
        </div>
        <div class="flex items-center gap-4">
            <a href="{{ route('dashboard') }}" class="text-on-surface-variant hover:text-on-surface transition-colors">
                <span class="material-symbols-outlined">home</span>
            </a>
            <a href="{{ route('challenges.index') }}" class="text-on-surface-variant hover:text-on-surface transition-colors">
                <span class="material-symbols-outlined">code</span>
            </a>
            <a href="{{ route('focus-sessions.index') }}" class="text-on-surface-variant hover:text-on-surface transition-colors">
                <span class="material-symbols-outlined">timer</span>
            </a>
        </div>
    </div>
</header>

<!-- Main Content -->
<main class="min-h-screen flex flex-col px-gutter pt-16">
    <div class="w-full max-w-[640px] mx-auto flex flex-col">
        <!-- Header -->
        <div class="py-stack-lg">
            <div class="flex items-center gap-4 mb-stack-md">
                <a href="{{ route('challenges.index') }}" class="text-on-surface-variant hover:text-on-surface transition-colors">
                    <span class="material-symbols-outlined">arrow_back</span>
                </a>
                <h1 class="font-h1 text-h1 text-on-surface">My Challenges</h1>
            </div>
            <p class="font-body-md text-body-md text-on-surface-variant">Track your progress and completed challenges.</p>
        </div>

        <!-- Filter Tabs -->
        <div class="mb-stack-md">
            <nav class="flex gap-4 border-b border-white/10">
                <a href="{{ route('challenges.index') }}" 
                   class="pb-3 px-1 border-b-2 border-transparent font-label text-label uppercase text-on-surface-variant hover:text-on-surface transition-colors">
                    All Challenges
                </a>
                <a href="{{ route('challenges.my') }}" 
                   class="pb-3 px-1 border-b-2 border-primary font-label text-label uppercase text-primary">
                    My Challenges
                </a>
            </nav>
        </div>

        <!-- Challenges Grid -->
        @if($userChallenges->count() > 0)
            <div class="space-y-stack-md">
                @foreach($userChallenges as $userChallenge)
                    <div class="bg-surface-container border border-white/10 rounded-lg p-6 hover:border-white/20 transition-all">
                        <div class="flex items-start justify-between mb-4">
                            <div class="flex-1">
                                <h3 class="font-h2 text-h2 text-on-surface mb-2">{{ $userChallenge->challenge->title }}</h3>
                                <div class="flex items-center gap-4 text-sm text-on-surface-variant">
                                    <div class="flex items-center gap-1">
                                        <span class="material-symbols-outlined text-[16px]">bolt</span>
                                        <span>{{ $userChallenge->challenge->points }} points</span>
                                    </div>
                                    <div class="flex items-center gap-1">
                                        <span class="material-symbols-outlined text-[16px]">schedule</span>
                                        <span>{{ $userChallenge->challenge->estimated_time ?? 'N/A' }}</span>
                                    </div>
                                </div>
                            </div>
                            <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium 
                                {{ $userChallenge->status === 'en_cours' ? 'bg-yellow-500/20 text-yellow-400 border border-yellow-500/30' : 
                                   ($userChallenge->status === 'termine' ? 'bg-green-500/20 text-green-400 border border-green-500/30' : 
                                   'bg-red-500/20 text-red-400 border border-red-500/30') }}">
                                {{ $userChallenge->status === 'en_cours' ? 'In Progress' : 
                                   ($userChallenge->status === 'termine' ? 'Completed' : 'Abandoned') }}
                            </span>
                        </div>
                        
                        @if($userChallenge->status === 'en_cours')
                            <div class="flex gap-3">
                                <a href="{{ route('challenges.show', $userChallenge->challenge->id) }}" 
                                   class="flex-1 bg-primary-container text-on-primary-container font-label py-3 rounded text-center hover:bg-opacity-90 transition-colors">
                                    Continue
                                </a>
                                <a href="{{ route('challenges.submit', $userChallenge->challenge->id) }}" 
                                   class="flex-1 border border-white/10 bg-surface-container text-on-surface font-label py-3 rounded text-center hover:bg-white/5 transition-colors">
                                    Submit Solution
                                </a>
                            </div>
                        @elseif($userChallenge->status === 'termine')
                            <div class="flex gap-3">
                                <a href="{{ route('challenges.show', $userChallenge->challenge->id) }}" 
                                   class="flex-1 border border-white/10 bg-surface-container text-on-surface font-label py-3 rounded text-center hover:bg-white/5 transition-colors">
                                    View Solution
                                </a>
                                <button class="flex-1 border border-white/10 bg-surface-container text-on-surface font-label py-3 rounded hover:bg-white/5 transition-colors">
                                    Try Again
                                </button>
                            </div>
                        @else
                            <div class="flex gap-3">
                                <a href="{{ route('challenges.show', $userChallenge->challenge->id) }}" 
                                   class="flex-1 bg-primary-container text-on-primary-container font-label py-3 rounded text-center hover:bg-opacity-90 transition-colors">
                                    Restart
                                </a>
                                <button class="flex-1 border border-white/10 bg-surface-container text-on-surface font-label py-3 rounded hover:bg-white/5 transition-colors">
                                    View Details
                                </button>
                            </div>
                        @endif
                    </div>
                @endforeach
            </div>
        @else
            <!-- Empty State -->
            <div class="text-center py-stack-lg">
                <div class="w-20 h-20 bg-surface-container rounded-full flex items-center justify-center mx-auto mb-4">
                    <span class="material-symbols-outlined text-3xl text-on-surface-variant">code_off</span>
                </div>
                <h3 class="font-h2 text-h2 text-on-surface mb-2">No challenges yet</h3>
                <p class="font-body-md text-body-md text-on-surface-variant mb-6">
                    Start your journey by exploring available challenges.
                </p>
                <a href="{{ route('challenges.index') }}" 
                   class="inline-flex items-center gap-2 bg-primary-container text-on-primary-container font-label py-3 px-6 rounded hover:bg-opacity-90 transition-colors">
                    <span>Browse Challenges</span>
                    <span class="material-symbols-outlined text-sm">arrow_forward</span>
                </a>
            </div>
        @endif
    </div>
</main>

<!-- Visual Layering Element -->
<div class="fixed top-0 left-1/2 -translate-x-1/2 w-[640px] h-screen -z-10 pointer-events-none opacity-20">
    <div class="absolute top-0 w-full h-1/2 bg-gradient-to-b from-indigo-500/10 to-transparent"></div>
</div>
</body>
</html>
                                        </svg>
                                        {{ $userChallenge->challenge->difficulty }}
                                    </div>
                                    
                                    @if($userChallenge->completed_at)
                                        <div class="flex items-center text-sm text-gray-600">
                                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                            </svg>
                                            Terminé le {{ $userChallenge->completed_at->format('d/m/Y') }}
                                        </div>
                                    @endif
                                </div>
                                
                                <p class="text-gray-600 text-sm mb-4">
                                    {{ Str::limit($userChallenge->challenge->description, 80) }}
                                </p>
                            </div>
                            
                            <div class="bg-gray-50 px-6 py-3">
                                <a href="{{ route('challenges.show', $userChallenge->challenge->id) }}" 
                                   class="text-sm font-medium text-blue-600 hover:text-blue-900">
                                    Voir les détails →
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- Pagination -->
                <div class="mt-8">
                    {{ $userChallenges->links() }}
                </div>
            @else
                <div class="text-center py-12">
                    <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                    </svg>
                    <h3 class="mt-2 text-sm font-medium text-gray-900">Aucun challenge</h3>
                    <p class="mt-1 text-sm text-gray-500">Vous n'avez pas encore commencé de challenge.</p>
                    <div class="mt-6">
                        <a href="{{ route('challenges.index') }}" 
                           class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                            Découvrir les challenges
                        </a>
                    </div>
                </div>
            @endif
        </div>
    </div>
</x-app-layout>
