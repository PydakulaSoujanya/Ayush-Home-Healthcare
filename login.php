<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- <link rel="stylesheet" href="style.css"> -->
    <style>
        body {
            background-color: #f7f9fc;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            font-family: 'Arial', sans-serif;
        }

        .login-container {
            width: 400px;
            background-color: #ffffff;
            padding: 40px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
        }

        .login-container h2 {
            text-align: center;
            margin-bottom: 30px;
            color: #333;
        }

        .form-control {
            border: 1px solid #ced4da;
            padding: 10px;
            font-size: 16px;
        }

        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
            padding: 10px;
            width: 100%;
        }

        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #004085;
        }

        .form-check-label {
            margin-left: 5px;
        }

        .login-footer {
            text-align: center;
            margin-top: 20px;
        }

        .login-footer a {
            color: #007bff;
            text-decoration: none;
        }

        .login-footer a:hover {
            text-decoration: underline;
        }

        .alert {
            display: none;
        }
        .navbar-logo-img {
            height: 65px !important;
    /* Set the desired height */
    width: auto;
    /* Maintain aspect ratio */
    border-radius: 50%;
    /* Circular logo or adjust to your needs */
    object-fit: cover;
    /* Ensure proper scaling of the image */
        }
    </style>
</head>
<body>

<div class="login-container">
<div class="text-center mb-4">
<img src="images/logo.jpg" alt="Ayush App Logo" class="navbar-logo-img" />
   
    </div>
    <h2>Login</h2>
    
    <div class="alert alert-danger" id="login-alert">
        Invalid login credentials!
    </div>

    <form id="login-form" method="post" action="logindb.php">
        <div class="mb-3">
            <label for="email" class="form-label">Email address</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email" required>
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password" required>
        </div>

        <div class="mb-3 form-check">
            <input type="checkbox" class="form-check-input" id="rememberMe" name="remember_me">
            <label class="form-check-label" for="rememberMe">Remember Me</label>
        </div>

        <button type="submit" class="btn btn-primary">Login</button>
    </form>

    <!-- <div class="login-footer mt-3">
        <p>Don't have an account? <a href="register.php">Register here</a></p>
    </div> -->
</div>

<!-- Bootstrap JS and dependencies -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>

</body>
</html>
