<!DOCTYPE html>
<html>
<head>
    <title>{{ $subject ?? 'Notification' }}</title>
    <style>
        body { font-family: Arial, sans-serif; line-height: 1.6; color: #333; }
        .container { max-width: 600px; margin: 0 auto; padding: 20px; }
        .header { background-color: #f8f9fa; padding: 15px; text-align: center; }
        .content { padding: 20px; background-color: #fff; }
        .footer { margin-top: 20px; padding: 10px; text-align: center; font-size: 0.8em; color: #666; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h2>{{ config('app.name') }}</h2>
        </div>
        
        <div class="content">
            {!! nl2br(e($content)) !!}
        </div>
        
        <div class="footer">
            <p>This email was sent from {{ config('app.name') }}. Please do not reply to this email.</p>
        </div>
    </div>
</body>
</html>