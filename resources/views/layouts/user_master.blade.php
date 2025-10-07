<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CleanNepal - Smart Waste Management</title>
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.3.0/fonts/remixicon.css" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        :root {
            --primary-green: #2E7D32;
            --light-green: #81C784;
            --dark-green: #1B5E20;
            --accent-green: #4CAF50;
            --earth-brown: #5D4037;
            --leaf-bg: rgba(129, 199, 132, 0.1);
        }
        
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #0a4d0d 0%, #1a5e1f 50%, #2d7d32 100%);
            min-height: 100vh;
        }
        
        .nav-glass {
            background: rgba(13, 54, 17, 0.9);
            backdrop-filter: blur(10px);
            border-bottom: 1px solid rgba(129, 199, 132, 0.2);
        }
        
        .hero-container {
            background: linear-gradient(135deg, #0a4d0d 0%, #1a5e1f 50%, #2d7d32 100%);
            position: relative;
            overflow: hidden;
        }
        
        .hero-plant {
            position: absolute;
            right: 10%;
            top: 20%;
            width: 300px;
            height: 400px;
            background-image: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 200 300"><defs><radialGradient id="soil" cx="50%" cy="90%" r="60%"><stop offset="0%" stop-color="%23654321"/><stop offset="100%" stop-color="%233e2723"/></radialGradient><linearGradient id="leaf1" x1="0%" y1="0%" x2="100%" y2="100%"><stop offset="0%" stop-color="%23c8e6c9"/><stop offset="50%" stop-color="%2381c784"/><stop offset="100%" stop-color="%234caf50"/></linearGradient><linearGradient id="leaf2" x1="0%" y1="0%" x2="100%" y2="100%"><stop offset="0%" stop-color="%23a5d6a7"/><stop offset="50%" stop-color="%2366bb6a"/><stop offset="100%" stop-color="%232e7d32"/></linearGradient></defs><ellipse cx="100" cy="270" rx="80" ry="25" fill="url(%23soil)"/><rect x="95" y="180" width="10" height="90" fill="%23388e3c"/><ellipse cx="80" cy="160" rx="25" ry="15" fill="url(%23leaf1)" transform="rotate(-20 80 160)"/><ellipse cx="120" cy="140" rx="30" ry="18" fill="url(%23leaf2)" transform="rotate(25 120 140)"/><ellipse cx="100" cy="120" rx="28" ry="16" fill="url(%23leaf1)" transform="rotate(5 100 120)"/></svg>');
            background-repeat: no-repeat;
            background-size: contain;
        }
        
        .rolling-text {
            animation: scroll-left 20s linear infinite;
            white-space: nowrap;
        }
        
        @keyframes scroll-left {
            0% { transform: translateX(100%); }
            100% { transform: translateX(-100%); }
        }
        
        .floating {
            animation: float 3s ease-in-out infinite;
        }
        
        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-10px); }
        }    
    </style>
</head>

<body>
    <!-- Navigation -->
    <nav class="nav-glass fixed w-full top-0 z-50 py-4 px-6">
        <div class="container mx-auto flex items-center justify-between">
            <div class="flex items-center space-x-3">
                <div class="w-10 h-10 bg-green-500 rounded-full flex items-center justify-center">
                    <i class="ri-leaf-line text-white text-xl"></i>
                </div>
                <span class="text-white font-bold text-xl">CleanNepal</span>
            </div>
            
            <div class="hidden md:flex items-center space-x-8">
                <a href="#" class="text-white hover:text-green-300 transition">Home</a>
                <a href="#" class="text-white hover:text-green-300 transition">About</a>
                <a href="{{route('pickup_request.services')}}" class="text-white hover:text-green-300 transition">Services</a>
                <a href="#" class="text-white hover:text-green-300 transition">Pages</a>
                <a href="#" class="text-white hover:text-green-300 transition">Blog</a>
                <a href="#" class="text-white hover:text-green-300 transition">Contact</a>
                <a href="{{route('login')}}" class="eco-btn" ><i class="ri-login-box-line text-white"></i>
                    Get Started
                </a>
            </div>
            
            <div class="md:hidden">
                <i class="ri-menu-line text-white text-2xl"></i>
            </div>
        </div>
    </nav>
<div class="mt-16 ">
    @yield('content')

    <!-- Footer -->
    <footer class="bg-gray-900 text-white py-12">
        <div class="container mx-auto px-6">
            <div class="grid md:grid-cols-3 gap-8">
                <div>
                    <div class="flex items-center space-x-3 mb-6">
                        <div class="w-10 h-10 bg-green-500 rounded-full flex items-center justify-center">
                            <i class="ri-leaf-line text-white text-xl"></i>
                        </div>
                        <span class="font-bold text-xl">CleanNepal</span>
                    </div>
                    <p class="text-gray-400 mb-6">We're revolutionizing waste management in Nepal through smart technology and community engagement.</p>
                    <div class="flex space-x-4">
                        <a href="#" class="w-10 h-10 bg-green-600 rounded-full flex items-center justify-center hover:bg-green-700 transition">
                            <i class="ri-facebook-fill"></i>
                        </a>
                        <a href="#" class="w-10 h-10 bg-green-600 rounded-full flex items-center justify-center hover:bg-green-700 transition">
                            <i class="ri-instagram-line"></i>
                        </a>
                        <a href="#" class="w-10 h-10 bg-green-600 rounded-full flex items-center justify-center hover:bg-green-700 transition">
                            <i class="ri-twitter-x-line"></i>
                        </a>
                    </div>
                </div>
                
                <div>
                    <h3 class="font-bold text-lg mb-6">Contact Info</h3>
                    <div class="space-y-3">
                        <div class="flex items-center space-x-3">
                            <i class="ri-map-pin-line text-green-500"></i>
                            <span class="text-gray-400">Chitwan, Nepal</span>
                        </div>
                        <div class="flex items-center space-x-3">
                            <i class="ri-phone-line text-green-500"></i>
                            <span class="text-gray-400">+977 9865162745</span>
                        </div>
                        <div class="flex items-center space-x-3">
                            <i class="ri-mail-line text-green-500"></i>
                            <span class="text-gray-400">nishmalamichhane2005@gmail.com</span>
                        </div>
                    </div>
                </div>
                
                <div>
                    <h3 class="font-bold text-lg mb-6">Quick Links</h3>
                    <div class="space-y-2">
                        <a href="#" class="block text-gray-400 hover:text-green-500 transition">About Us</a>
                        <a href="#" class="block text-gray-400 hover:text-green-500 transition">Our Services</a>
                        <a href="#" class="block text-gray-400 hover:text-green-500 transition">Contact</a>
                        <a href="#" class="block text-gray-400 hover:text-green-500 transition">Blog</a>
                    </div>
                </div>
            </div>
            
            <div class="border-t border-gray-800 mt-8 pt-6 text-center text-gray-400">
                <p>&copy; 2025 CleanNepal | By: Nishma Lamichhane. All rights reserved. Making Nepal cleaner, one initiative at a time.</p>
            </div>
        </div>
    </footer>
</body>

</html>