<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Apply Now - School of Computing and Information Technology</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="styles.css"> <!-- Custom CSS file -->
</head>
<body>
  <header>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <div class="container">
        <a class="navbar-brand" href="index.php">School of Computing and Information Technology</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link" href="index.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="academics.php">Academics</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="payment.php">Payment Methods</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="programmes.php">Programmes</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="login.php">Login</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="staff.php">Staff</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="apply.php">Apply Now</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
  </header>

  <main class="container">
    <section class="my-5">
      <h2 class="text-center mb-4">Apply Now</h2>
      <div class="row">
        <div class="col-md-6">
          <h3>Apply for Programmes</h3>
          <form id="applyForm" action="submit_application.php" method="post">
            <div class="form-group">
              <label for="applicantName">Full Name</label>
              <input type="text" class="form-control" id="applicantName" name="applicantName" placeholder="Enter your full name" required>
            </div>
            <div class="form-group">
              <label for="applicantEmail">Email</label>
              <input type="email" class="form-control" id="applicantEmail" name="applicantEmail" placeholder="Enter your email address" required>
            </div>
            <div class="form-group">
              <label for="programme">Select Programme</label>
              <select class="form-control" id="programme" name="programme" required>
                <option value="">Select a programme</option>
                <?php
                include 'db.php';

                $sql = "SELECT id, name FROM academic_programmes";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<option value='" . $row["id"] . "'>" . htmlspecialchars($row["name"]) . "</option>";
                    }
                }
                ?>
              </select>
            </div>
            <button type="submit" class="btn btn-primary">Submit Application</button>
          </form>
        </div>
      </div>
    </section>
  </main>

  <footer class="footer mt-auto py-3">
    <div class="container text-center">
      <span class="text-muted">© 2024 School of Computing and Information Technology</span>
    </div>
  </footer>

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
