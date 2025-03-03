<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $challenge->title }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <!-- Challenge Header -->
            <div class="bg-white overflow-hidden shadow rounded-lg mb-6">
                <div class="px-6 py-4 border-b border-gray-200">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center space-x-4">
                            <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium 
                                {{ $challenge->difficulty === 'facile' ? 'bg-green-100 text-green-800' : 
                                   ($challenge->difficulty === 'moyen' ? 'bg-yellow-100 text-yellow-800' : 
                                   'bg-red-100 text-red-800') }}">
                                {{ $challenge->difficulty }}
                            </span>
                            <div class="flex items-center text-sm text-gray-600">
                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                                </svg>
                                {{ $challenge->points }} points
                            </div>
                        </div>
                        
                        @if(!$userChallenge)
                            <form action="{{ route('challenges.start', $challenge->id) }}" method="POST" class="inline">
                                @csrf
                                <button type="submit" 
                                        class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z"></path>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                    Commencer le Challenge
                                </button>
                            </form>
                        @else
                            <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium 
                                {{ $userChallenge->status === 'en_cours' ? 'bg-yellow-100 text-yellow-800' : 
                                   ($userChallenge->status === 'termine' ? 'bg-green-100 text-green-800' : 
                                   'bg-red-100 text-red-800') }}">
                                {{ $userChallenge->status === 'en_cours' ? 'En cours' : 
                                   ($userChallenge->status === 'termine' ? 'Terminé' : 'Abandonné') }}
                            </span>
                        @endif
                    </div>
                </div>
                
                <div class="px-6 py-6">
                    <h3 class="text-lg font-medium text-gray-900 mb-4">Description</h3>
                    <div class="prose max-w-none text-gray-600">
                        <p>{{ $challenge->description }}</p>
                    </div>
                </div>
            </div>

            <!-- Submission Section -->
            @if($userChallenge && $userChallenge->status === 'en_cours')
                <div class="bg-white overflow-hidden shadow rounded-lg">
                    <div class="px-6 py-4 border-b border-gray-200">
                        <h3 class="text-lg font-medium text-gray-900">Soumettre votre Solution</h3>
                    </div>
                    
                    <form action="{{ route('challenges.submit', $challenge->id) }}" method="POST" class="p-6">
                        @csrf
                        
                        <div class="mb-4">
                            <label for="solution" class="block text-sm font-medium text-gray-700 mb-2">
                                Votre Solution
                            </label>
                            <textarea name="solution" 
                                      id="solution" 
                                      rows="10"
                                      required
                                      class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                                      placeholder="Écrivez votre solution ici...">{{ $submission->solution ?? '' }}</textarea>
                            <p class="mt-2 text-sm text-gray-500">
                                Décrivez votre solution, incluez votre code si nécessaire, et expliquez votre approche.
                            </p>
                        </div>

                        @if($submission)
                            <div class="mb-4 p-4 rounded-md 
                                {{ $submission->status === 'en_attente' ? 'bg-yellow-50 border border-yellow-200' : 
                                   ($submission->status === 'valide' ? 'bg-green-50 border border-green-200' : 
                                   'bg-red-50 border border-red-200') }}">
                                <div class="flex">
                                    <div class="flex-shrink-0">
                                        @if($submission->status === 'en_attente')
                                            <svg class="h-5 w-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd" />
                                            </svg>
                                        @elseif($submission->status === 'valide')
                                            <svg class="h-5 w-5 text-green-400" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                            </svg>
                                        @else
                                            <svg class="h-5 w-5 text-red-400" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd" />
                                            </svg>
                                        @endif
                                    </div>
                                    <div class="ml-3">
                                        <h3 class="text-sm font-medium 
                                            {{ $submission->status === 'en_attente' ? 'text-yellow-800' : 
                                               ($submission->status === 'valide' ? 'text-green-800' : 
                                               'text-red-800') }}">
                                            Statut: {{ $submission->status === 'en_attente' ? 'En attente de correction' : 
                                                   ($submission->status === 'valide' ? 'Validé' : 'Refusé') }}
                                        </h3>
                                        @if($submission->feedback)
                                            <div class="mt-2 text-sm 
                                                {{ $submission->status === 'en_attente' ? 'text-yellow-700' : 
                                                   ($submission->status === 'valide' ? 'text-green-700' : 
                                                   'text-red-700') }}">
                                                <p><strong>Feedback:</strong> {{ $submission->feedback }}</p>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @endif

                        <div class="flex justify-end">
                            <button type="submit" 
                                    class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"></path>
                                </svg>
                                Soumettre la Solution
                            </button>
                        </div>
                    </form>
                </div>
            @endif

            <!-- Tips Section -->
            <div class="mt-6 bg-blue-50 border-l-4 border-blue-400 p-4">
                <div class="flex">
                    <div class="flex-shrink-0">
                        <svg class="h-5 w-5 text-blue-400" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd" />
                        </svg>
                    </div>
                    <div class="ml-3">
                        <h3 class="text-sm font-medium text-blue-800">Conseils pour réussir</h3>
                        <div class="mt-2 text-sm text-blue-700">
                            <ul class="list-disc list-inside space-y-1">
                                <li>Lisez attentivement les exigences du challenge</li>
                                <li>Testez votre solution avec différents cas de figure</li>
                                <li>Commentez votre code pour expliquer votre logique</li>
                                <li>Soyez clair et concis dans votre explication</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
