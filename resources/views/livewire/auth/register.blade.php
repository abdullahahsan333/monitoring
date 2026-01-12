<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register | {{ config('app.name') }}</title>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        :root {
            --primary-color: #6366f1;
            --primary-dark: #4f46e5;
            --border-color: #e2e8f0;
            --text-color: #334155;
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

        .form-control {
            padding: 15px;
            border-radius: 10px;
            border: 2px solid var(--border-color);
        }

        .form-control:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 3px rgba(99, 102, 241, 0.1);
        }

        .form-label {
            font-weight: 600;
            color: var(--text-color);
        }

        .btn-login {
            background: var(--primary-color);
            color: white;
            padding: 15px;
            border-radius: 10px;
            font-weight: 600;
            border: none;
            width: 100%;
        }

        .btn-login:hover {
            background: var(--primary-dark);
            transform: translateY(-2px);
        }

        .app-logo {
            font-size: 2rem;
            font-weight: 700;
            color: var(--primary-color);
            margin-bottom: 30px;
            display: flex;
            align-items: center;
            gap: 10px;
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

        @media (max-width: 768px) {
            .login-left {
                padding: 40px 30px;
            }

            .login-right {
                padding: 40px 30px;
            }
        }
    </style>
</head>
<body>

<div class="login-container">
    <div class="row g-0">
        <!-- LEFT -->
        <div class="col-lg-6 d-none d-lg-block">
            <div class="login-left">
                <h1 class="mb-3">Create Your Account</h1>
                <p class="mb-4">
                    Join our platform and start monitoring your servers with confidence.
                </p>

                <ul class="list-unstyled">
                    <li class="mb-3"><i class="fas fa-check-circle me-2"></i> Real-time monitoring</li>
                    <li class="mb-3"><i class="fas fa-check-circle me-2"></i> Instant alerts</li>
                    <li class="mb-3"><i class="fas fa-check-circle me-2"></i> Secure infrastructure</li>
                    <li class="mb-3"><i class="fas fa-check-circle me-2"></i> 24/7 support</li>
                </ul>
            </div>
        </div>

        <!-- RIGHT -->
        <div class="col-lg-6">
            <div class="login-right">
                <div class="app-logo">
                    <i class="fas fa-cube"></i>
                    {{ config('app.name') }}
                </div>

                <h2 class="mb-3">Sign Up</h2>
                <p class="text-muted mb-4">Create a new account</p>

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <!-- Name -->
                    <div class="mb-4">
                        <label class="form-label">Full Name</label>
                        <input
                            type="text"
                            class="form-control"
                            name="name"
                            value="{{ old('name') }}"
                            required
                            autofocus
                        >
                    </div>

                    <!-- Email -->
                    <div class="mb-4">
                        <label class="form-label">Email Address</label>
                        <input
                            type="email"
                            class="form-control"
                            name="email"
                            value="{{ old('email') }}"
                            required
                        >
                    </div>

                    <!-- Password -->
                    <div class="mb-4">
                        <label class="form-label">Password</label>
                        <input
                            type="password"
                            class="form-control"
                            name="password"
                            required
                        >
                    </div>

                    <!-- Confirm -->
                    <div class="mb-4">
                        <label class="form-label">Confirm Password</label>
                        <input
                            type="password"
                            class="form-control"
                            name="password_confirmation"
                            required
                        >
                    </div>

                    <div class="d-grid gap-2 mb-4">
                        <button type="submit" class="btn-login">
                            <i class="fas fa-user-plus me-2"></i> Create Account
                        </button>
                    </div>

                    <div class="register-link">
                        Already have an account?
                        <a href="{{ route('login') }}">Sign in</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
