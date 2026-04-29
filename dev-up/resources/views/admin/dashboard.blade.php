<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DEV↑UP - Admin Dashboard</title>
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
            filter: blur(25px);
            opacity: 0.2;
        }
        
        .shape-1 {
            width: 250px;
            height: 250px;
            background: linear-gradient(135deg, #667eea, #764ba2);
            top: -125px;
            right: -125px;
            animation: float 8s ease-in-out infinite;
        }
        
        .shape-2 {
            width: 180px;
            height: 180px;
            background: linear-gradient(135deg, #f093fb, #f5576c);
            bottom: -90px;
            left: -90px;
            animation: float 12s ease-in-out infinite reverse;
        }
        
        @keyframes float {
            0%, 100% { transform: translateY(0px) rotate(0deg); }
            50% { transform: translateY(-15px) rotate(90deg); }
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
        
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
        }
        
        .stat-card {
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 16px;
            padding: 24px;
            text-align: center;
            transition: all 0.3s ease;
        }
        
        .stat-card:hover {
            background: rgba(255, 255, 255, 0.1);
            transform: translateY(-4px);
        }
        
        .stat-number {
            font-size: 36px;
            font-weight: bold;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            margin-bottom: 8px;
        }
        
        .stat-label {
            color: #9ca3af;
            font-size: 14px;
        }
    </style>
</head>
<body>
    <!-- Floating Background Shapes -->
    <div class="floating-shapes">
        <div class="shape shape-1"></div>
        <div class="shape shape-2"></div>
    </div>

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
                    <a href="{{ route('dashboard') }}" class="nav-item px-4 py-2 rounded-xl text-white hover:text-purple-300 transition-all">
                        <i class="ri-dashboard-line mr-2"></i>
                        Admin Dashboard
                    </a>
                    <a href="{{ route('challenges.index') }}" class="nav-item px-4 py-2 rounded-xl text-gray-300 hover:text-white transition-all">
                        <i class="ri-trophy-line mr-2"></i>
                        Challenges
                    </a>
                    <a href="{{ route('formateur.dashboard') }}" class="nav-item px-4 py-2 rounded-xl text-gray-300 hover:text-white transition-all">
                        <i class="ri-user-settings-line mr-2"></i>
                        Formateur Panel
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
    <main class="pt-24 px-6 pb-12">
        <div class="max-w-7xl mx-auto">
            <!-- Welcome Section -->
            <div class="glass-card rounded-2xl p-8 mb-8">
                <div class="flex items-center justify-between">
                    <div>
                        <h1 class="text-3xl font-bold text-white mb-2">
                            Welcome back, <span class="gradient-text">{{ Auth::user()->name }}</span>
                        </h1>
                        <p class="text-gray-400">Manage the entire DEV↑UP platform from here.</p>
                    </div>
                    <div class="text-right">
                        <div class="text-sm text-gray-500 mb-1">System Status</div>
                        <div class="text-2xl font-bold text-green-400">Online</div>
                    </div>
                </div>
            </div>

            <!-- Admin Stats Grid -->
            <div class="stats-grid mb-8">
                <div class="stat-card">
                    <div class="stat-number">4</div>
                    <div class="stat-label">Total Users</div>
                </div>

                <div class="stat-card">
                    <div class="stat-number">1</div>
                    <div class="stat-label">Formateurs</div>
                </div>

                <div class="stat-card">
                    <div class="stat-number">2</div>
                    <div class="stat-label">Apprenants</div>
                </div>

                <div class="stat-card">
                    <div class="stat-number">1</div>
                    <div class="stat-label">Admins</div>
                </div>
            </div>

            <!-- Quick Actions -->
            <div class="glass-card rounded-2xl p-8">
                <h2 class="text-xl font-semibold text-white mb-6">Admin Actions</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    <a href="{{ route('challenges.index') }}" class="nav-item p-6 rounded-xl text-white text-center hover:bg-white/10">
                        <i class="ri-trophy-line text-3xl mb-3"></i>
                        <div class="font-medium">Manage Challenges</div>
                        <div class="text-sm text-gray-400 mt-1">View and edit challenges</div>
                    </a>
                    <a href="{{ route('formateur.dashboard') }}" class="nav-item p-6 rounded-xl text-white text-center hover:bg-white/10">
                        <i class="ri-user-settings-line text-3xl mb-3"></i>
                        <div class="font-medium">Formateur Panel</div>
                        <div class="text-sm text-gray-400 mt-1">Access trainer features</div>
                    </a>
                    <a href="#" class="nav-item p-6 rounded-xl text-white text-center hover:bg-white/10">
                        <i class="ri-settings-3-line text-3xl mb-3"></i>
                        <div class="font-medium">System Settings</div>
                        <div class="text-sm text-gray-400 mt-1">Configure platform</div>
                    </a>
                    <a href="#" class="nav-item p-6 rounded-xl text-white text-center hover:bg-white/10">
                        <i class="ri-bar-chart-line text-3xl mb-3"></i>
                        <div class="font-medium">Analytics</div>
                        <div class="text-sm text-gray-400 mt-1">View platform stats</div>
                    </a>
                    <a href="#" class="nav-item p-6 rounded-xl text-white text-center hover:bg-white/10">
                        <i class="ri-user-add-line text-3xl mb-3"></i>
                        <div class="font-medium">User Management</div>
                        <div class="text-sm text-gray-400 mt-1">Manage all users</div>
                    </a>
                    <a href="#" class="nav-item p-6 rounded-xl text-white text-center hover:bg-white/10">
                        <i class="ri-notification-line text-3xl mb-3"></i>
                        <div class="font-medium">Notifications</div>
                        <div class="text-sm text-gray-400 mt-1">System alerts</div>
                    </a>
                </div>
            </div>
        </div>
    </main>
</body>
</html>
