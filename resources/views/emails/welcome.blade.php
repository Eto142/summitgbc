<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Our Bank</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            line-height: 1.6;
            color: #333;
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #f9f9f9;
        }
        .header {
            background-color: #0056b3;
            padding: 20px;
            text-align: center;
            border-radius: 8px 8px 0 0;
        }
        .header h1 {
            color: white;
            margin: 0;
            font-size: 24px;
        }
        .content {
            background-color: white;
            padding: 30px;
            border-radius: 0 0 8px 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
        }
        .welcome-text {
            font-size: 16px;
            margin-bottom: 25px;
        }
        .account-details {
            background-color: #f5f9ff;
            border-left: 4px solid #0056b3;
            padding: 15px;
            margin: 20px 0;
        }
        .detail-item {
            margin-bottom: 10px;
        }
        .detail-label {
            font-weight: bold;
            color: #0056b3;
            display: inline-block;
            width: 140px;
        }
        .footer {
            margin-top: 30px;
            font-size: 14px;
            color: #666;
            text-align: center;
        }
        .signature {
            margin-top: 20px;
            font-style: italic;
            color: #444;
        }
        .highlight {
            color: #0056b3;
            font-weight: bold;
        }
        .security-note {
            background-color: #fff8e6;
            padding: 15px;
            border-radius: 5px;
            margin: 20px 0;
            font-size: 14px;
        }
        .bank-logo {
            max-width: 180px;
            margin-bottom: 15px;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>Welcome to Prime Summit Bank</h1>
    </div>
    
    <div class="content">
        <p class="welcome-text">Dear <span class="highlight">{{ $user->name }}</span>,</p>
        
        <p>We're absolutely delighted to welcome you to the Prime Summit Bank family! 🌟 Your trust means the world to us, and we're committed to providing you with exceptional banking services.</p>
        
        <div class="account-details">
            <div class="detail-item">
                <span class="detail-label">Full Name:</span>
                <span>{{ $user->name }}</span>
            </div>
            <div class="detail-item">
                <span class="detail-label">Email Address:</span>
                <span>{{ $user->email }}</span>
            </div>
            <div class="detail-item">
                <span class="detail-label">Account Number:</span>
                <span class="highlight">{{ $user->account_number }}</span>
            </div>
            <div class="detail-item">
                <span class="detail-label">Account Type:</span>
                <span>{{ ucfirst($user->account_type) }} Account</span>
            </div>
        </div>
        
        <div class="security-note">
            <p>🔒 <strong>Security Tip:</strong> Your account security is our top priority. Never share your transaction PIN or online banking credentials with anyone. Our team will never ask for this information via email or phone.</p>
        </div>
        
        <p>To get started, you can log in to your account through our webapp We've prepared a special <a href="{{ route('login') }}" style="color: #0056b3; text-decoration: none;">Getting Started Guide</a> to help you make the most of your new account.</p>
        
        <p>Should you need any assistance, our friendly customer support team is available 24/7 at support@primesummitbank.com</p>
        
    
        
        <div class="footer">
            <p>© 2025 Prime Summit Bank. All rights reserved.<br>
            </p>
        </div>
    </div>
</body>
</html>