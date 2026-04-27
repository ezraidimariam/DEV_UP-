<!DOCTYPE html>
<html class="dark" lang="en">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <title>Submit Solution - DEV↑UP</title>
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
                <a href="{{ route('challenges.show', $challenge->id) }}" class="text-on-surface-variant hover:text-on-surface transition-colors">
                    <span class="material-symbols-outlined">arrow_back</span>
                </a>
                <h1 class="font-h1 text-h1 text-on-surface">Submit Solution</h1>
            </div>
            <p class="font-body-md text-body-md text-on-surface-variant">Submit your solution for "{{ $challenge->title }}"</p>
        </div>

        <!-- Challenge Info Card -->
        <div class="bg-surface-container border border-white/10 rounded-lg p-6 mb-stack-md">
            <div class="flex items-start justify-between mb-4">
                <div>
                    <h2 class="font-h2 text-h2 text-on-surface mb-2">{{ $challenge->title }}</h2>
                    <div class="flex items-center gap-4 text-sm text-on-surface-variant">
                        <div class="flex items-center gap-1">
                            <span class="material-symbols-outlined text-[16px]">bolt</span>
                            <span>{{ $challenge->points }} points</span>
                        </div>
                        <div class="flex items-center gap-1">
                            <span class="material-symbols-outlined text-[16px]">signal_cellular_alt</span>
                            <span>{{ $challenge->difficulty }}</span>
                        </div>
                    </div>
                </div>
                <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium 
                    {{ $challenge->difficulty === 'Easy' ? 'bg-green-500/20 text-green-400 border border-green-500/30' : 
                       ($challenge->difficulty === 'Medium' ? 'bg-yellow-500/20 text-yellow-400 border border-yellow-500/30' : 
                       ($challenge->difficulty === 'Hard' ? 'bg-red-500/20 text-red-400 border border-red-500/30' : 
                       'bg-purple-500/20 text-purple-400 border border-purple-500/30')) }}">
                    {{ $challenge->difficulty }}
                </span>
            </div>
        </div>

        <!-- Submission Form -->
        <form method="POST" action="{{ route('challenges.submit', $challenge->id) }}" class="space-y-stack-md">
            @csrf
            
            <!-- Code Editor -->
            <div class="bg-surface-container border border-white/10 rounded-lg p-6">
                <div class="flex justify-between items-center mb-4">
                    <label class="font-label text-label uppercase text-on-surface-variant">Your Solution</label>
                    <div class="flex items-center gap-2">
                        <select name="language" class="bg-[#121212] border border-white/10 rounded px-3 py-1 text-on-surface text-sm focus:outline-none focus:ring-1 focus:ring-primary-container">
                            <option value="php">PHP</option>
                            <option value="javascript">JavaScript</option>
                            <option value="python">Python</option>
                            <option value="java">Java</option>
                            <option value="cpp">C++</option>
                        </select>
                    </div>
                </div>
                <textarea 
                    name="solution" 
                    rows="15" 
                    class="w-full bg-[#121212] border border-white/10 rounded-lg p-4 text-on-surface font-mono text-sm focus:outline-none focus:ring-1 focus:ring-primary-container focus:border-primary-container transition-all placeholder:text-neutral-700"
                    placeholder="// Write your solution here..."
                    required>{{ old('solution') }}</textarea>
                
                @if ($errors->has('solution'))
                    <div class="mt-2 text-error text-sm">
                        {{ $errors->first('solution') }}
                    </div>
                @endif
            </div>

            <!-- Additional Notes -->
            <div class="bg-surface-container border border-white/10 rounded-lg p-6">
                <label class="font-label text-label uppercase text-on-surface-variant mb-4 block">Notes (Optional)</label>
                <textarea 
                    name="notes" 
                    rows="4" 
                    class="w-full bg-[#121212] border border-white/10 rounded-lg p-4 text-on-surface text-sm focus:outline-none focus:ring-1 focus:ring-primary-container focus:border-primary-container transition-all placeholder:text-neutral-700"
                    placeholder="Any additional notes about your solution...">{{ old('notes') }}</textarea>
            </div>

            <!-- Submit Actions -->
            <div class="flex gap-4">
                <a href="{{ route('challenges.show', $challenge->id) }}" 
                   class="flex-1 border border-white/10 bg-surface-container text-on-surface font-label py-4 rounded text-center hover:bg-white/5 transition-colors">
                    Cancel
                </a>
                <button type="submit" 
                        class="flex-1 bg-primary-container text-on-primary-container font-label py-4 rounded text-center hover:bg-opacity-90 active:scale-[0.98] transition-all flex items-center justify-center gap-2">
                    <span>Submit Solution</span>
                    <span class="material-symbols-outlined text-sm">send</span>
                </button>
            </div>
        </form>

        <!-- Guidelines -->
        <div class="mt-stack-lg bg-surface-container border border-white/10 rounded-lg p-6">
            <h3 class="font-h2 text-h2 text-on-surface mb-4">Submission Guidelines</h3>
            <ul class="space-y-2 text-sm text-on-surface-variant">
                <li class="flex items-start gap-2">
                    <span class="material-symbols-outlined text-[16px] mt-0.5 text-primary">check_circle</span>
                    <span>Ensure your code is properly formatted and follows best practices</span>
                </li>
                <li class="flex items-start gap-2">
                    <span class="material-symbols-outlined text-[16px] mt-0.5 text-primary">check_circle</span>
                    <span>Test your solution thoroughly before submitting</span>
                </li>
                <li class="flex items-start gap-2">
                    <span class="material-symbols-outlined text-[16px] mt-0.5 text-primary">check_circle</span>
                    <span>Include comments where necessary to explain complex logic</span>
                </li>
                <li class="flex items-start gap-2">
                    <span class="material-symbols-outlined text-[16px] mt-0.5 text-primary">check_circle</span>
                    <span>Make sure your solution handles edge cases</span>
                </li>
            </ul>
        </div>
    </div>
</main>

<!-- Visual Layering Element -->
<div class="fixed top-0 left-1/2 -translate-x-1/2 w-[640px] h-screen -z-10 pointer-events-none opacity-20">
    <div class="absolute top-0 w-full h-1/2 bg-gradient-to-b from-indigo-500/10 to-transparent"></div>
</div>
</body>
</html>
