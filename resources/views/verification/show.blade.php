<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Admin</title>

  <!-- Google Fonts: Poppins -->
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">

  <!-- plugins:css -->
  <link rel="stylesheet" href="{{ asset('admin/dist/assets/vendors/mdi/css/materialdesignicons.min.css') }}">
  <link rel="stylesheet" href="{{ asset('admin/dist/assets/vendors/ti-icons/css/themify-icons.css') }}">
  <link rel="stylesheet" href="{{ asset('admin/dist/assets/vendors/css/vendor.bundle.base.css') }}">
  <link rel="stylesheet" href="{{ asset('admin/dist/assets/vendors/font-awesome/css/font-awesome.min.css') }}">
  <link rel="stylesheet" href="{{ asset('admin/dist/assets/css/style.css') }}">

  <!-- Custom Pink Theme -->
  <style>
    body {
      background-color: #ffe6f0;
      font-family: 'Poppins', sans-serif;
      font-size: 15px;
    }

    .auth-form-light {
      background-color: #fff0f6;
      border-radius: 10px;
      box-shadow: 0 0 10px rgba(255, 105, 180, 0.2);
    }

    .auth-form-btn {
      background: linear-gradient(90deg, #ff69b4, #ff1493);
      border: none;
      color: white;
      font-weight: 600;
      padding: 0.5rem 1.2rem;
      font-size: 14px;
    }

    .auth-form-btn:hover {
      background: linear-gradient(90deg, #ff1493, #ff69b4);
    }

    h4 {
      text-align: center;
      font-weight: 700;
      font-size: 24px;
      color: #d63384;
      margin-bottom: 1.5rem;
    }

    .form-control:focus {
      border-color: #ff69b4;
      box-shadow: 0 0 0 0.2rem rgba(255, 105, 180, 0.25);
    }

    input[type=number]::-webkit-inner-spin-button,
    input[type=number]::-webkit-outer-spin-button {
      -webkit-appearance: none;
      margin: 0;
    }

    input[type=number] {
      -moz-appearance: textfield;
    }

    .resend-link {
      display: block;
      margin-top: 1rem;
      text-align: center;
      font-size: 14px;
    }

    .resend-link a {
      color: #d63384;
      font-weight: 500;
      text-decoration: none;
    }

    .resend-link a:hover {
      text-decoration: underline;
    }
  </style>
</head>
<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth">
        <div class="row flex-grow">
          <div class="col-lg-4 mx-auto">
            <div class="auth-form-light text-left p-5">

              <h4>Account Verification</h4>

              @if (session('failed'))
                <div class="alert alert-danger">{{ session('failed') }}</div>
              @endif

              <form action="/verify/{{ $unique_id }}" method="post">
                @method('PUT')
                @csrf

                <div class="form-group">
                  <input type="number" name="otp" id="otp" class="form-control" placeholder="Enter OTP" required>
                </div>

                <div class="text-center mt-3">
                  <button type="submit" class="btn auth-form-btn">Submit OTP</button>
                </div>

              </form>

              <div class="resend-link">
                Didn’t receive the code? 
              </div>
              

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- plugins:js -->
  <script src="{{ asset('admin/dist/assets/vendors/js/vendor.bundle.base.js') }}"></script>
</body>
</html>
