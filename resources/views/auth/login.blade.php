<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - CleanNepal</title>
    <link rel="icon" href="{{ asset('image/leaf-icon.png') }}" type="image/x-icon">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.3.0/fonts/remixicon.css" rel="stylesheet">
    <style>
        :root {
            --primary-green: #2E7D32;
            --light-green: #81C784;
            --dark-green: #1B5E20;
            --accent-green: #4CAF50;
        }
        
        body {
            background-color: #F1F8E9;
            background-image: 
                radial-gradient(circle at 10% 20%, rgba(129, 199, 132, 0.15) 0%, transparent 20%),
                radial-gradient(circle at 80% 60%, rgba(76, 175, 80, 0.1) 0%, transparent 30%);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
            padding: 20px;
        }
        
        .login-container {
            background-color: white;
            border-radius: 12px;
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.12);
            width: 100%;
            max-width: 400px;
            padding: 40px 30px;
            position: relative;
            overflow: hidden;
        }
        
        .login-container::before {
            content: "";
            position: absolute;
            top: -50px;
            right: -50px;
            width: 200px;
            height: 200px;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='%2381C784' opacity='0.1'%3E%3Cpath d='M17,8C8,10 5.9,16.17 3.82,21.34L5.71,22L6.66,19.7C7.14,19.87 7.64,20 8,20C19,20 22,3 22,3C21,5 14,5.25 9,6.25C4,7.25 2,11.5 2,13.5C2,15.5 3.75,17.25 3.75,17.25C7,8 17,8 17,8Z'/%3E%3C/svg%3E");
            background-repeat: no-repeat;
            z-index: 0;
        }
        
        .logo-container {
            display: flex;
            justify-content: center;
            margin-bottom: 30px;
            position: relative;
            z-index: 1;
        }
        
        .eco-logo {
            width: 80px;
            height: 80px;
            background-color: var(--primary-green);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            box-shadow: 0 4px 10px rgba(46, 125, 50, 0.3);
        }
        
        .eco-logo i {
            color: white;
            font-size: 40px;
        }
        
        .eco-logo::after {
            content: "";
            position: absolute;
            width: 30px;
            height: 30px;
            background-color: var(--light-green);
            border-radius: 50%;
            bottom: -5px;
            right: -5px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 16px;
        }
        
        .login-title {
            text-align: center;
            color: var(--dark-green);
            font-size: 28px;
            font-weight: 700;
            margin-bottom: 30px;
            position: relative;
            z-index: 1;
        }
        
        .form-group {
            margin-bottom: 20px;
            position: relative;
            z-index: 1;
        }
        
        .form-control {
            width: 100%;
            padding: 15px;
            border: 1px solid #E0E0E0;
            border-radius: 8px;
            font-size: 16px;
            transition: all 0.3s ease;
            box-sizing: border-box;
        }
        
        .form-control:focus {
            border-color: var(--primary-green);
            outline: none;
            box-shadow: 0 0 0 3px rgba(76, 175, 80, 0.2);
        }
        
        .checkbox-group {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 25px;
            position: relative;
            z-index: 1;
        }
        
        .checkbox-container {
            display: flex;
            align-items: center;
        }
        
        .checkbox-container input {
            margin-right: 8px;
        }
        
        .forgot-password {
            color: var(--primary-green);
            text-decoration: none;
            font-size: 14px;
            transition: color 0.3s ease;
        }
        
        .forgot-password:hover {
            color: var(--dark-green);
            text-decoration: underline;
        }
        
        .login-button {
            width: 100%;
            padding: 15px;
            background-color: #212121;
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            margin-bottom: 20px;
            position: relative;
            z-index: 1;
        }
        
        .login-button:hover {
            background-color: #424242;
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }
        
        .register-link {
            text-align: center;
            color: #616161;
            font-size: 14px;
            position: relative;
            z-index: 1;
        }
        
        .register-link a {
            color: var(--primary-green);
            text-decoration: none;
            font-weight: 600;
            transition: color 0.3s ease;
        }
        
        .register-link a:hover {
            color: var(--dark-green);
            text-decoration: underline;
        }
        
        .leaf-decoration {
            position: absolute;
            bottom: 20px;
            left: 20px;
            opacity: 0.1;
            font-size: 100px;
            color: var(--primary-green);
            transform: rotate(-15deg);
            z-index: 0;
        }
    </style>
</head>

<body>
    <div class="login-container">
        <div class="logo-container">
            <div class="eco-logo">
                <i class="ri-recycle-line"></i>
            </div>
        </div>
        
        <h2 class="login-title">Login</h2>
        
        <form action="{{ route('login') }}" method="POST">
            @csrf
            
            <div class="form-group">
                <input type="email" name="email" class="form-control" placeholder="Email" required>
            </div>
            
            <div class="form-group">
                <input type="password" name="password" class="form-control" placeholder="Password" required>
            </div>
            
            <div class="checkbox-group">
                <div class="checkbox-container">
                    <input type="checkbox" name="remember" id="remember">
                    <label for="remember">Remember me</label>
                </div>
                <a href="#" class="forgot-password">Forgot Password?</a>
            </div>
            
            <button type="submit" class="login-button">LOGIN</button>
        </form>
        
        <div class="register-link">
            Don't have an account? <a href="{{ route('register') }}">Register now</a>
        </div>
        
        <i class="ri-leaf-line leaf-decoration"></i>
    </div>

    <script>
        // Add some interactive effects
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
            
            // Add animation to the login button
            const loginButton = document.querySelector('.login-button');
            loginButton.addEventListener('click', function(e) {
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
        });
    </script>
</body>

</html>