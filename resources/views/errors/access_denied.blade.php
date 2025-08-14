<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Akses Ditolak</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .access-denied-container {
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
        }
        .icon {
            font-size: 5rem;
            color: #dc3545;
        }
    </style>
</head>
<body>

<div class="access-denied-container">
    <div class="icon">❌</div>
    <h1 class="text-danger fw-bold mt-3">Akses Ditolak</h1>
    <p class="lead">Anda tidak memiliki izin untuk mengakses halaman ini.</p>
    <a href="{{ url()->previous() }}" class="btn btn-outline-primary mt-3">⬅ Kembali</a>
</div>

</body>
</html>
