<?php include '../includes/auth.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
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
        <h2 class="my-4 text-center">Admin Dashboard</h2>
        <div class="row">
            <div class="col-md-4">
                <a href="manage_activities.php" class="btn btn-primary btn-block">Manage Activities</a>
            </div>
            <div class="col-md-4">
                <a href="manage_programmes.php" class="btn btn-primary btn-block">Manage Programmes</a>
            </div>
            <div class="col-md-4">
                <a href="manage_payment_methods.php" class="btn btn-primary btn-block">Manage Payment Methods</a>
            </div>
            <div class="col-md-4">
                <a href="manage_staff.php" class="btn btn-primary btn-block">Manage Staff</a>
            </div>
            <div class="col-md-4">
                <a href="view_applications.php" class="btn btn-primary btn-block">View Applications</a>
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
