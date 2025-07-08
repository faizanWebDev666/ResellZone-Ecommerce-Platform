<!DOCTYPE html>
<html>
<head>
    <title>Verify Your Email</title>
</head>
<body>
<div class="container" style="font-family: Arial, sans-serif; max-width: 600px; margin: auto; padding: 20px; border: 1px solid #ddd;">
    <h2 style="color: #2c3e50;">Welcome to ResellZone, {{ $user->name }}!</h2>
    
    <p style="font-size: 16px; color: #555;">
        We're thrilled to have you as part of our growing community! ResellZone is a secure, user-friendly marketplace where you can buy, sell, and discover a wide range of pre-loved items — from gadgets and fashion to books and more.
    </p>

    <p style="font-size: 16px; color: #555;">
        To ensure your account is protected and to start exploring all features of ResellZone, please verify your email address by clicking the button below:
    </p>

    <p style="text-align: center; margin: 30px 0;">
        <a href="{{ $verificationLink }}" style="background-color: #28a745; color: white; padding: 12px 24px; text-decoration: none; border-radius: 5px; font-weight: bold;">
            ✔ Verify My Email
        </a>
    </p>

    <p style="font-size: 16px; color: #555;">
        Once verified, you’ll be able to:
        <ul style="margin-top: 10px; margin-bottom: 20px; padding-left: 20px; color: #555;">
            <li>Set up your profile and preferences</li>
            <li>List products for sale in just a few clicks</li>
            <li>Explore amazing deals from other trusted sellers</li>
            <li>Track orders and manage your transactions</li>
        </ul>
    </p>

    <p style="font-size: 16px; color: #555;">
        If you did not sign up for a ResellZone account, you can safely ignore this email. No action will be taken unless you complete the verification process.
    </p>

    <hr style="margin: 30px 0;">

    <p style="font-size: 14px; color: #888;">
        Need help or have questions? Contact our support team anytime at 
        <a href="mailto:support@resellzone.com" style="color: #28a745;">support@resellzone.com</a>.
    </p>

    <p style="font-size: 16px; color: #2c3e50;">
        Best regards,<br>
        <strong>The ResellZone Team</strong>
    </p>
</div>

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            text-align: center;
            padding: 40px;
        }
        .container {
            background: #ffffff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            max-width: 450px;
            margin: auto;
        }
        h2 {
            color: #333;
            font-size: 24px;
        }
        p {
            color: #666;
            font-size: 16px;
            line-height: 1.5;
        }
        .btn {
            display: inline-block;
            background-color: #800000;
            color: white;
            padding: 14px 28px;
            border-radius: 5px;
            text-decoration: none;
            font-size: 18px;
            font-weight: bold;
            transition: background 0.3s ease, transform 0.2s ease;
        }
        .btn:hover {
            background-color: #a00000;
            transform: scale(1.05);
        }
        .footer {
            margin-top: 20px;
            font-size: 14px;
            color: #888;
        }
    </style>
</body>
</html>