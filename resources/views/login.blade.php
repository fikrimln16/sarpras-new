<!-- <!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>
    <form method="POST" action="{{ route('login.post') }}">
        @csrf
        <div>
            <label for="email">Email</label>
            <input type="email" id="email" name="email" required>
        </div>
        <div>
            <label for="password">Password</label>
            <input type="password" id="password" name="password" required>
        </div>
        <div>
            <button type="submit">Login</button>
        </div>
    </form>
</body>
</html> -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f8f9fa;
            margin: 0;
            padding: 0;
        }

        .login-container {
            display: flex;
            align-items: center;
            padding: 64px 200px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            height: 100%;
            gap: 24px;
        }

        

        .welcome-message h1 {
            font-size: 2rem;
            margin-bottom: 20px;
        }

        .welcome-message p {
            font-size: 1rem;
        }

        .alert {
            font-size: 0.9rem;
        }

        

    </style>
</head>

<body>
    <div class="login-container">
        <div class="welcome-message col-8">
            <div class="alert alert-warning" role="alert">
                <strong>Kami Senantiasa Meningkatkan Kualitas Layanan</strong>
                <p>Perbaikan dan pengembangan platform SISTER terus kami lakukan agar dapat melayani Anda dengan lebih baik. Jika mengalami masalah, jangan ragu untuk kontak Pusat Bantuan agar segera dapat ditangani.</p>
            </div>
            <h1>Selamat datang di wajah baru SISTER</h1>
            <p>Anda tetap dapat masuk dengan email & kata sandi yang sama</p>
            <p>Platform SISTER hadir dengan pembaruan teknologi untuk meningkatkan kemudahan pengguna. Jelajahi SISTER yang lebih cepat, andal & efisien.</p>
            <button class="btn btn-light">Soal Sering Ditanya (SSD)</button>
            <div class="mt-3">
                <img src="https://pddikti.kemdikbud.go.id/images/pddikti.png" alt="PDDIKTI Logo" height="40">
                <p>Bagian dari PD DIKTI</p>
            </div>
        </div>
        <div class="login-form col-4">
            <h3>Masuk Ke Akun</h3>
            <form method="POST" action="{{ route('login.post') }}">
                @csrf
                <div class="form-group">
                    <label for="email">Email Pengguna / Username</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Pastikan email sesuai" required>
                </div>
                <div class="form-group">
                    <label for="password">Kata Sandi</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Pastikan kata sandi sesuai" required>
                </div>
                <button type="submit" class="btn btn-primary btn-block">Masuk</button>
                <div class="form-group mt-3">
                    <a href="#">Lupa Kata Sandi?</a>
                </div>
                <div class="form-group">
                    <a href="#">Belum Punya Akun? Daftar Sekarang</a>
                </div>
            </form>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>