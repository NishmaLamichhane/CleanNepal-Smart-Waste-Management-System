<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - CleanNepal</title>
    <link rel="icon" href="{{ asset('image/leaf-icon.png') }}" type="image/x-icon">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.3.0/fonts/remixicon.css" rel="stylesheet">
</head>

<body class="font-sans bg-gray-100 text-gray-800 min-h-screen flex">
    <div class="register-container flex w-full min-h-screen shadow-xl overflow-hidden">
        <!-- Left Side - Green Leaf Background -->
        <div class="register-left flex-1 bg-gradient-to-br from-green-900 to-green-700 text-white flex flex-col justify-center p-10 relative overflow-hidden">
            <div class="register-left-content relative z-10 max-w-lg">
                <h1 class="text-5xl font-bold mb-6 leading-tight">Let's Get Started</h1>
                <p class="text-xl leading-relaxed mb-8 opacity-90">Join CleanNepal today and be part of the solution for a greener, cleaner Nepal. Together, we can make a difference through smart waste management and sustainable practices.</p>
            </div>
            <div class="presented-by absolute bottom-10 left-10 text-sm opacity-70 z-10">presented by Nishma Lamichhane</div>
            <i class="ri-leaf-line leaf-decoration absolute bottom-5 right-5 text-8xl opacity-20 transform rotate-15 z-10"></i>
            
            <!-- Background overlay -->
            <div class="absolute inset-0 bg-[url('https://images.unsplash.com/photo-1465146344425-f00d5f5c8f07?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1170&q=80')] bg-cover bg-center opacity-20 z-0"></div>
        </div>
        
        <!-- Right Side - Registration Form -->
        <div class="register-right flex-1 bg-white flex flex-col justify-center p-10 overflow-y-auto">
            <div class="register-form-container max-w-md w-full mx-auto">
                <div class="register-logo flex items-center mb-8">
                    <img src="{{ asset('image/waste.jpg') }}" alt="CleanNepal Logo" class="w-14 h-14 rounded-full mr-4 border-2 border-green-700">
                    <span class="text-2xl font-bold text-green-900">CleanNepal</span>
                </div>
                
                <h2 class="register-title text-3xl font-bold text-green-900 mb-3">Create Account</h2>
                <p class="register-subtitle text-gray-600 mb-8">Join our community of environmental champions</p>
                
                <form action="{{ route('register') }}" method="POST" class="space-y-5">
                    @csrf
                    
                    <div class="form-group">
                        <input type="text" name="name" class="form-control w-full px-5 py-4 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent transition" placeholder="Full Name" required>
                    </div>
                    
                    <div class="form-group">
                        <input type="email" name="email" class="form-control w-full px-5 py-4 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent transition" placeholder="Email Address" required>
                    </div>
                    
                    <div class="form-group">
                        <input type="password" name="password" class="form-control w-full px-5 py-4 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent transition" placeholder="Password" required>
                    </div>
                    
                    <div class="form-group">
                        <input type="password" name="password_confirmation" class="form-control w-full px-5 py-4 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent transition" placeholder="Confirm Password" required>
                    </div>
                    
                    <button type="submit" class="register-button w-full py-4 bg-green-700 text-white font-semibold rounded-lg hover:bg-green-800 transform hover:-translate-y-0.5 transition duration-300 shadow-md hover:shadow-lg">Sign up</button>
                </form>
               
                <div class="login-link text-center text-gray-600 mt-6">
                    Already Registered ? <a href="{{ route('login') }}" class="text-green-700 font-semibold hover:text-green-800 hover:underline transition">Sign in here</a>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Add interactive effects
        document.addEventListener('DOMContentLoaded', function() {
            const formControls = document.querySelectorAll('.form-control');
            
            formControls.forEach(control => {
                control.addEventListener('focus', function() {
                    this.parentElement.classList.add('focused');
                });
                
                control.addEventListener('blur', function() {
                    this.parentElement.classList.remove('focused');
                });
            });
            
            // Add animation to the register button
            const registerButton = document.querySelector('.register-button');
            registerButton.addEventListener('click', function(e) {
                // Create a ripple effect
                const ripple = document.createElement('span');
                ripple.classList.add('ripple');
                this.appendChild(ripple);
                
                const rect = this.getBoundingClientRect();
                const size = Math.max(rect.width, rect.height);
                const x = e.clientX - rect.left - size / 2;
                const y = e.clientY - rect.top - size / 2;
                
                ripple.style.width = ripple.style.height = size + 'px';
                ripple.style.left = x + 'px';
                ripple.style.top = y + 'px';
                
                setTimeout(() => {
                    ripple.remove();
                }, 600);
            });
            
            // Add hover effect to social buttons
            const socialButtons = document.querySelectorAll('.social-button');
            socialButtons.forEach(button => {
                button.addEventListener('mouseenter', function() {
                    this.style.transform = 'translateY(-3px)';
                });
                
                button.addEventListener('mouseleave', function() {
                    this.style.transform = 'translateY(0)';
                });
            });
        });
    </script>
</body>

</html>