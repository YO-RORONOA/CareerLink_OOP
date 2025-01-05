<?php

require_once __DIR__ . '/../controllers/categorieController.php';

$controller = new CategorieController;
$categories = $controller->getAllCategories();
?>
<?php if (isset($_SESSION['error_message'])): ?>
    <div class="alert alert-danger">
        <?= implode('<br>', $_SESSION['error_message']); ?>
        <?php unset($_SESSION['error_message']); ?>
    </div>
<?php endif; ?>

<?php if (isset($_SESSION['success_message'])): ?>
    <div class="alert alert-success">
        <?= $_SESSION['success_message']; ?>
        <?php unset($_SESSION['success_message']); ?>
    </div>
<?php endif; ?>
<?php $index = 1; ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Categories Management</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center">Manage Categories</h2>

        <form action="../controllers/categorieController.php" method="POST" class="my-4">
            <div class="mb-3">
                <label for="category_name" class="form-label">Category Name:</label>
                <input type="text" class="form-control" id="category_name" name="namecategorie" required>
            </div>
            <button type="submit" name="submit" class="btn btn-success">Add Category</button>
        </form>

        <table class="table table-bordered">
            <thead class="table-dark">
                <tr>
                    <th>#</th>
                    <th>Category Name</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>Sports</td>
                    <td>
                        <a href="edit_category.php?id=1" class="btn btn-primary btn-sm">Modify</a>
                        <a href="delete_category.php?id=1" class="btn btn-danger btn-sm">Delete</a>
                    </td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>Movies</td>
                    <td>
                        <a href="edit_category.php?id=2" class="btn btn-primary btn-sm">Modify</a>
                        <a href="delete_category.php?id=2" class="btn btn-danger btn-sm">Delete</a>
                    </td>
                </tr>
                <?php foreach($categories as $categorie):?>
                <tr>
                    <td><?= $index++;?></td>
                    <td><?= htmlspecialchars($categorie['namecategorie']);?></td>
                    <td>
                        <a href="edit_category.php?id=2" class="btn btn-primary btn-sm">Modify</a>
                        <a href="delete_category.php?id=2" class="btn btn-danger btn-sm">Delete</a>
                    </td>
                </tr>
                <?php endforeach;?>
            </tbody>
        </table>

        <a href="dashboard.php" class="btn btn-secondary">Back to Dashboard</a>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>