<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Prime Summit Bank Online Banking - Secure Login</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary-color: #0056b3;
            --primary-hover: #003d82;
            --secondary-color: #003366;
            --accent-color: #00a8e8;
            --light-color: #f8f9fa;
            --dark-color: #212529;
            --success-color: #28a745;
            --warning-color: #ffc107;
            --error-color: #dc3545;
            --border-radius: 8px;
            --box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
            --transition: all 0.3s ease;
        }
        
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #f5f7fa 0%, #e4e8eb 100%);
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            color: var(--dark-color);
            line-height: 1.6;
        }
        
        .bank-header {
            background: linear-gradient(to right, var(--secondary-color), var(--primary-color));
            color: white;
            padding: 1rem 2rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            position: relative;
            z-index: 10;
        }
        
        .bank-logo {
            font-size: 1.5rem;
            font-weight: bold;
            display: flex;
            align-items: center;
        }
        
        .bank-logo img {
            height: 40px;
            width: auto;
        }
        
        .register-link {
            color: white;
            text-decoration: none;
            font-weight: 600;
            padding: 0.5rem 1rem;
            border-radius: var(--border-radius);
            transition: var(--transition);
            display: flex;
            align-items: center;
        }
        
        .register-link:hover {
            background-color: rgba(255, 255, 255, 0.15);
        }
        
        .register-link i {
            margin-right: 8px;
        }
        
        .main-container {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-grow: 1;
            padding: 2rem;
            background: url('https://images.unsplash.com/photo-1601597111158-2fceff292cdc?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80') no-repeat center center;
            background-size: cover;
            position: relative;
        }
        
        .main-container::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: rgba(0, 51, 102, 0.85);
        }
        
        .login-container {
            background-color: white;
            border-radius: var(--border-radius);
            box-shadow: var(--box-shadow);
            width: 100%;
            max-width: 450px;
            padding: 2.5rem;
            border-top: 5px solid var(--primary-color);
            position: relative;
            z-index: 1;
            animation: fadeInUp 0.5s ease;
        }
        
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        .login-container h2 {
            color: var(--secondary-color);
            margin-bottom: 1.8rem;
            font-size: 1.8rem;
            text-align: center;
            font-weight: 700;
            position: relative;
            padding-bottom: 15px;
        }
        
        .login-container h2::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
            width: 80px;
            height: 3px;
            background-color: var(--accent-color);
        }
        
        .error-message {
            color: var(--error-color);
            font-size: 0.85rem;
            margin-top: 0.5rem;
            min-height: 1rem;
            font-weight: 500;
        }
        
        .alert {
            padding: 1rem;
            border-radius: var(--border-radius);
            margin-bottom: 1.5rem;
            font-size: 0.9rem;
            display: flex;
            align-items: center;
            animation: fadeIn 0.3s ease;
        }
        
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(-10px); }
            to { opacity: 1; transform: translateY(0); }
        }
        
        .alert i {
            margin-right: 10px;
            font-size: 1.2rem;
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
            position: relative;
        }
        
        .form-group label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: 600;
            color: var(--secondary-color);
            font-size: 0.95rem;
        }
        
        .form-group input {
            width: 100%;
            padding: 0.85rem 1rem;
            border: 1px solid #ddd;
            border-radius: var(--border-radius);
            font-size: 1rem;
            transition: var(--transition);
            box-sizing: border-box;
            background-color: #f9f9f9;
        }
        
        .form-group input:focus {
            border-color: var(--accent-color);
            outline: none;
            box-shadow: 0 0 0 3px rgba(0, 168, 232, 0.2);
            background-color: white;
        }
        
        .password-container {
            position: relative;
        }
        
        .toggle-password {
            position: absolute;
            right: 12px;
            top: 50%;
            transform: translateY(-50%);
            cursor: pointer;
            color: #777;
            transition: var(--transition);
        }
        
        .toggle-password:hover {
            color: var(--primary-color);
        }
        
        .remember-me {
            display: flex;
            align-items: center;
            margin-bottom: 1.5rem;
        }
        
        .remember-me input {
            width: auto;
            margin-right: 0.75rem;
            accent-color: var(--primary-color);
        }
        
        .remember-me label {
            font-size: 0.95rem;
            color: #555;
            cursor: pointer;
        }
        
        .btn-primary {
            background: linear-gradient(to right, var(--primary-color), var(--accent-color));
            color: white;
            border: none;
            padding: 1rem 1.5rem;
            font-size: 1rem;
            font-weight: 600;
            border-radius: var(--border-radius);
            cursor: pointer;
            width: 100%;
            transition: var(--transition);
            margin-top: 0.5rem;
            letter-spacing: 0.5px;
            text-transform: uppercase;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        
        .btn-primary:hover {
            background: linear-gradient(to right, var(--primary-hover), var(--accent-color));
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(0, 86, 179, 0.3);
        }
        
        .btn-primary:active {
            transform: translateY(0);
        }
        
        .btn-primary i {
            margin-right: 8px;
        }
        
        .login-links {
            display: flex;
            justify-content: space-between;
            margin-top: 1.5rem;
        }
        
        .login-links a {
            color: var(--primary-color);
            text-decoration: none;
            font-weight: 600;
            font-size: 0.9rem;
            transition: var(--transition);
            position: relative;
        }
        
        .login-links a::after {
            content: '';
            position: absolute;
            bottom: -2px;
            left: 0;
            width: 0;
            height: 2px;
            background-color: var(--primary-color);
            transition: var(--transition);
        }
        
        .login-links a:hover::after {
            width: 100%;
        }
        
        .security-notice {
            margin-top: 2rem;
            padding: 1.25rem;
            background-color: #f8f9fa;
            border-radius: var(--border-radius);
            font-size: 0.85rem;
            border-left: 4px solid var(--accent-color);
        }
        
        .security-notice h3 {
            margin-top: 0;
            color: var(--secondary-color);
            font-size: 1rem;
            font-weight: 700;
            margin-bottom: 0.75rem;
            display: flex;
            align-items: center;
        }
        
        .security-notice h3 i {
            margin-right: 8px;
            color: var(--accent-color);
        }
        
        .security-notice ul {
            padding-left: 1.5rem;
            margin-bottom: 0;
        }
        
        .security-notice li {
            margin-bottom: 0.5rem;
            position: relative;
        }
        
        .security-notice li::before {
            content: '•';
            color: var(--accent-color);
            font-weight: bold;
            display: inline-block;
            width: 1em;
            margin-left: -1em;
        }
        
        .login-footer {
            display: flex;
            justify-content: center;
            margin-top: 1.5rem;
        }
        
        .login-footer img {
            height: 30px;
            margin: 0 10px;
            filter: grayscale(100%) brightness(0.5);
            transition: var(--transition);
        }
        
        .login-footer img:hover {
            filter: none;
        }
        
        @media (max-width: 576px) {
            .login-container {
                padding: 1.75rem;
            }
            
            .bank-header {
                padding: 0.75rem 1rem;
            }
            
            .main-container {
                padding: 1rem;
            }
            
            .login-links {
                flex-direction: column;
                gap: 0.75rem;
            }
        }
        
        /* Loading spinner */
        .spinner {
            display: none;
            width: 20px;
            height: 20px;
            border: 3px solid rgba(255, 255, 255, 0.3);
            border-radius: 50%;
            border-top-color: white;
            animation: spin 1s ease-in-out infinite;
            margin-right: 8px;
        }
        
        @keyframes spin {
            to { transform: rotate(360deg); }
        }
    </style>
</head>
<body>
    <header class="bank-header">
        <div class="bank-logo">
            <img src="assets/img/logo.png" alt="Prime Summit Bank" width="150">
        </div>
        <a href="{{ route('register') }}" class="register-link">
            <i class="fas fa-user-plus"></i> Enroll Now
        </a>
    </header>
    

    
    <div class="main-container">
        <div class="login-container">
            <h2>Secure Online Banking Login</h2>
            
            <div id="alert-area"></div>
            
            <form id="loginForm">
                @csrf

                <div class="form-group">
                    <label for="email">Online ID (Email)</label>
                    <input type="email" name="email" required id="email" placeholder="Enter your registered email" autocomplete="username">
                    <div class="error-message" id="error-email"></div>
                </div>

                <div class="form-group">
                    <label for="password">Password</label>
                    <div class="password-container">
                        <input type="password" name="password" required id="password" placeholder="Enter your password" autocomplete="current-password">
                        <span class="toggle-password" data-target="password">
                            <i class="far fa-eye"></i>
                        </span>
                    </div>
                    <div class="error-message" id="error-password"></div>
                </div>
                
                <div class="remember-me">
                    <input type="checkbox" id="remember" name="remember">
                    <label for="remember">Remember my Online ID</label>
                </div>

                <button type="submit" class="btn-primary" id="loginButton">
                    <span class="spinner" id="spinner"></span>
                    <i class="fas fa-lock"></i> Sign In Securely
                </button>
            </form>
            
            <div class="login-links">
                <a href="/forgot-password"><i class="fas fa-key"></i> Forgot Password?</a>
                <a href="/help"><i class="fas fa-question-circle"></i> Need Help?</a>
            </div>
            
            <div class="security-notice">
                <h3><i class="fas fa-shield-alt"></i> Security Notice</h3>
                <ul>
                    <li>Never share your login credentials with anyone</li>
                    <li>Ensure you're on our official website before entering information</li>
                    <li>Look for the lock icon in your browser address bar</li>
                </ul>
            </div>
            
            <div class="login-footer">
                <img src="https://www.bbb.org/ProfileImages/f5a9a7d0-1e2a-4d5b-8f3a-9e8b7c6d5e4a.png" alt="BBB Accredited" title="BBB Accredited Business">
                <img src="https://cdn.brandfolder.io/5H442O3W/as/pl546j-7le8zk-5guop3/SFD_Seal_Stacked_Black.png" alt="FDIC Insured" title="FDIC Insured">
                <img src="https://www.trustarc.com/wp-content/uploads/2019/09/TRUSTe-verified-privacy-seal-100.png" alt="TRUSTe Certified" title="TRUSTe Privacy Certified">
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.getElementById('loginForm');
            const alertArea = document.getElementById('alert-area');
            const loginButton = document.getElementById('loginButton');
            const spinner = document.getElementById('spinner');
            
            // Toggle password visibility
            document.querySelector('.toggle-password').addEventListener('click', function() {
                const passwordInput = document.getElementById('password');
                const icon = this.querySelector('i');
                
                if (passwordInput.type === 'password') {
                    passwordInput.type = 'text';
                    icon.classList.remove('fa-eye');
                    icon.classList.add('fa-eye-slash');
                } else {
                    passwordInput.type = 'password';
                    icon.classList.remove('fa-eye-slash');
                    icon.classList.add('fa-eye');
                }
            });
            
            // Check if there's a saved email in localStorage
            if (localStorage.getItem('rememberedEmail')) {
                document.getElementById('email').value = localStorage.getItem('rememberedEmail');
                document.getElementById('remember').checked = true;
            }
            
            form.addEventListener('submit', function(e) {
                e.preventDefault();
                const formData = new FormData(form);
                const csrfToken = document.querySelector('meta[name="csrf-token"]').content;
                
                // Show loading spinner
                loginButton.disabled = true;
                spinner.style.display = 'inline-block';
                
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
                .then(response => {
                    if (!response.ok) {
                        throw response;
                    }
                    return response.json();
                })
                .then(data => {
                    if (data.success) {
                        // Handle "Remember me" functionality
                        if (document.getElementById('remember').checked) {
                            localStorage.setItem('rememberedEmail', document.getElementById('email').value);
                        } else {
                            localStorage.removeItem('rememberedEmail');
                        }
                        
                        // Show success message
                        alertArea.innerHTML = `
                            <div class="alert alert-success">
                                <i class="fas fa-check-circle"></i>
                                ${data.message}
                            </div>
                        `;
                        
                        // Redirect after short delay
                        setTimeout(() => {
                            window.location.href = data.redirect;
                        }, 1000);
                    } else {
                        // Show error message
                        alertArea.innerHTML = `
                            <div class="alert alert-danger">
                                <i class="fas fa-exclamation-circle"></i>
                                ${data.message}
                            </div>
                        `;
                        
                        // Handle field errors
                        if (data.errors) {
                            if (data.errors.email) {
                                document.getElementById('error-email').textContent = data.errors.email[0];
                            }
                            if (data.errors.password) {
                                document.getElementById('error-password').textContent = data.errors.password[0];
                            }
                        }
                    }
                })
                .catch(async (error) => {
                    let errorMessage = 'An unexpected error occurred. Please try again.';
                    
                    try {
                        const errorData = await error.json();
                        if (errorData.message) {
                            errorMessage = errorData.message;
                        }
                    } catch (e) {
                        console.error('Error parsing error response:', e);
                    }
                    
                    alertArea.innerHTML = `
                        <div class="alert alert-danger">
                            <i class="fas fa-exclamation-circle"></i>
                            ${errorMessage}
                        </div>
                    `;
                })
                .finally(() => {
                    // Hide loading spinner
                    loginButton.disabled = false;
                    spinner.style.display = 'none';
                });
            });
            
            // Auto-focus email field on page load
            document.getElementById('email').focus();
        });
    </script>
</body>
</html>