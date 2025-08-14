<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Reset Password - Tanjung Lesung ERP</title>
    <link rel="icon" href="{{ asset('logotj.png') }}" type="image/png">
    <style>
        body {
            font-family: sans-serif;
            background-color: #f7f7f7;
            margin: 0;
            padding: 0;
        }

        .navbar {
            background-color: #FF4E98;
            padding: 15px 30px;
            color: white;
            font-weight: bold;
            font-size: 18px;
        }

        .main-container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: calc(100vh - 60px);
        }

        .login-box {
            background: white;
            padding: 40px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.2);
            width: 350px;
        }

        .login-box h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #FF4E98;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            display: block;
            margin-bottom: 5px;
        }

        .form-group input {
            width: 100%;
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }

        .btn-login {
            width: 100%;
            padding: 10px;
            background: #FF4E98;
            border: none;
            color: white;
            font-size: 16px;
            border-radius: 5px;
            cursor: pointer;
        }

        .btn-login:hover {
            background: #e03c7b;
        }

        .error {
            color: red;
            font-size: 14px;
            margin-bottom: 10px;
        }

    </style>
</head>
<body>

<div class="navbar">
    Tanjung Lesung Management System
</div>

<div class="main-container">
    <div class="login-box">
        <h2>Reset Password</h2>

        @if ($errors->any())
            <div class="error">{{ $errors->first() }}</div>
        @endif

        <form method="POST" action="{{ route('password.update') }}">
            @csrf

            <input type="hidden" name="token" value="{{ $token }}">

            <div class="form-group">
                <label for="email">Email Address</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}" required>
            </div>

            <div class="form-group">
                <label for="password">New Password</label>
                <input id="password" type="password" name="password" required>
            </div>

            <div class="form-group">
                <label for="password_confirmation">Confirm Password</label>
                <input id="password_confirmation" type="password" name="password_confirmation" required>
            </div>

            <button type="submit" class="btn-login">Reset Password</button>
        </form>
    </div>
</div>

</body>
</html>
