<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <nav class="navbar navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Admin Dashboard</a>
            <a class="btn btn-danger" href="logout.php">Logout</a>
        </div>
    </nav>

    <div class="container mt-5">
        <div class="row">
            <!-- Sidebar -->
            <div class="col-md-3">
                <ul class="list-group">
                    <li class="list-group-item"><a href="#">Dashboard Home</a></li>
                    <li class="list-group-item"><a href="manage_categories.php">Manage Categories</a></li>
                    <li class="list-group-item"><a href="manage_tags.php">Manage Tags</a></li>
                    <li class="list-group-item"><a href="manage_users.php">Manage Users</a></li>
                </ul>
            </div>

            <!-- Main Content -->
            <div class="col-md-9">
                <h1>Welcome, Admin!</h1>
                <p>Use the sidebar to manage categories, tags, and users.</p>

                <div class="row mt-4">
                    <div class="col-md-4">
                        <div class="card text-white bg-primary mb-3">
                            <div class="card-body">
                                <h5 class="card-title">Categories</h5>
                                <p class="card-text">Manage all categories.</p>
                                <a href="manage_categories.php" class="btn btn-light">Go to Categories</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card text-white bg-success mb-3">
                            <div class="card-body">
                                <h5 class="card-title">Tags</h5>
                                <p class="card-text">Manage all tags.</p>
                                <a href="manage_tags.php" class="btn btn-light">Go to Tags</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card text-white bg-warning mb-3">
                            <div class="card-body">
                                <h5 class="card-title">Users</h5>
                                <p class="card-text">Manage all users.</p>
                                <a href="manage_users.php" class="btn btn-light">Go to Users</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
</html>
