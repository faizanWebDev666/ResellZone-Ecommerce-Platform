<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cloudflare Verification</title>
    <script src="https://challenges.cloudflare.com/turnstile/v0/api.js" async defer></script>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background: #f2f2f2;
            font-family: Arial, sans-serif;
            flex-direction: column;
        }
        .card {
            background: white;
            padding: 40px;
            border-radius: 12px;
            box-shadow: 0 4px 20px rgba(0,0,0,0.1);
            text-align: center;
        }
        button {
            margin-top: 20px;
            padding: 10px 25px;
            background: #800000;
            color: white;
            border: none;
            border-radius: 8px;
            cursor: pointer;
        }
        button:hover {
            background: #a00000;
        }
        h2 {
            color: #333;
        }
    </style>
</head>
<body>
    <div class="card">
        <h2>🔒 Please verify to continue</h2>
        <form method="POST" action="{{ route('verify.turnstile') }}">
            @csrf
            <div class="cf-turnstile" data-sitekey="{{ env('CLOUDFLARE_SITE_KEY') }}"></div>
            <button type="submit">Verify</button>
        </form>
        @if ($errors->any())
            <p style="color:red;">{{ $errors->first('captcha') }}</p>
        @endif
    </div>
</body>
</html>
