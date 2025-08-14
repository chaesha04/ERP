<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login - Tanjung Lesung ERP</title>
    <link rel="icon" href="{{ asset('logotj.png') }}" type="image/png">
    <style>
        body {
            font-family: sans-serif;
            background-color: #f7f7f7;
            margin: 0;
            padding: 0;
        }

        /* === Navbar === */
        .navbar {
            background-color: #FF4E98;
            padding: 15px 30px;
            color: white;
            font-weight: bold;
            font-size: 18px;
        }

        /* === Login Box === */
        .main-container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: calc(100vh - 60px); /* subtract navbar height */
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

        .form-group input:focus {
            border-color: #FF4E98;
            outline: none;
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

        .remember-forgot {
            display: flex;
            justify-content: space-between;
            font-size: 13px;
        }

        .remember-forgot a {
            text-decoration: none;
            color: #FF4E98;
        }
    </style>
</head>
<body>

    <!-- === Navbar === -->
    <div class="navbar">
        Tanjung Lesung Management System
    </div>

    <div class="main-container">
        <div class="login-box">
            <h2>Login</h2>

            @if($errors->any())
                <div class="error">{{ $errors->first() }}</div>
            @endif

            <form action="{{ route('login.process') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="email">Your email</label>
                    <input type="email" name="email" id="email" value="{{ old('email') }}" required>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" required>
                </div>

                <div class="remember-forgot">
                    <label><input type="checkbox" name="remember"> Remember me</label>
                    <a href="{{ route('password.request') }}">Forgot password?</a>
                </div>

                <button type="submit" class="btn-login" style="margin-top: 16px;">
                    Sign in
                </button>

            </form>
        </div>
    </div>
</body>
</html>
