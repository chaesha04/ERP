<x-layoutlogin>
    <x-slot:title>Tanjung Lesung Enterprise Resource Planning</x-slot:title>
    <head>
        <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
        <style>
            body {
                background-color: #f6edf6;
                font-family: 'Poppins', sans-serif;
            }
            .auth-card {
                background-color: #ffffff;
                border-radius: 15px;
                box-shadow: 0px 4px 20px rgba(0, 0, 0, 0.05);
                padding: 2rem;
                width: 100%;
                max-width: 380px;
            }
            .auth-title {
                text-align: center;
                font-weight: 700;
                font-size: 1.5rem;
                color: #e91e63;
                margin-bottom: 1.5rem;
            }
            .auth-input {
                border: 1px solid #ddd;
                border-radius: 6px;
                padding: 0.75rem;
                font-size: 0.95rem;
                width: 100%;
            }
            .auth-input:focus {
                outline: none;
                border-color: #ff69b4;
                box-shadow: 0 0 0 2px rgba(255, 105, 180, 0.2);
            }
            .auth-btn {
                background: linear-gradient(90deg, #ff69b4, #ff1493);
                border: none;
                color: white;
                font-weight: 600;
                padding: 0.75rem;
                border-radius: 6px;
                font-size: 0.95rem;
                width: 100%;
                transition: 0.3s;
            }
            .auth-btn:hover {
                background: linear-gradient(90deg, #ff1493, #ff69b4);
            }
            .form-footer {
                display: flex;
                justify-content: space-between;
                align-items: center;
                margin-top: 0.75rem;
                font-size: 0.85rem;
            }
            .form-footer a {
                color: #007bff;
                text-decoration: none;
            }
            .form-footer a:hover {
                text-decoration: underline;
            }
            .custom-checkbox {
                accent-color: #ff69b4;
            }
            .toggle-password {
                position: absolute;
                right: 12px;
                top: 50%;
                transform: translateY(-50%);
                cursor: pointer;
                color: #666;
            }
        </style>
    </head>

    <body>
        <div class="flex items-center justify-center min-h-screen">
            <div class="auth-card">
                @if (session('failed'))
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-2 rounded mb-3">
                        {{ session('failed') }}
                    </div>
                @endif

                <h4 class="auth-title">LOGIN</h4>

                <form action="/login" method="POST">
                    @csrf
                    @error('email')
                        <small class="text-red-500">{{ $message }}</small>
                    @enderror
                    <div class="mb-4 relative">
                        <input type="email" name="email" class="auth-input" placeholder="Email" required>
                    </div>

                    @error('password')
                        <small class="text-red-500">{{ $message }}</small>
                    @enderror
                    <div class="mb-4 relative">
                        <input type="password" name="password" id="password" class="auth-input" placeholder="Password" required>
                        <i class="fas fa-eye toggle-password" id="togglePassword" style="position: absolute; top: 50%; right: 15px; transform: translateY(-50%); cursor: pointer;"></i>
                    </div>

                    <button type="submit" class="auth-btn">SIGN IN</button>

                    <div class="form-footer">
                        <label class="flex items-center space-x-2">
                            <input type="checkbox" class="custom-checkbox">
                            <span>Keep me signed in</span>
                        </label>
                        <a href="{{ route('password.request') }}" class="forgot-password">Forgot Password?</a>

                    </div>
                </form>
            </div>
        </div>

        <script>
            const togglePassword = document.getElementById("togglePassword");
            const passwordInput = document.getElementById("password");
            togglePassword.addEventListener("click", function () {
                const type = passwordInput.getAttribute("type") === "password" ? "text" : "password";
                passwordInput.setAttribute("type", type);
                this.classList.toggle("fa-eye");
                this.classList.toggle("fa-eye-slash");
            });
        </script>
    </body>
</x-layoutlogin>
