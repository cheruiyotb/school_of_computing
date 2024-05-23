<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Academics - School of Computing and Information Technology</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="styles.css"> <!-- Custom CSS file -->
</head>
<body>
  <header>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <div class="container">
        <a class="navbar-brand" href="index.php">
          <img src="logo.png" alt="School Logo" style="height: 40px;"> <!-- Add your logo image here -->
        </a>
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
              <a class="nav-link" href="programmes.php">Programmes</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="staff.php">Staff</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="apply.php">Apply Now</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="payment.php">Payment Methods</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="login.php">Login</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
  </header>

  <main class="container mt-5">
    <h2 class="text-center mb-4">Academic Activities and Programmes</h2>

    <section>
      <h3>Academic Activities</h3>
      <div class="row">
        <?php
        include 'db.php';

        $sql = "SELECT title, description, date FROM activities ORDER BY date DESC";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<div class='col-md-6 mb-4'>";
                echo "<div class='card'>";
                echo "<div class='card-body'>";
                echo "<h5 class='card-title'>" . htmlspecialchars($row["title"]) . "</h5>";
                echo "<p class='card-text'>" . htmlspecialchars($row["description"]) . "</p>";
                echo "<p class='card-text'><small class='text-muted'>Date: " . htmlspecialchars($row["date"]) . "</small></p>";
                echo "</div>";
                echo "</div>";
                echo "</div>";
            }
        } else {
            echo "<p>No academic activities found.</p>";
        }
        ?>
      </div>
    </section>

    <section>
      <h3>Academic Programmes</h3>
      <div class="row">
        <?php
        $sql = "SELECT name, description FROM academic_programmes";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<div class='col-md-6 mb-4'>";
                echo "<div class='card'>";
                echo "<div class='card-body'>";
                echo "<h5 class='card-title'>" . htmlspecialchars($row["name"]) . "</h5>";
                echo "<p class='card-text'>" . htmlspecialchars($row["description"]) . "</p>";
                echo "</div>";
                echo "</div>";
                echo "</div>";
            }
        } else {
            echo "<p>No academic programmes found.</p>";
        }

        $conn->close();
        ?>
      </div>
    </section>
  </main>

  <footer class="footer mt-auto py-3 bg-light">
    <div class="container text-center">
      <span class="text-muted">© 2024 School of Computing and Information Technology. All rights reserved.</span>
    </div>
  </footer>

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
