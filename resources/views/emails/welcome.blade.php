<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Prime Summit Bank</title>
    <style type="text/css">
        /* Inlined CSS to avoid external dependencies */
        body {
            font-family: Arial, Helvetica, sans-serif;
            line-height: 1.5;
            color: #333333;
            max-width: 600px;
            margin: 0 auto;
            padding: 0;
            background-color: #f5f5f5;
        }
        .email-container {
            background-color: #ffffff;
            margin: 0 auto;
            padding: 0;
            width: 100%;
        }
        .header {
            background-color: #1a3e72;
            padding: 25px 30px;
            text-align: center;
        }
        .header h1 {
            color: #ffffff;
            margin: 0;
            font-size: 22px;
            font-weight: normal;
        }
        .content {
            padding: 30px;
        }
        .welcome-text {
            font-size: 16px;
            margin-bottom: 20px;
        }
        .account-details {
            background-color: #f8fafc;
            border-left: 4px solid #1a3e72;
            padding: 18px;
            margin: 25px 0;
        }
        .detail-item {
            margin-bottom: 12px;
        }
        .detail-label {
            font-weight: bold;
            color: #1a3e72;
            display: inline-block;
            width: 130px;
        }
        .footer {
            margin-top: 30px;
            font-size: 12px;
            color: #666666;
            text-align: center;
            padding: 15px;
            border-top: 1px solid #eeeeee;
        }
        .highlight {
            color: #1a3e72;
            font-weight: bold;
        }
        .security-note {
            background-color: #fff9e6;
            padding: 15px;
            border-radius: 4px;
            margin: 25px 0;
            font-size: 14px;
            border-left: 4px solid #e6a700;
        }
        a {
            color: #1a3e72;
            text-decoration: underline;
        }
        .text-center {
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="email-container">
        <div class="header">
            <h1>Welcome to Prime Summit Bank</h1>
        </div>
        
        <div class="content">
            <p class="welcome-text">Dear <span class="highlight">{{ $user->name }}</span>,</p>
            
            <p>Thank you for choosing Prime Summit Bank. We're pleased to have you as a customer and look forward to serving your financial needs.</p>
            
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
                    <span>{{ ucfirst(strtolower($user->account_type)) }} Account</span>
                </div>
            </div>
            
            <div class="security-note">
                <p><strong>Important:</strong> For your protection, please remember that Prime Summit Bank will never ask for your password, PIN, or sensitive account information via email.</p>
            </div>
            

            <p>We appreciate your business and look forward to serving you.</p>
            
            <p>Sincerely,<br>
            The Prime Summit Bank Team</p>
        </div>
        
        <div class="footer">
            <p class="text-center">© 2025 Prime Summit Bank. All Rights Reserved.</p>
            <p class="text-center">This is an automated message. Please do not reply directly to this email.</p>
        </div>
    </div>
</body>
</html>