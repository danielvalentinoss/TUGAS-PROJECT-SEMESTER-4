<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Login Admin - Sistem Obat</title>
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #4facfe, #00f2fe);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0;
        }

        .login-box {
            background: #fff;
            padding: 40px 30px;
            border-radius: 15px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 380px;
        }

        .login-box h2 {
            font-weight: 600;
            margin-bottom: 30px;
            color: #333;
        }

        .form-group {
            position: relative;
            margin-bottom: 20px;
        }

        .form-control {
            padding-left: 40px;
            height: 45px;
        }

        .form-icon {
            position: absolute;
            top: 50%;
            left: 12px;
            transform: translateY(-50%);
            color: #aaa;
            font-size: 1.1rem;
        }

        .btn-success {
            background-color: #28a745;
            border: none;
            font-weight: 500;
        }

        .btn-success:hover {
            background-color: #218838;
        }

        @media (max-width: 400px) {
            .login-box {
                padding: 30px 20px;
            }
        }
    </style>
</head>
<body>

<div class="login-box text-center">
    <h2>Login Sistem Obat</h2>

    <form action="proses_login.php" method="POST">
        <div class="form-group">
            <i class="bi bi-person-fill form-icon"></i>
            <input type="text" name="username" class="form-control" placeholder="Username" required>
        </div>
        <div class="form-group">
            <i class="bi bi-lock-fill form-icon"></i>
            <input type="password" name="password" class="form-control" placeholder="Password" required>
        </div>
        <button type="submit" class="btn btn-success w-100">Login</button>
    </form>
</div>

</body>
</html>
