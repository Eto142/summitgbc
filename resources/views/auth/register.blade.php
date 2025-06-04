<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prime Summit Bank Online - Register</title>
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
        
        .login-link {
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
        
        .register-container {
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
            width: 100%;
            max-width: 450px;
            padding: 2.5rem;
            border-top: 4px solid var(--primary-color);
        }
        

        .form-group {
    margin-bottom: 20px;
}

.form-group label {
    display: block;
    font-weight: 600;
    margin-bottom: 6px;
    color: #333;
}

.form-group input[type="text"],
.form-group select {
    width: 100%;
    padding: 10px 12px;
    border: 1px solid #ccc;
    border-radius: 6px;
    font-size: 16px;
    transition: border-color 0.3s ease;
}

.form-group input[type="text"]:focus,
.form-group select:focus {
    border-color: #007BFF;
    outline: none;
}

.error-message {
    color: red;
    font-size: 14px;
    margin-top: 4px;
}

.form-group select {
    appearance: none;
    background: url("data:image/svg+xml;utf8,<svg fill='%23333' height='20' viewBox='0 0 24 24' width='20' xmlns='http://www.w3.org/2000/svg'><path d='M7 10l5 5 5-5z'/></svg>") no-repeat right 12px center;
    background-color: white;
    background-size: 16px;
}

        .register-container h2 {
            color: var(--secondary-color);
            margin-bottom: 1.5rem;
            font-size: 1.8rem;
            text-align: center;
            font-weight: 600;
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
        
        .password-strength {
            height: 4px;
            background-color: #eee;
            margin-top: 0.5rem;
            border-radius: 2px;
            overflow: hidden;
        }
        
        .password-strength-bar {
            height: 100%;
            width: 0%;
            background-color: var(--error-color);
            transition: width 0.3s, background-color 0.3s;
        }
        
        .error-message {
            color: var(--error-color);
            font-size: 0.85rem;
            margin-top: 0.5rem;
            min-height: 1rem;
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
            margin-top: 0.5rem;
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
        
        .security-tips {
            margin-top: 2rem;
            padding: 1rem;
            background-color: #f8f9fa;
            border-radius: 4px;
            font-size: 0.85rem;
        }
        
        .security-tips h3 {
            margin-top: 0;
            color: var(--secondary-color);
            font-size: 1rem;
        }
        
        .security-tips ul {
            padding-left: 1.2rem;
            margin-bottom: 0;
        }
        
        .security-tips li {
            margin-bottom: 0.5rem;
        }
        
        footer {
            background-color: var(--secondary-color);
            color: white;
            text-align: center;
            padding: 1rem;
            font-size: 0.85rem;
        }
        
        @media (max-width: 576px) {
            .register-container {
                padding: 1.5rem;
            }
            
            .bank-header {
                flex-direction: column;
                text-align: center;
                padding: 1rem;
            }
            
            .bank-logo {
                margin-bottom: 0.5rem;
            }
        }
    </style>
</head>
<body>
    <header class="bank-header">
        <div class="bank-logo">
              <img src="assets/img/logo.png" alt="logo" width="150px">
        </div>
        <a href="{{ route('login') }}" class="login-link">Sign In</a>
    </header>
    
    <div class="main-container">
        <div class="register-container">
            <h2>Create Your Online Banking Account</h2>
            
            <form method="POST" action="{{ route('register') }}">
                @csrf

                <div class="form-group">
                    <label for="name">Full Legal Name</label>
                    <input type="text" name="name" value="{{ old('name') }}" required maxlength="100" id="name" placeholder="As it appears on your ID">
                    <div class="error-message">
                        @error('name') {{ $message }} @enderror
                    </div>
                </div>

                <div class="form-group">
                    <label for="email">Email Address</label>
                    <input type="email" name="email" value="{{ old('email') }}" required id="email" placeholder="Your email address" autofocus>
                    <div class="error-message">
                        @error('email') {{ $message }} @enderror
                    </div>
                </div>

                <div class="form-group">
                    <label for="country">Country</label>
                    <input type="text" name="country" value="{{ old('country') }}" required id="country" placeholder="Your Country" autofocus>
                    <div class="error-message">
                        @error('country') {{ $message }} @enderror
                    </div>
                </div>


                <div class="form-group">
    <label for="account_type">Account Type</label>
    <select name="account_type" id="account_type" required>
        <option value="">Select Account Type</option>
        <option value="savings" {{ old('account_type') == 'savings' ? 'selected' : '' }}>Savings</option>
        <option value="checking" {{ old('account_type') == 'checking' ? 'selected' : '' }}>Checking</option>
    </select>
    <div class="error-message">
        @error('account_type') {{ $message }} @enderror
    </div>
</div>


                 <div class="form-group">
                    <label for="phone">Phone</label>
                    <input type="text" name="phone" value="{{ old('phone') }}" required id="phone" placeholder="Your Phone" autofocus>
                    <div class="error-message">
                        @error('phone') {{ $message }} @enderror
                    </div>
                </div>

                  <div class="form-group">
                    <label for="currency">Currency</label>
                    <input type="text" name="currency" value="{{ old('currency') }}" required id="currency" placeholder="Your currency" autofocus>
                    <div class="error-message">
                        @error('currency') {{ $message }} @enderror
                    </div>
                </div>

                <div class="form-group">
                    <label for="dob">Date of birth</label>
                    <input type="date" name="dob" value="{{ old('dob') }}" required id="dob" placeholder="" autofocus>
                    <div class="error-message">
                        @error('dob') {{ $message }} @enderror
                    </div>
                </div>

                <div class="form-group">
                    <label for="password">Create Password</label>
                    <input type="password" name="password" autocomplete="new-password" required id="password" placeholder="Minimum 8 characters">
                    <div class="password-strength">
                        <div class="password-strength-bar" id="password-strength-bar"></div>
                    </div>
                    <div class="error-message">
                        @error('password') {{ $message }} @enderror
                    </div>
                </div>

                <div class="form-group">
                    <label for="password_confirmation">Confirm Password</label>
                    <input type="password" name="password_confirmation" required id="password_confirmation" placeholder="Re-enter your password">
                    <div class="error-message">
                        @error('password_confirmation') {{ $message }} @enderror
                    </div>
                </div>

                <button type="submit" class="btn-primary">Register for Online Banking</button>
            </form>
            
            <div class="login-prompt">
                Already have an account? <a href="{{ route('login') }}">Sign in to your account</a>
            </div>
            
            <div class="security-tips">
                <h3>Security Tips:</h3>
                <ul>
                    <li>Never share your password with anyone</li>
                    <li>Use a combination of letters, numbers and special characters</li>
                    <li>Avoid using personal information in your password</li>
                </ul>
            </div>
        </div>
    </div>

    <footer>
        <p>Copyright &copy; 2025 Prime Summit Bank. All rights reserved. | Member FDIC</p>
    </footer>

    <script>
        // Password strength indicator
        const passwordInput = document.getElementById('password');
        const strengthBar = document.getElementById('password-strength-bar');
        
        passwordInput.addEventListener('input', function() {
            const password = passwordInput.value;
            let strength = 0;
            
            // Check length
            if (password.length >= 8) strength += 1;
            if (password.length >= 12) strength += 1;
            
            // Check for mixed case
            if (/[a-z]/.test(password) && /[A-Z]/.test(password)) strength += 1;
            
            // Check for numbers
            if (/\d/.test(password)) strength += 1;
            
            // Check for special chars
            if (/[^a-zA-Z0-9]/.test(password)) strength += 1;
            
            // Update strength bar
            let width = 0;
            let color = '';
            
            switch(strength) {
                case 0:
                case 1:
                    width = 25;
                    color = 'var(--error-color)';
                    break;
                case 2:
                    width = 50;
                    color = '#ffc107';
                    break;
                case 3:
                    width = 75;
                    color = '#17a2b8';
                    break;
                case 4:
                case 5:
                    width = 100;
                    color = 'var(--success-color)';
                    break;
            }
            
            strengthBar.style.width = width + '%';
            strengthBar.style.backgroundColor = color;
        });
    </script>
</body>
</html>