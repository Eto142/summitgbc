<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account Restricted</title>

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">

    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: 'Inter', sans-serif;
            background: linear-gradient(135deg, #f0f4f8, #d9e2ec);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .card {
            background: #fff;
            max-width: 500px;
            width: 100%;
            padding: 50px 40px;
            border-radius: 16px;
            box-shadow: 0 15px 40px rgba(0,0,0,0.1);
            text-align: center;
            position: relative;
            overflow: hidden;
            animation: fadeInUp 0.7s ease forwards;
        }

        @keyframes fadeInUp {
            from { opacity: 0; transform: translateY(30px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .icon-circle {
            width: 100px;
            height: 100px;
            background: #ffe5e5;
            color: #e63946;
            border-radius: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 50px;
            margin: 0 auto 25px;
            box-shadow: 0 5px 20px rgba(230, 57, 70, 0.2);
        }

        h1 {
            font-size: 28px;
            color: #222;
            margin-bottom: 15px;
            font-weight: 700;
        }

        p {
            font-size: 16px;
            color: #555;
            margin-bottom: 25px;
            line-height: 1.6;
        }

        .contact-box {
            background: #fbeaea;
            padding: 18px 20px;
            border-radius: 10px;
            border-left: 5px solid #e63946;
            color: #8b1c1c;
            font-size: 15px;
            margin-bottom: 30px;
        }

        a.button {
            display: inline-block;
            background: #007bff;
            color: #fff;
            padding: 14px 32px;
            font-size: 16px;
            font-weight: 600;
            border-radius: 10px;
            text-decoration: none;
            transition: all 0.3s ease;
        }

        a.button:hover {
            background: #0056c7;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }

        /* Decorative background shapes */
        .card::before {
            content: "";
            position: absolute;
            width: 120px;
            height: 120px;
            background: #ffe5e5;
            border-radius: 50%;
            top: -40px;
            right: -40px;
            z-index: 0;
        }

        .card::after {
            content: "";
            position: absolute;
            width: 80px;
            height: 80px;
            background: #ffe5e5;
            border-radius: 50%;
            bottom: -30px;
            left: -30px;
            z-index: 0;
        }
    </style>
</head>
<body>

    <div class="card">
        <div class="icon-circle">⚠️</div>
        <h1>Account Restricted</h1>
        <p>
            Your account has been temporarily restricted for security or compliance reasons.<br>
            To restore access, please contact our support team immediately.
        </p>

        <div class="contact-box">
            <strong>Need help?</strong><br>
            Email: <b>support@primesummitb.com</b><br>
            Response typically within 24 hours.
        </div>

        <a href="{{ route('login') }}" class="button">Return to Login</a>
    </div>

</body>
</html>
