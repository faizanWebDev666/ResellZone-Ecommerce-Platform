<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Password Reset Request</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #ffffff;
        }

        .email-container {
            max-width: 600px;
            margin: 30px auto;
            padding: 20px;
            border: 1px solid #dddddd;
            border-radius: 5px;
            background-color: #ffffff;
            text-align: left;
        }

        .email-content {
            font-size: 16px;
            line-height: 1.6;
            color: #333333;
        }

        .reset-button {
            display: inline-block;
            padding: 12px 18px;
            margin-top: 20px;
            border: 1px solid #333333;
            text-decoration: none;
            font-size: 16px;
            font-weight: bold;
            border-radius: 5px;
        }

        .footer {
            margin-top: 30px;
            font-size: 14px;
            color: #666666;
            text-align: center;
            border-top: 1px solid #dddddd;
            padding-top: 15px;
        }
    </style>
</head>

<body>
    <div class="email-container">
        <!-- Email Header -->
        <h2>Password Reset Request</h2>

        <!-- Email Content -->
        <div class="email-content">
            <p>Hello,</p>
            <p>You requested to reset your password. Click the link below to proceed:</p>

            <p>
                <a href="{{ $resetLink }}" class="reset-button">Reset Password</a>
            </p>

            <p>If you did not request this, you can ignore this email. Your password will remain unchanged.</p>
            <p>This link will expire in <strong>1 minute</strong>.</p>
        </div>

        <!-- Footer -->
        <div class="footer">
            <p>Best regards,</p>
            <p><strong>The ReSellZone Team</strong></p>
            <p>&copy; 2025 ReSellZone. All rights reserved.</p>
            <p>Need help? <a href="mailto:support@resellzone.com">Contact Support</a></p>
        </div>
    </div>
</body>

</html>
