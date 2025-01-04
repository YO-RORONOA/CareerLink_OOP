<?php
session_start();

$errors = isset($_SESSION['error_message']) ? $_SESSION['error_message'] : [];
$formData = isset($_SESSION['formdata']) ? $_SESSION['formdata'] : [];
unset($_SESSION['error_message'], $_SESSION['formdata']);
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/css/styles.css" rel="stylesheet">
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <!-- Left Container -->
            <div class="col-md-6 left-container">
                <div>
                    <h1 class="mb-4">Join Our Platform</h1>
                    <ul class="advantage-list">
                        <li><i class="bi bi-check-circle"></i> Connect with top recruiters.</li>
                        <li><i class="bi bi-check-circle"></i> Access exclusive job offers.</li>
                        <li><i class="bi bi-check-circle"></i> Build your professional network.</li>
                        <li><i class="bi bi-check-circle"></i> Get personalized career advice.</li>
                    </ul>
                </div>
            </div>

            <!-- Right Container -->
            <div class="col-md-6 right-container">
                <div class="register-form">
                    <h2 class="mb-4">Register</h2>
                    <form method="POST" action="../index.php">
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input name="name" type="text" class="form-control" id="name" placeholder="Enter your name"
                            value="<?php echo isset($formData['name']) ? $formData['name'] : ''; ?>">
                            <?php if (isset($errors['name'])): ?>
                                <small class="text-danger"><?php echo $errors['name']; ?></small>
                            <?php endif; ?>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input name="email" type="email" class="form-control" id="email" placeholder="Enter your email"

                            value="<?php echo isset($formData['email']) ? $formData['email'] : ''; ?>">
                            <?php if(isset($errors['email'])): ?>
                                <small class="text-danger"><?php echo $errors['email']; ?></small>
                            <?php endif; ?>

                        </div>
                        <div class="mb-3">
                            <label for="phone" class="form-label">Phone Number</label>
                            <input name="phone" type="text" class="form-control" id="phone" placeholder="Enter your phone number"
                            value="<?php echo isset($formData['phone']) ? $formData['phone']: '';?>">
                            <?php if(isset($errors['phone'])): ?>
                                <small class="text-danger"><?php echo $errors['phone']; ?></small>
                            <?php endif;?>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input name="password" type="password" class="form-control" id="password" placeholder="Enter your password"
                            value="<?php isset($formData['password']) ? $formData['password']: ''; ?>">
                            <?php if(isset($errors['password'])):?>
                                <small class="text-danger"><?php echo $errors['password'];?></small>
                            <?php endif;?>
                        </div>
                        <div class="mb-3">
                            <label for="role" class="form-label">Role</label>
                            <select name="role" class="form-select" id="role">
                                <option value="candidate">Candidate</option>
                                <option value="recruiter">Recruiter</option>
                            </select>
                        </div>
                        <button name="submit" type="submit" class="btn btn-primary w-100">Register</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


</body>
</html>