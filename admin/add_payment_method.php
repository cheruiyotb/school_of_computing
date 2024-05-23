<?php include '../auth.php'; ?>
<?php include '../db.php'; ?>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $method = $_POST['method'];
    $description = $_POST['description'];

    $sql = "INSERT INTO payment_methods (method, description) VALUES ('$method', '$description')";
    if ($conn->query($sql) === TRUE) {
        header('Location: manage_payment_methods.php');
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Payment Method</title>
    <link rel="stylesheet" href="../css/styles.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container">
                <a class="navbar-brand" href="#">Admin Dashboard</a>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="admin.php">Dashboard</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../logout.php">Logout</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <main class="container">
        <h2 class="my-4 text-center">Add New Payment Method</h2>
        <div class="row justify-content-center">
            <div class="col-md-6">
                <form method="post" action="add_payment_method.php">
                    <div class="form-group">
                        <label for="method">Payment Method</label>
                        <input type="text" class="form-control" id="method" name="method" required>
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea class="form-control" id="description" name="description" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Add Payment Method</button>
                </form>
            </div>
        </div>
    </main>
    <footer class="footer mt-auto py-3">
        <div class="container text-center">
            <span class="text-muted">© 2024 School of Computing and Information Technology</span>
        </div>
    </footer>
</body>
</html>
