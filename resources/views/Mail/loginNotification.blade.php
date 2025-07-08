<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Alert - ReSellZone</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 0;
        }
        .email-container {
            width: 100%;
            max-width: 600px;
            margin: 50px auto;
            background-color: #ffffff;
            border-radius: 10px;
            padding: 30px;
            box-shadow: 0 12px 30px rgba(0, 0, 0, 0.1);
        }
        .header {
            text-align: center;
            margin-bottom: 20px;
        }
        .header h1 {
            color: #4C2C92;
            font-size: 28px;
            font-weight: 600;
            margin: 0;
        }
        .content {
            color: #555;
            font-size: 16px;
            line-height: 1.6;
            margin-bottom: 20px;
        }
        .important-text {
            font-weight: 600;
            color: #D87B3E;
        }
        .footer {
            text-align: center;
            color: #777;
            font-size: 14px;
            margin-top: 30px;
        }
        .footer a {
            color: #4C2C92;
            text-decoration: none;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="email-container" style="font-family: Arial, sans-serif; padding: 20px; max-width: 600px; margin: auto; border: 1px solid #ddd; border-radius: 10px;">
        <div class="header" style="background-color: white; padding: 15px; text-align: center; color: white;">
            <h1>Login Alert - ResellZone | Secure Access</h1>
        </div>

        <div class="content" style="padding: 20px;">
            <p>Dear <strong>{{ $details['user_name'] }}</strong>,</p>

            <p>We detected a successful login to your <span style="color: #800000; font-weight: bold;">ResellZone</span> account on <strong>{{ $details['login_date'] }}</strong>.</p>

            <p>If this was you, there’s nothing to worry about! However, if you did not authorize this login, we strongly recommend that you <span style="color: red; font-weight: bold;">reset your password immediately</span> to secure your account.</p>

            <h3 style="color: #800000;">Security Tips:</h3>
            <ul>
                <li>🔒 Never share your login credentials with anyone.</li>
                <li>📧 Beware of phishing emails—ResellZone will never ask for your password.</li>
                <li>🔑 Enable two-factor authentication (2FA) for extra security.</li>
            </ul>

            <p>If you have any concerns or need assistance, feel free to <a href="#" style="color: #800000;">contact our support team</a>.</p>
        </div>

        <div class="footer" style="background-color: #f8f8f8; padding: 10px; text-align: center; font-size: 14px; color: #555;">
            <p>Best regards,</p>
            <p><strong>The ResellZone Team</strong></p>
            <p>&copy; {{ date('Y') }} ResellZone. All rights reserved.</p>
        </div>
    </div>
</body>

</html>
