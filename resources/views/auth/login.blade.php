<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Prime Summit Bank Online Banking - Login</title>
    <style>
        :root {
            --primary-color: #0056b3;
            --secondary-color: #003366;
            --accent-color: #00a8e8;
            --light-color: #f8f9fa;
            --dark-color: #212529;
            --success-color: #28a745;
            --error-color: #dc3545;
        }
        
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f5f7fa;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            color: var(--dark-color);
        }
        
        .bank-header {
            background-color: var(--secondary-color);
            color: white;
            padding: 1rem 2rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        
        .bank-logo {
            font-size: 1.5rem;
            font-weight: bold;
            display: flex;
            align-items: center;
        }
        
        .bank-logo svg {
            margin-right: 10px;
        }
        
        .register-link {
            color: white;
            text-decoration: none;
            font-weight: 500;
        }
        
        .main-container {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-grow: 1;
            padding: 2rem;
        }
        
        .login-container {
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
            width: 100%;
            max-width: 450px;
            padding: 2.5rem;
            border-top: 4px solid var(--primary-color);
        }
        
        .login-container h2 {
            color: var(--secondary-color);
            margin-bottom: 1.5rem;
            font-size: 1.8rem;
            text-align: center;
            font-weight: 600;
        }
        
        .error-message {
            color: var(--error-color);
            font-size: 0.85rem;
            margin-top: 0.5rem;
            min-height: 1rem;
        }
        
        .alert {
            padding: 1rem;
            border-radius: 4px;
            margin-bottom: 1.5rem;
            font-size: 0.9rem;
        }
        
        .alert-success {
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }
        
        .alert-danger {
            background-color: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }
        
        .form-group {
            margin-bottom: 1.5rem;
        }
        
        .form-group label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: 500;
            color: var(--secondary-color);
        }
        
        .form-group input {
            width: 100%;
            padding: 0.75rem 1rem;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 1rem;
            transition: all 0.3s;
            box-sizing: border-box;
        }
        
        .form-group input:focus {
            border-color: var(--accent-color);
            outline: none;
            box-shadow: 0 0 0 3px rgba(0, 168, 232, 0.2);
        }
        
        .remember-me {
            display: flex;
            align-items: center;
            margin-bottom: 1.5rem;
        }
        
        .remember-me input {
            width: auto;
            margin-right: 0.5rem;
        }
        
        .btn-primary {
            background-color: var(--primary-color);
            color: white;
            border: none;
            padding: 0.75rem 1.5rem;
            font-size: 1rem;
            font-weight: 500;
            border-radius: 4px;
            cursor: pointer;
            width: 100%;
            transition: background-color 0.3s;
        }
        
        .btn-primary:hover {
            background-color: var(--secondary-color);
        }
        
        .login-prompt {
            text-align: center;
            margin-top: 1.5rem;
            color: #666;
        }
        
        .login-prompt a {
            color: var(--primary-color);
            text-decoration: none;
            font-weight: 500;
        }
        
        .login-prompt a:hover {
            text-decoration: underline;
        }
        
        .security-notice {
            margin-top: 2rem;
            padding: 1rem;
            background-color: #f8f9fa;
            border-radius: 4px;
            font-size: 0.85rem;
            text-align: center;
            border: 1px solid #eee;
        }
        
        @media (max-width: 576px) {
            .login-container {
                padding: 1.5rem;
            }
        }
    </style>
</head>
<body>
    <header class="bank-header">
        <div class="bank-logo">
          <img src="assets/img/logo.png" alt="logo" width="150px">
        </div>
        <a href="{{ route('register') }}" class="register-link">Enroll Now</a>
    </header>
    
    <div class="main-container">
        <div class="login-container">
            <h2>Online Banking Login</h2>
            
            <div id="alert-area"></div>
            
            <form id="loginForm">
                @csrf

                <div class="form-group">
                    <label for="email">Online ID</label>
                    <input type="email" name="email" required id="email" placeholder="Enter your email address">
                    <div class="error-message" id="error-email"></div>
                </div>

                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" required id="password" placeholder="Enter your password">
                    <div class="error-message" id="error-password"></div>
                </div>
                
                <div class="remember-me">
                    <input type="checkbox" id="remember" name="remember">
                    <label for="remember">Remember my Online ID</label>
                </div>

                <button type="submit" class="btn-primary">Sign In</button>
            </form>
            
            <div class="login-prompt">
                <a href="/">Forgot Password?</a>
            </div>
            
            <div class="security-notice">
                <strong>Security Tip:</strong> Always log out when you're done banking online, especially on shared devices.
            </div>
        </div>
    </div>

    <script>
        const form = document.getElementById('loginForm');
        const alertArea = document.getElementById('alert-area');

        form.addEventListener('submit', function (e) {
            e.preventDefault();
            const formData = new FormData(form);
            const csrfToken = document.querySelector('input[name="_token"]').value;

            // Clear previous errors
            document.getElementById('error-email').textContent = '';
            document.getElementById('error-password').textContent = '';
            alertArea.innerHTML = '';

            fetch("{{ route('login') }}", {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': csrfToken,
                    'Accept': 'application/json',
                },
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    alertArea.innerHTML = `<div class="alert alert-success">${data.message}</div>`;
                    setTimeout(() => {
                        window.location.href = data.redirect;
                    }, 1000);
                } else {
                    if (data.errors) {
                        if (data.errors.email) {
                            document.getElementById('error-email').textContent = data.errors.email[0];
                        }
                        if (data.errors.password) {
                            document.getElementById('error-password').textContent = data.errors.password[0];
                        }
                    }

                    alertArea.innerHTML = `<div class="alert alert-danger">${data.message}</div>`;
                }
            })
            .catch(error => {
                console.error('Login error:', error);
                alertArea.innerHTML = `<div class="alert alert-danger">An unexpected error occurred. Please try again.</div>`;
            });
        });
    </script>
</body>
</html>