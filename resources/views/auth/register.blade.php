<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prime Summit Bank Online - Register</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary-color: #0056b3;
            --primary-hover: #004494;
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
        
        .login-link {
            color: white;
            text-decoration: none;
            font-weight: 600;
            padding: 0.5rem 1rem;
            border-radius: var(--border-radius);
            transition: var(--transition);
            display: flex;
            align-items: center;
        }
        
        .login-link:hover {
            background-color: rgba(255, 255, 255, 0.15);
        }
        
        .login-link i {
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
        
        .register-container {
            background-color: white;
            border-radius: var(--border-radius);
            box-shadow: var(--box-shadow);
            width: 100%;
            max-width: 500px;
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
        
        .register-container h2 {
            color: var(--secondary-color);
            margin-bottom: 1.8rem;
            font-size: 1.8rem;
            text-align: center;
            font-weight: 700;
            position: relative;
            padding-bottom: 15px;
        }
        
        .register-container h2::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
            width: 80px;
            height: 3px;
            background-color: var(--accent-color);
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
        
        .form-group input,
        .form-group select {
            width: 100%;
            padding: 0.85rem 1rem;
            border: 1px solid #ddd;
            border-radius: var(--border-radius);
            font-size: 1rem;
            transition: var(--transition);
            box-sizing: border-box;
            background-color: #f9f9f9;
        }
        
        .form-group input:focus,
        .form-group select:focus {
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
        
        .password-strength {
            height: 5px;
            background-color: #eee;
            margin-top: 0.5rem;
            border-radius: 2px;
            overflow: hidden;
            position: relative;
        }
        
        .password-strength::before {
            content: '';
            position: absolute;
            left: 0;
            top: 0;
            height: 100%;
            width: 0%;
            background-color: var(--error-color);
            transition: width 0.3s, background-color 0.3s;
        }
        
        .password-strength[data-strength="weak"]::before {
            width: 25%;
            background-color: var(--error-color);
        }
        
        .password-strength[data-strength="medium"]::before {
            width: 50%;
            background-color: var(--warning-color);
        }
        
        .password-strength[data-strength="good"]::before {
            width: 75%;
            background-color: #17a2b8;
        }
        
        .password-strength[data-strength="strong"]::before {
            width: 100%;
            background-color: var(--success-color);
        }
        
        .password-strength-text {
            font-size: 0.75rem;
            margin-top: 0.25rem;
            text-align: right;
            font-weight: 500;
        }
        
        .password-strength-text.weak {
            color: var(--error-color);
        }
        
        .password-strength-text.medium {
            color: var(--warning-color);
        }
        
        .password-strength-text.good {
            color: #17a2b8;
        }
        
        .password-strength-text.strong {
            color: var(--success-color);
        }
        
        .error-message {
            color: var(--error-color);
            font-size: 0.85rem;
            margin-top: 0.5rem;
            min-height: 1rem;
            font-weight: 500;
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
        }
        
        .btn-primary:hover {
            background: linear-gradient(to right, var(--primary-hover), var(--accent-color));
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(0, 86, 179, 0.3);
        }
        
        .btn-primary:active {
            transform: translateY(0);
        }
        
        .login-prompt {
            text-align: center;
            margin-top: 1.5rem;
            color: #666;
            font-size: 0.95rem;
        }
        
        .login-prompt a {
            color: var(--primary-color);
            text-decoration: none;
            font-weight: 600;
            transition: var(--transition);
            position: relative;
        }
        
        .login-prompt a::after {
            content: '';
            position: absolute;
            bottom: -2px;
            left: 0;
            width: 0;
            height: 2px;
            background-color: var(--primary-color);
            transition: var(--transition);
        }
        
        .login-prompt a:hover::after {
            width: 100%;
        }
        
        .security-tips {
            margin-top: 2rem;
            padding: 1.25rem;
            background-color: #f8f9fa;
            border-radius: var(--border-radius);
            font-size: 0.85rem;
            border-left: 4px solid var(--accent-color);
        }
        
        .security-tips h3 {
            margin-top: 0;
            color: var(--secondary-color);
            font-size: 1rem;
            font-weight: 700;
            margin-bottom: 0.75rem;
            display: flex;
            align-items: center;
        }
        
        .security-tips h3 i {
            margin-right: 8px;
            color: var(--accent-color);
        }
        
        .security-tips ul {
            padding-left: 1.5rem;
            margin-bottom: 0;
        }
        
        .security-tips li {
            margin-bottom: 0.5rem;
            position: relative;
        }
        
        .security-tips li::before {
            content: '•';
            color: var(--accent-color);
            font-weight: bold;
            display: inline-block;
            width: 1em;
            margin-left: -1em;
        }
        
        footer {
            background-color: var(--secondary-color);
            color: white;
            text-align: center;
            padding: 1.25rem;
            font-size: 0.85rem;
            position: relative;
        }
        
        footer::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 3px;
            background: linear-gradient(to right, var(--accent-color), var(--primary-color));
        }
        
        /* Form grid layout */
        .form-row {
            display: flex;
            gap: 1.5rem;
        }
        
        .form-col {
            flex: 1;
        }
        
        /* Custom select styling */
        .form-group select {
            appearance: none;
            background: url("data:image/svg+xml;utf8,<svg fill='%23333' height='20' viewBox='0 0 24 24' width='20' xmlns='http://www.w3.org/2000/svg'><path d='M7 10l5 5 5-5z'/></svg>") no-repeat right 12px center/16px;
            background-color: #f9f9f9;
            padding-right: 36px;
        }
        
        /* Date input styling */
        input[type="date"]::-webkit-calendar-picker-indicator {
            background: transparent;
            bottom: 0;
            color: transparent;
            cursor: pointer;
            height: auto;
            left: 0;
            position: absolute;
            right: 0;
            top: 0;
            width: auto;
        }
        
        /* Responsive adjustments */
        @media (max-width: 768px) {
            .form-row {
                flex-direction: column;
                gap: 1rem;
            }
        }
        
        @media (max-width: 576px) {
            .register-container {
                padding: 1.75rem;
            }
            
            .bank-header {
                padding: 0.75rem 1rem;
            }
            
            .main-container {
                padding: 1rem;
            }
        }
        
        /* Animation for form elements */
        .form-group {
            animation: fadeIn 0.5s ease forwards;
            opacity: 0;
        }
        
        @keyframes fadeIn {
            to {
                opacity: 1;
            }
        }
        
        /* Add delay to form group animations */
        .form-group:nth-child(1) { animation-delay: 0.1s; }
        .form-group:nth-child(2) { animation-delay: 0.2s; }
        .form-group:nth-child(3) { animation-delay: 0.3s; }
        .form-group:nth-child(4) { animation-delay: 0.4s; }
        .form-group:nth-child(5) { animation-delay: 0.5s; }
        .form-group:nth-child(6) { animation-delay: 0.6s; }
        .form-group:nth-child(7) { animation-delay: 0.7s; }
        .form-group:nth-child(8) { animation-delay: 0.8s; }
        .form-group:nth-child(9) { animation-delay: 0.9s; }
        .form-group:nth-child(10) { animation-delay: 1s; }
    </style>
      <!-- Smartsupp Live Chat script -->
<script type="text/javascript">
var _smartsupp = _smartsupp || {};
_smartsupp.key = '38d813798c21a51e784e153e8d884e2e10bf6bb8';
window.smartsupp||(function(d) {
  var s,c,o=smartsupp=function(){ o._.push(arguments)};o._=[];
  s=d.getElementsByTagName('script')[0];c=d.createElement('script');
  c.type='text/javascript';c.charset='utf-8';c.async=true;
  c.src='https://www.smartsuppchat.com/loader.js?';s.parentNode.insertBefore(c,s);
})(document);
</script>
<noscript> Powered by <a href=“https://www.smartsupp.com” target=“_blank”>Smartsupp</a></noscript>
</head>
<body>
    <header class="bank-header">
        <div class="bank-logo">
            <img src="assets/img/logo.png" alt="Prime Summit Bank" width="150">
        </div>
        <a href="{{ route('login') }}" class="login-link">
            <i class="fas fa-sign-in-alt"></i> Sign In
        </a>
    </header>
    
    <div class="main-container">
        <div class="register-container">
            <h2>Create Your Online Banking Account</h2>
            
            <form method="POST" action="{{ route('register') }}" id="registrationForm">
                @csrf

                <div class="form-row">
                    <div class="form-col">
                        <div class="form-group">
                            <label for="name">Full Name</label>
                            <input type="text" name="name" value="{{ old('name') }}" required maxlength="100" id="name" placeholder="As it appears on your ID">
                            <div class="error-message">
                                @error('name') {{ $message }} @enderror
                            </div>
                        </div>
                    </div>
                    <div class="form-col">
                        <div class="form-group">
                            <label for="email">Email Address</label>
                            <input type="email" name="email" value="{{ old('email') }}" required id="email" placeholder="Your email address">
                            <div class="error-message">
                                @error('email') {{ $message }} @enderror
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-col">
                        <div class="form-group">
                            <label for="country">Country</label>
                            <input type="text" name="country" value="{{ old('country') }}" required id="country" placeholder="Your country of residence">
                            <div class="error-message">
                                @error('country') {{ $message }} @enderror
                            </div>
                        </div>
                    </div>
                    <div class="form-col">
                        <div class="form-group">
                            <label for="phone">Phone Number</label>
                            <input type="tel" name="phone" value="{{ old('phone') }}" required id="phone" placeholder="+1 (123) 456-7890">
                            <div class="error-message">
                                @error('phone') {{ $message }} @enderror
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-col">
                        <div class="form-group">
                            <label for="account_type">Account Type</label>
                            <select name="account_type" id="account_type" required>
                                <option value="">Select Account Type</option>
                                <option value="savings" {{ old('account_type') == 'savings' ? 'selected' : '' }}>Savings Account</option>
                                <option value="checking" {{ old('account_type') == 'checking' ? 'selected' : '' }}>Checking Account</option>
                                <option value="business" {{ old('account_type') == 'business' ? 'selected' : '' }}>Business Account</option>
                            </select>
                            <div class="error-message">
                                @error('account_type') {{ $message }} @enderror
                            </div>
                        </div>
                    </div>
                    <div class="form-col">
                        <div class="form-group">
                            <label for="currency">Preferred Currency</label>
                            <select name="currency" id="currency" required>
                                 <option value="$" @if(old('currency') == '$') selected @endif>$ (US Dollar)</option>
        <option value="€" @if(old('currency') == '€') selected @endif>€ (Euro)</option>
        <option value="£" @if(old('currency') == '£') selected @endif>£ (British Pound)</option>
        <option value="¥" @if(old('currency') == '¥') selected @endif>¥ (Japanese Yen/Chinese Yuan)</option>
        <option value="A$" @if(old('currency') == 'A$') selected @endif>A$ (Australian Dollar)</option>
        <option value="C$" @if(old('currency') == 'C$') selected @endif>C$ (Canadian Dollar)</option>
        <option value="CHF" @if(old('currency') == 'CHF') selected @endif>CHF (Swiss Franc)</option>
        
        <!-- Asian Currencies -->
        <option value="₹" @if(old('currency') == '₹') selected @endif>₹ (Indian Rupee)</option>
        <option value="₩" @if(old('currency') == '₩') selected @endif>₩ (South Korean Won)</option>
        <option value="₱" @if(old('currency') == '₱') selected @endif>₱ (Philippine Peso)</option>
        <option value="RM" @if(old('currency') == 'RM') selected @endif>RM (Malaysian Ringgit)</option>
        <option value="฿" @if(old('currency') == '฿') selected @endif>฿ (Thai Baht)</option>
        <option value="₫" @if(old('currency') == '₫') selected @endif>₫ (Vietnamese Dong)</option>
        
        <!-- Middle East & Africa -->
        <option value="د.إ" @if(old('currency') == 'د.إ') selected @endif>د.إ (UAE Dirham)</option>
        <option value="₪" @if(old('currency') == '₪') selected @endif>₪ (Israeli Shekel)</option>
        <option value="﷼" @if(old('currency') == '﷼') selected @endif>﷼ (Saudi Riyal)</option>
        <option value="R" @if(old('currency') == 'R') selected @endif>R (South African Rand)</option>
        <option value="₦" @if(old('currency') == '₦') selected @endif>₦ (Nigerian Naira)</option>
        <option value="ج.م" @if(old('currency') == 'ج.م') selected @endif>ج.م (Egyptian Pound)</option>
        
        <!-- Latin America -->
        <option value="R$" @if(old('currency') == 'R$') selected @endif>R$ (Brazilian Real)</option>
        <option value="Mex$" @if(old('currency') == 'Mex$') selected @endif>Mex$ (Mexican Peso)</option>
        <option value="S/" @if(old('currency') == 'S/') selected @endif>S/ (Peruvian Sol)</option>
        <option value="COL$" @if(old('currency') == 'COL$') selected @endif>COL$ (Colombian Peso)</option>
        <option value="ARS$" @if(old('currency') == 'ARS$') selected @endif>ARS$ (Argentine Peso)</option>
        
        <!-- Europe (Non-Euro) -->
        <option value="kr" @if(old('currency') == 'kr') selected @endif>kr (Swedish/Norwegian/Danish Krone)</option>
        <option value="zł" @if(old('currency') == 'zł') selected @endif>zł (Polish Złoty)</option>
        <option value="Ft" @if(old('currency') == 'Ft') selected @endif>Ft (Hungarian Forint)</option>
        <option value="Kč" @if(old('currency') == 'Kč') selected @endif>Kč (Czech Koruna)</option>
        <option value="₺" @if(old('currency') == '₺') selected @endif>₺ (Turkish Lira)</option>
                            </select>
                            <div class="error-message">
                                @error('currency') {{ $message }} @enderror
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-col">
                        <div class="form-group">
                            <label for="dob">Date of Birth</label>
                            <input type="date" name="dob" value="{{ old('dob') }}" required id="dob" max="{{ date('Y-m-d', strtotime('-18 years')) }}">
                            <div class="error-message">
                                @error('dob') {{ $message }} @enderror
                            </div>
                        </div>
                    </div>
                    <div class="form-col">
                        <div class="form-group">
                            <label for="transaction_pin">Transaction PIN</label>
                            <div class="password-container">
                                <input 
                                    type="password" 
                                    name="transaction_pin" 
                                    value="{{ old('transaction_pin') }}" 
                                    required 
                                    id="transaction_pin" 
                                    placeholder="Enter 4-6 digit PIN" 
                                    maxlength="6"
                                    pattern="[0-9]{4,6}"
                                    title="Please enter a 4 to 6 digit numeric PIN"
                                    autocomplete="off"
                                >
                                <span class="toggle-password" data-target="transaction_pin">
                                    <i class="far fa-eye"></i>
                                </span>
                            </div>
                            <div class="error-message">
                                @error('transaction_pin') {{ $message }} @enderror
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="password">Create Password</label>
                    <div class="password-container">
                        <input type="password" name="password" autocomplete="new-password" required id="password" placeholder="Minimum 8 characters">
                        <span class="toggle-password" data-target="password">
                            <i class="far fa-eye"></i>
                        </span>
                    </div>
                    <div class="password-strength" id="password-strength" data-strength="weak"></div>
                    <div class="password-strength-text" id="password-strength-text">Password Strength: Weak</div>
                    <div class="error-message">
                        @error('password') {{ $message }} @enderror
                    </div>
                </div>

                <div class="form-group">
                    <label for="password_confirmation">Confirm Password</label>
                    <div class="password-container">
                        <input type="password" name="password_confirmation" required id="password_confirmation" placeholder="Re-enter your password">
                        <span class="toggle-password" data-target="password_confirmation">
                            <i class="far fa-eye"></i>
                        </span>
                    </div>
                    <div class="error-message">
                        @error('password_confirmation') {{ $message }} @enderror
                    </div>
                </div>

               

                <button type="submit" class="btn-primary">
                    <i class="fas fa-user-plus"></i> Register for Online Banking
                </button>
            </form>
            
            <div class="login-prompt">
                Already have an account? <a href="{{ route('login') }}">Sign in to your account</a>
            </div>
            
            <div class="security-tips">
                <h3><i class="fas fa-shield-alt"></i> Security Tips:</h3>
                <ul>
                    <li>Never share your password or PIN with anyone, including bank employees</li>
                    <li>Create a strong password with uppercase, lowercase, numbers and special characters</li>
                    <li>Avoid using personal information like birthdays or names in your password</li>
                    <li>Prime Summit Bank will never ask for your password via email or phone</li>
                </ul>
            </div>
        </div>
    </div>

    <footer>
        <p>Copyright &copy; 2025 Prime Summit Bank. All rights reserved. | Member FDIC | Equal Housing Lender</p>
    </footer>

    <script>
        // Password strength indicator
        const passwordInput = document.getElementById('password');
        const passwordStrength = document.getElementById('password-strength');
        const passwordStrengthText = document.getElementById('password-strength-text');
        
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
            
            // Update strength indicator
            let strengthLevel = '';
            let strengthText = '';
            let textClass = '';
            
            if (password.length === 0) {
                strengthLevel = '';
                strengthText = '';
            } else if (strength <= 1) {
                strengthLevel = 'weak';
                strengthText = 'Weak';
                textClass = 'weak';
            } else if (strength <= 3) {
                strengthLevel = 'medium';
                strengthText = 'Medium';
                textClass = 'medium';
            } else if (strength === 4) {
                strengthLevel = 'good';
                strengthText = 'Good';
                textClass = 'good';
            } else {
                strengthLevel = 'strong';
                strengthText = 'Strong';
                textClass = 'strong';
            }
            
            passwordStrength.setAttribute('data-strength', strengthLevel);
            passwordStrengthText.textContent = password.length > 0 ? `Password Strength: ${strengthText}` : '';
            passwordStrengthText.className = `password-strength-text ${textClass}`;
        });
        
        // Toggle password visibility
        document.querySelectorAll('.toggle-password').forEach(toggle => {
            toggle.addEventListener('click', function() {
                const targetId = this.getAttribute('data-target');
                const input = document.getElementById(targetId);
                const icon = this.querySelector('i');
                
                if (input.type === 'password') {
                    input.type = 'text';
                    icon.classList.remove('fa-eye');
                    icon.classList.add('fa-eye-slash');
                } else {
                    input.type = 'password';
                    icon.classList.remove('fa-eye-slash');
                    icon.classList.add('fa-eye');
                }
            });
        });
        
        // Form validation
        const form = document.getElementById('registrationForm');
        form.addEventListener('submit', function(e) {
            const password = document.getElementById('password').value;
            const confirmPassword = document.getElementById('password_confirmation').value;
            
            if (password !== confirmPassword) {
                e.preventDefault();
                document.getElementById('password_confirmation').nextElementSibling.textContent = 'Passwords do not match';
                document.getElementById('password_confirmation').focus();
            }
            
            // Additional validation can be added here
        });
        
        // Date picker max date (18 years ago)
        document.getElementById('dob').max = new Date(new Date().setFullYear(new Date().getFullYear() - 18)).toISOString().split('T')[0];
        
        // Phone number formatting
        document.getElementById('phone').addEventListener('input', function(e) {
            const x = e.target.value.replace(/\D/g, '').match(/(\d{0,3})(\d{0,3})(\d{0,4})/);
            e.target.value = !x[2] ? x[1] : '(' + x[1] + ') ' + x[2] + (x[3] ? '-' + x[3] : '');
        });
    </script>




<!-- WhatsApp Floating Button -->
<a href="https://wa.me/16673863060?text=Hello!%20I%20would%20like%20to%20know%20more%20about%20your%20services." 
   class="whatsapp-float" target="_blank" aria-label="Chat on WhatsApp">
   <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" viewBox="0 0 32 32" fill="white">
      <path d="M19.11 17.53c-.33-.17-1.95-.96-2.25-1.07s-.52-.17-.74.17-.85 1.07-1.05 1.29-.39.26-.72.09a7.87 7.87 0 01-2.31-1.42 
      8.62 8.62 0 01-1.59-1.98c-.17-.3 0-.46.13-.63.13-.13.3-.35.46-.52s.22-.3.35-.52.07-.39 0-.56c-.09-.17-.74-1.77-1.02-2.43s-.52-.52-.74-.52h-.63c-.22 
      0-.56.09-.85.39s-1.12 1.09-1.12 2.66 1.15 3.09 1.31 3.3 2.27 3.46 5.49 4.85c.77.33 1.37.52 1.84.67a4.42 4.42 0 002.03.13c.62-.09 
      1.95-.8 2.23-1.57s.28-1.42.2-1.57-.3-.22-.63-.39zM16.02 3c-7.16 0-12.97 5.81-12.97 12.97 0 2.29.59 4.52 1.71 6.49L3 29l6.74-1.77a12.93 
      12.93 0 006.28 1.61h.01c7.16 0 12.97-5.81 12.97-12.97S23.18 3 16.02 3zm0 23.66c-2.2 0-4.35-.59-6.23-1.7l-.45-.27-4 .99 1.06-3.9-.25-.4a10.93 
      10.93 0 01-1.68-5.83c0-6.05 4.92-10.97 10.97-10.97 2.93 0 5.68 1.14 7.75 3.21s3.21 4.82 3.21 7.75c0 6.05-4.92 10.97-10.97 10.97z"/>
   </svg>
   <span class="whatsapp-tooltip">Chat with us</span>
</a>

<style>
.whatsapp-float {
    position: fixed;
    bottom: 20px;
    left: 20px;
    background: #25D366;
    color: white;
    border-radius: 50%;
    padding: 16px;
    box-shadow: 0 8px 15px rgba(0,0,0,0.3);
    z-index: 9999;
    display: flex;
    align-items: center;
    justify-content: center;
    text-decoration: none;
    transition: all 0.3s ease-in-out;
}

.whatsapp-float:hover {
    transform: scale(1.1) rotate(-5deg);
    box-shadow: 0 12px 20px rgba(0,0,0,0.4);
}

.whatsapp-tooltip {
    position: absolute;
    left: 70px;
    background: #333;
    color: #fff;
    font-size: 14px;
    padding: 6px 12px;
    border-radius: 6px;
    opacity: 0;
    transform: translateY(10px);
    pointer-events: none;
    transition: all 0.3s ease;
    white-space: nowrap;
}

.whatsapp-float:hover .whatsapp-tooltip {
    opacity: 1;
    transform: translateY(0);
}
</style>





</body>
</html>