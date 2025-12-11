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
