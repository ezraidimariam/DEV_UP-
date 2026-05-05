<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DEV↑UP - Admin Challenges Management</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@400;500;600;700&display=swap" rel="stylesheet">
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
        
        .nav-item {
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(255, 255, 255, 0.1);
        }
        
        .btn-primary {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border: none;
            color: white;
            padding: 8px 16px;
            border-radius: 8px;
            font-weight: 500;
            cursor: pointer;
        }
        
        .btn-danger {
            background: linear-gradient(135deg, #dc2626 0%, #7f1d1d 100%);
            border: none;
            color: white;
            padding: 8px 16px;
            border-radius: 8px;
            font-weight: 500;
            cursor: pointer;
        }
        
        .btn-secondary {
            background: rgba(255, 255, 255, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.2);
            color: white;
            padding: 8px 16px;
            border-radius: 8px;
            font-weight: 500;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <!-- Navigation Header -->
    <nav class="fixed top-0 left-0 right-0 z-50 glass-card border-b border-white/10">
        <div class="max-w-7xl mx-auto px-6 py-4">
            <div class="flex items-center justify-between">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 rounded-xl bg-gradient-to-br from-red-500 to-pink-600 flex items-center justify-center">
                        <i class="ri-shield-check-line text-white text-lg"></i>
                    </div>
                    <h1 class="brand-font text-2xl font-black gradient-text">DEV↑UP Admin</h1>
                </div>
                
                <div class="flex items-center gap-6">
                    <a href="{{ route('admin.dashboard') }}" class="nav-item px-4 py-2 rounded-xl text-white">
                        <i class="ri-dashboard-line mr-2"></i>
                        Admin Dashboard
                    </a>
                    <a href="{{ route('admin.challenges') }}" class="nav-item px-4 py-2 rounded-xl text-white">
                        <i class="ri-trophy-line mr-2"></i>
                        Challenges
                    </a>
                    <a href="{{ route('formateur.dashboard') }}" class="nav-item px-4 py-2 rounded-xl text-gray-300">
                        <i class="ri-user-settings-line mr-2"></i>
                        Formateur Panel
                    </a>
                    <form method="POST" action="{{ route('logout') }}" class="inline">
                        @csrf
                        <button type="submit" class="nav-item px-4 py-2 rounded-xl text-red-400">
                            <i class="ri-logout-box-r-line mr-2"></i>
                            Logout
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="max-w-7xl mx-auto px-6 py-20">
        <!-- Header -->
        <div class="mb-8">
            <div class="flex items-center justify-between">
                <div>
                    <h1 class="brand-font text-4xl font-bold gradient-text mb-2">Challenges Management</h1>
                    <p class="text-gray-400">Create, edit, and manage all challenges</p>
                </div>
                <a href="{{ route('admin.challenges.create') }}" class="btn-primary px-6 py-3 rounded-lg">
                    <i class="ri-add-line mr-2"></i>
                    Create New Challenge
                </a>
            </div>
        </div>

        <!-- Search and Filters -->
        <div class="glass-card rounded-2xl p-6 mb-8">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                <input type="text" placeholder="Search challenges..." class="bg-gray-800 text-white px-4 py-2 rounded-lg border border-gray-700 focus:border-purple-500 focus:outline-none">
                <select class="bg-gray-800 text-white px-4 py-2 rounded-lg border border-gray-700 focus:border-purple-500 focus:outline-none">
                    <option value="">All Categories</option>
                    <option value="programming">Programming</option>
                    <option value="design">Design</option>
                    <option value="database">Database</option>
                </select>
                <select class="bg-gray-800 text-white px-4 py-2 rounded-lg border border-gray-700 focus:border-purple-500 focus:outline-none">
                    <option value="">All Difficulties</option>
                    <option value="easy">Easy</option>
                    <option value="medium">Medium</option>
                    <option value="hard">Hard</option>
                </select>
                <select class="bg-gray-800 text-white px-4 py-2 rounded-lg border border-gray-700 focus:border-purple-500 focus:outline-none">
                    <option value="">All Status</option>
                    <option value="active">Active</option>
                    <option value="inactive">Inactive</option>
                </select>
            </div>
        </div>

        <!-- Challenges Table -->
        <div class="glass-card rounded-2xl overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead class="bg-gray-800/50 border-b border-gray-700">
                        <tr class="text-left">
                            <th class="px-6 py-4 text-xs font-medium text-gray-400 uppercase tracking-wider">Challenge</th>
                            <th class="px-6 py-4 text-xs font-medium text-gray-400 uppercase tracking-wider">Category</th>
                            <th class="px-6 py-4 text-xs font-medium text-gray-400 uppercase tracking-wider">Difficulty</th>
                            <th class="px-6 py-4 text-xs font-medium text-gray-400 uppercase tracking-wider">Points</th>
                            <th class="px-6 py-4 text-xs font-medium text-gray-400 uppercase tracking-wider">Status</th>
                            <th class="px-6 py-4 text-xs font-medium text-gray-400 uppercase tracking-wider">Created</th>
                            <th class="px-6 py-4 text-xs font-medium text-gray-400 uppercase tracking-wider">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-700">
                        @forelse($challenges as $challenge)
                            <tr class="hover:bg-gray-800/30">
                                <td class="px-6 py-4">
                                    <div class="flex items-center">
                                        <div class="w-10 h-10 rounded-lg bg-gradient-to-br from-purple-500 to-indigo-600 flex items-center justify-center mr-3">
                                            <i class="ri-code-s-slash-line text-white"></i>
                                        </div>
                                        <div>
                                            <div class="font-medium text-white">{{ $challenge->title }}</div>
                                            <div class="text-sm text-gray-400">{{ Str::limit($challenge->description, 50) }}</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <span class="px-2 py-1 text-xs rounded-full bg-blue-500/20 text-blue-400">
                                        {{ $challenge->category }}
                                    </span>
                                </td>
                                <td class="px-6 py-4">
                                    <span class="px-2 py-1 text-xs rounded-full 
                                        @if($challenge->difficulty == 'easy') bg-green-500/20 text-green-400
                                        @elseif($challenge->difficulty == 'medium') bg-yellow-500/20 text-yellow-400
                                        @else bg-red-500/20 text-red-400 @endif">
                                        {{ $challenge->difficulty }}
                                    </span>
                                </td>
                                <td class="px-6 py-4">
                                    <span class="text-purple-400 font-medium">{{ $challenge->points }}</span>
                                </td>
                                <td class="px-6 py-4">
                                    <span class="px-2 py-1 text-xs rounded-full 
                                        @if($challenge->status == 'active') bg-green-500/20 text-green-400
                                        @else bg-gray-500/20 text-gray-400 @endif">
                                        {{ $challenge->status ?? 'active' }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 text-gray-300">
                                    {{ $challenge->created_at->format('M d, Y') }}
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex items-center gap-2">
                                        <a href="{{ route('admin.challenges.edit', $challenge) }}" class="btn-secondary px-3 py-1 rounded text-sm">
                                            <i class="ri-edit-line"></i>
                                        </a>
                                        <form method="POST" action="{{ route('admin.challenges.delete', $challenge) }}" onsubmit="return confirm('Are you sure you want to delete this challenge?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn-danger px-3 py-1 rounded text-sm">
                                                <i class="ri-delete-bin-line"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="px-6 py-12 text-center text-gray-400">
                                    <div class="flex flex-col items-center">
                                        <i class="ri-trophy-line text-4xl mb-4 text-gray-500"></i>
                                        <h3 class="text-xl font-semibold mb-2">No Challenges Found</h3>
                                        <p class="text-gray-400 mb-4">Get started by creating your first challenge</p>
                                        <a href="{{ route('admin.challenges.create') }}" class="btn-primary px-6 py-3 rounded-lg">
                                            <i class="ri-add-line mr-2"></i>
                                            Create First Challenge
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Pagination -->
        @if($challenges->hasPages())
            <div class="mt-8 flex justify-center">
                <div class="flex gap-2">
                    {{ $challenges->links() }}
                </div>
            </div>
        @endif
    </main>
</body>
</html>
