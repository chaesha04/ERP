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
        background: linear-gradient(to right, #ff66a3, #ff3385);
        color: white;
        font-weight: bold;
        border: none;
    }
    .form-label {
        color: #333333; /* ← diganti dari pink jadi abu-abu tua/hitam */
        font-weight: 500;
    }
</style>


<div class="d-flex justify-content-center align-items-center vh-100">
    <div class="custom-card w-100" style="max-width: 400px;">
        <h4 class="text-center mb-4" style="color: #ff3385;">RESET YOUR PASSWORD</h4>

        <form method="POST" action="{{ route('password.update') }}">
            @csrf

            <input type="hidden" name="token" value="{{ request()->route('token') }}">

            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input id="email" type="email" name="email" class="form-control" required value="{{ old('email') }}">
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">New Password</label>
                <input id="password" type="password" name="password" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="password_confirmation" class="form-label">Confirm Password</label>
                <input id="password_confirmation" type="password" name="password_confirmation" class="form-control" required>
            </div>

            <div class="d-grid mb-3">
                <button type="submit" class="btn gradient-btn">RESET PASSWORD</button>
            </div>
        </form>
    </div>
</div>
@endsection
