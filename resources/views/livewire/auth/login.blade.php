<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login | {{ config('app.name') }}</title>
    
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <style>
        :root {
            --primary-color: #6366f1;
            --primary-dark: #4f46e5;
            --secondary-color: #f8fafc;
            --text-color: #334155;
            --border-color: #e2e8f0;
        }
        
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }
        
        .login-container {
            background: white;
            border-radius: 20px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            max-width: 1000px;
            width: 100%;
        }
        
        .login-left {
            background: linear-gradient(135deg, var(--primary-color), var(--primary-dark));
            color: white;
            padding: 60px 40px;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }
        
        .login-right {
            padding: 60px 40px;
        }
        
        .welcome-text {
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 15px;
        }
        
        .app-logo {
            font-size: 2rem;
            font-weight: 700;
            color: var(--primary-color);
            margin-bottom: 40px;
            display: flex;
            align-items: center;
            gap: 10px;
        }
        
        .form-control {
            padding: 15px;
            border-radius: 10px;
            border: 2px solid var(--border-color);
            transition: all 0.3s;
        }
        
        .form-control:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 3px rgba(99, 102, 241, 0.1);
        }
        
        .form-label {
            font-weight: 600;
            color: var(--text-color);
            margin-bottom: 8px;
        }
        
        .btn-login {
            background: var(--primary-color);
            color: white;
            padding: 15px;
            border-radius: 10px;
            font-weight: 600;
            border: none;
            transition: all 0.3s;
            width: 100%;
        }
        
        .btn-login:hover {
            background: var(--primary-dark);
            transform: translateY(-2px);
            box-shadow: 0 10px 20px rgba(99, 102, 241, 0.2);
        }
        
        .input-group-text {
            background: white;
            border: 2px solid var(--border-color);
            border-right: none;
        }
        
        .form-control-with-icon {
            border-left: none;
        }
        
        .divider {
            text-align: center;
            position: relative;
            margin: 30px 0;
        }
        
        .divider::before {
            content: '';
            position: absolute;
            top: 50%;
            left: 0;
            right: 0;
            height: 1px;
            background: var(--border-color);
        }
        
        .divider span {
            background: white;
            padding: 0 15px;
            color: #64748b;
            position: relative;
        }
        
        .social-login {
            display: flex;
            gap: 15px;
            justify-content: center;
        }
        
        .social-btn {
            padding: 12px;
            border-radius: 10px;
            border: 2px solid var(--border-color);
            background: white;
            transition: all 0.3s;
            display: flex;
            align-items: center;
            justify-content: center;
            width: 50px;
            height: 50px;
        }
        
        .social-btn:hover {
            transform: translateY(-2px);
            border-color: var(--primary-color);
        }
        
        .feature-list {
            list-style: none;
            padding: 0;
            margin-top: 40px;
        }
        
        .feature-list li {
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            gap: 15px;
        }
        
        .feature-list i {
            background: rgba(255, 255, 255, 0.2);
            width: 40px;
            height: 40px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        
        .forgot-password {
            color: var(--primary-color);
            text-decoration: none;
            font-weight: 500;
            transition: all 0.3s;
        }
        
        .forgot-password:hover {
            color: var(--primary-dark);
            text-decoration: underline;
        }
        
        .register-link {
            text-align: center;
            margin-top: 30px;
            color: #64748b;
        }
        
        .register-link a {
            color: var(--primary-color);
            font-weight: 600;
            text-decoration: none;
        }
        
        .register-link a:hover {
            text-decoration: underline;
        }
        
        .alert {
            border-radius: 10px;
            border: none;
            padding: 15px;
        }
        
        @media (max-width: 768px) {
            .login-left {
                padding: 40px 30px;
            }
            
            .login-right {
                padding: 40px 30px;
            }
            
            .welcome-text {
                font-size: 2rem;
            }
        }
    </style>
</head>
<body>
    <div class="login-container">
        <div class="row g-0">
            <!-- Left Column - Welcome Section -->
            <div class="col-lg-6 d-none d-lg-block">
                <div class="login-left">
                    <h1 class="welcome-text">Welcome Back</h1>
                    <p>Sign in to access your account and continue your journey with us.</p>
                    
                    <ul class="feature-list">
                        <li>
                            <i class="fas fa-shield-alt"></i>
                            <div>
                                <h5 class="mb-1">Secure & Reliable</h5>
                                <p class="mb-0 opacity-75">Enterprise-grade security for your data</p>
                            </div>
                        </li>
                        <li>
                            <i class="fas fa-bolt"></i>
                            <div>
                                <h5 class="mb-1">Fast Performance</h5>
                                <p class="mb-0 opacity-75">Lightning fast login experience</p>
                            </div>
                        </li>
                        <li>
                            <i class="fas fa-headset"></i>
                            <div>
                                <h5 class="mb-1">24/7 Support</h5>
                                <p class="mb-0 opacity-75">Our team is always here to help</p>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
            
            <!-- Right Column - Login Form -->
            <div class="col-lg-6">
                <div class="login-right">
                    <div class="app-logo">
                        <i class="fas fa-cube"></i>
                        {{ config('app.name', 'Laravel') }}
                    </div>
                    
                    <h2 class="mb-4">Sign In to Your Account</h2>
                    <p class="text-muted mb-4">Enter your credentials to access your account</p>
                    
                    <!-- Display Validation Errors -->
                    @if($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    
                    <!-- Display Success Message -->
                    @if(session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    
                    <!-- Login Form -->
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        
                        <!-- Email Input -->
                        <div class="mb-4">
                            <label for="email" class="form-label">Email Address</label>
                            <div class="input-group">
                                <span class="input-group-text">
                                    <i class="fas fa-envelope"></i>
                                </span>
                                <input 
                                    type="email" 
                                    class="form-control form-control-with-icon @error('email') is-invalid @enderror" 
                                    id="email" 
                                    name="email"
                                    value="{{ old('email') }}"
                                    placeholder="Enter your email"
                                    required
                                    autofocus
                                >
                            </div>
                            @error('email')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <!-- Password Input -->
                        <div class="mb-4">
                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <label for="password" class="form-label">Password</label>
                                <a href="{{ route('password.request') }}" class="forgot-password">
                                    Forgot Password?
                                </a>
                            </div>
                            <div class="input-group">
                                <span class="input-group-text">
                                    <i class="fas fa-lock"></i>
                                </span>
                                <input 
                                    type="password" 
                                    class="form-control form-control-with-icon @error('password') is-invalid @enderror" 
                                    id="password" 
                                    name="password"
                                    placeholder="Enter your password"
                                    required
                                >
                                <span class="input-group-text" style="cursor: pointer;" onclick="togglePassword()">
                                    <i class="fas fa-eye" id="toggleIcon"></i>
                                </span>
                            </div>
                            @error('password')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <!-- Remember Me -->
                        <div class="mb-4">
                            <div class="form-check">
                                <input 
                                    class="form-check-input" 
                                    type="checkbox" 
                                    name="remember" 
                                    id="remember"
                                    {{ old('remember') ? 'checked' : '' }}
                                >
                                <label class="form-check-label" for="remember">
                                    Remember me
                                </label>
                            </div>
                        </div>
                        
                        <!-- Submit Button -->
                        <div class="d-grid gap-2 mb-4">
                            <button type="submit" class="btn-login">
                                <i class="fas fa-sign-in-alt me-2"></i> Sign In
                            </button>
                        </div>
                        
                        <!-- Divider -->
                        <div class="divider">
                            <span>Or continue with</span>
                        </div>
                        
                        <!-- Register Link -->
                        <div class="register-link">
                            Don't have an account? 
                            <a href="{{ route('register') }}">Create account</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Bootstrap JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <script>
        // Toggle password visibility
        function togglePassword() {
            const passwordInput = document.getElementById('password');
            const toggleIcon = document.getElementById('toggleIcon');
            
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                toggleIcon.classList.remove('fa-eye');
                toggleIcon.classList.add('fa-eye-slash');
            } else {
                passwordInput.type = 'password';
                toggleIcon.classList.remove('fa-eye-slash');
                toggleIcon.classList.add('fa-eye');
            }
        }
        
        // Add focus effects
        document.querySelectorAll('.form-control').forEach(input => {
            input.addEventListener('focus', function() {
                this.parentElement.classList.add('focused');
            });
            
            input.addEventListener('blur', function() {
                this.parentElement.classList.remove('focused');
            });
        });
        
        // Auto-hide alerts after 5 seconds
        setTimeout(() => {
            document.querySelectorAll('.alert').forEach(alert => {
                const fadeEffect = setInterval(() => {
                    if (!alert.style.opacity) {
                        alert.style.opacity = 1;
                    }
                    if (alert.style.opacity > 0) {
                        alert.style.opacity -= 0.1;
                    } else {
                        clearInterval(fadeEffect);
                        alert.style.display = 'none';
                    }
                }, 50);
            });
        }, 5000);
    </script>
</body>
</html>