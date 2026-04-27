<x-app-layout>
    <div class="container py-20">
        <div class="timer">
            <!-- Session Info -->
            <div class="mb-12">
                <h2 class="text-3xl font-bold text-gray-900 mb-4">Focus Session</h2>
                <p class="text-lg text-gray-600">
                    {{ $session->focus_duration }} min focus • {{ $session->break_duration }} min break
                </p>
            </div>

            <!-- Timer Display -->
            <div class="timer-display" id="timer">
                {{ $session->focus_duration }}:00
            </div>
            
            <div class="timer-label" id="session-type">
                Focus Time
            </div>

            <!-- Controls -->
            <div class="flex justify-center gap-4 mb-12">
                <button id="start-btn" 
                        onclick="startTimer()"
                        class="btn btn-primary btn-lg">
                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none">
                        <path d="M6 3L14 10L6 17V3Z" fill="currentColor"/>
                    </svg>
                    Start
                </button>
                
                <button id="pause-btn" 
                        onclick="pauseTimer()"
                        class="btn btn-secondary btn-lg hidden">
                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none">
                        <rect x="5" y="4" width="4" height="12" fill="currentColor"/>
                        <rect x="11" y="4" width="4" height="12" fill="currentColor"/>
                    </svg>
                    Pause
                </button>
                
                <button id="reset-btn" 
                        onclick="resetTimer()"
                        class="btn btn-ghost btn-lg">
                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none">
                        <path d="M10 2C6.13401 2 3 5.13401 3 9C3 12.866 6.13401 16 10 16C13.866 16 17 12.866 17 9C17 5.13401 13.866 2 10 2ZM10 4C12.7614 4 15 6.23858 15 9C15 11.7614 12.7614 14 10 14C7.23858 14 5 11.7614 5 9C5 6.23858 7.23858 4 10 4Z" fill="currentColor"/>
                        <path d="M10 6V9L12 11" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                    </svg>
                    Reset
                </button>
            </div>

            <!-- Progress Bar -->
            <div class="max-w-md mx-auto">
                <div class="progress-bar">
                    <div class="progress-fill" id="progress" style="width: 0%;"></div>
                </div>
                <p class="text-center text-gray-600 mt-3">
                    <span id="progress-text">0%</span> complete
                </p>
            </div>
        </div>
    </div>
</x-app-layout>

<script>
    let focusDuration = {{ $session->focus_duration }};
    let breakDuration = {{ $session->break_duration }};
    let currentTime = focusDuration * 60;
    let isRunning = false;
    let isPaused = false;
    let isBreak = false;
    let interval;

    const timerDisplay = document.getElementById('timer');
    const sessionTypeDisplay = document.getElementById('session-type');
    const startBtn = document.getElementById('start-btn');
    const pauseBtn = document.getElementById('pause-btn');
    const resetBtn = document.getElementById('reset-btn');
    const progressFill = document.getElementById('progress');
    const progressText = document.getElementById('progress-text');

    function updateDisplay() {
        const minutes = Math.floor(currentTime / 60);
        const seconds = currentTime % 60;
        timerDisplay.textContent = `${minutes.toString().padStart(2, '0')}:${seconds.toString().padStart(2, '0')}`;
        
        const totalTime = isBreak ? breakDuration * 60 : focusDuration * 60;
        const elapsed = totalTime - currentTime;
        const progress = Math.round((elapsed / totalTime) * 100);
        progressFill.style.width = `${progress}%`;
        progressText.textContent = `${progress}%`;
    }

    function startTimer() {
        if (!isRunning) {
            isRunning = true;
            startBtn.classList.add('hidden');
            pauseBtn.classList.remove('hidden');
            resetBtn.classList.remove('hidden');
            
            interval = setInterval(() => {
                if (currentTime > 0) {
                    currentTime--;
                    updateDisplay();
                } else {
                    clearInterval(interval);
                    isRunning = false;
                    
                    if (!isBreak) {
                        alert('Focus session completed! Time for a break.');
                        startBreak();
                    } else {
                        alert('Break finished! Ready for another focus session?');
                        resetTimer();
                    }
                }
            }, 1000);
        }
    }

    function pauseTimer() {
        if (isRunning) {
            isRunning = false;
            isPaused = true;
            clearInterval(interval);
            pauseBtn.classList.add('hidden');
            startBtn.classList.remove('hidden');
        }
    }

    function resetTimer() {
        clearInterval(interval);
        isRunning = false;
        isPaused = false;
        isBreak = false;
        currentTime = focusDuration * 60;
        updateDisplay();
        
        startBtn.classList.remove('hidden');
        pauseBtn.classList.add('hidden');
        resetBtn.classList.remove('hidden');
        
        sessionTypeDisplay.textContent = 'Focus Time';
    }

    function startBreak() {
        isBreak = true;
        currentTime = breakDuration * 60;
        sessionTypeDisplay.textContent = 'Break Time';
        updateDisplay();
    }

    // Initialize display
    updateDisplay();
</script>
