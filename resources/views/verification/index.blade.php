<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Account Verification</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- Google Font -->
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">

  <style>
    body {
      margin: 0;
      padding: 0;
      font-family: 'Poppins', sans-serif;
      background-color: #f8eff7;
      height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
    }

    .container {
      background: #fff;
      padding: 40px 30px;
      border-radius: 12px;
      box-shadow: 0 8px 20px rgba(255, 105, 180, 0.2);
      text-align: center;
      width: 100%;
      max-width: 400px;
    }

    h2 {
      color: #d63384;
      margin-bottom: 10px;
      font-weight: 700;
    }

    p {
      color: #555;
      font-size: 14px;
      margin-bottom: 25px;
    }

    .btn {
      background: linear-gradient(to right, #ff66a5, #ff1f8f);
      border: none;
      padding: 12px 25px;
      color: white;
      font-weight: 600;
      border-radius: 8px;
      cursor: pointer;
      text-decoration: none;
      transition: background 0.3s ease;
      display: inline-block;
    }

    .btn:hover {
      background: linear-gradient(to right, #ff1f8f, #ff66a5);
    }
  </style>
</head>
<body>
  <div class="container">
    <h2>Account Verification</h2>
    <p>Please verify your account</p>
    <form action="/verify" method="post">
        @csrf
        <input type="hidden" value="login" name="type">
        <button type="submit" class="btn btn-sm btn-primary">Send OTP to your Email</button>
</form>
  </div>
</body>
</html>
