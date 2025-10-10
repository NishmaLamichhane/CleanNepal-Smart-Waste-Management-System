<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Remix Icons -->
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.3.0/fonts/remixicon.css" rel="stylesheet" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Custom Tailwind Config -->
    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    colors: {
                        primary: {
                            50: '#eff6ff',
                            100: '#dbeafe',
                            500: '#3b82f6',
                            600: '#2563eb',
                            700: '#1d4ed8',
                            800: '#1e40af',
                            900: '#1e3a8a',
                        },
                        sidebar: {
                            light: '#f8fafc',
                            dark: '#1e293b',
                        }
                    },
                    fontFamily: {
                        sans: ['Figtree', 'sans-serif'],
                    },
                    animation: {
                        'float': 'float 3s ease-in-out infinite',
                        'slide-in': 'slide-in 0.3s ease-out',
                    },
                    keyframes: {
                        float: {
                            '0%, 100%': {
                                transform: 'translateY(0)'
                            },
                            '50%': {
                                transform: 'translateY(-10px)'
                            },
                        },
                        'slide-in': {
                            '0%': {
                                transform: 'translateX(-100%)'
                            },
                            '100%': {
                                transform: 'translateX(0)'
                            },
                        }
                    }
                }
            }
        }
    </script>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <script>
        // Theme initialization
        if (localStorage.getItem('color-theme') === 'dark' || (!('color-theme' in localStorage) && window.matchMedia(
                '(prefers-color-scheme: dark)').matches)) {
            document.documentElement.classList.add('dark');
        } else {
            document.documentElement.classList.remove('dark')
        }
    </script>
</head>

<body class="font-sans antialiased bg-slate-50 dark:bg-slate-900 transition-colors duration-300">
    <!-- Theme Toggle Button -->
    <div class="fixed z-50 right-4 top-5">
        <button id="theme-toggle" type="button"
            class="relative p-3 rounded-full bg-white dark:bg-slate-800 shadow-lg hover:shadow-xl transition-all duration-300 group">
            <span id="theme-toggle-dark-icon" class="hidden">
                <i class="ri-moon-fill text-xl text-slate-700 dark:text-slate-300 group-hover:rotate-12 transition-transform duration-300"></i>
            </span>
            <span id="theme-toggle-light-icon" class="hidden">
                <i class="ri-sun-fill text-xl text-yellow-500 group-hover:rotate-12 transition-transform duration-300"></i>
            </span>
            <span class="absolute inset-0 rounded-full border-2 border-transparent group-hover:border-primary-500 transition-colors duration-300"></span>
        </button>
    </div>

    <div class="flex h-screen overflow-hidden">
        <!-- Sidebar -->
        <aside class="w-64 h-full bg-gradient-to-b from-sidebar-light to-slate-100 dark:from-sidebar-dark dark:to-slate-800 shadow-xl flex flex-col transition-all duration-300 animate-slide-in">
            <!-- Logo Section -->
            <div class="p-6 flex flex-col items-center border-b border-slate-200 dark:border-slate-700">
                <div class="animate-float">
                    <div class="relative">
                        <img src="{{ asset('image/waste.jpg') }}" alt="Logo" class="w-28 h-28 rounded-2xl object-cover shadow-lg border-4 border-white dark:border-slate-700">
                        <div class="absolute -bottom-2 -right-2 bg-primary-500 text-white rounded-full w-8 h-8 flex items-center justify-center shadow-md">
                            <i class="ri-recycle-fill text-lg"></i>
                        </div>
                    </div>
                </div>
                <h1 class="mt-4 text-2xl font-bold text-slate-800 dark:text-white">CleanNepal</h1>
                <p class="text-sm text-slate-500 dark:text-slate-400 mt-1">Waste Management System</p>
            </div>

            <!-- Navigation Links -->
            <nav class="flex-1 overflow-y-auto py-4 px-3">
                <ul class="space-y-1">
                    <li>
                        <a href="{{ route('dashboard') }}"
                            class="nav-item flex items-center p-3 rounded-xl text-slate-700 dark:text-slate-200 hover:bg-primary-50 dark:hover:bg-slate-700 transition-all duration-300 group
               {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                            <span class="flex items-center justify-center w-10 h-10 rounded-lg bg-primary-100 dark:bg-primary-900/30 text-primary-600 dark:text-primary-400 mr-3 group-hover:scale-110 transition-transform">
                                <i class="ri-dashboard-fill text-xl"></i>
                            </span>
                            <span class="font-medium">Dashboard</span>
                            <span class="ml-auto bg-primary-500 text-white text-xs px-2 py-1 rounded-full">5</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('support.index') }}"
                            class="nav-item flex items-center p-3 rounded-xl text-slate-700 dark:text-slate-200 hover:bg-primary-50 dark:hover:bg-slate-700 transition-all duration-300 group
               {{ request()->routeIs('support.index') ? 'active' : '' }}">
                            <span class="flex items-center justify-center w-10 h-10 rounded-lg bg-purple-100 dark:bg-purple-900/30 text-purple-600 dark:text-purple-400 mr-3 group-hover:scale-110 transition-transform">
                                <i class="ri-service-fill text-xl"></i>
                            </span>
                            <span class="font-medium">Services</span>
                        </a>
                    </li>
                    <li>
                        <a href=""
                            class="nav-item flex items-center p-3 rounded-xl text-slate-700 dark:text-slate-200 hover:bg-primary-50 dark:hover:bg-slate-700 transition-all duration-300 group
               {{ request()->routeIs('blog.*') ? 'active' : '' }}">
                            <span class="flex items-center justify-center w-10 h-10 rounded-lg bg-green-100 dark:bg-green-900/30 text-green-600 dark:text-green-400 mr-3 group-hover:scale-110 transition-transform">
                                <i class="ri-article-fill text-xl"></i>
                            </span>
                            <span class="font-medium">Blog</span>
                        </a>
                    </li>
                    <li>
                        <a href=""
                            class="nav-item flex items-center p-3 rounded-xl text-slate-700 dark:text-slate-200 hover:bg-primary-50 dark:hover:bg-slate-700 transition-all duration-300 group
               {{ request()->routeIs('citizens.*') ? 'active' : '' }}">
                            <span class="flex items-center justify-center w-10 h-10 rounded-lg bg-amber-100 dark:bg-amber-900/30 text-amber-600 dark:text-amber-400 mr-3 group-hover:scale-110 transition-transform">
                                <i class="ri-group-fill text-xl"></i>
                            </span>
                            <span class="font-medium">Citizens</span>
                        </a>
                    </li>
                    <li>
                        <a href=""
                            class="nav-item flex items-center p-3 rounded-xl text-slate-700 dark:text-slate-200 hover:bg-primary-50 dark:hover:bg-slate-700 transition-all duration-300 group
               {{ request()->routeIs('collectors.*') ? 'active' : '' }}">
                            <span class="flex items-center justify-center w-10 h-10 rounded-lg bg-red-100 dark:bg-red-900/30 text-red-600 dark:text-red-400 mr-3 group-hover:scale-110 transition-transform">
                                <i class="ri-truck-fill text-xl"></i>
                            </span>
                            <span class="font-medium">Collectors</span>
                        </a>
                    </li>

                    <!-- Divider -->
                    <li class="pt-4 mt-4 border-t border-slate-200 dark:border-slate-700">
                        <a href=""
                            class="nav-item flex items-center p-3 rounded-xl text-slate-700 dark:text-slate-200 hover:bg-primary-50 dark:hover:bg-slate-700 transition-all duration-300 group
               {{ request()->routeIs('settings.*') ? 'active' : '' }}">
                            <span class="flex items-center justify-center w-10 h-10 rounded-lg bg-slate-100 dark:bg-slate-700 text-slate-600 dark:text-slate-400 mr-3 group-hover:scale-110 transition-transform">
                                <i class="ri-settings-3-fill text-xl"></i>
                            </span>
                            <span class="font-medium">Settings</span>
                        </a>
                    </li>
                </ul>
            </nav>


            <!-- User Profile & Logout -->
            <div class="p-4 border-t border-slate-200 dark:border-slate-700">
                <div class="flex items-center p-3 mb-3 rounded-xl bg-white dark:bg-slate-800 shadow-sm">
                    <div class="relative">
                        <img src="https://randomuser.me/api/portraits/men/1.jpg" alt="User" class="w-12 h-12 rounded-full">
                        <span class="absolute bottom-0 right-0 w-3 h-3 bg-green-500 rounded-full border-2 border-white dark:border-slate-800"></span>
                    </div>
                    <div class="ml-3 flex-1 min-w-0">
                        <p class="text-sm font-medium text-slate-800 dark:text-white truncate">Admin</p>
                        <p class="text-xs text-slate-500 dark:text-slate-400 truncate">admin@example.com</p>
                    </div>
                    <button class="text-slate-400 hover:text-slate-600 dark:hover:text-slate-300">
                        <i class="ri-arrow-right-s-line text-xl"></i>
                    </button>
                </div>

                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="flex items-center w-full p-3 rounded-xl bg-white dark:bg-slate-800 text-red-500 hover:bg-red-50 dark:hover:bg-red-900/20 transition-all duration-300 group">
                        <span class="flex items-center justify-center w-10 h-10 rounded-lg bg-red-100 dark:bg-red-900/30 text-red-600 dark:text-red-400 mr-3 group-hover:scale-110 transition-transform">
                            <i class="ri-logout-box-line text-xl"></i>
                        </span>
                        <span class="font-medium">Logout</span>
                    </button>
                </form>
            </div>
        </aside>

        <!-- Main Content -->
        <main class="flex-1 overflow-y-auto bg-slate-50 dark:bg-slate-900">
            <div class="p-6">
                @yield('content')
            </div>
        </main>
    </div>

    <script>
        // Theme toggle functionality
        const themeToggleDarkIcon = document.getElementById('theme-toggle-dark-icon');
        const themeToggleLightIcon = document.getElementById('theme-toggle-light-icon');
        const themeToggleBtn = document.getElementById('theme-toggle');

        // Set initial theme icons
        if (localStorage.getItem('color-theme') === 'dark' || (!('color-theme' in localStorage) && window.matchMedia(
                '(prefers-color-scheme: dark)').matches)) {
            themeToggleLightIcon.classList.remove('hidden');
        } else {
            themeToggleDarkIcon.classList.remove('hidden');
        }

        themeToggleBtn.addEventListener('click', function() {
            // Toggle icons
            themeToggleDarkIcon.classList.toggle('hidden');
            themeToggleLightIcon.classList.toggle('hidden');

            // Toggle theme
            if (localStorage.getItem('color-theme')) {
                if (localStorage.getItem('color-theme') === 'light') {
                    document.documentElement.classList.add('dark');
                    localStorage.setItem('color-theme', 'dark');
                } else {
                    document.documentElement.classList.remove('dark');
                    localStorage.setItem('color-theme', 'light');
                }
            } else {
                if (document.documentElement.classList.contains('dark')) {
                    document.documentElement.classList.remove('dark');
                    localStorage.setItem('color-theme', 'light');
                } else {
                    document.documentElement.classList.add('dark');
                    localStorage.setItem('color-theme', 'dark');
                }
            }
        });

        // Navigation active state
        document.querySelectorAll('.nav-item').forEach(item => {
            item.addEventListener('click', function(e) {
                // Prevent default if needed
                // e.preventDefault();

                // Remove active class from all items
                document.querySelectorAll('.nav-item').forEach(i => i.classList.remove('active'));

                // Add active class to clicked item
                this.classList.add('active');
            });
        });
    </script>

    <style>
        /* Active nav item styling */
        .nav-item.active {
            background-color: rgba(59, 130, 246, 0.1);
            border-left: 4px solid #3b82f6;
        }

        .dark .nav-item.active {
            background-color: rgba(59, 130, 246, 0.2);
        }

        /* Custom scrollbar */
        nav::-webkit-scrollbar {
            width: 6px;
        }

        nav::-webkit-scrollbar-track {
            background: transparent;
        }

        nav::-webkit-scrollbar-thumb {
            background: rgba(0, 0, 0, 0.1);
            border-radius: 3px;
        }

        .dark nav::-webkit-scrollbar-thumb {
            background: rgba(255, 255, 255, 0.1);
        }
    </style>
</body>

</html>