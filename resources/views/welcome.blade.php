<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Server Monitoring Dashboard</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', 'Roboto', 'Oxygen', 'Ubuntu', 'Cantarell', sans-serif;
            background: #ffffff;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            color: #1a1a1a;
        }

        header {
            padding: 1.2rem 3rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 1px solid #f0f0f0;
            background: #ffffff;
            position: sticky;
            top: 0;
            z-index: 100;
        }

        .logo {
            color: #1a1a1a;
            font-size: 1.3rem;
            font-weight: 700;
            display: flex;
            align-items: center;
            gap: 0.8rem;
            letter-spacing: -0.5px;
        }

        .logo::before {
            content: "⚙️";
            font-size: 1.5rem;
        }

        .nav-links {
            display: flex;
            gap: 1.2rem;
        }

        .nav-links a {
            padding: 0.65rem 1.3rem;
            border-radius: 8px;
            text-decoration: none;
            font-weight: 500;
            font-size: 0.95rem;
            transition: all 0.3s ease;
            cursor: pointer;
        }

        .nav-links .login {
            color: #1a1a1a;
            background-color: transparent;
            border: 1.5px solid #1a1a1a;
        }

        .nav-links .login:hover {
            background-color: #1a1a1a;
            color: white;
        }

        .nav-links .register {
            background-color: #1a1a1a;
            color: white;
        }

        .nav-links .register:hover {
            background-color: #333333;
            box-shadow: 0 4px 16px rgba(26, 26, 26, 0.15);
        }

        main {
            flex: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 4rem 2rem;
        }

        .hero-content {
            text-align: center;
            max-width: 700px;
        }

        .hero-content h1 {
            font-size: 3.5rem;
            margin-bottom: 1.2rem;
            line-height: 1.1;
            font-weight: 700;
            letter-spacing: -1px;
        }

        .hero-content p {
            font-size: 1.1rem;
            margin-bottom: 3rem;
            line-height: 1.7;
            color: #666666;
            font-weight: 400;
        }

        .feature-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
            gap: 2rem;
            margin-bottom: 3rem;
            width: 100%;
            padding: 0 1rem;
        }

        .feature-card {
            background: #ffffff;
            padding: 2rem;
            border-radius: 12px;
            border: 1px solid #e8e8e8;
            transition: all 0.3s ease;
            text-align: left;
        }

        .feature-card:hover {
            border-color: #d0d0d0;
            box-shadow: 0 8px 24px rgba(26, 26, 26, 0.08);
            transform: translateY(-4px);
        }

        .feature-card-icon {
            font-size: 2.5rem;
            margin-bottom: 1rem;
            display: block;
        }

        .feature-card h3 {
            font-size: 1.1rem;
            margin-bottom: 0.6rem;
            font-weight: 600;
            color: #1a1a1a;
        }

        .feature-card p {
            font-size: 0.95rem;
            color: #777777;
            line-height: 1.6;
        }

        .cta-buttons {
            display: flex;
            gap: 1rem;
            justify-content: center;
            flex-wrap: wrap;
            padding: 0 1rem;
        }

        .cta-buttons a {
            padding: 1rem 2.2rem;
            font-size: 0.95rem;
            border-radius: 8px;
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s ease;
            cursor: pointer;
            border: none;
        }

        .btn-login {
            background-color: transparent;
            color: #1a1a1a;
            border: 1.5px solid #1a1a1a;
        }

        .btn-login:hover {
            background-color: #1a1a1a;
            color: white;
            box-shadow: 0 8px 20px rgba(26, 26, 26, 0.12);
        }

        .btn-register {
            background-color: #1a1a1a;
            color: white;
        }

        .btn-register:hover {
            background-color: #333333;
            box-shadow: 0 8px 20px rgba(26, 26, 26, 0.15);
        }

        footer {
            text-align: center;
            padding: 2.5rem;
            color: #999999;
            font-size: 0.9rem;
            border-top: 1px solid #f0f0f0;
            background: #ffffff;
        }

        @media (max-width: 768px) {
            header {
                flex-direction: column;
                gap: 1.5rem;
                padding: 1.2rem 1.5rem;
            }

            .hero-content h1 {
                font-size: 2.2rem;
            }

            .hero-content p {
                font-size: 1rem;
            }

            .nav-links {
                width: 100%;
                justify-content: center;
            }

            .cta-buttons {
                flex-direction: column;
            }

            .cta-buttons a {
                width: 100%;
            }

            .feature-grid {
                grid-template-columns: 1fr;
            }

            main {
                padding: 2rem 1rem;
            }
        }
    </style>
</head>
<body>
    <header>
        <div class="logo">Server Monitor</div>
        <nav class="nav-links">
            <a href="login" class="login">Login</a>
            <a href="register" class="register">Register</a>
        </nav>
    </header>

    <main>
        <div class="hero-content">
            <h1>Real-Time Server Monitoring</h1>
            <p>Monitor, analyze, and optimize your infrastructure with our modern dashboard. Get instant insights into server performance, uptime, and health.</p>

            <div class="feature-grid">
                <div class="feature-card">
                    <div class="feature-card-icon">📊</div>
                    <h3>Live Analytics</h3>
                    <p>Real-time performance metrics and detailed insights at your fingertips.</p>
                </div>
                <div class="feature-card">
                    <div class="feature-card-icon">🔔</div>
                    <h3>Smart Alerts</h3>
                    <p>Intelligent notifications for critical events with customizable thresholds.</p>
                </div>
                <div class="feature-card">
                    <div class="feature-card-icon">🛡️</div>
                    <h3>Enterprise Security</h3>
                    <p>Advanced security features to protect your infrastructure 24/7.</p>
                </div>
            </div>

            <div class="cta-buttons">
                <a href="login" class="btn-login">Login</a>
                <a href="register" class="btn-register">Get Started</a>
            </div>
        </div>
    </main>

    <footer>
        <p>&copy; 2026 Server Monitoring Dashboard. All rights reserved.</p>
    </footer>
</body>
</html>