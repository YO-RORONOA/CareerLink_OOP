<?php
session_start();

$errors = isset($_SESSION['text_error']) ? $_SESSION['text_error'] : [];
unset($_SESSION['text_error']);
print_r($errors);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/css/login.css" rel="stylesheet">
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6 left-container">
                <div class="register-form">
                    <h2 class="mb-4">Login</h2>
                    <form method="POST" action="../controllers/logincontroller.php">
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input name="email" type="email" class="form-control" id="email" placeholder="Enter your email">
                            <?php if (isset($errors['email'])): ?>
                                <small class="text-danger"><?php echo $errors['email']; ?></small>
                            <?php endif; ?>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input name="password" type="password" class="form-control" id="password" placeholder="Enter your password">
                        </div>
                        <button name="submit" type="submit" class="btn btn-primary w-100">Login</button>
                    </form>
                </div>
            </div>

            <div class="col-md-6 right-container">
                <div>
                    <h1 class="mb-4">Welcome Back!</h1>
                    <ul class="advantage-list">
                        <li><i class="bi bi-check-circle"></i> Connect with top recruiters.</li>
                        <li><i class="bi bi-check-circle"></i> Access exclusive job offers.</li>
                        <li><i class="bi bi-check-circle"></i> Build your professional network.</li>
                        <li><i class="bi bi-check-circle"></i> Get personalized career advice.</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
