<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Challenges
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Filter Tabs -->
            <div class="mb-6 border-b border-gray-200">
                <nav class="-mb-px flex space-x-8">
                    <a href="{{ route('challenges.index') }}" 
                       class="whitespace-nowrap py-2 px-1 border-b-2 border-blue-500 font-medium text-sm text-blue-600">
                        Tous les Challenges
                    </a>
                    <a href="{{ route('challenges.my') }}" 
                       class="whitespace-nowrap py-2 px-1 border-b-2 border-transparent font-medium text-sm text-gray-500 hover:text-gray-700 hover:border-gray-300">
                        Mes Challenges
                    </a>
                </nav>
            </div>

            <!-- Challenges Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($challenges as $challenge)
                    <div class="bg-white overflow-hidden shadow rounded-lg hover:shadow-lg transition-shadow duration-300">
                        <div class="p-6">
                            <div class="flex items-center justify-between mb-4">
                                <h3 class="text-lg font-medium text-gray-900">{{ $challenge->title }}</h3>
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium 
                                    {{ $challenge->difficulty === 'facile' ? 'bg-green-100 text-green-800' : 
                                       ($challenge->difficulty === 'moyen' ? 'bg-yellow-100 text-yellow-800' : 
                                       'bg-red-100 text-red-800') }}">
                                    {{ $challenge->difficulty }}
                                </span>
                            </div>
                            
                            <p class="text-gray-600 text-sm mb-4">
                                {{ Str::limit($challenge->description, 100) }}
                            </p>
                            
                            <div class="flex items-center justify-between">
                                <div class="flex items-center text-sm text-gray-500">
                                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                                    </svg>
                                    {{ $challenge->points }} pts
                                </div>
                                
                                @if(in_array($challenge->id, $userChallengeIds))
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                                        En cours
                                    </span>
                                @else
                                    <a href="{{ route('challenges.start', $challenge->id) }}" 
                                       class="inline-flex items-center px-3 py-1 border border-transparent text-xs font-medium rounded text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                                        Commencer
                                    </a>
                                @endif
                            </div>
                        </div>
                        
                        <div class="bg-gray-50 px-6 py-3">
                            <a href="{{ route('challenges.show', $challenge->id) }}" 
                               class="text-sm font-medium text-blue-600 hover:text-blue-900">
                                Voir les détails →
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Pagination -->
            <div class="mt-8">
                {{ $challenges->links() }}
            </div>
        </div>
    </div>
</x-app-layout>
