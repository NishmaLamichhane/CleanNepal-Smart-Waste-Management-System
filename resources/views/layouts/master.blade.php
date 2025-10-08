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
        
        .glass-card {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.3);
            border-radius: 20px;
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1);
        }
        
        .service-card {
            background: white;
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }
        
        .service-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.2);
        }
        
        .service-icon {
            width: 80px;
            height: 80px;
            background: linear-gradient(135deg, #4caf50, #2e7d32);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto;
            color: white;
            font-size: 32px;
            box-shadow: 0 5px 15px rgba(76, 175, 80, 0.3);
        }
        
        .progress-bar {
            background: #e8f5e8;
            border-radius: 10px;
            overflow: hidden;
            height: 8px;
        }
        
        .progress-fill {
            height: 100%;
            background: linear-gradient(90deg, #4caf50, #2e7d32);
            border-radius: 10px;
            transition: width 2s ease-in-out;
        }
        
        .planet-container {
            position: relative;
            width: 300px;
            height: 300px;
            margin: 0 auto;
        }
        
        .planet-bg {
            width: 250px;
            height: 250px;
            border-radius: 50%;
            background: linear-gradient(135deg, #1a1a2e, #16213e);
            position: absolute;
            top: 25px;
            left: 25px;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.3);
        }
        
        .planet-hands {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            font-size: 60px;
            color: #f4d03f;
        }
        
        .planet-badge {
            position: absolute;
            top: -10px;
            right: 20px;
            background: #4caf50;
            color: white;
            padding: 5px 15px;
            border-radius: 15px;
            font-size: 12px;
            font-weight: bold;
            transform: rotate(15deg);
        }
        
        .eco-btn {
            background: linear-gradient(135deg, #4caf50, #2e7d32);
            color: white;
            border: none;
            padding: 12px 30px;
            border-radius: 25px;
            font-weight: 600;
            transition: all 0.3s ease;
            cursor: pointer;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 8px;
        }
        
        .eco-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(76, 175, 80, 0.3);
        }
        
        .stat-number {
            font-size: 2.5rem;
            font-weight: bold;
            color: #2e7d32;
            line-height: 1;
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

    <!-- Hero Section -->
    <section class="hero-container min-h-screen flex items-center relative pt-20">
        <div class="hero-plant floating"></div>
        
        <div class="container mx-auto px-6 grid md:grid-cols-2 gap-12 items-center">
            <div class="text-white">
                <p class="text-green-300 mb-4 uppercase tracking-wide">Natural Environment</p>
                <h1 class="text-5xl md:text-6xl font-bold mb-6 leading-tight">
                    Be Safe Controls<br>
                    <span class="text-green-300">Environment</span>
                </h1>
                <p class="text-lg mb-8 text-gray-200 max-w-lg">
                    Professionally optimize interdependent intellectual capital without excellent best practices. Progressively facilitate extensible thinking.
                </p>
                <div class="flex space-x-4">
                    <button class="eco-btn">
                        <i class="ri-play-fill"></i>
                        Let's See It
                    </button>
                    <button class="border border-white text-white px-8 py-3 rounded-full hover:bg-white hover:text-green-800 transition">
                        Read More
                    </button>
                </div>
            </div>
        </div>
    </section>

    <!-- Rolling Services Banner -->
    <div class="bg-green-500 py-4 overflow-hidden">
        <div class="rolling-text text-white font-semibold text-lg flex items-center space-x-8">
            <span class="flex items-center"><i class="ri-recycle-line mr-2"></i> Ocean-Recycling</span>
            <span class="flex items-center"><i class="ri-leaf-line mr-2"></i> Environmental</span>
            <span class="flex items-center"><i class="ri-flashlight-line mr-2"></i> Renewable-Energy</span>
            <span class="flex items-center"><i class="ri-recycle-line mr-2"></i> Ocean-Recycling</span>
            <span class="flex items-center"><i class="ri-leaf-line mr-2"></i> Environmental</span>
        </div>
    </div>

    <!-- Content Section -->
    <section class="py-20 bg-gray-50">
        <div class="container mx-auto px-6">
            <div class="grid md:grid-cols-2 gap-16 items-center mb-20">
                <div class="glass-card p-8">
                    <img src="https://images.unsplash.com/photo-1441974231531-c6227db76b6e?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" 
                         alt="Environmental" 
                         class="w-full h-64 object-cover rounded-xl mb-6">
                    <div class="bg-green-800 text-white px-4 py-2 rounded-lg inline-block">
                        <i class="ri-award-line mr-2"></i> AWARD WINNING
                    </div>
                </div>
                
                <div>
                    <p class="text-green-600 uppercase tracking-wide mb-4">Target Driven</p>
                    <h2 class="text-4xl font-bold text-gray-800 mb-6">
                        Environmental Sustainable<br>
                        Forever <span class="text-green-600">Green Future</span>
                    </h2>
                    
                    <div class="space-y-6">
                        <div class="flex items-start space-x-4">
                            <div class="w-12 h-12 bg-green-100 rounded-full flex items-center justify-center flex-shrink-0">
                                <i class="ri-coins-line text-green-600 text-xl"></i>
                            </div>
                            <div>
                                <h4 class="font-semibold text-gray-800 mb-2">Economic Benefits</h4>
                                <p class="text-gray-600">Alternative innovation to ethical network environmental phosfluorescently cultivated.</p>
                            </div>
                        </div>
                        
                        <div class="flex items-start space-x-4">
                            <div class="w-12 h-12 bg-green-100 rounded-full flex items-center justify-center flex-shrink-0">
                                <i class="ri-shield-check-line text-green-600 text-xl"></i>
                            </div>
                            <div>
                                <h4 class="font-semibold text-gray-800 mb-2">Safe Environment</h4>
                                <p class="text-gray-600">Alternative innovation to ethical network environmental phosfluorescently cultivated.</p>
                            </div>
                        </div>
                    </div>
                    
                    <button class="eco-btn mt-8">
                        <i class="ri-arrow-right-line"></i>
                        More About Us
                    </button>
                </div>
            </div>
        </div>
    </section>

    <!-- Services Section -->
    <section class="py-20 bg-white">
        <div class="container mx-auto px-6">
            <div class="text-center mb-16">
                <p class="text-green-600 uppercase tracking-wide mb-4">Our Services</p>
                <h2 class="text-4xl font-bold text-gray-800">
                    CleanNepal Provide Environment<br>
                    <span class="text-green-600">Best Leading Services</span>
                </h2>
            </div>
            
            <div class="grid md:grid-cols-3 gap-8">
                <div class="service-card p-8 text-center">
                    <div class="service-icon mb-6">
                        <i class="ri-recycle-line"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mb-4">Dirty Recycling</h3>
                    <p class="text-gray-600 mb-6">Alternative innovation to ethical network environmental phosfluorescently cultivated with business data.</p>
                    <img src="https://images.unsplash.com/photo-1532996122724-e3c354a0b15b?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80" 
                         alt="Recycling" 
                         class="w-full h-32 object-cover rounded-lg">
                </div>
                
                <div class="service-card p-8 text-center">
                    <div class="service-icon mb-6">
                        <i class="ri-shield-check-line"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mb-4">Safe Environment</h3>
                    <p class="text-gray-600 mb-6">Alternative innovation to ethical network environmental phosfluorescently cultivated with business data.</p>
                    <img src="https://images.unsplash.com/photo-1441974231531-c6227db76b6e?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80" 
                         alt="Safe Environment" 
                         class="w-full h-32 object-cover rounded-lg">
                </div>
                
                <div class="service-card p-8 text-center">
                    <div class="service-icon mb-6">
                        <i class="ri-water-flash-line"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mb-4">Cleaning Ocean</h3>
                    <p class="text-gray-600 mb-6">Alternative innovation to ethical network environmental phosfluorescently cultivated with business data.</p>
                    <img src="https://images.unsplash.com/photo-1583212292454-1fe6229603b7?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80" 
                         alt="Ocean Cleaning" 
                         class="w-full h-32 object-cover rounded-lg">
                </div>
            </div>
        </div>
    </section>

    <!-- Bottom Section -->
    <section class="py-20 bg-gray-50">
        <div class="container mx-auto px-6">
            <div class="grid md:grid-cols-2 gap-16 items-center">
                <div>
                    <p class="text-green-600 uppercase tracking-wide mb-4">Our Future</p>
                    <h2 class="text-4xl font-bold text-gray-800 mb-8">
                        Getting A Greener Future<br>
                        <span class="text-green-600">Safe Environment</span>
                    </h2>
                    <p class="text-gray-600 mb-8">
                        Competently visualize highly efficient manufactured products and enabled data. Dynamically target intellectual capital for customized technologies.
                    </p>
                    
                    <div class="space-y-6">
                        <div class="flex items-center space-x-4">
                            <div class="w-8 h-8 bg-green-500 rounded-full flex items-center justify-center">
                                <i class="ri-check-line text-white"></i>
                            </div>
                            <span class="font-medium text-gray-800">Safe Environment</span>
                        </div>
                        
                        <div class="space-y-2">
                            <div class="flex justify-between">
                                <span class="text-gray-700">Recycling</span>
                                <span class="text-gray-700 font-medium">89%</span>
                            </div>
                            <div class="progress-bar">
                                <div class="progress-fill" style="width: 89%"></div>
                            </div>
                        </div>
                        
                        <div class="space-y-2">
                            <div class="flex justify-between">
                                <span class="text-gray-700">Ocean Cleaning</span>
                                <span class="text-gray-700 font-medium">90%</span>
                            </div>
                            <div class="progress-bar">
                                <div class="progress-fill" style="width: 90%"></div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="text-center">
                    <div class="planet-container">
                        <div class="planet-bg"></div>
                        <div class="planet-hands">
                            🌱
                        </div>
                        <div class="planet-badge">
                            SAVE PLANET
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Stats Section -->
    <section class="bg-green-600 py-16">
        <div class="container mx-auto px-6">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-8 text-center">
                <div class="text-white">
                    <div class="stat-number text-white">120+</div>
                    <p class="text-green-100">Tons Recycled</p>
                </div>
                <div class="text-white">
                    <div class="stat-number text-white">85%</div>
                    <p class="text-green-100">Waste Reduction</p>
                </div>
                <div class="text-white">
                    <div class="stat-number text-white">45+</div>
                    <p class="text-green-100">Communities Served</p>
                </div>
                <div class="text-white">
                    <div class="stat-number text-white">30K</div>
                    <p class="text-green-100">People Educated</p>
                </div>
            </div>
        </div>
    </section>

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

    <script>
        // Animate progress bars when they come into view
        const observerOptions = {
            root: null,
            rootMargin: '0px',
            threshold: 0.5
        };
        
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const progressFills = entry.target.querySelectorAll('.progress-fill');
                    progressFills.forEach(fill => {
                        fill.style.width = fill.style.width;
                    });
                }
            });
        }, observerOptions);
        
        document.querySelectorAll('.progress-bar').forEach(bar => {
            observer.observe(bar.parentElement);
        });

        // Smooth scroll for navigation
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({ behavior: 'smooth', block: 'start' });
                }
            });
        });
    </script>
</body>

</html>