<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Timer de Focus
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow rounded-lg">
                <div class="p-6">
                    <!-- Session Info -->
                    <div class="mb-6 text-center">
                        <h3 class="text-lg font-medium text-gray-900 mb-2">Session de Focus</h3>
                        <div class="flex justify-center space-x-6 text-sm text-gray-600">
                            <span>Focus: {{ $session->focus_duration }} min</span>
                            <span>Pause: {{ $session->break_duration }} min</span>
                        </div>
                    </div>

                    <!-- Timer Display -->
                    <div class="text-center mb-8">
                        <div id="timer" class="text-6xl font-bold text-blue-600 mb-4">
                            {{ $session->focus_duration }}:00
                        </div>
                        <div id="session-type" class="text-lg font-medium text-gray-700">
                            Session de Focus
                        </div>
                    </div>

                    <!-- Controls -->
                    <div class="flex justify-center space-x-4 mb-8">
                        <button id="start-btn" 
                                onclick="startTimer()"
                                class="inline-flex items-center px-6 py-3 border border-transparent text-base font-medium rounded-md text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            Commencer
                        </button>
                        
                        <button id="pause-btn" 
                                onclick="pauseTimer()"
                                class="hidden inline-flex items-center px-6 py-3 border border-transparent text-base font-medium rounded-md text-white bg-yellow-600 hover:bg-yellow-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-yellow-500">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 9v6m4-6v6m7-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            Pause
                        </button>
                        
                        <button id="resume-btn" 
                                onclick="resumeTimer()"
                                class="hidden inline-flex items-center px-6 py-3 border border-transparent text-base font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            Reprendre
                        </button>
                        
                        <button id="reset-btn" 
                                onclick="resetTimer()"
                                class="hidden inline-flex items-center px-6 py-3 border border-gray-300 text-base font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path>
                            </svg>
                            Réinitialiser
                        </button>
                    </div>

                    <!-- Progress Bar -->
                    <div class="mb-8">
                        <div class="bg-gray-200 rounded-full h-3">
                            <div id="progress-bar" class="bg-blue-600 h-3 rounded-full transition-all duration-1000" style="width: 0%"></div>
                        </div>
                    </div>

                    <!-- Motivational Message -->
                    <div class="bg-blue-50 border-l-4 border-blue-400 p-4 mb-6">
                        <div class="flex">
                            <div class="flex-shrink-0">
                                <svg class="h-5 w-5 text-blue-400" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd" />
                                </svg>
                            </div>
                            <div class="ml-3">
                                <h3 class="text-sm font-medium text-blue-800">
                                    Conseil de Productivité
                                </h3>
                                <div class="mt-2 text-sm text-blue-700">
                                    <p id="motivation-message">Concentrez-vous sur une seule tâche pendant cette session. Évitez les distractions!</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Complete Session Button -->
                    <div class="text-center">
                        <form action="{{ route('focus-sessions.complete', $session->id) }}" method="POST" class="inline">
                            @csrf
                            <button type="submit" 
                                    id="complete-btn"
                                    class="hidden inline-flex items-center px-6 py-3 border border-transparent text-base font-medium rounded-md text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500"
                                    onclick="return confirm('Félicitations! Voulez-vous marquer cette session comme terminée et gagner vos points?')">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                Terminer et Gagner des Points
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        let focusDuration = {{ $session->focus_duration }};
        let breakDuration = {{ $session->break_duration }};
        let currentTime = focusDuration * 60; // Convert to seconds
        let isRunning = false;
        let isPaused = false;
        let isBreak = false;
        let interval;

        const timerDisplay = document.getElementById('timer');
        const sessionTypeDisplay = document.getElementById('session-type');
        const startBtn = document.getElementById('start-btn');
        const pauseBtn = document.getElementById('pause-btn');
        const resumeBtn = document.getElementById('resume-btn');
        const resetBtn = document.getElementById('reset-btn');
        const completeBtn = document.getElementById('complete-btn');
        const progressBar = document.getElementById('progress-bar');
        const motivationMessage = document.getElementById('motivation-message');

        const motivations = [
            "Concentrez-vous sur une seule tâche pendant cette session. Évitez les distractions!",
            "Vous êtes capable de grandes choses! Continuez comme ça!",
            "Chaque minute de concentration vous rapproche de vos objectifs.",
            "La discipline est la clé du succès en programmation.",
            "Restez concentré, les résultats viendront avec la persévérance.",
            "Pensez à la satisfaction de terminer cette session!",
            "Votre futur vous remercie pour cet effort présent.",
            "La concentration est un muscle qui se développe avec la pratique."
        ];

        function updateDisplay() {
            const minutes = Math.floor(currentTime / 60);
            const seconds = currentTime % 60;
            timerDisplay.textContent = `${minutes.toString().padStart(2, '0')}:${seconds.toString().padStart(2, '0')}`;
            
            const totalTime = isBreak ? breakDuration * 60 : focusDuration * 60;
            const elapsed = totalTime - currentTime;
            const progress = (elapsed / totalTime) * 100;
            progressBar.style.width = `${progress}%`;
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
                        // Session finished
                        clearInterval(interval);
                        isRunning = false;
                        
                        if (!isBreak) {
                            // Focus session finished, start break
                            alert('Session de focus terminée! Prenez une pause bien méritée.');
                            startBreak();
                        } else {
                            // Break finished
                            alert('Pause terminée! Prêt pour une nouvelle session de focus?');
                            startNewFocusSession();
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
                resumeBtn.classList.remove('hidden');
            }
        }

        function resumeTimer() {
            if (isPaused) {
                isPaused = false;
                resumeBtn.classList.add('hidden');
                pauseBtn.classList.remove('hidden');
                startTimer();
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
            resumeBtn.classList.add('hidden');
            resetBtn.classList.add('hidden');
            completeBtn.classList.add('hidden');
            
            sessionTypeDisplay.textContent = 'Session de Focus';
            progressBar.style.width = '0%';
        }

        function startBreak() {
            isBreak = true;
            currentTime = breakDuration * 60;
            sessionTypeDisplay.textContent = 'Pause';
            progressBar.classList.remove('bg-blue-600');
            progressBar.classList.add('bg-green-600');
            updateDisplay();
            
            motivationMessage.textContent = "Détendez-vous! Une bonne pause vous aidera à être plus productif ensuite.";
        }

        function startNewFocusSession() {
            isBreak = false;
            currentTime = focusDuration * 60;
            sessionTypeDisplay.textContent = 'Session de Focus';
            progressBar.classList.remove('bg-green-600');
            progressBar.classList.add('bg-blue-600');
            updateDisplay();
            
            // Change motivation message
            const randomMotivation = motivations[Math.floor(Math.random() * motivations.length)];
            motivationMessage.textContent = randomMotivation;
        }

        function showCompleteButton() {
            if (!isBreak && currentTime === 0) {
                completeBtn.classList.remove('hidden');
            }
        }

        // Initialize display
        updateDisplay();

        // Update motivation message every 30 seconds
        setInterval(() => {
            if (isRunning && !isBreak) {
                const randomMotivation = motivations[Math.floor(Math.random() * motivations.length)];
                motivationMessage.textContent = randomMotivation;
            }
        }, 30000);
    </script>
</x-app-layout>
