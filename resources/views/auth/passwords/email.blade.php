@extends('layouts.app')

@section('content')
<style>
    body {
        background-color: #f7f0f8;
    }
    .custom-card {
        background: #fff;
        padding: 30px;
        border-radius: 12px;
        box-shadow: 0px 10px 25px rgba(0, 0, 0, 0.05);
    }
    .gradient-btn {
        background: linear-gradient(to right, #d63384, #d63384);
        color: white;
        font-weight: bold;
        border: none;
    }
    .gradient-btn:hover {
        opacity: 0.9;
    }
    .form-label {
        color: #6c757d;
        font-weight: 500;
    }
    .form-control::placeholder {
        color: #d1a3b3;
        font-size: 14px;
    }
</style>

<div class="d-flex justify-content-center align-items-center vh-100">
    <div class="custom-card w-100" style="max-width: 400px;">
        <h4 class="text-center mb-4" style="color: #d63384;">RESET PASSWORD</h4>

        @if (session('status'))
            <div class="alert alert-success">{{ session('status') }}</div>
        @endif

        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <div class="mb-3">
                <label for="email" class="form-label">Email Address</label>
                <input id="email" type="email" class="form-control" name="email" required placeholder="Enter your email">
            </div>

            <div class="d-grid mb-3">
                <button type="submit" class="btn gradient-btn">SEND RESET LINK</button>
            </div>

            <div class="text-center">
                <a href="{{ route('login') }}" style="color: #d63384; text-decoration: none;">← Back to login</a>
            </div>
        </form>
    </div>
</div>
@endsection
