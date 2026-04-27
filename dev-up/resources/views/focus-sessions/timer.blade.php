<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DEV↑UP - Focus Timer</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=JetBrains+Mono:wght@400;500;600&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Inter', sans-serif;
            background: #0a0a0a;
            color: #ffffff;
            overflow-x: hidden;
        }
        
        .brand-font {
            font-family: 'Space Grotesk', sans-serif;
        }
        
        .mono-font {
            font-family: 'JetBrains Mono', monospace;
        }
        
        .gradient-text {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
        
        .glass-card {
            background: rgba(255, 255, 255, 0.03);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.1);
            box-shadow: 
                0 8px 32px rgba(0, 0, 0, 0.3),
                0 4px 16px rgba(0, 0, 0, 0.2),
                inset 0 1px 0 rgba(255, 255, 255, 0.1);
        }
        
        .glow-button {
            position: relative;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border: none;
            transition: all 0.3s ease;
            overflow: hidden;
        }
        
        .glow-button::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
            transition: left 0.5s;
        }
        
        .glow-button:hover::before {
            left: 100%;
        }
        
        .glow-button:hover {
            transform: translateY(-2px);
            box-shadow: 
                0 10px 40px rgba(102, 126, 234, 0.4),
                0 6px 20px rgba(102, 126, 234, 0.3);
        }
        
        .floating-shapes {
            position: fixed;
            width: 100%;
            height: 100%;
            overflow: hidden;
            z-index: -1;
        }
        
        .shape {
            position: absolute;
            border-radius: 50%;
            filter: blur(40px);
            opacity: 0.3;
        }
        
        .shape-1 {
            width: 300px;
            height: 300px;
            background: linear-gradient(135deg, #667eea, #764ba2);
            top: -150px;
            right: -150px;
            animation: float 6s ease-in-out infinite;
        }
        
        .shape-2 {
            width: 200px;
            height: 200px;
            background: linear-gradient(135deg, #f093fb, #f5576c);
            bottom: -100px;
            left: -100px;
            animation: float 8s ease-in-out infinite reverse;
        }
        
        .shape-3 {
            width: 150px;
            height: 150px;
            background: linear-gradient(135deg, #4facfe, #00f2fe);
            top: 50%;
            left: -75px;
            animation: float 10s ease-in-out infinite;
        }
        
        @keyframes float {
            0%, 100% { transform: translateY(0px) rotate(0deg); }
            50% { transform: translateY(-20px) rotate(180deg); }
        }
        
        .nav-item {
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(255, 255, 255, 0.1);
            transition: all 0.3s ease;
        }
        
        .nav-item:hover {
            background: rgba(255, 255, 255, 0.1);
            transform: translateY(-2px);
            box-shadow: 0 4px 16px rgba(0, 0, 0, 0.2);
        }
        
        .timer-display {
            font-size: 6rem;
            font-weight: 700;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            font-family: 'JetBrains Mono', monospace;
            letter-spacing: -0.02em;
        }
        
        .timer-circle {
            position: relative;
            width: 300px;
            height: 300px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.03);
            border: 2px solid rgba(255, 255, 255, 0.1);
            display: flex;
            align-items: center;
            justify-content: center;
        }
        
        .timer-circle::before {
            content: '';
            position: absolute;
            top: -2px;
            left: -2px;
            right: -2px;
            bottom: -2px;
            border-radius: 50%;
            background: conic-gradient(from 0deg, #667eea, #764ba2, transparent);
            z-index: -1;
            animation: rotate 2s linear infinite;
        }
        
        @keyframes rotate {
            from { transform: rotate(0deg); }
            to { transform: rotate(360deg); }
        }
        
        .pulse-animation {
            animation: pulse 2s ease-in-out infinite;
        }
        
        @keyframes pulse {
            0%, 100% { transform: scale(1); opacity: 1; }
            50% { transform: scale(1.05); opacity: 0.8; }
        }
    </style>
</head>
<body>
    <!-- Floating Background Shapes -->
    <div class="floating-shapes">
        <div class="shape shape-1"></div>
        <div class="shape shape-2"></div>
        <div class="shape shape-3"></div>
    </div>

    <!-- Navigation Header -->
    <nav class="fixed top-0 left-0 right-0 z-50 glass-card border-b border-white/10">
        <div class="max-w-7xl mx-auto px-6 py-4">
            <div class="flex items-center justify-between">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 rounded-xl bg-gradient-to-br from-purple-500 to-indigo-600 flex items-center justify-center">
                        <i class="ri-code-s-slash-line text-white text-lg"></i>
                    </div>
                    <h1 class="brand-font text-2xl font-black gradient-text">DEV↑UP</h1>
                </div>
                
                <div class="flex items-center gap-6">
                    <a href="{{ route('dashboard') }}" class="nav-item px-4 py-2 rounded-xl text-gray-300 hover:text-white transition-all">
                        <i class="ri-dashboard-line mr-2"></i>
                        Dashboard
                    </a>
                    <a href="{{ route('challenges.index') }}" class="nav-item px-4 py-2 rounded-xl text-gray-300 hover:text-white transition-all">
                        <i class="ri-trophy-line mr-2"></i>
                        Challenges
                    </a>
                    <a href="{{ route('focus-sessions.index') }}" class="nav-item px-4 py-2 rounded-xl text-white hover:text-purple-300 transition-all">
                        <i class="ri-time-line mr-2"></i>
                        Focus
                    </a>
                    <a href="{{ route('profile.edit') }}" class="nav-item px-4 py-2 rounded-xl text-gray-300 hover:text-white transition-all">
                        <i class="ri-user-line mr-2"></i>
                        Profile
                    </a>
                    <form method="POST" action="{{ route('logout') }}" class="inline">
                        @csrf
                        <button type="submit" class="nav-item px-4 py-2 rounded-xl text-red-400 hover:text-red-300 transition-all">
                            <i class="ri-logout-box-r-line mr-2"></i>
                            Logout
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="pt-24 px-6 pb-12 min-h-screen flex items-center justify-center">
        <div class="max-w-4xl mx-auto w-full">
            <!-- Session Info -->
            <div class="glass-card rounded-2xl p-8 mb-8 text-center">
                <h2 class="text-3xl font-bold text-white mb-4">Focus Session</h2>
                <p class="text-lg text-gray-400">
                    {{ $session->focus_duration ?? 25 }} min focus • {{ $session->break_duration ?? 5 }} min break
                </p>
                @if($session->goals)
                    <div class="mt-4 p-4 bg-white/5 rounded-xl">
                        <p class="text-sm text-gray-400 mb-2">Session Goals:</p>
                        <p class="text-white">{{ $session->goals }}</p>
                    </div>
                @endif
            </div>

            <!-- Timer Display -->
            <div class="glass-card rounded-2xl p-12 mb-8">
                <div class="flex flex-col items-center">
                    <div class="timer-circle mb-8 pulse-animation">
                        <div class="text-center">
                            <div class="timer-display" id="timer">
                                {{ $session->focus_duration ?? 25 }}:00
                            </div>
                            <div class="text-xl text-gray-400 mt-2" id="session-type">
                                Focus Time
                            </div>
                        </div>
                    </div>

                    <!-- Controls -->
                    <div class="flex justify-center gap-4">
                        <button id="start-btn" 
                                onclick="startTimer()"
                                class="glow-button px-8 py-4 rounded-xl text-white font-semibold">
                            <i class="ri-play-line mr-2"></i>
                            Start
                        </button>
                        
                        <button id="pause-btn" 
                                onclick="pauseTimer()"
                                class="nav-item px-8 py-4 rounded-xl text-white font-medium hover:bg-white/10 hidden">
                            <i class="ri-pause-line mr-2"></i>
                            Pause
                        </button>
                        
                        <button id="reset-btn" 
                                onclick="resetTimer()"
                                class="nav-item px-8 py-4 rounded-xl text-gray-300 font-medium hover:text-white hover:bg-white/10">
                            <i class="ri-refresh-line mr-2"></i>
                            Reset
                        </button>
                    </div>
                </div>
            </div>

            <!-- Session Stats -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="glass-card rounded-2xl p-6 text-center">
                    <div class="w-12 h-12 rounded-xl bg-gradient-to-br from-green-500 to-emerald-600 flex items-center justify-center mx-auto mb-4">
                        <i class="ri-check-line text-white text-xl"></i>
                    </div>
                    <div class="text-2xl font-bold text-white mb-1">0</div>
                    <div class="text-sm text-gray-400">Sessions Completed</div>
                </div>

                <div class="glass-card rounded-2xl p-6 text-center">
                    <div class="w-12 h-12 rounded-xl bg-gradient-to-br from-blue-500 to-cyan-600 flex items-center justify-center mx-auto mb-4">
                        <i class="ri-time-line text-white text-xl"></i>
                    </div>
                    <div class="text-2xl font-bold text-white mb-1">0:00</div>
                    <div class="text-sm text-gray-400">Total Focus Time</div>
                </div>

                <div class="glass-card rounded-2xl p-6 text-center">
                    <div class="w-12 h-12 rounded-xl bg-gradient-to-br from-purple-500 to-indigo-600 flex items-center justify-center mx-auto mb-4">
                        <i class="ri-fire-line text-white text-xl"></i>
                    </div>
                    <div class="text-2xl font-bold text-white mb-1">0%</div>
                    <div class="text-sm text-gray-400">Productivity Score</div>
                </div>
            </div>

            <!-- Quick Actions -->
            <div class="flex justify-center mt-8">
                <a href="{{ route('focus-sessions.index') }}" class="nav-item px-6 py-3 rounded-xl text-gray-300 font-medium hover:text-white hover:bg-white/10">
                    <i class="ri-arrow-left-line mr-2"></i>
                    Back to Sessions
                </a>
            </div>
        </div>
    </main>

    <script>
        let timerInterval;
        let totalSeconds = {{ $session->focus_duration ?? 25 }} * 60;
        let currentSeconds = totalSeconds;
        let isRunning = false;
        let isBreak = false;

        function updateDisplay() {
            const minutes = Math.floor(currentSeconds / 60);
            const seconds = currentSeconds % 60;
            document.getElementById('timer').textContent = 
                `${minutes.toString().padStart(2, '0')}:${seconds.toString().padStart(2, '0')}`;
        }

        function startTimer() {
            if (!isRunning) {
                isRunning = true;
                document.getElementById('start-btn').classList.add('hidden');
                document.getElementById('pause-btn').classList.remove('hidden');
                
                timerInterval = setInterval(() => {
                    if (currentSeconds > 0) {
                        currentSeconds--;
                        updateDisplay();
                    } else {
                        // Timer finished
                        clearInterval(timerInterval);
                        isRunning = false;
                        
                        if (!isBreak) {
                            // Start break
                            isBreak = true;
                            currentSeconds = {{ $session->break_duration ?? 5 }} * 60;
                            document.getElementById('session-type').textContent = 'Break Time';
                            updateDisplay();
                            // Play notification sound
                            playNotification();
                        } else {
                            // Session completed
                            completeSession();
                        }
                    }
                }, 1000);
            }
        }

        function pauseTimer() {
            if (isRunning) {
                isRunning = false;
                clearInterval(timerInterval);
                document.getElementById('pause-btn').classList.add('hidden');
                document.getElementById('start-btn').classList.remove('hidden');
            }
        }

        function resetTimer() {
            isRunning = false;
            isBreak = false;
            clearInterval(timerInterval);
            currentSeconds = {{ $session->focus_duration ?? 25 }} * 60;
            document.getElementById('session-type').textContent = 'Focus Time';
            document.getElementById('pause-btn').classList.add('hidden');
            document.getElementById('start-btn').classList.remove('hidden');
            updateDisplay();
        }

        function completeSession() {
            document.getElementById('session-type').textContent = 'Session Complete!';
            document.getElementById('timer').textContent = '🎉';
            // Update stats and redirect
            setTimeout(() => {
                window.location.href = '{{ route('focus-sessions.index') }}';
            }, 3000);
        }

        function playNotification() {
            // Simple notification using Web Audio API
            const audioContext = new (window.AudioContext || window.webkitAudioContext)();
            const oscillator = audioContext.createOscillator();
            const gainNode = audioContext.createGain();
            
            oscillator.connect(gainNode);
            gainNode.connect(audioContext.destination);
            
            oscillator.frequency.value = 800;
            oscillator.type = 'sine';
            
            gainNode.gain.setValueAtTime(0.3, audioContext.currentTime);
            gainNode.gain.exponentialRampToValueAtTime(0.01, audioContext.currentTime + 0.5);
            
            oscillator.start(audioContext.currentTime);
            oscillator.stop(audioContext.currentTime + 0.5);
        }

        // Initialize display
        updateDisplay();
    </script>
</body>
</html>
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
