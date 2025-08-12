<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name') }} - OTP</title>
</head>
<body>
    <h2>One-Time Password (OTP)</h2>
    <p>Your verification code is:</p>
    <h1 style="letter-spacing: 4px;">{{ $otp }}</h1>
    <p>This code will expire in 5 minutes.</p>
</body>
</html>
