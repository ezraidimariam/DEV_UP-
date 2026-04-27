<x-app-layout>
    <div class="container py-20">
        <div class="max-w-2xl mx-auto">
            <!-- Header -->
            <div class="mb-12">
                <h1 class="text-4xl font-bold text-gray-900 mb-4">Create Focus Session</h1>
                <p class="text-lg text-gray-600">Set up your focus session to maximize productivity and maintain concentration.</p>
            </div>

            <!-- Form Card -->
            <div class="card p-8">
                <form action="{{ route('focus-sessions.store') }}" method="POST">
                    @csrf
                    
                    <!-- Focus Duration -->
                    <div class="form-group">
                        <label for="focus_duration" class="form-label">Focus Duration (minutes)</label>
                        <input type="number" 
                               name="focus_duration" 
                               id="focus_duration" 
                               value="25"
                               min="1" 
                               max="120"
                               required
                               class="input"
                               placeholder="Enter focus duration">
                        <p class="text-sm text-gray-500 mt-2">
                            Concentration time (1-120 minutes). Recommended: 25 minutes.
                        </p>
                    </div>

                    <!-- Break Duration -->
                    <div class="form-group">
                        <label for="break_duration" class="form-label">Break Duration (minutes)</label>
                        <input type="number" 
                               name="break_duration" 
                               id="break_duration" 
                               value="5"
                               min="1" 
                               max="30"
                               required
                               class="input"
                               placeholder="Enter break duration">
                        <p class="text-sm text-gray-500 mt-2">
                            Break time between sessions (1-30 minutes). Recommended: 5 minutes.
                        </p>
                    </div>

                    <!-- Quick Presets -->
                    <div class="form-group">
                        <label class="form-label">Quick Presets</label>
                        <div class="grid grid-cols-3 gap-3">
                            <button type="button" 
                                    onclick="setPreset(25, 5)"
                                    class="btn btn-secondary text-sm">
                                <div class="font-medium">Pomodoro</div>
                                <div class="text-xs text-gray-500">25/5 min</div>
                            </button>
                            <button type="button" 
                                    onclick="setPreset(50, 10)"
                                    class="btn btn-secondary text-sm">
                                <div class="font-medium">Extended</div>
                                <div class="text-xs text-gray-500">50/10 min</div>
                            </button>
                            <button type="button" 
                                    onclick="setPreset(90, 15)"
                                    class="btn btn-secondary text-sm">
                                <div class="font-medium">Deep Work</div>
                                <div class="text-xs text-gray-500">90/15 min</div>
                            </button>
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <div class="flex gap-4">
                        <button type="submit" class="btn btn-primary flex-1">
                            <svg width="20" height="20" viewBox="0 0 20 20" fill="none">
                                <path d="M10 3v14M3 10h14" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                            </svg>
                            Start Session
                        </button>
                        <a href="{{ route('focus-sessions.index') }}" class="btn btn-secondary">
                            Cancel
                        </a>
                    </div>
                </form>
            </div>

            <!-- Tips -->
            <div class="card mt-8 p-6 bg-gray-50">
                <h3 class="text-lg font-semibold text-gray-900 mb-4">Focus Tips</h3>
                <ul class="space-y-3 text-gray-600">
                    <li class="flex items-start gap-3">
                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" class="text-green-500 mt-0.5">
                            <path d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" fill="currentColor"/>
                        </svg>
                        <span>Eliminate distractions before starting your session</span>
                    </li>
                    <li class="flex items-start gap-3">
                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" class="text-green-500 mt-0.5">
                            <path d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" fill="currentColor"/>
                        </svg>
                        <span>Take short breaks to maintain productivity</span>
                    </li>
                    <li class="flex items-start gap-3">
                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" class="text-green-500 mt-0.5">
                            <path d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" fill="currentColor"/>
                        </svg>
                        <span>Stay hydrated and comfortable during focus time</span>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <script>
        function setPreset(focus, breakTime) {
            document.getElementById('focus_duration').value = focus;
            document.getElementById('break_duration').value = breakTime;
        }
    </script>
</x-app-layout>
